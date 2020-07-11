<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use DB;
use App\Models\Accounts;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function topPage(){
        return view('/pages/welcome');
    }

    //管理者用ログイン処理
    public function loginForKanriPage(){
        return view('pages/kanri/adminlogin');
    }

    public function loginForKanri(Request $request){
        $name = $request->input('user');
        $password = $request->input('password');
        $user = DB::table('accounts')->where('user', $name);
        $dbPassword = $user->value('password');
        $id = $user->value('id');

        if (Hash::check($password, $dbPassword)) {
            $request->session()->put('userId', $id);
            return redirect('/posts');

        } else {
            return view('/pages/kanri/adminlogin');
        }

    }

    // 一般ユーザー
    public function loginForShanaiPage(){
        return view('pages/shanai/login');
    }

    public function loginForShanai(Request $request){
        $name = "GENERAL";
        $password = $request->input('password');
        $user = DB::table('accounts')->where('user', $name);
        $dbPassword = $user->value('password');
        $id = $user->value('id');

        if (Hash::check($password, $dbPassword)) {
            $request->session()->put('userId', $id);
            return redirect('/posts');
        } else {
            return view('/pages/shanai/login');
        }
    }

}
