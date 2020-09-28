<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <title>Facebook</title>
    <style>
        .active{
            text-decoration: underline;
            color: blue;
        }
        .active-red{
            text-decoration: underline;
            color: red;
        }
    </style>
</head>

<body class="body-main">
    @include('layouts.header')
    <div class="container-home">
        <div class="container-home-left">
            <div class="container-left">
                    <input type="text" placeholder="Seach..." name="name" id="search">
                    <div id="search-dropdown">
                    <a href="{{ url('profile/')}}" id="link-user"></a></div>
                <form action="add_friend" method="POST">
                    @csrf
                    <table class="table-friend" id="users">
                        <tr class="header-table">

                        </tr>

                    </table>

                </form>
            </div>
        </div>
        <div class="container-right">
            <div class="comment-wall">
                <form action="{{ url('home/' . Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container-text">
                        <div class="textarea-wall">
                            <textarea name="body" id=""></textarea>
                        </div>
                        <div class="img-wall">
                            <input class="file-input" type="file" name="image">
                            <i class="fas fa-upload"></i>
                        </div>
                    </div>
                    <div class="submit-wall">
                        <input type="submit" value="Add Post">
                    </div>
                </form>
                {{-- finish post --}}
            </div>
            
            @foreach($allowedPosts as $key=>$post)
            <div class="container-post">
                <div class="user-post">
                    <div class="header-user">
                    <a href="{{ url('/profile/' . $postOwners[$key]->name)}}"><img src="{{$postOwners[$key]->profile_photo_path}}" alt=""></a>
                        <p>{{$postOwners[$key]->name}}</p>
                    </div>
                    <div class="icons-post">
                    </div>
                </div>
                <div class="img-post">
                    <img src="{{$post->image}}" alt="">
                </div>
                <div class="like-post">
                    <div class="content-post">
                        {{$post->body}}
                    </div>
                    <div class="likes" data-postid="{{$post->id}}">
                        @php
                        //  $i = Auth::user()->likes()->count();
                        echo '<span>'.$post->likes()->count().'</span>' ;
                      $likes=$post->likes()->where('user_id','=', Auth::user()->id)->get();
                        // $c=1;
                        @endphp
                        {{-- @foreach ($post->likes as $like) --}}
                        @if (count($likes)>0)
    
                        @if ($likes[0]->type)
                            <i class="fas fa-thumbs-up likes-up active">Like</i>
                            <i class="fas fa-thumbs-down likes-up">Dislike</i>
                            @elseif(!$likes[0]->type)
                            <i class="fas fa-thumbs-up likes-up">Like</i>
                            <i class="fas fa-thumbs-down likes-up active-red">Dislike</i>
                     @endif  
                            @else
                            <i class="fas fa-thumbs-up likes-up">Like</i>
                            <i class="fas fa-thumbs-down likes-up ">Dislike</i>
                        @endif 
                       
                         
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
                        <textarea name="" id="" cols="30" rows="10"></textarea>
                        <input type="submit" value="Comment">

                    </form>
                </div>
            </div>
            @endforeach
        </div>
    
 
        <script>
            window.onload = function() {
                axios.post("{{url('showuser')}}", {}, {
                        headers: {
                            'X-CSRF-TOKEN': "{{csrf_token()}}"
                        }
                    }

                ).then(function(res) {
                    // console.log(res)
                    var users = res.data
                    users.forEach(function(user) {
                        var tr = document.createElement('tr')
                        var td = document.createElement('td')
                        var td1 = document.createElement('td')
                        var image_td = document.createElement('td')
                        var create_anchorTag = document.createElement('a')
                        create_anchorTag.setAttribute('href', 'add_friend/' + user.id)
                        td1.appendChild(create_anchorTag)
                        td.textContent = user.name;
                        create_anchorTag.innerHTML = 'Add Friend <i class="fas fa-user-plus"></i>';
                        td1.appendChild(create_anchorTag)
                        image_td.innerHTML = '<img src="' + user.profile_photo_path + '" alt="" width="50px" height="50px" style="border-radius:50%";> ';

                        tr.appendChild(image_td)
                        tr.appendChild(td)
                        tr.appendChild(td1)
                        document.getElementById('users').appendChild(tr)
                    })
                })
                // search user
                document.getElementById('search').addEventListener('change',function(){
                    if(event.target.value[0]=='@'){
                          var inputValue = event.target.value.substring( 1,event.target.value.length);
                          console.log(inputValue)
                          axios.post('search_user',{
                              'data':inputValue
                          },
                          {headers:{'X-CSRF-TOKEN': "{{csrf_token()}}"}} 
                          ).then(function(res){
                            // console.log(res.data)
                            $showUsers = res.data
                        
                            for(var i = 0; i<$showUsers.length; i++){
                                // console.log($showUsers[i].name)
                                // console.log($showUsers[i].profile_photo_path)
                                
                                $('#link-user').append($('<img />')
                        .attr('src', "" + $showUsers[i].profile_photo_path+ "" ))
                        $('#link-user').append($showUsers[i].name)
                            }
                          })}
                })
            }

            $(document).ready(function(){
        $('.likes-up').click(function(e){
            var like = e.target.nextElementSibling==null;
            var postid=e.target.parentNode.dataset['postid']
            console.log(postid)
            var data = {
                isLike:!like,
                post_id:postid
            }
            axios.post('/like',data,{headers:{'X-CSRF-TOKEN': "{{csrf_token()}}"}}).then(res=>{
                $("i[data-postid='"+res['data']['post_id'] + "']  > .active-likes-up").attr('class','fas fa-thumbs-up likes-up')
                    if(e.currentTarget.className == 'fas fa-thumbs-up likes-up'){
                        e.currentTarget.className='fas fa-thumbs-up likes-up active'
                        e.currentTarget.parentElement.children[2].className ='fas fa-thumbs-down likes-up';


                    }else{
                        e.currentTarget.parentElement.children[1].className ='fas fa-thumbs-up likes-up';
                        e.currentTarget.className='fas fa-thumbs-down likes-up active-red'
                    }
                    // count
                     e.currentTarget.parentElement.children[0].textContent = res['data']['likes']
                    // console.log(res['data']['likes'])
                // console.log(e)
            })
        })
    })
        </script>
</body>

</html>