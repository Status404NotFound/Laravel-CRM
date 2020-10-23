<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PostController extends Controller
{
    public function index(){
        return PostResource::collection(Post::all());
    }

    public function getPostsByCategory($category_id){
        return PostResource::collection(Post::where('category_id', $category_id)->get());
    }

    public function show($id){
        $redis = Redis::connection();

        $post = Post::find($id);
        $views=$redis->incr('article'.$id.'view');
        return view('post', compact('post', 'views'));
    }
}
