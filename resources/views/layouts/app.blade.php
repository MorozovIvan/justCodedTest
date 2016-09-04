<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="container">

    <header class="row">
        @include('includes.header')
    </header>

    <div id="main" class="row">
        <br>
        <!-- main content -->
        <div id="content" class="col-md-12">
            <div class="jumbotron">
                @yield('content')
            </div>
        </div>

    </div>

    <footer class="row">
        @include('includes.footer')
    </footer>

</div>
</body>
</html>