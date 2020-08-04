@extends('Admin.layouts.master')

@section('content')
    <div class="bg-white col-12">
        <h3 class="p-lg-4 col-12">ویرایش کاربر({{$user->name}})</h3>
        <div class="row">
            <div class="col-md-3">
                <img src="{{$user->photo ? $user->photo->path :"http://placehold.it/200"}}" class="img-fluid m-lg-5"
                     width="120" height="90">
            </div>
            <div class="col-md-8">

                @include('partials.form_error')

                {!! Form::model($user,['method'=>'PATCH','action' => ['Admin\AdminUserController@update',$user->id],'files'=>true,]) !!}

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
                    {!! Form::submit('بروزرسانی',['class'=>'btn btn-success col-lg-3 pull-right']) !!}
                </div>
                {!! Form::close() !!}

                {!! Form::open(['method'=>'DELETE','action'=>['Admin\AdminUserController@destroy',$user->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('حذف',['class'=>'btn btn-danger mb-lg-5 pull-left']) !!}
                </div>
                {!! Form::close() !!}
            </div>{{--col-md-6--}}
        </div>{{--row--}}



    </div>{{--bg-white col-12--}}

@endsection
