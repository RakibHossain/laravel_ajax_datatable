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
    <link href="{{url('public/assets/dataTable/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">


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
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Nanosoft Skill Test</a>
        </div>
        <ul class="nav navbar-nav navbar-right custom-nav">
            <li class="dropdown">
                <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="glyphicon glyphicon-user"></i> Rakib Hossain<span class="caret"></span>
                </a>
                <ul id="g-account-menu" class="dropdown-menu" role="menu">
                    <li><a href="#">My Profile</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
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
        <div class="col-md-10">
            <!-- column 2 -->
            <a href="#"><strong><span class="glyphicon glyphicon-dashboard"></span> Dashboard</strong></a>
            <hr>
            <button id="addStudent" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Add Student</button>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h5 id="message"></h5>
                    <table class="table table-bordered table-hovered" id="student">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Roll</th>
                                <th>Gender</th>
                                <th>Religion</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!--/row-->
        </div>
    </div>
</div>
<!-- /container -->

{{--Save/Update modal--}}
<div class="modal fade" id="studentModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form id="studentForm" class="form-horizontal" enctype="multipart/form-data">
                    <input id="student_id" type="hidden" name="student_id" value="">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Student Name</label>
                        <div class="col-sm-9">
                            <input id="name" type="text" class="form-control" placeholder="Student Name" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Roll</label>
                        <div class="col-sm-9">
                            <input id="roll" type="text" class="form-control" placeholder="Roll" name="roll">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                        <div class="col-sm-3">
                            <select id="gender" class="form-control input-sm" name="gender" required>
                                <option value="">--SELECT--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Religion</label>
                        <div class="col-sm-3">
                            <select id="religion" class="form-control input-sm" name="religion" required>
                                <option value="">--SELECT--</option>
                                <option value="Islam">Islam</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddhist">Buddhist</option>
                                <option value="Christianity">Christianity</option>
                                <option value="Other">Other</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                            <button id="submit" type="submit" class="btn btn-primary"></button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

{{--Delete Student Modal--}}
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Are you sure to delete this row?</h4>
            </div>
            <form id="deleteForm">
                <div class="modal-footer">
                    <input id="deleteId" type="hidden" name="student_id" value="">
                    <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger" name="delete_dividend" value="foo">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<footer class="text-center">Bootstrap Template
    <a target="_blank" href="http://mustafizbd.info"><strong>Rakib Hossain</strong></a>
</footer>

<script src="{{url('public/assets/js/jquery-1.12.3.min.js')}}"></script>
<script src="{{url('public/assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('public/assets/dataTable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('public/assets/dataTable/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">

    $(document).ready(function () {
        $('#message').hide();
        var method = "";
        var table  = $('#student').dataTable({ // Show All data by jQuery dataTable
            "bFilter": true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ url('/view') }}",
                "type": "post",
                "data": {_token: "{{ csrf_token() }}"}
            }
        });


        function reloadTable() {
            table.api().ajax.reload(null, false); //reload dataTable by ajax
        }


        $(document).on('click', '#addStudent', function () { //Add Student Modal
            $('.modal-title').text('Add Student');
            method = "add";
            $('#submit').html('<i class="glyphicon glyphicon-save"></i> Store Data');
            $("#studentForm")[0].reset();
            $('#studentModal').modal('show');
        });

        $(document).on('click', '.editStudent', function () { //Edit Student Modal
            $('.modal-title').text('Edit Student');
            $('#submit').html('<i class="glyphicon glyphicon-save"></i> Update Data');
            method = "edit";
            var id = $(this).attr('data-id');
            $.ajax({
                'url': '{{url('/edit')}}',
                'type': 'post',
                'dataType': 'json',
                'data': {student_id: id},
                success: function (response) {
                    if (response) {
                        $('#student_id').val(response.student_id);
                        $('#name').val(response.name);
                        $('#roll').val(response.roll);
                        $('#gender').val(response.gender);
                        $('#religion').val(response.religion);
                        $('#studentModal').modal('show');
                    }
                },
                error: function (XHR, textStatus, errorThrown) {
                    console.log('Error:' + errorThrown);
                }
            });
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') //reload csrf token for each ajax request
            }
        });

        // ---------Save Student By Ajax----------
        $(document).on('submit', '#studentForm', function (e) {
            var url;
            e.preventDefault(e);
            if(method == "add"){
               url = '{{url('/store')}}';
                $.ajax({
                    'url': url,
                    'type': 'post',
                    'dataType': 'json',
                    'data': $('#studentForm').serialize(),
                    success: function (response) {
                        if (response) {
                            $('#studentModal').modal('hide');
                            $('#message').show().text(response).addClass('alert alert-success').delay(4000).fadeOut('slow');
                            $('#studentForm')[0].reset();
                            reloadTable();
                        }
                    },
                    error: function (XHR, textStatus, errorThrown) {
                        console.log('Error:' + errorThrown);
                    }
                });
            }else{
                url = '{{url('/update')}}';
                $.ajax({
                    'url': url,
                    'type': 'post',
                    'dataType': 'json',
                    'data': $('#studentForm').serialize(),
                    success: function (response) {
                        if (response) {
                            $('#studentModal').modal('hide');
                            $('#message').show().text(response).addClass('alert alert-success').delay(4000).fadeOut('slow');
                            $('#studentForm')[0].reset();
                            reloadTable();
                        }
                    },
                    error: function (XHR, textStatus, errorThrown) {
                        console.log('Error:' + errorThrown);
                    }
                });
            }
        });

        $(document).on('click', '.deleteStudent', function () { //Delete Modal
            var id = $(this).attr('data-id');
            $('#deleteId').val(id);
            $("#studentForm")[0].reset();
            $('#deleteModal').modal('show');
        });

        $(document).on('submit', '#deleteForm', function (e) { //Delete Student by Ajax
            var id = $('#deleteId').val()
            e.preventDefault();
            $.ajax({
                'url': '{{url('/delete')}}',
                'type': 'post',
                'dataType': 'json',
                'data': {student_id: id},
                success: function (response) {
                    if (response) {
                        $('#deleteModal').modal('hide');
                        reloadTable();
                    }
                },
                error: function (XHR, textStatus, errorThrown) {
                    console.log('Error:' + errorThrown);
                }
            });
        });


    });

</script>
</body>
</html>
