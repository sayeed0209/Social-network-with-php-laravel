<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $likes = like::all()->where('user_id', '=', Auth::user()->id)->where('post_id', '=', $request->post_id)->first();
        if ($likes == null) {
            $createLike = new Like();
            $createLike->user_id = Auth::user()->id;
            $createLike->post_id = $request->post_id;
            $createLike->type = $request->isLike;
            $createLike->save();
        } else {
            $likes->type = $request->isLike;
            $likes->save();
        }

        return [
            'like' => $request->isLike,
            'post_id' => $request->post_id
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $createLike = new Like();
        // $createLike->user_id = Auth::user()->id;
        // $createLike->post_id = $request->post_id;
        // $createLike->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $createDislike = new Like();
        // $createDislike->user_id = Auth::user()->id;
        // $createDislike->post_id = $request->post_id;
        // $createDislike->type = false;
        // $createDislike->save();
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
    public function update(Request $request, $id)
    {
        //
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
}
