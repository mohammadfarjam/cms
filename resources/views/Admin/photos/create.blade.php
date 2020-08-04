@extends('Admin.layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/dropzone.css')}}">
@endsection
@section('scripts')
    <script src="{{asset('js/dropzone.js')}}"></script>
@endsection
@section('content')
    <div class="bg-white col-12">
        <h3 class="p-lg-4 col-12">آپلود فایل جدید</h3>
        <div class="col-md-9 offset-1">


            @include('partials.form_error')

            {!! Form::open(['method'=>'POST','action' => 'Admin\AdminPhotoController@store','class'=>'dropzone']) !!}


        </div>{{--col-md-9--}}
<span class="mt-lg-5 d-block"></span>

    </div>{{--bg-white col-12--}}

@endsection
