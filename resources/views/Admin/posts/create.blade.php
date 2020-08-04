@extends('Admin.layouts.master')

@section('content')
    <div class="bg-white col-12">
        <h3 class="p-lg-4 col-12">ایجاد مطلب جدید</h3>
        <div class="col-md-10 offset-1">


            @include('partials.form_error')

            {!! Form::open(['method'=>'POST','action' => 'Admin\AdminPostController@store','files'=>true]) !!}

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
                {!! Form::select('category',$categories,null,['class'=>'form-control']) !!}
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
                {!! Form::select('status',[0=>'غیر فعال',1=>'فعال'],null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!!  Form::label('first_photo','تصویر اصلی :') !!}
                {!! Form::file('first_photo',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('ذخیره',['class'=>'btn btn-success']) !!}

            </div>


            {!! Form::close() !!}
        </div>{{--col-md-6--}}


    </div>{{--bg-white col-12--}}

@endsection
