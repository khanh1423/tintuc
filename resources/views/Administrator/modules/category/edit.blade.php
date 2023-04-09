@extends('administrator.master')
@section('title', 'Sửa Thể Loại')
@section('head', 'Sửa Thể Loại')
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('admin.category.index')}}" class="btn btn-sm btn-success">Quay lại</a>
       <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
       </div>
    </div>
    <div class="card-body">
        
        <form class="col-4" action="{{route('admin.category.update', $data->slug)}}" enctype="multipart/form-data" method="POST">
            @csrf
            <label>Thể loại cha</label>
            <div class="form-group">
                <select class="form-control" name="parent_id">
                    <option value="0">Chọn thể loại cha</option>
                    @foreach ($cate as $item)
                        <option value="{{$item->id}}"
                            @if ($data->parent_id == $item->id)
                                selected="selected"
                            @endif    
                        >{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
              <label>Tên thể loại</label>
              <input name="name" class="form-control" placeholder="Tên thể loại" value="{{$data->name}}">
                @if ($errors->has('name'))
                    <small  class="text-danger form-text"><Table>{{$errors->first('name')}}</Table></small>
                @endif
            </div>
            <div class="form-group">
                <label>Trạng thái</label>
                <div >
                    <div class="col-4"><i  class="text-success form-text">Hiển thị</i><input type="radio" name="status" value="1" @if ($data->status == 1) checked  @endif></div>
                    <div class="col-4"><i  class="text-danger form-text">Ẩn</i><input type="radio" name="status" value="0" @if ($data->status == 0) checked  @endif></div>
                </div>
                
            </div>
            <button type="submit" class="btn btn-primary">Xác nhận</button>
          </form>

    </div>
    <!-- /.card-body -->
    <div class="card-footer">
       @Darknight
    </div>
    <!-- /.card-footer-->
</div>
@endsection