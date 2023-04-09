@extends('administrator.master')
@section('title', 'Trang Tin Tức')
@section('head', 'Trang Tin Tức')
@section('content')
<div class="card">
   <div class="card-header">
      {{-- <h3 class="card-title">Title</h3> --}}
      <a href="{{route('admin.new.create')}}" class="btn btn-sm btn-success">Thêm thể loại</a>
      <div class="card-tools">
         <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
         <i class="fas fa-minus"></i></button>
         <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
         <i class="fas fa-times"></i></button>
      </div>
   </div>
   <div class="card-body">

      <div class="card-body">
         <table id="example2" class="table table-bordered table-hover text-center align-middle">
           <thead>
           <tr>
               <th>STT</th>
               <th>Tiêu đề</th>
               <th>Tác giả</th>
               <th>Thể loại</th>
               <th>Hình ảnh</th>
               <th>Trạng thái</th>
               <th>Loại tin</th>
               <th>Hoạt động</th>
           </tr>
           </thead>
           <tbody>
           
            @foreach ($data as $item)
            <tr>
               <td>{{$loop->iteration}}</td>
               <td class="text-left">{{$item->title}}</td>
               <td><b><i>{{$item->author}}</i></b></td>
               <td><span class="badge badge-danger">{{$item->category->name}}</span></td>
               <td><img src="/upload/news/{{$item->image}}" alt="" height="100px"></td>
               <td>
                  @if ($item->status == 0)
                     <span class="badge badge-danger">Ẩn</span>
                  @else
                  <span class="badge badge-success">Hiển thị</span>
                  @endif
               </td>
               <td>
                  @if ($item->hot == 0)
                     <span class="badge badge-danger">Tin thường</span>
                  @else
                  <span class="badge badge-success">Tin đặt biệt</span>
                  @endif
               </td>
               
               <td class="text-right">
                  <a href="{{route('admin.new.edit',['slug' => $item->slug])}}" class="btn btn-sm btn-success">
                     <i class="fas fa-edit"></i>
                  </a>
                  <a href="{{ route('admin.new.destroy', $item->id) }}" name="_method" value="delete" onclick="return checkDelete('Bạn có muốn xóa thể loại này không?')" class="btn btn-sm btn-danger">
                     <i class="fas fa-trash"></i>
                  </a>
               </td>
            </tr>
            @endforeach
           
           </tbody>
           {{-- <tfoot>
           <tr>
               <th>Số Thứ Tự</th>
               <th>Tên thể loại</th>
               <th>Thể loại cha</th>
               <th>Trạng thái</th>
               <th>Hoạt động</th>
           </tr>
           </tfoot> --}}
         </table>
       </div>
    
   </div>
    <!-- /.card-body -->
   <div class="card-footer">
      @darknight
   </div>
    <!-- /.card-footer-->
</div>
@endsection

@section('foot')

<script>
   function checkDelete(msg){
      if(window.confirm(msg) == true){
        return true;
      }
      return false;
   }
</script>

{{-- <script src="{{asset('administrator/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script>
   $(function () {
     $("#example1").DataTable({
       "responsive": true,
       "autoWidth": false,
     });
     $('#example2').DataTable({
       "paging": true,
       "lengthChange": false,
       "searching": false,
       "ordering": true,
       "info": true,
       "autoWidth": false,
       "responsive": true,
     });
   });
</script> --}}
@endsection