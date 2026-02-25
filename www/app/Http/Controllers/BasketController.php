<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;
use App\Services\BasketServices;

class BasketController extends Controller
{
    public function add($id){
        $cs=new BasketServices();
        $cs->add($id);
        return back();
    }
}
