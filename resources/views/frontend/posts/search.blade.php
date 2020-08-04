@extends('frontend.layout.master')
@include('partials.navigation',['categories'=>$categories])
@include('partials.sidebar',['categories'=>$categories])
@section('nav_menu')
@endsection
@section('content')
    <div class="col-lg-11 mt-md-5">
        <h4 class="mt-md-5 text-right">نتیجه جستجو برای :{{$query}}</h4>
        <!-- Title -->
        @foreach($posts as $post)
        <h1 class="mt-4 text-right">{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            ایجاد شده توسط
            <a href="#" class="text-right">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p class="text-right">منتشر شده
            در {{\Hekmatinasser\Verta\Facades\Verta::instance($post->created_at)->formatdifference(Hekmatinasser\Verta\Verta::today('Asia/Tehran')) }}</p>
        <hr>

        <!-- Preview Image -->
        <img src="{{$post->photo ? $post->photo->path :"http://placehold.it/900x300"}}" class="img-fluid rounded">
        <hr>

        <!-- Post Content -->
            <p class="lead">{{Str::limit($post->description,100)}}</p>

            <div class="col-md-12">
                <a class="btn btn-primary pull-left" href="{{route('Frontend.posts.show',$post->slug)}}">ادامه مطلب</a>
            </div>

            <br>
            <br>
        <hr>

    </div>
    
    @endforeach
@endsection
