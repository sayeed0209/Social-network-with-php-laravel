<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="{{asset('js/app.js')}}"></script>

    <title>Facebook</title>
</head>
<body class="body-main">
    @include('layouts.header')
    <div class="container">
    <div class="container-left-profile">
        <div class="container-left-user">
        <div class="img-profile">
        <img src="{{asset('image/'. Auth::user()->profile_photo_path)}}" alt="">
        </div>
        <div class="user-profile">
            <div class="user-name">{{Auth::user()->name}} <a href="{{ url('/updateProfile')}}"><i class="fas fa-pen"></i></a></div>
            <div class="bio-profile">{{Auth::user()->bio}}</div>
            <!-- <div class="update-profile-icon"><i class="fas fa-pen"></i></div> -->
        </div>
        </div>
        </div>
        <div class="container-right-profile">
        @foreach ($posts as $post)

        <div class="container-post">
                <div class="user-post">
                    <div class="header-user">
                <img src="{{asset('image/'. Auth::user()->profile_photo_path)}}" alt="">
                    <p>{{Auth::user()->name}}</p>
                    </div>
                    <div class="icons-post">
                <a href="{{url('/postUpdate/'.$post->id) }}"><i class="fas fa-pen"></i></a>    
               <a href="{{url('/delete/'.$post->id) }}"><i class="fas fa-times"></i></a> 
                </div>
                </div>
                <div class="img-post">
                    <img src="{{asset('image/'. $post->image)}}" alt="">
                </div>
                <div class="like-post">
                <div class="content-post">
                {{$post->body}}
                    <!-- Sayeed estoy haciendo pruebas jejejejejejej!!! :) -->
                </div>
                <div class="likes">
                    <i data-id="{{$post->id}}" class="fas fa-thumbs-up"></i>
                    <i data-id="{{$post->id}}" class="fas fa-thumbs-down"></i>
                </div>
                </div>
                <!-- <div class="comment">
                    <div class="comment-title">Comments</div>
                    <div class="comment-add"><a href=""><i class="fas fa-plus-circle"></i></a></div>
                </div> -->
                <div class="comment-user">
                    <div class="comment-profile"><img src="https://www.ecured.cu/images/d/d4/CapitanGarfio.jpg" alt=""></div>
                    <div class="container-user-post">
                    <div class="comment-username">sayeedabu</div>
                    <div class="comment-post">vale kim no te preoucpes!</div>
                    </div>
                </div>
                <div class="comment-insert">
                    <form action="">
                        <textarea name="" cols="30" rows="10"></textarea>
                        <input type="submit" value="Comment">
                    </form>
                </div>
                
            </div>
            @endforeach
        </div>
        
    </div>


<script>
   
    window.onload = function(){
        document.querySelectorAll('.fa-thumbs-up').forEach(function(like){
            like.onclick=(function(){
        var currentTarget = event.currentTarget
        var post_id=currentTarget.getAttribute('data-id')
        currentTarget.style.color='blue';
        axios.post('{{url("create_like")}}',
        {'post_id':post_id},
        {
            headers:{
                'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }).then(function(res){
        //    console.log(res)
        })
      })
    })
    
    document.querySelectorAll('.fa-thumbs-down').forEach(function(like){
            like.onclick=(function(){
        var currentTarget = event.currentTarget
        currentTarget.style.color='red';
        var post_id=currentTarget.getAttribute('data-id')
        axios.post('{{url("create_dislike")}}',
        {'post_id':post_id},
        {
            headers:{
                'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }).then(function(res){
        //    console.log(res)
        })
      })
    })
    }
   
</script>


</body>
</html>