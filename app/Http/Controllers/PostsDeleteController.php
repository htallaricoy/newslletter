<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class PostsDeleteController extends Controller
{
    public function PostsDelete(){
        Artisan::call('migrate:fresh --seed');

        return view('pages/posts/deleted');
    }
}
