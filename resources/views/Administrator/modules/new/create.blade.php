@extends('administrator.master')
@section('title', 'Tạo tin tức')
@section('head', 'Tạo tin tức')
@section('content')
<div class="card">
   <div class="card-header">
      <a href="{{route('admin.new.index')}}" class="btn btn-sm btn-success">Quay lại</a>
      <div class="card-tools">
         <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
         <i class="fas fa-minus"></i></button>
         <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
         <i class="fas fa-times"></i></button>
      </div>
   </div>
   <div class="card-body">
      <form action="{{route('admin.new.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input name="title" class="form-control" placeholder="Tiêu đề">
                    @if ($errors->has('title'))
                        <small  class="text-danger form-text"><Table>{{$errors->first('title')}}</Table></small>
                    @endif
                </div>
                <div class="form-group">
                    <label>Thể lọai</label>
                    <select class="form-control" name="category_id">
                       @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                       @endforeach
                    </select>
                 </div>
                 <div class="form-group">
                    <label>Tác giả</label>
                    <input name="author" class="form-control" placeholder="Tác giả">
                    @if ($errors->has('author'))
                        <small  class="text-danger form-text"><Table>{{$errors->first('author')}}</Table></small>
                    @endif
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control" name="status">
                       <option value="1">Hiển thị</option>
                       <option value="0">Ẩn</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Loại tin</label>
                    <select class="form-control" name="hot">
                       <option value="0">Tin bình thường</option>
                       <option value="1">TIN ĐẶT BIỆT</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    @if ($errors->has('image'))
                        <small  class="text-danger form-text"><Table>{{$errors->first('image')}}</Table></small>
                    @endif
                    <input type="file" name="image" id="inputImage" hidden class="form-control image-preview" onchange="previewFile(this);">
                    <hr>
                    <img src="{{asset('administrator/image/no-image.jpg')}}" class="text-center" id="previewImg" width="50%" onclick="chooseImage();">
                </div>
               
            </div>
            <div class="col">
                
                <div class="form-group">
                    <label>Đoạn mở đầu</label>
                    @if ($errors->has('intro'))
                        <small  class="text-danger form-text"><Table>{{$errors->first('intro')}}</Table></small>
                    @endif
                    <textarea class="form-control" name="intro" rows="2" placeholder="Nội dung..."></textarea>
                    <script>
                        CKEDITOR.replace( 'intro' );
                    </script>
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    @if ($errors->has('content'))
                        <small  class="text-danger form-text"><Table>{{$errors->first('content')}}</Table></small>
                    @endif
                    <textarea class="form-control" name="content" rows="5"  placeholder="Nội dung..."></textarea>
                    <script>
                        CKEDITOR.replace( 'content' );
                    </script>                  
                </div>
                <div class="form-group">
                    <label>Đoạn kết</label>
                    @if ($errors->has('foot'))
                        <small  class="text-danger form-text"><Table>{{$errors->first('foot')}}</Table></small>
                    @endif
                    <textarea class="form-control" name="foot" rows="2"  placeholder="Nội dung..."></textarea>
                    <script>
                        CKEDITOR.replace( 'foot' );
                    </script>
                </div>
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
         </div>
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