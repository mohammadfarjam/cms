@extends('admin.layouts.master')

@section('content')
    @if(Session::has('delete_user'))
    <div class="alert alert-danger col-md-7">
        <p>{{Session('delete_user')}}</p>
    </div>
    @endif

    @if(Session::has('add_user'))
        <div class="col-md-7 alert alert-primary">
            <p>{{Session('add_user')}}</p>
        </div>
        @endif
    <h3 class="pb-4 pr-md-4 col-md-12">لیست کاربران</h3>
    <table class="table table-bordered bg_content">
        <thead>
        <tr class="bg_tr_parent">
            <th></th>
            <th>نام کاربر</th>
            <th>آدرس ایمیل</th>
            <th>نقش کاربر</th>
            <th>وضعیت</th>
            <th>تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody class="bg_tr">
        <tr>

            @foreach($users as $user)

                <td><img src="{{$user->photo ? $user->photo->path :"http://placehold.it/200"}}" class="img-fluid"
                         width="60px" height="50px"></td>



                <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>
                    <ul style="list-style-type: none">
                        @foreach($user->roles as $role)
                            <li>{{$role->name}}</li>
                        @endforeach
                    </ul>
                </td>
                @if($user->status==0)
                    <td><span class="badge badge-danger">غیرفعال</span></td>
                @else
                    <td><span class="badge badge-success">فعال</span></td>
                @endif
                <td>{{\Hekmatinasser\Verta\Facades\Verta::instance($user->created_at)->formatdifference(Hekmatinasser\Verta\Verta::today('Asia/Tehran')) }}</td>

        @endforeach
        </tr>
        </tbody>
    </table>
    <div class="col-md-10 offset-5">
        {{$users->links()}}
    </div>
@endsection
