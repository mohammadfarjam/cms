@extends('admin.layouts.master')

@section('content')
    @if(Session::has('add_post'))
        <div class="alert alert-success col-md-5">
            <P>{{Session('add_post')}}</P>
        </div>
    @endif
    @if(Session::has('edit_post'))
        <div class="alert-success alert col-md-5">
            {{Session('edit_post')}}
        </div>
    @endif
    @if(Session::has('delete_post'))
        <div class="alert-danger alert col-md-5">
            {{Session('delete_post')}}
        </div>
    @endif
    <h3 class="pb-4 pr-md-4 col-md-12">لیست مطالب</h3>
    <table class="table table-bordered bg_content">
        <thead>
        <tr class="bg_tr_parent">
            <th></th>
            <th>عنوان</th>
            <th>کاربر</th>
            <th>توضیحات</th>
            <th>دسته بندی</th>
            <th>وضعیت</th>
            <th>تاریخ ایجاد</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody class="bg_tr">


        @foreach($posts as $post)
            <tr>
                <td><img src="{{$post->photo ? $post->photo->path :"http://placehold.it/200"}}" class="img-fluid"
                         width="60px" height="50px"></td>


                <td><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></td>
                <td>{{$post->user->name}}</td>
                <td>{{Str::limit($post->description,40)}}</td>
                <td>{{$post->category->title}}</td>
                @if($post->status==0)
                    <td><span class="badge badge-danger">غیرفعال</span></td>
                @else
                    <td><span class="badge badge-success">فعال</span></td>
                @endif
                <td>{{\Hekmatinasser\Verta\Facades\Verta::instance($post->created_at)->formatdifference(Hekmatinasser\Verta\Verta::today('Asia/Tehran')) }}</td>
                <td>

                    {!! Form::open(['method'=>'DELETE','action'=>['Admin\AdminPostController@destroy',$post->id]]) !!}
                    <div class="form-group">
                        {!! Form::submit('حذف',['class'=>'btn btn-danger ']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
    <div class="col-md-10 offset-5">
        {{$posts->links()}}
    </div>
@endsection
