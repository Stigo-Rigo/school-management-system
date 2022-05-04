@extends('admin.admin_master')
@section('admin')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Search Student</h4>
                <!-- <div class="ml-auto text-right">
                    <a href="{{ route('users.add') }}" class="btn btn-primary">Add User</a>
                </div> -->
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <h5 class="card-title">Student Datatable</h5> -->
                        <div class="box bb-3 border-warning">
                            <div class="box-header">
                                <h4 class="box-title"></h4>
                            </div>
                            <div class="box-body">
                                <form action="{{ route('student.year.class.wise') }}" method="get">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Year <span class="text-danger"> </span></h5>
                                                <select name="year_id" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Year</option>
                                                    @foreach($years as $year)
                                                        <option value="{{ $year->id }}" {{ (@$year_id == $year->id) ? "selected" : "" }}>{{ $year->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Class <span class="text-danger"> </span></h5>
                                                <select name="class_id" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Year</option>
                                                    @foreach($classes as $class)
                                                        <option value="{{ $class->id }}" {{ (@$class_id == $class->id) ? "selected" : "" }}>{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4" style="padding-top: 25px">
                                            <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search" value="search">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            @if(!@$search)
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Name</th>
                                            <th>ID No</th>
                                            <th>Roll</th>
                                            <th>Year</th>
                                            <th>Class</th>
                                            <th>Image</th>
                                            @if(Auth::user()->role == "Admin")
                                            <th>Code</th>
                                            @endif
                                            <th width="25%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $value)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $value['student']['name'] }}</td>
                                                <td>{{ $value['student']['id_no'] }}</td>
                                                <td>{{ $value->roll }}</td>
                                                <td>{{ $value['student_year']['name'] }}</td>
                                                <td>{{ $value['student_class']['name'] }}</td>
                                                <td><img src="{{ (!empty($value['student']['image'])) ? url('upload/student_images/' . $value['student']['image']) : url('upload/no_image.jpg') }}" style="width: 60px; width: 60px;"></td>
                                                <td>
                                                    <a title="Edit" href="{{ route('student.registration.edit', $value->student_id) }}" class="btn btn-info"> <i class="fa fa-edit"></i> </a>
                                                    <a title="Promotion" href="{{ route('student.registration.promotion', $value->student_id) }}" class="btn btn-primary" ><i class="fa fa-check"></i></a>
                                                    <a target="_blank" title="Details" href="{{ route('student.registration.details', $value->student_id) }}" class="btn btn-danger"  ><i class="fa fa-eye"></i></a>
                                                </td>
                                                <td>{{ $value->year_id }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            @else
                            
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Name</th>
                                            <th>ID No</th>
                                            <th>Roll</th>
                                            <th>Year</th>
                                            <th>Class</th>
                                            <th>Image</th>
                                            @if(Auth::user()->role == "Admin")
                                            <th>Code</th>
                                            @endif
                                            <th width="25%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $value)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $value['student']['name'] }}</td>
                                                <td>{{ $value['student']['id_no'] }}</td>
                                                <td>{{ $value->roll }}</td>
                                                <td>{{ $value['student_year']['name'] }}</td>
                                                <td>{{ $value['student_class']['name'] }}</td>
                                                <td><img src="{{ (!empty($value['student']['image'])) ? url('upload/student_images/' . $value['student']['image']) : url('upload/no_image.jpg') }}" style="width: 60px; width: 60px;"></td>
                                                <td>
                                                    <a title="Edit" href="{{ route('student.registration.edit',$value->student_id) }}" class="btn btn-info"> <i class="fa fa-edit"></i> </a>
                                                    <a title="Promotion" href="{{ route('student.registration.promotion',$value->student_id) }}" class="btn btn-primary" ><i class="fa fa-check"></i></a>
                                                    <a target="_blank" title="Details" href="{{ route('student.registration.details',$value->student_id) }}" class="btn btn-danger"  ><i class="fa fa-eye"></i></a>
                                                </td>
                                                <td>{{ $value->year_id }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center ">
        All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://twitter.com/JayeMustick">Stigo Rigo</a>.
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>

@endsection


<!-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Library</li>
        </ol>
    </nav> -->