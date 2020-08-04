@extends('admin.layouts.master')

@section('content')
    @if(Session::has('delete_category'))
        <div class="alert alert-danger col-md-7">
            <p>{{Session('delete_category')}}</p>
        </div>
    @endif

    @if(Session::has('add_category'))
        <div class="col-md-7 alert alert-primary">
            <p>{{Session('add_category')}}</p>
        </div>
    @endif
    @if(Session::has('update_category'))
        <div class="alert alert-success col-md-7">
            <p>{{Session('update_category')}}</p>
        </div>
    @endif
    <h3 class="pb-4 pr-md-4 col-md-12">لیست دسته بندی ها</h3>
    <table class="table table-bordered bg_content">
        <thead>
        <tr class="bg_tr_parent">
            <td>شناسه</td>
            <th>عنوان</th>
            <th>تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody class="bg_tr">


        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td><a href="{{route('categories.edit',$category->id)}}">{{$category->title}}</a></td>
                <td>{{\Hekmatinasser\Verta\Facades\Verta::instance($category->created_at)->formatdifference(Hekmatinasser\Verta\Verta::today('Asia/Tehran')) }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <div class="col-md-10 offset-5">
        {{$categories->links()}}
    </div>
@endsection
