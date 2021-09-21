<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{


    use HasFactory;
    protected $table='purchase';
    protected $guarded=[];
    public function Supplier(){

        return $this->belongsto(Supplier::class);

        }

        public function Product(){

            return $this->belongsto(Product::class);

            }
}
