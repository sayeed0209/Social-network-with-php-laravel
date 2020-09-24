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
            <div class="bio-profile">When there's so many haters and negative things, I really don't care.</div>
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
                <div class="img-post">
                    <img src="https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fstatic.onecms.io%2Fwp-content%2Fuploads%2Fsites%2F20%2F2017%2F09%2Fkuwtk-5.jpg" alt="" value="{{asset('image/'. $post->image)}}">
                </div>
                <form action="" method="POST">
                <div class="like-post">
                <div class="content-post">
                <input type="text" name="" id="" placeholder="Sayeed estoy haciendo pruebas jejejejejejej!!! :)">
                </div>
                <div class="likes">
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