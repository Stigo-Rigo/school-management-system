@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item {{ ($route == '/dashboard') ? 'active' : '' }}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>

                <li class="sidebar-item {{ ($prefix == '/users') ? 'active' : '' }}"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-box"></i><span class="hide-menu">Manage User </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('users.view') }}" class="sidebar-link"><i class="mdi mdi-account"></i><span class="hide-menu"> View User</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('users.add') }}" class="sidebar-link"><i class="mdi mdi-account-plus"></i><span class="hide-menu"> Add User </span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item {{ ($prefix == '/profile') ? 'active' : '' }}"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-outline"></i><span class="hide-menu">Profile</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('profile.view') }}" class="sidebar-link"><i class="mdi mdi-eye-outline"></i><span class="hide-menu"> View Profile</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('password.view') }}" class="sidebar-link"><i class="mdi mdi-account-key"></i><span class="hide-menu"> Change Password </span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item {{ ($prefix == '/setup') ? 'active' : '' }}"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-book-variant"></i><span class="hide-menu">Set Up</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('student.class.view') }}" class="sidebar-link"><i class="mdi mdi-grid"></i><span class="hide-menu"> Classes</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('student.year.view') }}" class="sidebar-link"><i class="mdi mdi-calendar"></i><span class="hide-menu"> Year</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('student.major.view') }}" class="sidebar-link"><i class="mdi mdi-bank"></i><span class="hide-menu"> Major</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('student.shift.view') }}" class="sidebar-link"><i class="mdi mdi-calendar-clock"></i><span class="hide-menu"> Shift</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('fee.category.view') }}" class="sidebar-link"><i class="mdi mdi-cash"></i><span class="hide-menu"> Fee Category</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('fee.amount.view') }}" class="sidebar-link"><i class="mdi mdi-cash-100"></i><span class="hide-menu"> Fee Amount</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('exam.type.view') }}" class="sidebar-link"><i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu"> Exam Type</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('school.course.view') }}" class="sidebar-link"><i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu"> Course</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('assign.course.view') }}" class="sidebar-link"><i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu"> Assign Course</span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item {{ ($prefix == '/students') ? 'active' : '' }}"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-book-variant"></i><span class="hide-menu">Student</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('student.registration.view') }}" class="sidebar-link"><i class="mdi mdi-grid"></i><span class="hide-menu"> Register Student</span></a></li>
                    </ul>
                </li>

                
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="widgets.html" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Widgets</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="tables.html" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Tables</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="grid.html" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Full Width</span></a></li>
                
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>