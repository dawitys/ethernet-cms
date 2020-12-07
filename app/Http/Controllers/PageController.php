<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\HeaderItem;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends ApiController
{
    protected $model = Page::class;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slugTaken = Page::where('slug', $request->body['slug'])->first();

        if (isset($slugTaken)) return [
            'success'   => false,
            'errors'    => ["Slug already taken"]
        ];

        $data = $request->body;
        $data['posts_order'] = json_encode($request->body['blocks']);
        $page = Page::create($data);
        $page->posts()->sync($request->body['blocks']);

        return [
            'success'   => true,
            'data'      => $page->load('posts')
        ];
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
        $page = Page::where('id', $id)->first();

        if (!isset($page) || !$page) {
            return [
                'success'   => false,
                'errors'    => ['Page not found']
            ];
        }

        $data = $request->body;
        $data['posts_order'] = json_encode($request->body['blocks']);
        $page->update($data);
        $page->posts()->sync($request->body['blocks']);


        return [
            'success'   => true,
            'data'      => $page->load('posts')
        ];
    }

    /**
     * Find page by slug.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        $page = Page::where('slug', $request->slug)->first();
        $header_items = HeaderItem::orderBy('order')->get();
        $footer = Footer::where('id', 1)->first();;


        if (!isset($page) || !$page) {
            return [
                'success'   => false,
                'errors'    => [],
                'data'      => [
                    'header_items'  => $header_items,
                    'footer'        => $footer,
                ]
            ];
        }

        $posts = [];

        /**
         * Refactor later
         */
        foreach (json_decode($page->posts_order) as $post_id) {
            foreach ($page->posts as $post) {
                if ($post->id == $post_id) {
                    $post['data'] = json_decode($post['data']);
                    $posts[] =  $post;
                    break;
                }
            }
        }

        $page = $page->toArray();

        $page['blocks'] = $posts;


        return [
            'success'   => true,
            'data'      => [
                'page'          => $page,
                'header_items'  => $header_items,
                'footer'        => $footer,
            ]
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::where('id', $id)->first();
        if (!isset($page) ||  !$page) {
            return [
                'success'   => false,
                'errors'    => ['Not found']
            ];
        }

        $posts = [];

        /**
         * Refactor later
         */
        foreach (json_decode($page->posts_order) as $post_id) {
            foreach ($page->posts as $post) {
                if ($post->id == $post_id) {
                    $posts[] =  $post;
                    break;
                }
            }
        }

        $response_data = $page->toArray();

        $response_data['blocks'] = $posts;

        return [
            'success'   => true,
            'data'      => $response_data
        ];
    }
}
