<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\confirm;

class RegisterController extends Controller
{
    public function username(){
        return 'login';
    }
    public function registerForm(){
        return view('/login/register');
    }
    public function register(Request $request){
        $request->validate([
            'login' => "min:3|max:20|required|unique:users",
            'password' => "min:3|max:20|required|confirmed",
            'email' => "email|required",
        ],[
            'login.min' => 'логин должен быть длинее 3 символов'
        ]);
        $user = User::create([
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect('/');
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    public function authForm(){
        return view('/login/auth');
    }
    public function auth(Request $request){
        $request->validate([
            'login' => "min:3|max:20|required|exists:users",
            'password' => "min:3|max:20|required",
        ],[
            'login.exists' => 'Пользователя не существует',
            'login.min' => 'Логин должен быть длинее 3 символов',
            'login.max' => 'Логин должен быть не длинее 20 символов',
            'password.min' => 'Пароль должен быть длинее 3 символов',
            'password.max' => 'Пароль должен быть не длинее 20 символов'
        ]);
        $successful = Auth::attempt([
            'login'=>$request->login,
            'password'=>$request->password,
        ], $request->remember);
        if(!$successful){
            return back()->withErrors([
                'password'=>'Неверно указан логин или пароль'
            ]);
        }
        return redirect('/');
    }
    public function cabinet()
    {

        if(Auth::user()->admin) {
            $reviews = Review::where('status',0)->get();
            return view('/cabinet_admin', [
                'reviews' => $reviews
            ]);
        }else{
            return view('/cabinet');
        }
    }
    public function changePassword(Request $request){
        $request->validate([
            'password' => "min:3|max:20|required|confirmed",
        ],[
            'password.confirmed' => 'Пароли не совпадают',
            'password.min' => 'Пароль должен быть длинее 3 символов',
            'password.max' => 'Пароль должен быть не длинее 20 символов'
        ]);

        if (Hash::check($request->oldPassword, Auth::user()->password)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect('/cabinet')->with('success', 'Пароль успешно изменен');
        }else{
            return back()->withErrors([
               'user'=>'Укажите верный пароль'
            ]);
        }
    }
    public function favorite(Request $request)
    {
        return view('login.favorites');
    }
    public function favoriteAdd($id)
    {
        Auth::user()->products()->attach($id);
        return back();
    }
}
