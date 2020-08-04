<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\Post;
use Validator;
use Datetime;
use DB;
use Illuminate\Support\Facades\Mail;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->session()->get('userId');

        // ログインユーザーがID6なら公開済み記事のみ取得
        // ID1なら未公開含め全投稿記事を取得
        // ID2～5なら公開済の全件記事及び未公開の自部署投稿記事を取得
        if ($id === 6){
            $items = DB::table('posts')
            ->select('posts.id', 'title', 'message', 'created_at', 'department', 'is_released')
            ->join('accounts', 'posts.user_id', '=', 'accounts.id')
            ->where('is_released', true)
            ->get();

            $department = DB::table('accounts')
            ->select('department')
            ->where('id', $id)
            ->value('department');

        } elseif($id === 1) {
            $items = DB::table('posts')
            ->select('posts.id', 'title', 'message', 'created_at', 'department', 'is_released')
            ->join('accounts', 'posts.user_id', '=', 'accounts.id')
            ->get();

             $department = DB::table('accounts')
            ->select('department')
            ->where('id', $id)
            ->value('department');
        } else {
            $items = DB::table('posts')
            ->select('posts.id', 'title', 'message', 'created_at', 'department', 'is_released')
            ->join('accounts', 'posts.user_id', '=', 'accounts.id')
            ->where('user_id', $id)
            ->orWhere('is_released', true)
            ->get();

             $department = DB::table('accounts')
            ->select('department')
            ->where('id', $id)
            ->value('department');
        }

        return view('/pages/posts/index', ['items' => $items , 'userId' => $id , 'department' => $department ]);
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
    if (is_null($request->file('image_title'))) {
        $read_img_path = null;
    } else {
        $path = $request->file('image_title')->store('public/');
        $read_img_path = str_replace('public/', 'storage', $path);
    }

    $post = new Post;
    $post->user_id = $id;
    $post->title = $title;
    $post->message = $message;
    $post->image_path = $read_img_path;
    $post->created_at = new Datetime();
    $post->save();

    return redirect('/posts');
}

    public function destroy($id)
    {
        $items = Post::find($id)->delete();
        return redirect('/posts');
    }
}

