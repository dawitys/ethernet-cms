<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    public function show() {
        $footer = Footer::where('id', 1)->first();

        return [
            'success' => true,
            'data'    => $footer
        ];
    }

    public function update(Request $request)
    {
        $footer = Footer::where('id', 1)->first();
        $footer->update($request->body);

        return [
            'success' => true
        ];
    }
}
