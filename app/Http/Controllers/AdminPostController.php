<?php

namespace App\Http\Controllers;
use Log;
use Illuminate\Http\Request;
use App\models\Post;
use DB;

class AdminPostController extends Controller
{

    public function index(){
        Post::all();
        $posts = DB::table('posts')->get();
        return view('pages/post/index',compact('posts'));
    }

    public function create(Request $request){
        return view('/pages/kanri/create');
    }

    public function store(Request $request){
        $id = $request->session()->get('userId');
        $title = $request->input('title');
        $message = $request->input('message');

        Post::insert(
            [
                'user_id' => $id,
                'title' => $title,
                'message' => $message
            ]);
        return redirect('/kanri/post');
}
}
