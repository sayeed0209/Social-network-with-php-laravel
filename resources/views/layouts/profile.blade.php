<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <title>Facebook</title>
</head>
<body class="body-main">
    @include('layouts.header')
    <div class="container">
    <div class="container-left-profile">
        <div class="container-left-user">
        <div class="img-profile">
        <img src="https://dureeandcompany.com/wp-content/uploads/2018/09/BLOG-1-Kim-Kardashian.jpg" alt="">
        </div>
        <div class="user-profile">
            <div class="user-name">Kim Kardashian <a href="{{ url('/updateProfile')}}"><i class="fas fa-pen"></i></a></div>
            <div class="bio-profile">When there's so many haters and negative things, I really don't care.</div>
            <!-- <div class="update-profile-icon"><i class="fas fa-pen"></i></div> -->
        </div>
        </div>
        </div>
        <div class="container-right-profile">
        @foreach ($posts as $post)

        <div class="container-post">
                <div class="user-post">
                    <div class="header-user">
                <img src="https://dureeandcompany.com/wp-content/uploads/2018/09/BLOG-1-Kim-Kardashian.jpg" alt="">
                    <p>kimkardashian</p>
                    </div>
                    <div class="icons-post">
                <i class="fas fa-pen"></i>
                <i class="fas fa-times"></i>
                </div>
                </div>
                <div class="img-post">
                    <img src="https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fstatic.onecms.io%2Fwp-content%2Fuploads%2Fsites%2F20%2F2017%2F09%2Fkuwtk-5.jpg" alt="">
                </div>
                <div class="like-post">
                <div class="content-post">
                {{$post->body}}
                    <!-- Sayeed estoy haciendo pruebas jejejejejejej!!! :) -->
                </div>
                <div class="likes">
                    <a href=""><i class="fas fa-thumbs-up"></i></a>
                    <a href=""><i class="fas fa-thumbs-down"></i></a>
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
        
    </div>
</body>
</html>