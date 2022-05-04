@extends('admin.admin_master')
@section('admin')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Add Users</h4>
                <!-- <div class="ml-auto text-right">
                    <a href="#" class="btn btn-primary">Add User</a>
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
                    <form method="POST" action="{{ route('users.store') }}" class="form-horizontal">
                        @csrf

                        <div class="card-body">
                            <div class="form-group row">
                                <label for="fname">User Role <span class="text-danger">*</span></label>
                                <select name="user_role" id="user_role" class="select2 form-control custom-select">
                                    <option value="" selected="" disabled="">Select Role</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Employee">Employee</option>
                                    <option value="Student">Student</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="name">Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Name Here">
                            </div>
                            <div class="form-group row">
                                <label for="email">Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="Email here">
                            </div>
                            <div class="form-group row">
                                <label for="password">Password<span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" placeholder="Password here">
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                            
                        </div>    
                    </form>
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
    <footer class="footer text-center">
        All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://twitter.com/JayeMustick">Stigo Rigo</a>.
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>

@endsection