<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Facebook</title>
</head>

<body class="body-main">
    @include('layouts.header')
    <div class="container-home">
        <div class="container-home-left">
            <div class="container-left">
                    <input type="text" placeholder="Seach..." name="name" id="search">
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
                        <img src="{{$postOwners[$key]->profile_photo_path}}" alt="">
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
                    <div class="likes">
                        <a href=""><i  data-id="" class="fas fa-thumbs-up"></i></a>
                        <a href=""><i data-id="" class="fas fa-thumbs-down"></i></a>
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
                    console.log(res)
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
                        image_td.innerHTML = '<img src="' + user.profile_photo_path + '" alt="" width="50px" style="border-radius:50%";> ';

                        tr.appendChild(image_td)
                        tr.appendChild(td)
                        tr.appendChild(td1)
                        document.getElementById('users').appendChild(tr)
                    })
                })
                // search
                document.getElementById('search').addEventListener('keydown',function(){
                    if(event.target.value[0]=='@'){
                          var inputValue = event.target.value.substring( 1,event.target.value.length);
                          console.log(inputValue)
                          axios.post('search_user',{
                              'data':inputValue
                          },
                          {headers:{'X-CSRF-TOKEN': "{{csrf_token()}}"}
                            } 
                          ).then(function(res){
                              console.log(res.data)
                          })}
                })



            }
        </script>
</body>

</html>