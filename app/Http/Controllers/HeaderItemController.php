<?php

namespace App\Http\Controllers;

use App\Models\HeaderItem;
use Illuminate\Http\Request;

class HeaderItemController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = HeaderItem::orderBy('order')->get();

        return [
            'success'   => true,
            'data'      => [
                'items' => $items
            ]
        ];
    }

    /**
     * Sync resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sync(Request $request)
    {
        HeaderItem::truncate();

        $items = $request->body['items'];

        foreach ($items as $key => $item) {
            $data = $item;
            $data['order'] = $key + 1;
            HeaderItem::create($data);
        }

        return [
            'success'   => true,
            'data'      => []
        ];
    }
}
