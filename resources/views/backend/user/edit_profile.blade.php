@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Edit Profile</h4>
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
                    <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data" class="form-horizontal p-4">
                        @csrf

                        <div class="card-body">
                            <div class="form-group row">
                                <label>Name <small class="text-muted">John Doe</small></label>
                                    <input name="name" type="text" class="form-control" id="name" value="{{ $data->name }}">
                            </div>
                            <div class="form-group row">
                                <label>Email <small class="text-muted">example@gmail.com</small></label>
                                    <input type="email" name="email" class="form-control" id="email" value="{{ $data->email }}">
                            </div>
                            <div class="form-group">
                                <label>Phone <small class="text-muted">(999) 999-9999</small></label>
                                <input type="text" name="telephone" class="form-control phone-inputmask" id="phone-mask" value="{{ $data->telephone }}">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" value="{{ $data->address }}">
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" id="gender" value="" class="form-control">
                                    <option value="" selected="" disabled="">Select Gender</option>
                                    <option value="Male" {{ ($data->gender == "Male" ? "selected": "") }}  >Male</option>
                                    <option value="Female" {{ ($data->gender == "Female" ? "selected": "") }} >Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Profile Picture</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>
                            <div class="form-group">
		                        <div class="controls">
	                                <img id="showImage" src="{{ (!empty($user->image)) ? url('upload/user_images/'. $user->image) : url('upload/no_image.jpg') }}" style="width: 100px; width: 100px; border: 1px solid #000000;"> 

	                            </div>
	                        </div>
                            
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Submit</button>
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

<script type="text/javascript">
    $(document).ready(function() {
        $("#image").change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#showImage").attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>

@endsection

