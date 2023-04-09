@extends('administrator.master')
@section('title', 'Người dùng')
@section('head', 'Người dùng')
@section('content')
<div class="card">
   <div class="card-header">
      {{-- <h3 class="card-title">Title</h3> --}}
      {{-- <a href="{{route('admin.new.create')}}" class="btn btn-sm btn-success">Thêm thể loại</a> --}}
      <a href="{{route('admin.user.create')}}" class="btn btn-sm btn-success">Thêm user</a>
      <div class="card-tools">
         <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
         <i class="fas fa-minus"></i></button>
         <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
         <i class="fas fa-times"></i></button>
      </div>
   </div>
   <div class="card-body">

      <div class="card-body">
         <table id="example2" class="table table-bordered table-hover text-center">
           <thead>
           <tr>
               <th>Số Thứ Tự</th>
               <th>Tên người dùng</th>
               <th>Email</th>
               <th>Phone</th>
               <th>Trạng thái</th>
               <th>Hoạt động</th>
           </tr>
           </thead>
           <tbody>
           
            @foreach ($data as $item)
            <tr>
               <td>{{$loop->iteration}}</td>
               <td class="text-left">{{$item->name}}</td>
               <td>{{$item->email}}</td>
               <td>{{$item->phone}}</td>
               <td>
                     @if ($item->status == 0)
                        <span class="badge badge-danger">Ngừng hoạt động</span>
                     @else
                     <span class="badge badge-success">Đang hoạt động</span>
                     @endif
               </td>
               <td class="text-right">
                  <a href="{{route('admin.user.edit',['id' => $item->id])}}" class="btn btn-sm btn-success">
                     <i class="fas fa-edit"></i>
                  </a>

                  @if (auth()->user()->id == $item->id)
                     <a href="" name="_method" onclick="return noDelete('User đang đăng nhập, không thể xóa!!!') " class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                     </a>
                  @else
                     <a href="{{ route('admin.user.destroy', $item->id) }}" name="_method" value="delete" onclick="return checkDelete('Bạn có muốn xóa người dùng này không?')" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                     </a>
                  @endif

                  
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

    <!-- /.card-body -->
   <div class="card-footer">
      @darknight
   </div>
    <!-- /.card-footer-->
</div>
@endsection

@section('foot')

<script>
   function noDelete(msg){
      return alert(msg);
   }

   function checkDelete(msg){
      if(window.confirm(msg) == true){
        return true;
      }
      return false;
   }
</script>
@endsection