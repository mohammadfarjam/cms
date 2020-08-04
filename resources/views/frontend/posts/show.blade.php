@extends('frontend.layout.master')

@include('partials.navigation',['categories'=>$categories])
@include('partials.sidebar',['categories'=>$categories])
@section('nav_menu')
@endsection
@section('content')
    @include('partials.form_error')
    @if(Session::has('add_comment'))

        <div class="alert alert-success col-md-7 col-md-5 col-md-3 mt-lg-5 mt-md-5 mt-sm-5 pull-right" style="margin-top: 350px;">
            <P>{{Session('add_comment')}}</P>
        </div>
    @endif
    <div class="col-lg-11 col-md-8 col-md-4 mt-md-5">
        <h4 class="mt-md-5 text-right">آخرین مطالب</h4>
        <!-- Title -->
        <h1 class="mt-4 text-right" style="font-size: 20pt;">{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead" style="font-size: 12pt;">
            ایجاد شده توسط
            <a href="#" class="text-right" style="font-size: 12pt;">{{$post->user->name}}</a>
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
        <p class="lead" style="text-align: justify;font-size: 12pt;">{{$post->description}}</p>

        <hr>

    </div>

    <!-- Comments Form -->
    <div class="card my-4 col-md-10 mr-3">
        <h5 class="card-header mr-n3 w-124 "> متن نظر:</h5>
        <div class="card-body">

            {!! Form::open(['method'=>'POST','route'=>['Frontend.comments.store',$post->id]]) !!}
            <div class="form-group">
                {!! Form::textarea('description',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('ثبت',['class'=>'btn btn-success col-lg-3 pull-left']) !!}
            </div>


            {!! Form::close() !!}


        </div>

    </div>

    <!-- Single Comment -->
    @foreach($post->comments as $comment)

        <div class="media mb-4 col-md-11">
            <img class="d-flex mr-2 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
                <h5 class="mt-0">مهمان</h5>
                {{$comment->description}}
            </div>
        </div>

    @endforeach






@endsection
