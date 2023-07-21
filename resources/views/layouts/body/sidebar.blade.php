@php
    
    $Prefix = Request::route()->getPrefix();
    $Route = Route::current()->getName();
    
@endphp
<aside class="main-sidebar">
    {{-- sidebar --}}
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ route('home') }}">
                    {{-- logo for regular state and mobile devices  --}}
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="../images/logo-dark.png" alt="">
                        <h3><b>SA</b> Management System</h3>
                    </div>
                </a>
            </div>
        </div>
        {{-- sidebar menu --}}
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ $Route == 'home' ? 'active' : '' }}">
                <a href="{{ url('/home') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview {{ $Prefix == '/students' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="users"></i>
                    <span>Manage Students</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('/') }}"><i class="ti-more"></i>View Students</a></li>
                    <li><a href="{{ route('students.create') }}"><i class="ti-more"></i>Add Student</a></li>
                    <li><a href=""><i class="ti-more"></i>Past Students</a></li>
                    <li><a href=""><i class="ti-more"></i>Transfered Students</a></li>
                    <li><a href=""><i class="ti-more"></i>Dismissed Students</a></li>
                </ul>
            </li>
            <li class="treeview {{ $Prefix == '/classes' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="list"></i>
                    <span>Class</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('classes.list') }}"><i class="ti-more"></i>Manage Class</a></li>
                    <li><a href="" data-toggle="modal" data-target="#AddClass"><i class="ti-more"></i>Add New
                            Class</a></li>
                    <li><a href="" data-toggle="modal" data-target="#AddFormMaster"><i class="ti-more"></i>Add
                            Form Master</a></li>
                    @php
                        $classData = App\Models\CurrentClass::get();
                        // $classData = App\Models\CurrentClass::whereIn('current_class', function ($query) {
                        //     $query->select('actual_class')->from('students');
                        // })->get();
                    @endphp
                    @foreach ($classData as $class)
                        <li><a href="{{ route('classes.students', $class->current_class) }}"><i
                                    class="ti-more"></i>{{ $class->current_class }}</a></li>
                    @endforeach
                </ul>
            </li>
            {{-- <li class="treeview {{ $Prefix == '/programs' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="book"></i>
                    <span>Manage programs</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('programs.list') }}"><i class="ti-more"></i>View Program</a></li>
                    <li><a href="" data-toggle="modal" data-target="#AddProgram"><i class="ti-more"></i>Add New
                            Program</a></li>
                </ul>
            </li> --}}
            <li class="treeview {{ $Prefix == '/academics' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="calendar"></i>
                    <span>Manage Academic Year</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('academics.years') }}"><i class="ti-more"></i>Academic Year</a></li>
                    <li>
                        <a href="" data-toggle="modal" data-target="#AddAcademicYear"><i class="ti-more"></i>Add
                            Academic Year
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{ $Prefix == '/subjects' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="book"></i>
                    <span>Manage Subjects</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('subjects.list') }}"><i class="ti-more"></i>View Subjects</a></li>
                    <li><a href="" data-toggle="modal" data-target="#AddSubject"><i class="ti-more"></i>Add New
                            Subject</a></li>
                </ul>
            </li>
            <li class="treeview {{ $Prefix == '/staff' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="users"></i>
                    <span>Manage Staff</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('staff.list') }}"><i class="ti-more"></i>View Staff</a></li>
                    <li><a href="{{ route('staff.subjects.list') }}"><i class="ti-more"></i>Assigned Subjects</a></li>
                    <li><a href="{{ route('staff.create') }}"><i class="ti-more"></i>Add New
                            Staff</a></li>
                </ul>
            </li>
            <li class="treeview {{ $Prefix == '/houses' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="home"></i>
                    <span>Manage Houses</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('houses.list') }}"><i class="ti-more"></i>View Houses</a></li>
                    <li><a href="" data-toggle="modal" data-target="#AddHouse"><i class="ti-more"></i>Add New
                            Houses</a></li>
                    @php
                        $HouseData = App\Models\House::get();
                    @endphp
                    @foreach ($HouseData as $House)
                        <li><a href="{{ route('houses.students', $House->house) }}"><i
                                    class="ti-more"></i>{{ $House->house }}</a></li>
                    @endforeach
                </ul>
            </li>
            @if (Auth::user()->user_type == 'Admin')
                <li class="treeview {{ $Prefix == '/users' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="users"></i>
                        <span>Manage Users</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('users.view') }}"><i class="ti-more"></i>View Users</a></li>
                        <li><a href="{{ route('users.add') }}"><i class="ti-more"></i>Add New User</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </section>
</aside>
@include('layouts.modals.modals')
