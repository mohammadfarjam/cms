@extends('Admin.layouts.master')

@section('content')
    <div class="bg-white col-12">
        <h3 class="p-lg-4 col-12">ویرایش نظر</h3>
        <div class="row">
            <div class="col-md-6 offset-3">

                @include('partials.form_error')

                {!! Form::model($comment,['method'=>'PATCH','action' =>['Admin\AdminCommentController@update',$comment->id]]) !!}

                <div class="form-group">
                    {!!  Form::label('description','متن نظر :') !!}
                    {!! Form::textarea('description',$comment->description,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('بروزرسانی',['class'=>'btn btn-success col-lg-3 pull-right']) !!}
                </div>
                {!! Form::close() !!}

                {!! Form::open(['method'=>'DELETE','action'=>['Admin\AdminCommentController@destroy',$comment->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('حذف',['class'=>'btn btn-danger mb-lg-5 pull-left']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>



    </div>

@endsection
