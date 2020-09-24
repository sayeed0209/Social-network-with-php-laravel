@extends('layouts.app')
@section('content')
<div class="container flex justify-center mt-3">
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <textarea name="body"></textarea>
        <input type="file" name="image" id="">
        <button type="submit">Add-Post</button>


    </form>
       
</div>


@foreach ($posts as $post)
<div>
   {{$post->body}}
   <img src="{{asset('image/'. $post->image)}}" alt="">
</div>
@endforeach




    
@endsection