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
                <h4 class="page-title">Add Course Assignment</h4>
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

                    <form method="POST" action="{{ route('assign.course.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="add_item">
                                <div class="form-group">
                                    <label>Class Name <span class="text-danger">*</span></label>
                                    <select name="class_id" required="" class="form-control">
                                        <option value="" selected="">Select Class</option>
                                        @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Student Course <span class="text-danger">*</span></label>
                                            <select name="course_id[]" required="" class="form-control">
                                                <option value="" selected="">Select Course</option>
                                                @foreach ($courses as $course)
                                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Full Mark <span class="text-danger">*</span></label>
                                            <input type="text" name="full_mark[]" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Pass Mark <span class="text-danger">*</span></label>
                                            <input type="text" name="pass_mark[]" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Subjective Mark <span class="text-danger">*</span></label>
                                            <input type="text" name="subjective_mark[]" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-2" style="padding-top: 25px;">
                                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>
                                    </div>

                                </div>
                            </div>

                            <div class="pb-5">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>

                    <div style="visibility: hidden;">
                        <div class="whole_extra_item_add" id="whole_extra_item_add">
                            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                                <div class="form-row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Student Course <span class="text-danger">*</span></label>
                                            <select name="course_id[]" required="" class="form-control">
                                                <option value="" selected="">Select Fee Category</option>
                                                @foreach ($courses as $course)
                                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                                                       
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Full Mark <span class="text-danger">*</span></label>
                                            <input type="text" name="full_mark[]" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Pass Mark <span class="text-danger">*</span></label>
                                            <input type="text" name="pass_mark[]" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Subjective Mark <span class="text-danger">*</span></label>
                                            <input type="text" name="subjective_mark[]" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-2" style="padding-top: 25px;">
                                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>
                                        <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>
                                    </div>

                                </div>
                            </div>
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
    <footer class="footer text-center">
        All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://twitter.com/JayeMustick">Stigo Rigo</a>.
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var counter = 0;
        $(document).on("click", ".addeventmore", function() {
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click", '.removeeventmore', function(event) {
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1
        });

    });
</script>

@endsection