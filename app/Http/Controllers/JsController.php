<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\HP\JS;

class JsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return JS::create([
            'filename' => $request->filename,
            'reftype' => $request->reftype,
            'data' => $request->data,
            'raw' => $request->raw,
            'config' => json_decode(json_encode($request->config)),
            'timestamp' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JS $js, Request $request)
    {
        $js->update([
            'data' => $request->data,
            'config' => json_decode(json_encode($request->config))
        ]);
        return $js;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Reads and set back the file contents
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function readFile(Request $request)
    {
        return [
            'name' => $request->file->getClientOriginalName(),
            'data' => file_get_contents($request->file),
        ];
    }
}
