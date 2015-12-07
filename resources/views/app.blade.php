<?php
    $name = session('name');
    $avatar = session('avatar');
?>
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
    <style>
        a, a:visited {
            color: green;
            text-decoration: none;
        }
        a:active, a:hover {
            text-decoration: none;
            color: darkseagreen;
        }
        .navbar-nav {
            height: 50px;
        }
        .userdropdown {
            display: none;
            position: absolute;
            width: 100px;
            list-style-type: none;
            padding-left: 0;
        }
        .user:hover > .userdropdown {
            display: block;
        }
    </style>
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
                <li class="user">
                    @if(isset($name))
                        <?php echo "<a href='#'><img src= " . $avatar . " width='25'></a>"; ?>
                        <ul class="userdropdown list-group">
                            <li class="list-group-item"><a href="../myposts">My Posts</a></li>
                            <li class="list-group-item"><a href="../signmeout">Sign Out</a></li>
                        </ul>
                    @else
                        <a href="/facebook">Sign in</a>
                    @endif
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