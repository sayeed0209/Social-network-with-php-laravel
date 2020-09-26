<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Friend;

class FriendController extends Controller
{
    public function index()
    {
        $userInstance = new UserController();
        $showFriends = Friend::where('user_id', Auth::user()->id)->get();
        $friends = [];
        foreach ($showFriends as $friend) {
            $frindInfo = $userInstance->getUserById($friend->friend_id);
            array_push($friends, $frindInfo);
        }
        return view('layouts.friends')->with('showFriends', $friends);
    }
    public function addFriend($user_id)
    {
        $friend = new Friend();
        $friend->user_id = Auth::user()->id;
        $friend->friend_id = $user_id;
        $friend->save();
        return redirect('/home');
    }
    public function getFriendsID()
    {
        $friends = Friend::where('user_id', Auth::user()->id)->get();
        $friendsId = [];
        foreach ($friends as $friend) {
            array_push($friendsId, $friend->friend_id);
        }

        return $friendsId;
    }
    
}
