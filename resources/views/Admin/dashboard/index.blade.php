@extends('admin.layouts.master')

@section('content')

    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$photoscount}}</h3>

                        <p>رسانه ها</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">اطلاعات بیشتر <i
                            class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$categoriescount}}</h3>
                        {{--                                    <sup style="font-size: 20px">%</sup>--}}
                        <p>دسته بندی</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">اطلاعات بیشتر <i
                            class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$userscount}}</h3>
                        <p>کاربران ثبت شده</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">اطلاعات بیشتر <i
                            class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$postscount}}</h3>

                        <p>مطالب</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">اطلاعات بیشتر <i
                            class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row bg_white">
            @yield('content')
            <section class="col-md-12 connectedSortable">

                <div class="row col-md-6 pull-right mr-md-1">
                    <h6 class="mt-4 mr-3 col-md-6">آخرین مطالب</h6>

                    <table class="table table-bordered bg_content">
                        <thead>
                        <tr class="bg_tr_parent">
                            <th>عنوان</th>
                            <th>دسته بندی</th>
                            <th>تاریخ ایجاد</th>
                        </tr>
                        </thead>
                        <tbody class="bg_tr">
                        @foreach($posts as $post)
                            <tr>
                                <td><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></td>
                                <td>{{$post->category->title}}</td>
                                <td>{{\Hekmatinasser\Verta\Facades\Verta::instance($post->created_at)->formatdifference(Hekmatinasser\Verta\Verta::today('Asia/Tehran')) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>



                <div class="row col-md-6 pull-left ml-md-1">
                    <h6 class="mt-4 mr-3 col-md-6">آخرین کاربران</h6>

                    <table class="table table-bordered bg_content">
                        <thead>
                        <tr class="bg_tr_parent">
                            <th>نام کاربر</th>
                            <th>آدرس ایمیل</th>
                            <th>تاریخ ایجاد</th>
                        </tr>
                        </thead>
                        <tbody class="bg_tr">
                        <tr>
                            @foreach($users as $user)
                                <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
                                <td>{{$user->email}}</td>
                                <td>{{\Hekmatinasser\Verta\Facades\Verta::instance($user->created_at)->formatdifference(Hekmatinasser\Verta\Verta::today('Asia/Tehran')) }}</td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                    </div>
            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->




@endsection
