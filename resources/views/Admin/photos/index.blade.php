@extends('admin.layouts.master')
@section('head')
    <script>

        $(document).ready(function () {
            $('.sub').click(function () {
                if (this.checked){
                    $('.select').each(function () {
                        this.checked = true;
                    })
                }else {
                    $('.select').each(function () {
                        this.checked = false;
                    })
                }

            })
        });



    </script>
@endsection
@section('content')
    @if(Session::has('delete_file'))
        <div class="alert alert-danger col-md-7">
            <p>{{Session('delete_file')}}</p>
        </div>
    @endif
    @if(Session::has('delete_photos'))
        <div class="alert alert-danger col-md-7">
            <p>{{Session('delete_photos')}}</p>
        </div>
    @endif



    <h3 class="pb-4 pr-md-4 col-md-12">لیست فایل ها</h3>
    <form action="delete/media" method="post" class="col-lg-12 form-inline">
        {{csrf_field()}}
        {{method_field('delete')}}
        <div class="form-group col-lg-12 ">
            <select name="select_all" class="form-control">
                <option value="delete">حذف دسته جمعی</option>
            </select>
            <input type="submit" name="submit" value="اعمال" class="btn btn-primary mr-3">
        </div>


        <table class="table table-bordered bg_content mt-4">
            <thead>
            <tr class="bg_tr_parent">
                <td><input type="checkbox" value="" name="select_all" class="sub"></td>
                <td>شناسه</td>
                <th>تصویر</th>
                <th>کاربر</th>
                <th>تاریخ ایجاد</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody class="bg_tr">

            @foreach($photos as $photo)
                <tr>
                    <td><input type="checkbox" value="{{$photo->id}}" name="select[]" class="select"></td>
                    <td>{{$photo->id}}</td>
                    <td><img src="{{$photo->path}}" width="120" height="120"></td>
                    <td>{{$photo->user->name}}</td>
                    <td>{{\Hekmatinasser\Verta\Facades\Verta::instance($photo->created_at)->formatdifference(Hekmatinasser\Verta\Verta::today('Asia/Tehran')) }}</td>
                    <td>

                        {!! Form::open(['method'=>'DELETE','action'=>['Admin\AdminPhotoController@destroy',$photo->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('حذف',['class'=>'btn btn-danger ']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </form>
    <div class="col-md-10 offset-5">
        {{$photos->links()}}
    </div>

@endsection
