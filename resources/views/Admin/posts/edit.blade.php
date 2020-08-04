@extends('Admin.layouts.master')

@section('content')
    <div class="bg-white col-12">
        <h3 class="p-lg-4 col-12">ویرایش مطلب</h3>
        <div class="row">
            <div class="col-md-3">
                <img src="{{$post->photo ? $post->photo->path :"http://placehold.it/200"}}" class="img-fluid m-lg-5"
                     width="120" height="90">
            </div>
            <div class="col-md-8">

                @include('partials.form_error')

                {!! Form::model($post,['method'=>'PATCH','action' => ['Admin\AdminPostController@update',$post->id],'files'=>true,]) !!}

                <div class="form-group">
                    {!!  Form::label('title','عنوان:') !!}
                    {!! Form::text('title',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!!  Form::label('slug','نام مستعار:') !!}
                    {!! Form::text('slug',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!!  Form::label('category','دسته بندی:') !!}
                    {!! Form::select('category',$categories,$post->category->id,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!!  Form::label('description',' توضیحات:') !!}
                    {!! Form::textarea('description',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!!  Form::label('meta_description','متای توضیحات:') !!}
                    {!! Form::textarea('meta_description',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!!  Form::label('meta_keywords','متای برچسب ها:') !!}
                    {!! Form::textarea('meta_keywords',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!!  Form::label('status','وضعیت :') !!}
                    {!! Form::select('status',[0=>'غیر فعال',1=>'فعال'],$post->status,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!!  Form::label('first_photo','تصویر اصلی :') !!}
                    {!! Form::file('first_photo',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('بروزرسانی',['class'=>'btn btn-success col-lg-3 pull-right']) !!}
                </div>
                {!! Form::close() !!}

                {!! Form::open(['method'=>'DELETE','action'=>['Admin\AdminPostController@destroy',$post->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('حذف',['class'=>'btn btn-danger mb-lg-5 pull-left']) !!}
                </div>
                {!! Form::close() !!}
            </div>{{--col-md-6--}}
        </div>{{--row--}}



    </div>{{--bg-white col-12--}}

@endsection
