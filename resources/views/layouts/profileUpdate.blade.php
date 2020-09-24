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
    <form action="">
        <div class="container-left-user">
        
        <div class="img-profile">
        <input type="file" name="image" id="">
        <img src="https://dureeandcompany.com/wp-content/uploads/2018/09/BLOG-1-Kim-Kardashian.jpg" alt="">
        </div>
        <div class="user-profile">
            <div class="user-name">Kim Kardashian</div>
            
            <div class="bio-profile"><input type="text" placeholder="When there's so many haters and negative things, I really don't care."></div>
            <div class="update-profile-submit"><input type="submit" value="Edit"></div>
            </form>
        </div>
        </div>
        </div>
        <div class="container-right-profile">
        
    </div>
</div>
</body>
</html>