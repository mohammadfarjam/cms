@extends('admin.layouts.master')

@section('content')
    @if(Session::has('approve_comment'))
        <div class="alert alert-success col-md-5">
            <P>{{Session('approve_comment')}}</P>
        </div>
    @endif
    @if(Session::has('reject_comment'))
        <div class="alert alert-danger col-md-5">
            <P>{{Session('reject_comment')}}</P>
        </div>
    @endif
    @if(Session::has('update_comment'))
        <div class="alert-success alert col-md-5">
            {{Session('update_comment')}}
        </div>
    @endif
    @if(Session::has('delete_comment'))
        <div class="alert-danger alert col-md-5">
            {{Session('delete_comment')}}
        </div>
    @endif
    <h3 class="pb-4 pr-md-4 col-md-12">لیست نظرات</h3>
    <table class="table table-bordered bg_content">
        <thead>
        <tr class="bg_tr_parent">
            <th>شناسه</th>
            <th>متن نظر</th>
            <th>مطلب</th>
            <th>وضعیت</th>
            <th>تاریخ ایجاد</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody class="bg_tr">


        @foreach($comments as $comment)
            <tr>

                <td>{{$comment->id}}</td>
                <td><a href="{{route('comments.edit',$comment->id)}}">{{Str::limit($comment->description,250)}}</a></td>
                <td>{{$comment->post->title}}</td>
                @if($comment->status==0)
                    <td><span class="badge badge-danger">منتشر نشده</span></td>
                @else
                    <td><span class="badge badge-success">منتشر شده</span></td>
                @endif
                <td>{{\Hekmatinasser\Verta\Facades\Verta::instance($comment->created_at)->formatdifference(Hekmatinasser\Verta\Verta::today('Asia/Tehran')) }}</td>

                <td>
                    @if($comment->status==0)
                        {!! Form::open(['method'=>'POST','route'=>['comments.actions',$comment->id]]) !!}
                        <div class="form-group">
                            {!! Form::hidden('action','approved') !!}
                            {!! Form::submit('تایید',['class'=>'btn btn-success ']) !!}
                        </div>
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['method'=>'POST','route'=>['comments.actions',$comment->id]]) !!}
                        <div class="form-group">
                            {!! Form::hidden('action','rejected') !!}
                            {!! Form::submit(' عدم تایید',['class'=>'btn btn-danger ']) !!}
                        </div>
                        {!! Form::close() !!}
                    @endif


                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
    <div class="col-md-10 offset-5">
        {{$comments->links()}}
    </div>
@endsection
