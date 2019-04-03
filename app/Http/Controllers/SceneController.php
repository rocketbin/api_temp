<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Scene;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\HP\Js as JSScene;

class SceneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Scene::get();
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
        Scene::validate($request);
        return Scene::create([
            'user_id'   => Auth::user()->id,
            'name'      => $request->name,
            'init'      => $request->init,
            'path'      => $request->path,
            'data'      => $request->data,
            'reftype'   => 'raw'
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scene  $scene
     * @return \Illuminate\Http\Response
     */
    public function show(Scene $scene)
    {
        return $scene->load('user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scene  $scene
     * @return \Illuminate\Http\Response
     */
    public function edit(Scene $scene)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scene  $scene
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scene $scene)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scene  $scene
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scene $scene)
    {
        //
    }

    /**
     * Approve the scene and push to [hp instance]
     *
     * @param  \App\Models\Scene  $scene
     * @return \Illuminate\Http\Response
     */
    public function approve(Scene $scene)
    {
        $js = JSScene::create([
            'timestamp' => date("Y-m-d H:i:s"),
            'filename' => $scene->name,
            'reftype' => $scene->reftype,
            'data' => $scene->data,
        ]);

        $scene->update(['status' => 1, 'hp_id' => $js->js_id]);
        return Scene::find($scene->id)->load('user');
    }

    /**
     * Approve the scene and push to [hp instance]
     *
     * @param  \App\Models\Scene  $scene
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Scene $scene)
    {
        $scene->update(['status' => 2]);
        $scene->JSScene()->delete();
        return Scene::find($scene->id)->load('user');
    }
}
