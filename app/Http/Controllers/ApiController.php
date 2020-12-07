<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // add ?page=n to get the page you want
        // $per_page = (int)$request->per_page;
        $per_page = 99999;
        $results = $this->model::paginate($per_page);


        return [
            'success'   => true,
            'data'      => [
                'results' => $results->items(),
                'pages_count'   => $results->total()
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
        $result = $this->model::where('id', $id)->first();
        if(!isset($result) ||  !$result) {
            return [
                'success'   => false,
                'errors'    => ['Not found']
            ];
        }

        if($result->data) {
            $result->data = json_decode($result->data);
        }

        return [
            'success'   => true,
            'data'      => $result
        ];
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = $this->model::where('id', $id)->first();

        if(!isset($item) || !$item) {
            return [
                'success'   => false,
                'errors'    => ['Not found']
            ];
        }

        if(!$item->delete()) {
            return [
                'success'   => false,
                'errors'    => ['Server error']
            ];
        }

        return [
            'success'   => true,
            'data'      => []
        ];
    }
}
