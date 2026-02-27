<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class BasketServices
{
    public function add($id, $q = 1){
        $product_exist = Product::findOrFail($id);
        $basket = Auth::user()->basket();
        $product = $basket->where('product_id', $id)->first();
        $quant_current = 0;
        if($product){
            $quant_current = $product->pivot->quantity;
            $basket->updateExistingPivot($id, ['quantity' => $quant_current + $q]);

        }else{
            $basket->attach($id, ['quantity'=>$q]);
        }
        $result=['status'=>true, 'quantity'=>$quant_current+$q];
        return $result;
    }
    public function minus($id){
        $basket = Auth::user()->basket();
        $product = $basket->where('product_id', $id)->first();
        if($quant_current>1){
            $basket->updateExistingPivot($id, ['quantity'=>$quant_current-1]);
        }else{
            $basket->detach($id);
        }
        $result=['status'=>true, 'quantity'=>$quant_current-1];
        return $result;
    }
    public function clear($id){
        $basket = Auth::user()->basket();
        $basket->detach($basket->get());
        $result = ['status'=>true];
        return $result;
    }
    static function count(){
        $basket = Auth::user()->basket();
        $sum = $count = 0;
        foreach($basket->get() as $product){
            $sum += $product->price*$product->pivot->quantity;
            $count+=$product->pivot->quantity;
        }
        return['count'=>$count, 'sum'=>$sum];
    }
}
