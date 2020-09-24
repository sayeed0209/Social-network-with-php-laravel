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
            <div class="user-name">Kim Kardashian</div>
            <div class="bio-profile">{{Auth::user()->bio}}</div>
            <!-- <div class="update-profile-icon"><i class="fas fa-pen"></i></div> -->
        </div>
        </div>
        </div>
        <div class="container-right-profile">
        <div class="container-post">
                <div class="user-post">
                    <div class="header-user">
                <img src="https://dureeandcompany.com/wp-content/uploads/2018/09/BLOG-1-Kim-Kardashian.jpg" alt="">
                    <p>kimkardashian</p>
                    </div>
                    <div class="icons-post">
                </div>
                </div>
                <form action="" method="POST">
                <div class="img-post">
                    <img src="{{asset('image/'. $post->image)}}" alt="">
                </div>
                
                <div class="post-container-update">
                <div class="content-post">
                <input type="text" name="body" id="" value="{{$post->body}}" placeholder="Sayeed estoy haciendo pruebas jejejejejejej!!! :)">
                </div>
                <div class="update-post-buttons">
                    <i class="fas fa-upload"></i>
                    <input type="file" name="" id="">

                    <input type="submit" value="Edit Post">
                    <!-- <a href=""><i class="fas fa-thumbs-up"></i></a>
                    <a href=""><i class="fas fa-thumbs-down"></i></a> -->
                </div>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>