@extends('Admin.layouts.master')

@section('content')
    <div class="bg-white col-12">
        <div class="col-md-6">
            <h3 class="p-lg-4 col-12">ایجاد کاربر جدید</h3>

            @include('partials.form_error')

            {!! Form::open(['method'=>'POST','action' => 'Admin\AdminUserController@store','files'=>true]) !!}

            <div class="form-group">
                {!!  Form::label('name','نام و نام خانوادگی :') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!!  Form::label('email','ایمیل :') !!}
                {!! Form::text('email',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!!  Form::label('roles','نقش :') !!}
                {!! Form::select('roles[]',$roles,null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!!  Form::label('status','وضعیت :') !!}
                {!! Form::select('status',[0=>'غیر فعال',1=>'فعال'],null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!!  Form::label('avatar','تصویر پروفایل :') !!}
                {!! Form::file('avatar',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!!  Form::label('password','رمز عبور :') !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('ذخیره',['class'=>'btn btn-success']) !!}

            </div>


            {!! Form::close() !!}
        </div>{{--col-md-6--}}


    </div>{{--bg-white col-12--}}

@endsection
