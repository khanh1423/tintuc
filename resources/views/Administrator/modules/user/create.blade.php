@extends('administrator.master')
@section('title', 'Tạo người dùng')
@section('head', 'Tạo người dùng')
@section('content')
<div class="card">
   <div class="card-header">
      <a href="{{route('admin.user.index')}}" class="btn btn-sm btn-success">Quay lại</a>
      <div class="card-tools">
         <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
         <i class="fas fa-minus"></i></button>
         <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
         <i class="fas fa-times"></i></button>
      </div>
   </div>
   <div class="card-body">
        <form action="{{route('admin.user.store')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group col-4">
                <label>Tên người dùng</label>
                <input name="name" class="form-control" placeholder="Tên người dùng" value="{{old('name')}}">
                @if ($errors->has('name'))
                    <small  class="text-danger form-text"><Table>{{$errors->first('name')}}</Table></small>
                @endif
            </div>
            <div class="form-group col-4">
                <label>Số điện thoại</label>
                <input name="phone" class="form-control" placeholder="Số điện thoại" value="{{old('phone')}}">
                @if ($errors->has('phone'))
                    <small  class="text-danger form-text"><Table>{{$errors->first('phone')}}</Table></small>
                @endif
            </div>
            <div class="form-group col-4">
                <label>eMail</label>
                <input name="email" class="form-control" placeholder="email" value="{{old('email')}}">
                @if ($errors->has('email'))
                    <small  class="text-danger form-text"><Table>{{$errors->first('email')}}</Table></small>
                @endif
            </div>
            <div class="form-group col-4">
                <label>Mật khẩu</label>
                <input type="password" name="password" class="form-control" > 
                @if ($errors->has('password'))
                    <small  class="text-danger form-text"><Table>{{$errors->first('password')}}</Table></small>
                @endif
            </div>
            <div class="form-group col-4">
                <label>Xác nhận mật khẩu</label>
                <input type="password" name="password_confirmation" class="form-control"> 
                @if ($errors->has('password_confirmation'))
                    <small  class="text-danger form-text"><Table>{{$errors->first('password_confirmation')}}</Table></small>
                @endif
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
@section('foot')
<script src="{{asset('administrator/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
   $(function () {
     // Summernote
     $('.textarea').summernote()
   })
</script>

<script>
    function previewFile(input){
        var file = $(".image-preview").get(0).files[0];
        
        if(file){
            var reader = new FileReader();
            
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }
</script>

<script>
    var inputcl = document.getElementById('inputImage');
    function chooseImage(){
        return inputcl.click();
    }
</script>
@endsection