
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
    <div class="container-home">
    <div class="container-home-left">
        <div class="container-left">
        <input type="text" placeholder="">

        <table class="table-friend">
        <tr class="header-table">
        </tr>
        <tr>
            <td>Khloe Kardashian</td>
        </tr>
        <tr>
            <td>Kris Kardashian</td>
        </tr>
        <tr>
            <td>Kourtney Kardashian</td>
        </tr>
        <tr>
            <td>Robert Kardashian</td>
        </tr>
        <tr>
            <td>Kendall Jenner</td>
        </tr>
        <tr>
            <td>Kylie Jenner</td>
        </tr>
        <tr>
            <td>Kanye West</td>
        </tr>
        <tr>
            <td>Khloe Kardashian</td>
        </tr>
        <tr>
            <td>Kris Kardashian</td>
        </tr>
        <tr>
            <td>Kourtney Kardashian</td>
        </tr>
        <tr>
            <td>Robert Kardashian</td>
        </tr>
        <tr>
            <td>Kendall Jenner</td>
        </tr>
        <tr>
            <td>Kylie Jenner</td>
        </tr>
        <tr>
            <td>Kanye West</td>
        </tr>
        <tr>
            <td>Khloe Kardashian</td>
        </tr>
        <tr>
            <td>Kris Kardashian</td>
        </tr>
        <tr>
            <td>Kourtney Kardashian</td>
        </tr>
        <tr>
            <td>Robert Kardashian</td>
        </tr>
        <tr>
            <td>Kendall Jenner</td>
        </tr>
        <tr>
            <td>Kylie Jenner</td>
        </tr>
        <tr>
            <td>Kanye West</td>
        </tr>
        </table>
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

        <div class="container-post">
                <div class="user-post">
                    <div class="header-user">
                <img src="{{asset('image/'. Auth::user()->profile_photo_path)}}" alt="">
                    <p>kimkardashian</p>
                    </div>
                    <div class="icons-post">
                </div>
                </div>
                <div class="img-post">
                    <img src="" alt="">
                </div>
                <div class="like-post">
                <div class="content-post">
                    Sayeed estoy haciendo pruebas jejejejejejej!!! :)
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
    </div>
</body>
</html>