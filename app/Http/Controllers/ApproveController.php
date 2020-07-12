<?php

namespace App\Http\Controllers;
use Log;
use Illuminate\Http\Request;
use App\models\Post;
use DB;

class ApproveController extends Controller
{
    public function update(Request $request){
        $id = $request->input('approval');
        $isReleased = DB::table('posts')
                    ->where('id', $id)
                    ->first()->is_released;

        $newIsReleased = $isReleased === 0? 1: 0;
        DB::table('posts')
            ->where('id', $id)
            ->update(['is_released' => $newIsReleased]);

        return redirect('/posts');
    }
}
