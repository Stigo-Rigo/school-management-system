@extends('admin.admin_master')
@section('admin')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Profile</h4>
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
                <!-- <div class="card">
                    <div class="card-body"> -->
                        <!-- <h5 class="card-title">Basic Datatable</h5> -->



                    <div class="row py-1 px-4" style="min-height: 100vh; overflow-x: hidden">
                        <div class="col-lg-12">
                            <!-- Profile widget -->
                            <div class="bg-white shadow rounded overflow-hidden">
                                <div class="px-4 pt-0 pb-4 cover" style="background-image: url(https://images.unsplash.com/photo-1530305408560-82d13781b33a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80);
                                    background-size: cover;
                                    background-repeat: no-repeat">
                                    <div class="media align-items-end profile-head" style="transform: translateY(5rem)">
                                        <div class="profile mr-3"><img src="{{ (!empty($user->image)) ? url('upload/user_images/'. $user->image) : url('upload/no_image.jpg') }}" alt="..." width="130" class="rounded mb-2 img-thumbnail"><a href="{{ route('profile.edit') }}" class="btn btn-outline-dark btn-sm btn-block">Edit profile</a></div>
                                        <div class="media-body mb-5 text-white">
                                            <h4 class="mt-0 mb-0">{{ $user->name }}</h4>
                                            <p class="small mb-4"> <i class="fas fa-map-marker-alt mr-2"></i>{{ $user->address}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-light p-4 d-flex justify-content-end text-center">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item px-5">
                                            <h5 class="font-weight-bold mb-0 d-block">{{ $user->telephone }}</h5><small class="text-muted"> <i class="mdi mdi-phone mr-1"></i>Mobile No.</small>
                                        </li>
                                        <li class="list-inline-item px-5">
                                            <h5 class="font-weight-bold mb-0 d-block">{{ $user->email }}</h5><small class="text-muted"> <i class="mdi mdi-email"></i> Email</small>
                                        </li>
                                        <li class="list-inline-item px-5">
                                            <h5 class="font-weight-bold mb-0 d-block">Male</h5><small class="text-muted"> <i class="mdi mdi-gender-male-female mr-1"></i>Gender</small>
                                        </li>
                                    </ul>
                                </div>
                                <div class="px-4 py-3">
                                    <h5 class="mb-0">About</h5>
                                    <div class="p-4 rounded shadow-sm bg-light">
                                        <p class="font-italic mb-0">Web Developer</p>
                                        <p class="font-italic mb-0">Lives in New York</p>
                                        <p class="font-italic mb-0">Photographer</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>



                    <!-- </div>
                </div> -->
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
