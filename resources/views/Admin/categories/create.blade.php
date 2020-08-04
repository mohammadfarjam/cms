@extends('Admin.layouts.master')

@section('content')
    <div class="bg-white col-12">
        <h3 class="p-lg-4 col-12">ایجاد دسته بندی جدید</h3>
        <div class="col-md-6 offset-2">


            @include('partials.form_error')

            {!! Form::open(['method'=>'POST','action' => 'Admin\AdminCategoryController@store']) !!}

            <div class="form-group">
                {!!  Form::label('title','عنوان:') !!}
                {!! Form::text('title',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!!  Form::label('slug','نام مستعار:') !!}
                {!! Form::text('slug',null,['class'=>'form-control']) !!}
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
                {!! Form::submit('ذخیره',['class'=>'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>{{--col-md-6--}}


    </div>{{--bg-white col-12--}}

@endsection
