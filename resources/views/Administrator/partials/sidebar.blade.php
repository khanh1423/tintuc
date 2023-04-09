<!-- Brand Logo -->
<a href="{{asset('administrator/index3.html ')}}" class="brand-link">
<img src="{{asset('administrator/dist/img/AdminLTELogo.png ')}}"
        alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: .8">
<span class="brand-text font-weight-light">TRANG CHỦ</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
<!-- Sidebar user (optional) -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
    <img src="{{asset('administrator/dist/img/user2-160x160.jpg ')}}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
    <a href="#" class="d-block">{{auth()->user()->name}}</a>
    </div>
</div>

<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
    <li class="nav-item has-treeview">
        <a href="{{route('index')}}" class="nav-link {{($route == 'index') ? 'active' : ''}}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Trang Chủ
        </p>
        </a>
    </li>
    
    <li class="nav-item has-treeview ">
        <a href="{{route('admin.category.index')}}" class="nav-link {{($route == 'admin.category.index') ? 'active' : ''}}">
        <i class="nav-icon far fa-folder"></i>
        <p>
            Thể Loại
        </p>
        </a>
    </li>
    <li class="nav-item has-treeview ">
        <a href="{{route('admin.new.index')}}" class="nav-link {{($route == 'admin.new.index') ? 'active' : ''}}">
        <i class="nav-icon far fa-eye"></i>
        <p>
            Tin Tức
        </p>
        </a>
    </li>

    <li class="nav-item has-treeview ">
        <a href="{{route('admin.user.index')}}" class="nav-link {{($route == 'admin.user.index') ? 'active' : ''}}">
        <i class="nav-icon fas fa-user"></i>
        <p>
            Người dùng
        </p>
        </a>
    </li>

    <li class="nav-item has-treeview ">
        <a href="#" class="nav-link ">
        <i class="nav-icon far fa-plus-square"></i>
        <p>
            Extras
            <i class="fas fa-angle-left right"></i>
        </p>
        </a>
        <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="../examples/login.html ')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Login</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="../examples/register.html ')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Register</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="../examples/forgot-password.html ')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Forgot Password</p>
            </a>
        </li>
        </ul>
    </li>

    <li class="nav-item has-treeview ">
        <a href="{{route('PostLogout')}}" class="nav-link">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>
            Đăng xuất
        </p>
        </a>
    </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->