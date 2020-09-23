@extends('layouts.app')
@section('content')
<div class="container flex justify-center mt-3">
    <form action="" method="POST">
        @csrf
        <textarea name="body"></textarea>
        <button type="submit">Add-Post</button>

    </form>
       
</div>


@foreach ($posts as $post)
<div>
   {{$post->body}}
</div>
@endforeach




    
@endsection