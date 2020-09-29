<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use finfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('layouts.profile')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showpost(Request $request)
    {
        $posts = Post::where('body', 'like', '%' . $request->Searchvalue . '%')->get();
        return $posts;
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = new Post();
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;
        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image'), $imageName);
            $post->image = $imageName;
        }
        $post->save();
        Session::flash('success', 'post was successfully added');
        return redirect('/home');
    }

    // funcion todos los post de nuestros amigos y los nuestros.
    public function getAllowedPosts()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        $usersInstance = new UserController();
        $friendsInstance = new FriendController();
        $ids = $friendsInstance->getFriendsID();
        array_push($ids, Auth::user()->id);
        $users = $usersInstance->getUsersById($ids);

        array_unshift($ids, 0);
        $allowedPosts = [];
        $postOwners = [];
        $i = [];
        foreach ($posts as $post) {
            if (array_search($post->user_id, $ids) != null) {
                foreach ($users as $user) {
                    array_push($i, $user->id);
                    if ($user->id == $post->user_id) {

                        // $user->profile_photo_path = asset('image/' . $user->profile_photo_path);
                        array_push($postOwners, $user);
                    }
                }
                $post->image = asset('image/' . $post->image);
                array_push($allowedPosts, $post);
            }
        }
        return view('layouts.home', ['allowedPosts' => $allowedPosts, 'postOwners' => $postOwners]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getPostById($id)
    {
        $post = Post::find($id);
        return $post;
    }

    public function getById($id)
    {
        $user = User::where('id', $id)->get()->first();
        $userposts = Post::where('user_id', $user->id)->get();
        return view('layouts.postSearch')->withPosts($userposts)->with('user', $user);
    }

    public function getByUsername($username)
    {
        $user = User::where('name', $username)->get()->first();
        $userposts = Post::where('user_id', $user->id)->get();
        return view('layouts.profile')->withPosts($userposts)->with('user', $user);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('layouts.postUpdate', compact('post'));
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
        $post = Post::find($request->id);
        $post->body = $request->body;
        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image'), $imageName);
            $post->image = $imageName;
        }
        $post->save();
        return redirect('/profile');
    }
    public function search_post(Request $request)
    {
        $data = Post::where('bio', 'like', '%' . $request->data . '%')->get();

        return json_encode($data);
        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id', $id)->delete();

        return  redirect()->back();
    }
}
