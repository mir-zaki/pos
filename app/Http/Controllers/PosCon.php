<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Paymentcustomer;
use App\Models\product;
use App\Models\PurchaseDetails;
use App\Models\revenue;
use App\Models\Sale;
use App\Models\Stock;
use App\Models\Saledetails;
use Illuminate\Http\Request;

class PosCon extends Controller
{
    public function pos(){


        $customer=Customer::all();
        $product=Stock::all();
        // dd($customer);
        return view('backend.layout.pos.pos',compact('customer','product'));


    }

    public function manage_sale(Request $request){

            $salemanage=Sale::with('payment')->orderBy('id','desc')->get();
            //dd($salemanage);

        return view('backend.layout.pos.managesale',compact('salemanage'));


    }


    public function sale_list ($id)
    {

        //dd( $purchase);

        //$purchaseList = PurchaseDetails::where('purchase_id',$purchase->purchase_id)->get();
        $salelist=Saledetails::where('sale_id',$id)->get();

        $customer=Sale::with('customer')->where('id',$id)->get();
        $payment=Paymentcustomer::where('sale_id',$id)->get();
//dd($payment);

        return view('backend.layout.pos.salelist',compact('salelist','id','customer','payment'));



    }



    public function pos_post( Request $request){


//dd($request);

        $carts=session()->get('cart');

        $total=array_sum(array_column($carts,'sub_total'));



        $saleid=Sale::create([
            'sale_date'=>$request->sale_date,
            'customer_id'=>$request->customer_name,
            'total_price'=>$total,
            'sale_by'=>auth()->user()->id,

        ]);


        $carts=session()->get('cart');



            foreach ($carts as $cart){

          $details =  Saledetails::create([
                'sale_id' => $saleid->id,
                'product_id' => $cart['product_id'],
                'qty' => $cart['qty'],
                'sale_price' => $cart['sale_price'],
                'sub_total' => $cart['sale_price'] * $cart['qty'],
            ]);


                revenue::create([

                'sale_date'=>$request->sale_date,
                'product_id' => $cart['product_id'],
                'sale_price' => $cart['sale_price']* $cart['qty'],
                "buy_price" => $cart['buy_price']* $cart['qty'],
                'sub_total' => $cart['sale_price']* $cart['qty']-$cart['buy_price']* $cart['qty'],
            ]);


            $stock=Stock::where('product_id',$cart['product_id'])->first();

//dd($stock);

if($stock)
{
    if($stock->qty > $cart['qty']){
        $stock->update([
            'qty' =>$stock->qty - $cart['qty']
        ]);
    }else{
        return redirect()->back()->with('message','Quantity is Low');
    }


}else{

    Stock::create([

        'product_id'=>$cart['product_id'],
        'qty'=> $cart['qty'],

    ]);


}



    }
    $request->session()->forget('cart');
return redirect()->route('sale_list',$saleid);


}



    public function poscart(Request $request)
    {
        //$product=product::all();


        $product = product::find($request->product_name);
        $buy_price = Stock::find($request->product_name);
        //dd($product);





        if(!$product) {


            abort(404);

        }


        $cart = session()->get('cart');

        $stock=Stock::where('product_id',$product->id)->first();

        if($stock->qty < $request->qty){

            return redirect()->back()->with('message',' Requested Product Quantity is Low');
        }

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $product->id  => [
                        'product_id' => $product->id,
                        "product_name" => $product->product_name,
                        "sale_price" => $product->sale_price,
                        "buy_price" => $buy_price->buy_price,
                        "qty" => $request->qty,
                        'sub_total' =>$product->sale_price * $request->qty
                    ]

            ];

            session()->put('cart', $cart);

            //dd($cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }


        if(isset($cart[$product->id])) {



            $cart[$product->id]['qty']= $cart[$product->id]['qty']+$request->qty;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }


        $cart[$product->id] = [
                        'product_id' => $product->id,
                        "product_name" => $product->product_name,
                        "sale_price" => $product->sale_price,
                        "buy_price" => $buy_price->buy_price,
                        "qty" => $request->qty,
                        'sub_total' =>$product->sale_price * $request->qty
        ];

        session()->put('cart', $cart);



        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function pos_forget (Request $request)
    {
        if(session()->has('cart'))
        {
            $request->session()->forget('cart');
            return redirect()->back();
        }

return redirect()->back();

    }














}
