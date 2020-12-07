<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends ApiController
{
    protected $model = Post::class;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO image uploader and validation
        $post = Post::create($request->body);
        return  response([
            'success'   => true,
            'data'      => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();
        if (!isset($post) || !$post) {
            return response([
                'success'   => false,
                'errors'    => ['post not found']
            ], 404);
        }

        $post->update($request->body);
        return  response([
            'success'   => true,
            'data'      => $post
        ]);
    }
}

