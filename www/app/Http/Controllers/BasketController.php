<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Basket;
use Illuminate\Http\Request;
use App\Services\BasketServices;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function show()
    {
        $basket = Auth::user()->basket;
        $result=['status'=>true, 'basket'=>$basket];
        return view('basket')->with($result);
    }
    public function add($id){
        $cs=new BasketServices();
        $cs->add($id);
        return back();
    }
    public function minus($id)
    {
        $cs=new BasketServices();
        $cs->minus($id);
        return back();
    }
    public function clear(){
        $cs=new BasketServices();
        $cs->clear();
        return back();
    }
    public function delete($id){
        $cs=new BasketServices();
        $cs->delete($id);
        return back();
    }
    public function application(){
        return view('applications');
    }

    public function createApplication(Request $request)
    {
        $request->validate([
            'name' => "min:2|max:20|required",
            'phone' => "required|min:11|max:11",
            'address' => "required",
        ],[
            'name.min' => 'Название должно быть длинее 2 символов',
            'name.max' => 'Название не должно быть длинее 20 символов',
            'name.required' => 'Обязательное поле "Название"',
            'phone.required' => 'Обязательное поле "Номер телефона"',
            'phone.min' => 'Номер телефона должен содержать 11 символов',
            'phone.max' => 'Номер телефона должен содержать 11 символов',
            'address.required' => 'Обязательное поле "Адрес"',
        ]);

        $application = new Application();
        $application->name = $request->name;
        $application->phone = $request->phone;
        $application->address = $request->address;
        $application->comment = $request->comment;
        $application->status_id = 0;
        $application->user_id = Auth::id();
        $application->save();
        return redirect('basket/application');
    }
}
