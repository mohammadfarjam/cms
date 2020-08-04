@extends('Admin.layouts.master')

@section('content')
    <div class="bg-white col-12">
        <h3 class="p-lg-4 col-12">ویرایش دسته بندی</h3>
        <div class="row">
            <div class="col-md-6 offset-3">

                @include('partials.form_error')

                {!! Form::model($category,['method'=>'PATCH','action' => ['Admin\AdminCategoryController@update',$category->id]]) !!}

                <div class="form-group">
                    {!!  Form::label('title','عنوان:') !!}
                    {!! Form::text('title',$category->title,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!!  Form::label('slug','نام مستعار :') !!}
                    {!! Form::text('slug',$category->slug,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!!  Form::label('meta_description',' متای توضیحات :') !!}
                    {!! Form::text('meta_description',$category->meta_description,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!!  Form::label('meta_keywords','متای برچسب ها :') !!}
                    {!! Form::text('meta_keywords',$category->meta_keyword,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('بروزرسانی',['class'=>'btn btn-success col-lg-3 pull-right']) !!}
                </div>
                {!! Form::close() !!}

                {!! Form::open(['method'=>'DELETE','action'=>['Admin\AdminCategoryController@destroy',$category->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('حذف',['class'=>'btn btn-danger mb-lg-5 pull-left']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>



    </div>

@endsection
