<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.ico') }} ">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>H-R Application Management :: {{ isset($page_title)? $page_title : '' }}</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('assets/css/light-bootstrap-dashboard.css?v=1.4.0') }}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="{{ asset('http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href='{{ asset("http://fonts.googleapis.com/css?family=Roboto:400,700,300") }} ' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/pe-icon-7-stroke.css') }}" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="{{ asset('assets/img/sidebar-5.jpg') }}">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    HR-App
                </a>
            </div>

            <ul class="nav">

                @if($current_page == 'dashboard')
                <li class="active">
                    <a href="{{url('/home')}}">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @else
                <li class="">
                    <a href="{{url('/home')}}">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @endif

                @if($current_page == 'level')
                <li class="active">
                    <a href="{{route('level.create')}}">
                        <i class="pe-7s-user"></i>
                        <p>Add/View Level</p>
                    </a>
                </li>
                @else
                <li class="">
                    <a href="{{route('level.create')}}">
                        <i class="pe-7s-user"></i>
                        <p>Add/View Level</p>
                    </a>
                </li>
                @endif

                @if($current_page == 'appointmenttype')
                <li class="active">
                    <a href="{{route('appointmenttype.create')}}">
                        <i class="pe-7s-user"></i>
                        <p>Add/View Appointment Type</p>
                    </a>
                </li>
                @else
                <li class="">
                    <a href="{{route('appointmenttype.create')}}">
                        <i class="pe-7s-user"></i>
                        <p>Add/View Appointment Type</p>
                    </a>
                </li>
                @endif
                
                @if($current_page == 'department')
                <li class="active">
                    <a href="{{route('department.create')}}">
                        <i class="pe-7s-user"></i>
                        <p>Add/View Department</p>
                    </a>
                </li>
                @else
                <li class="">
                    <a href="{{route('department.create')}}">
                        <i class="pe-7s-user"></i>
                        <p>Add/View Department</p>
                    </a>
                </li>
                @endif

                @if($current_page == 'rank')
                <li class="active">
                    <a href="{{route('rank.create')}}">
                        <i class="pe-7s-user"></i>
                        <p>Add/View Rank</p>
                    </a>
                </li>
                @else
                <li class="">
                    <a href="{{route('rank.create')}}">
                        <i class="pe-7s-user"></i>
                        <p>Add/View Rank</p>
                    </a>
                </li>
                @endif

                @if($current_page == 'zone')
                <li class="active">
                    <a href="{{route('zone.create')}}">
                        <i class="pe-7s-user"></i>
                        <p>Add/View Zone</p>
                    </a>
                </li>
                @else
                <li class="">
                    <a href="{{route('zone.create')}}">
                        <i class="pe-7s-user"></i>
                        <p>Add/View Zone</p>
                    </a>
                </li>
                @endif

                @if($current_page == 'status')
                <li class="active">
                    <a href="{{route('status.create')}}">
                        <i class="pe-7s-user"></i>
                        <p>Add/View Status</p>
                    </a>
                </li>
                @else
                <li class="">
                    <a href="{{route('status.create')}}">
                        <i class="pe-7s-user"></i>
                        <p>Add/View Status</p>
                    </a>
                </li>
                @endif

                @if($current_page == 'addstaff')
                <li class="active">
                    <a href="{{route('staff.create')}}">
                        <i class="pe-7s-user"></i>
                        <p>Add/View Staff</p>
                    </a>
                </li>
                @else
                <li class="">
                    <a href="{{route('staff.create')}}">
                        <i class="pe-7s-user"></i>
                        <p>Add/View Staff</p>
                    </a>
                </li>
                @endif

                @if($current_page == 'viewstaff')
                <li class="active">
                    <a href="{{route('staff.index')}}">
                        <i class="pe-7s-user"></i>
                        <p>View/Update Staff</p>
                    </a>
                </li>
                @else
                <li class="">
                    <a href="{{route('staff.index')}}">
                        <i class="pe-7s-user"></i>
                        <p>View/Update Staff</p>
                    </a>
                </li>
                @endif

                @if($current_page == 'leave')
                <li class="active">
                    <a href="{{route('leave.create')}}">
                        <i class="pe-7s-user"></i>
                        <p>Manage Staff Leave</p>
                    </a>
                </li>
                @else
                <li class="">
                    <a href="{{route('leave.create')}}">
                        <i class="pe-7s-user"></i>
                        <p>Manage Staff Leave</p>
                    </a>
                </li>
                @endif
                
                <!-- <li>
                    <a href="table.html">
                        <i class="pe-7s-note2"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li>
                    <a href="typography.html">
                        <i class="pe-7s-news-paper"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="pe-7s-science"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li> -->
               
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                                <p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <!-- <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-lg hidden-md"></b>
                                    <p class="hidden-lg hidden-md">
                                        5 Notifications
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li> 
                           <a href="#">
                                <i class="fa fa-search"></i>
                                <p class="hidden-lg hidden-md">Search</p>
                           </a>
                        </li>-->

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="#">
                               <p>Welcome, Ango</p>
                            </a>
                        </li>
                        <li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li>
                        <!-- <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                        Dropdown
                                        <b class="caret"></b>
                                    </p>
                        
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li> -->
                        <li>
                            <a href="#">
                                <p>Log out</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">