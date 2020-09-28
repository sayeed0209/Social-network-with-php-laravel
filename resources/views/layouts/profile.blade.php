<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <title>Facebook</title>
    <style>
        .active{
            text-decoration: underline;
            color: blue;
        }
    </style>
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
                <div class="likes"  data-postid="{{$post->id}}">
                    @if (Auth::check())
                    @php
                     $i = Auth::user()->likes()->count();
                    echo $post->likes()->count();
                    $c=1;
                    @endphp
                    @foreach ($post->likes as $like)
                    @if ($like->post_id == $post->id)
                    @if ($like->type)
                        <i class="fas fa-thumbs-up likes-up active">Like</i>
                        <i class="fas fa-thumbs-down likes-up">Dislike</i>
                        @else
                        <i class="fas fa-thumbs-up likes-up">Like</i>
                        <i class="fas fa-thumbs-down likes-up active">Dislike</i>
                    @endif   
                    @break
                 @elseif($i == $c)
                 <i class="fas fa-thumbs-up likes-up">Like</i>
                 <i class="fas fa-thumbs-down likes-up">Dislike</i>
                    @endif
                        @php
                          $c++; 
                          
                        @endphp
                        
                    @endforeach
                        
                    @endif
                   
                     {{-- <i data-id="{{$post->id}}" class="fas fa-thumbs-up likes-up">Like</i>
                     <i data-id="{{$post->id}}" class="fas fa-thumbs-down likes-up">Dislike</i> --}}
        
                </div>
             </div>
                <!-- <div class="comment">
                    <div class="comment-title">Comments</div>
                    <div class="comment-add"><a href=""><i class="fas fa-plus-circle"></i></a></div>
                </div> -->
                <div class="comment-user">
                    @foreach ($post->comments as $comment)
                        
                    
                    <div class="comment-profile"><img src="{{asset('image/'. Auth::user()->profile_photo_path)}}" alt=""></div>
                    <div class="container-user-post">
                    <div class="comment-username">{{Auth::user()->name}}</div>
                    <div class="comment-post">{{$comment->comment}}</div>
                    </div>
                    @endforeach
                </div>
                @if (Auth::check())
                    <div class="comment-insert">
                    <form action="{{url('/comment')}}" method="POST">
                        @csrf
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                        <textarea name="comment" cols="30" rows="10"></textarea>
                        <input type="submit" value="Comment">
                    </form>
                </div>
            </div>
            @if (count($errors) > 0)
            @foreach ($errors as $error)
                {{$error}}
            @endforeach
                
            @endif
            @if (Session::has('success'))
           {{Session::get('success')}}
                
            @endif
                @endif
                
            @endforeach
        </div>
        
    </div>


<script>
    
    // window.onload = function(){
    //     document.querySelectorAll('.fa-thumbs-up').forEach(function(like){
    //         like.onclick=(function(){
    //     var currentTarget = event.currentTarget
    //     var post_id=currentTarget.getAttribute('data-id')
    //     currentTarget.style.color='blue';
    //     axios.post('{{url("create_like")}}',
    //     {'post_id':post_id},
    //     {
    //         headers:{
    //             'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    //         }
    //     }).then(function(res){
    //        console.log(res)
    //     })
    //   })
    // })
    
    // document.querySelectorAll('.fa-thumbs-down').forEach(function(like){
    //         like.onclick=(function(){
    //     var currentTarget = event.currentTarget
    //     currentTarget.style.color='red';
    //     var post_id=currentTarget.getAttribute('data-id')
    //     axios.post('{{url("create_dislike")}}',
    //     {'post_id':post_id},
    //     {
    //         headers:{
    //             'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    //         }
    //     }).then(function(res){
    //     //    console.log(res)
    //     })
    //   })
    // })
    
    // }
    $(document).ready(function(){
        $('.likes-up').click(function(e){
            var like = e.target.previousElementSibling==null;
            var postid=e.target.parentNode.dataset['postid']
            console.log(postid)
            var data = {
                isLike:like,
                post_id:postid
            }
            axios.post('/like',data,{headers:{ 'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content')}}).then(res=>{
                $("i[data-postid='"+res['data']['post_id'] + "']  > .active-likes-up").attr('class','fas fa-thumbs-up likes-up')
                     e.currentTarget.className='fas fa-thumbs-up likes-up active'
               
                console.log(e)
            })
        })
    })
   
</script>


</body>
</html>