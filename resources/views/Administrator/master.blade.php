<!DOCTYPE html>
<html>
   <head>
      @include('administrator.partials.head')
   </head>
   <body class="hold-transition sidebar-mini">
      <!-- Site wrapper -->
      <div class="wrapper">
         <!-- Navbar -->
         <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            @include('administrator.partials.navbar')
         </nav>
         <!-- /.navbar -->
         <!-- Main Sidebar Container -->
         <aside class="main-sidebar sidebar-dark-primary elevation-4">
            @include('administrator.partials.sidebar')
         </aside>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               @include('administrator.partials.header')
         </div>
         <!-- /.container-fluid -->
         </section>
         <!-- Main content -->
         <section class="content">
            <!-- Default box -->
            @yield('content')
            <!-- /.card -->
         </section>
         <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
         @include('administrator.partials.footer')
      </footer>
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
         <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->
      @include('administrator.partials.foot')
   </body>
</html>