<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\Post;
use Validator;
use Datetime;
use DB;


class PostsController extends Controller
{
    public function index(Request $request)
    {
        $items = DB::table('posts')
                ->select('posts.id', 'title', 'message', 'created_at', 'department')
                ->join('accounts', 'posts.user_id', '=', 'accounts.id')
                ->get();

        $id = $request->session()->get('userId');

        $department = DB::table('accounts')
                    ->select('department')
                    ->where('id', $id)
                    ->value('department');

        return view('/pages/posts/index', ['items' => $items , 'userId' => $id , 'department' => $department]); // ビューの描画

    }

    public function show($id)
    {
        $post = DB::table('posts')
                ->select('title', 'message', 'image_path')
                ->where('id', $id)
                ->first();

        $title = $post->title;
        $message = $post->message;
        $imagepath = $post->image_path;

        return view('/pages/posts/show', ['title' => $title , 'message' => $message , 'imagepath' => $imagepath]);
    }

    public function create(Request $request){
        return view('/pages/posts/create');
    }

    public function store(Request $request){
        $id = $request->session()->get('userId');
        $title = $request->input('title');
        $message = $request->input('message');
        $path = $request->file('image_title')->store('public/');
        $read_img_path = str_replace('public/', 'storage', $path); //追加

        $post = new Post;
        $post->user_id = $id;
        $post->title = $title;
        $post->message = $message;
        $post->image_path = $read_img_path;
        $post->created_at = new Datetime();
        $post->save();

        // Post::insert(
        //     [
        //         'user_id' => $id,
        //         'title' => $title,
        //         'message' => $message
        //     ]);


        return redirect('/posts');
}

    public function destroy($id)
    {
        $items = Post::find($id)->delete();
        return redirect('/posts');
    }
}

