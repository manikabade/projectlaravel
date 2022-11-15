@extends('admin.layout.frame')






@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>General Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">General Form</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Quick Example</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputname1">name</label>
                                        <input name="name" type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputemail1">email</label>
                                        <input name="email" type="email" class="form-control" id="exampleInputemail1" placeholder="Enter Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputpassword1">password</label>
                                        <input name="password" type="password" class="form-control" id="exampleInputpassword1"placeholder="Enter Password">
                                            </div>


                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.row -->


    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
