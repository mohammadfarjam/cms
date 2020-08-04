<div class="col-md-3 mt-md-4 pull-left ml-5">
    <!-- Search Widget -->
    <div class="card mt-xl-5">
        <h5 class="card-header w-100">جستجو</h5>
        <div class="card-body">

            {!! Form::open(['method'=>'GET','action' => 'Frontend\PostController@SearchTitle']) !!}
            <div class="input-group">
                {!! Form::text('title',null,['class'=>'form-control']) !!}
                <span class="input-group-btn">
                {!! Form::submit('جستجو',['class'=>'btn btn-secondary']) !!}
                </span>
            </div>
            {!! Form::close() !!}

        </div>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header w-100">دسته بندی </h5>
        <div class="card-body">


            <ul class="list-unstyled mb-0">
                @foreach($categories as $category)
                    <li>
                        <a href="#">{{$category->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header w-100">Side Widget</h5>
        <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new
            Bootstrap
            4 card containers!
        </div>
    </div>
</div>

