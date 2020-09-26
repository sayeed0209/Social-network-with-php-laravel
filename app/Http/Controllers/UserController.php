<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Mockery\Undefined;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.profileUpdate');
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
    public function getUserById($id)
    {
        return User::find($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_notYetFriends()
    {
        // all friends id
        $friends = (new FriendController)->getFriendsID();
        array_unshift($friends, 0);
        // all users
        $allUser = User::all();
        $users = [];

        foreach ($allUser as $user) {
            if (Auth::user()->id != $user->id) {
                if (array_search($user->id, $friends) == null) {
                    $user->profile_photo_path = asset('image/' . $user->profile_photo_path);
                    array_push($users, $user);
                }
            }
        }
        return json_encode($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $post = Auth::user();
        return view('layouts.profileUpdate', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $post = User::find(Auth::user()->id);
        $post->bio = $request->bio;

        if (isset($request->profile_photo_path)) {
            $imageName = time() . '.' . $request->profile_photo_path->extension();
            $request->profile_photo_path->move(public_path('image'), $imageName);
            $post->profile_photo_path = $imageName;
        }

        $post->save();
        return view('layouts.profileUpdate', compact('post'));
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

    public function search_user(Request $request)
    {
        $data = User::where('name', 'like', '%' . $request->data . '%')->get();

        return json_encode($data);
        // return $request;
    }
}
