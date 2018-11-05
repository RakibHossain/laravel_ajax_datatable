<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{url('public/favicon.ico')}}">

    <title>Todo</title>

    <link href="{{url('public/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('public/assets/css/style.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-awesome navbar-static-top ">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Nanosoft Skill Test</a>
        </div>
        <ul class="nav navbar-nav navbar-right custom-nav">
            <li class="dropdown">
                <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#" aria-expanded="false"><i
                            class="glyphicon glyphicon-user"></i> Mustafizur Rahman<span class="caret"></span></a>
                <ul id="g-account-menu" class="dropdown-menu" role="menu">
                    <li><a href="#">My Profile</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
    </div>
</nav>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-2">
            <!-- Left column -->
            <a href="#"><strong><i class="glyphicon glyphicon-th-list"></i> Tools</strong></a>
            <hr>
            <ul class="nav nav-pills nav-stacked">
                <li>
                    <a href="{{url('/')}}"><strong><i class="glyphicon glyphicon-user"></i> Student</strong></a>
                    <a href="{{url('/chart')}}"><strong><i class="glyphicon glyphicon-equalizer"></i> Chart</strong></a>
                </li>
            </ul>
            <hr>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><strong><i class="glyphicon glyphicon-link"></i> Widgets</strong></a></li>
                <li><a href="#"><strong><i class="glyphicon glyphicon-list-alt"></i> Reports</strong></a></li>
                <li><a href="#"><strong><i class="glyphicon glyphicon-book"></i> Pages</strong></a></li>
            </ul>
            <hr>
            <ul class="nav nav-stacked">
                <li><a href="">Playground</a></li>
                <li><a href="">Bootstrap 3</a></li>
                <li><a href="">Panels</a></li>
                <li><a href="#">GitHub</a></li>
                <li><a href="">Layout</a></li>
            </ul>

            <hr>
        </div>
        <div class="col-md-8">
             <div id="bar-chart"></div>
        </div>

        <div class="col-md-8">
          <div style="margin-left:200px"><h4>Chart-01: Religion Bar chart</h4></div>
        </div>
    </div>
</div>
<!-- /container -->
<footer class="text-center">Bootstrap Template
    <a target="_blank" href="http://mustafizbd.info"><strong>Mustafizur Rahman</strong></a>
</footer>

<script src="{{url('public/assets/js/jquery-1.12.3.min.js')}}"></script>
<script src="{{url('public/assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('public/assets/chart/raphael-min.js')}}"></script>
<script src="{{url('public/assets/chart/morris-0.4.1.min.js')}}"></script>
<script type="text/javascript">
	Morris.Bar({
        element: 'bar-chart',
        data: [

        @foreach($religion as $r)
        { 
            Religion: '{{$r->religion}}',
            @php
              $male=App\Student::where('gender','male')->where('religion',$r->religion)->get();
              $female=App\Student::where('gender','female')->where('religion',$r->religion)->get();
            @endphp
            a: {{count($male)}}, 
            b: {{count($female)}}        
        }
        ,
        @endforeach   
        ],
        xkey: 'Religion',
        ykeys: ['a', 'b'],
        labels: ['Male', 'Female']
    });

</script>

</body>
</html>
