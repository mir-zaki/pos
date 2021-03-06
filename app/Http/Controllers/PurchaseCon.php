<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Stock;
use App\Models\PurchaseDetails;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Support\Facades\DB;

class PurchaseCon extends Controller
{
    public function purchaseadd ()
    {
        $categories=category::all();
        $supplier=Supplier::all();
        $product=product::all();
        $pur=Purchase::all();
        return view('backend.layout.purchase.addpurchase',compact('categories','supplier','product','pur'));

    }

    public function purchase_add ()
    {
        $purchasemanage=Purchase::all();

        //dd($purchasemanage->all());

        return view('backend.layout.purchase.managepurchase',compact('purchasemanage'));

    }

    public function purchase_list ($id)
    {


        $purchaseList=PurchaseDetails::where('purchase_id',$id)->orderBy('id','desc')->get();


        return view('backend.layout.purchase.purchaselist',compact('purchaseList','id'));



    }


    public function purchase_details ()
    {


        $purchasedetails=PurchaseDetails::all();
        //dd($purchasedetails->all());
        return view('backend.layout.purchase.purchasedetails',compact('purchasedetails'));

    }


    public function purchasepost (Request $request)


    {
    // dd($request->all());
        DB::beginTransaction();
        try{

            $carts=session()->get('cart');
            // dd($carts);

            $total=array_sum(array_column($carts,'sub_total'));

            $data=Purchase::create([
                'purchase_date'=>$request->purchase_date,
                'supplier_id'=>$request->supplier_name,
                'challan_no'=>$request->Challan_no,
                'total_price'=>$total,
                'received_by'=>auth()->user()->id,

            ]);


            $carts=session()->get('cart');


            foreach ($carts as $cart){

            PurchaseDetails::create([
                'purchase_id' => $data->id,
                'product_id' => $cart['product_id'],
                'qty' => $cart['qty'],
                'unit_price' => $cart['buy_price'],
                'sub_total' => $cart['buy_price'] * $cart['qty'],
            ]);




            //step 1 check product has in stock
$stock=Stock::where('product_id',$cart['product_id'])->first();

//dd($stock);

if($stock)
{
    $stock->update([
        'buy_price' => $stock['buy_price'],
        'qty' =>$stock->qty + $cart['qty']
    ]);

}
else
{

    Stock::create([

        'product_id'=>$cart['product_id'],
        'buy_price' => $cart['buy_price'],
        'qty'=> $cart['qty'],

    ]);
}



            //step 2 if has
                //update quantity

                //else create stock


            }
            $request->session()->forget('cart');
            DB::commit();
            return redirect()->route('Purchaseadd');

        }
        catch(Throwable $e){
            DB::rollBack();
            return $e->getMessage();
        }

    }



public function addToCart(Request $request)
    {



        $product = product::find($request->product_name);


        if(!$product) {


            abort(404);

        }
        //dd($purchase->all());

        $cart = session()->get('cart');


        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $product->id => [
                        'purchase_id' => $product->purchase_id,
                        'product_id' => $product->id,
                        "product_name" => $product->product_name,
                        "buy_price" => $request->buy_price,
                        "qty" => $request->qty,
                        "sub_total"=>$request->buy_price *$request->qty
                    ]
            ];

            session()->put('cart', $cart);



            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$product->id])) {

            $cart[$product->id]['buy_price']=$request->buy_price;
            $cart[$product->id]['qty']= $cart[$product->id]['qty']+$request->qty;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$product->id] = [
                        'purchase_id' => $product->purchase_id,
                        'product_id' => $product->id,
                        "product_name" => $product->product_name,
                        "buy_price" => $request->buy_price,
                        "qty" => $request->qty,
                        "sub_total"=>$request->buy_price *$request->qty
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function purchase_forget (Request $request)
    {
        if(session()->has('cart'))
        {
            $request->session()->forget('cart');
            return redirect()->back();
        }

return redirect()->back();

    }

    public function purchases_delete($id){
        $purchasedel=Purchase::find($id);
        if($purchasedel){
            $purchasedel->delete();
            return redirect()->back()->with('message','Product is Deleted');
        }

    }



}
