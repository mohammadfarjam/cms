<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('head')
    <title>Blog Post - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/front_post_bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/all.css')}}" rel="stylesheet">

</head>
<body>

<!-- Navigation -->


@yield('navigation')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
    @yield('content')
    <!-- Sidebar Widgets Column -->

    @yield('sidebar')

    <!-- /sidebar -->
    </div> <!-- /.row -->
</div> <!-- /.continer -->


<!-- Footer -->
<footer class="py-5 bg-dark col-md-12">
    <div class="container ">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('js/front_jquery_post.js')}}"></script>

</body>

</html>
