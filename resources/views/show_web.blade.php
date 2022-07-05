<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Students</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/KC (1).png">
    <link rel="stylesheet" href="./assets/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="./assets/css/style.css" rel="stylesheet">
    <link href="./assets/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<div id="main-wrapper">
        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="./assets/images/KCC.png" alt="">
                <img class="logo-compact" src="./assets/images/logo-text.png" alt="">
                <img class="brand-title" src="./assets/images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="/profile" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="{{ url('/logout') }}" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
    Sidebar start
***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a href="/" aria-expanded="false"><i class="icon icon-home"></i><span
                                class="nav-text">Home</span></a>
                    </li>
                    <li><a href="/profile" aria-expanded="false"><i class="icon icon-users-mm"></i><span
                                class="nav-text">Profile</span></a>
                    </li>
                    @if(@session(role)==='teacher')
                    <li><a href="/add_user" aria-expanded="false"><i class="icon icon-users-mm"></i><span
                                class="nav-text">Add user</span></a>
                    </li>
                    @endif
                    <li><a href="/add_web" aria-expanded="false"><i class="icon icon-users-mm"></i><span
                        class="nav-text">Add Web</span></a>
                    </li>
                    <li><a href="/showWeb" aria-expanded="false"><i class="icon icon-users-mm"></i><span
                        class="nav-text">showWeb</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body" id="app">
            <!-- row -->
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                                <h4>Hi {{@session('username')}}</h4>
                                <span class="ml-1"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Table Web</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-responsive-sm">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Hostname</th>
                                                    <th>IP</th>
                                                    <th>Port</th>
                                                    <th>Status
                                                    @if(@session('role') === 'teacher')
                                                    <th>Delete</th>
                                                    @endif  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($webs as $hostname)
                                                <tr>
                                                    <td></td>
                                                    <td>{{$hostname->host}}</td>
                                                    <td>{{$hostname->ip}}</td>
                                                    <td>
                                                    @foreach ($hostname->ports as $port)
                                                    {{$port}}
                                                    @endforeach
                                                    </td>
                                                    <td>{{$hostname->status}}</td>
                                                    @if(@session('role') === 'teacher')
                                                    <td><a href="/delete_web/{{$hostname->id}}" class="btn btn-danger">Delete</a></td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!-- Required vendors -->
    <script src="./assets/vendor/global/global.min.js"></script>
    <script src="./assets/js/quixnav-init.js"></script>
    <script src="./assets/js/custom.min.js"></script>
    <!-- Owl Carousel -->
    <script src="./assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
    <!-- Counter Up -->
    <script src="./assets/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="./assets/vendor/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="./assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
</body>

</html>