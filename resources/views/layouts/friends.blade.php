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
    @foreach ($showFriends as $friend)
        <div><a href="profile/{{$friend->name}}"><img src="{{asset('image/'. $friend->profile_photo_path)}}" alt=""></a></div>
        <div>{{$friend->name}}</div>
        <div>{{$friend->bio}}</div>
        
        
    @endforeach
    
</body>
</html>