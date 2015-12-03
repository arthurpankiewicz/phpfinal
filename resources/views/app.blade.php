<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>rate courses</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet/less" type="text/css" href="{!! url('assets/styles.less') !!}" />
    <script src="{!! url('assets/less/lessjs/dist/less.js') !!}" type="text/javascript"></script>
    <script src="{!! url('assets/jquery.tablesorter/jquery.tablesorter.js') !!}" type="text/javascript"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">coursegrader.tk</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="/schools">Schools</a>
                </li>
                <li>
                    <a href="/courses">Courses</a>
                </li>
                <li>
                    <a href="/facebook">Sign in</a>
                </li>
                <li>
                    <a href="/reviewcourse">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>