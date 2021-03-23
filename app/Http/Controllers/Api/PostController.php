<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;
use App\Http\Requests\StorePostRequest;





class PostController extends Controller
{
    public function index ()
    {
     $posts= Post::all();
     return PostResource::collection($posts);

    }
    public function show (Post $post)
    {
     
     return new PostResource($post);

    }

    public function store  (StorePostRequest $request)
    {
     $post=Post::create($request->all());
     return new PostResource($post);

    }

    




}
