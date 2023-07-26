@extends('admin/admin_master')

@section('main')
<div class="card p-3">

  <h2>Edit Post</h2>
  <!-- <span class="flash_msg" style="color:green;font-weight:600;font-size:18px;">{{session('msg')}}</span> -->

  <form action="{{url('admin/pages/update/'.$result['0']->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="">Name</label>
      <input type="text" name="name" class="form-control" value="{{$result['0']->name}}" placeholder="Enter Page Name">
      @error('name')
      <span class="text-danger">{{$message}}</span>
      @enderror
    </div>
    <div class="form-group">
      <label for="">Slug</label>
      <input type="text" name="slug" class="form-control" value="{{$result['0']->slug}}" placeholder="Enter Short Description">
      @error('short_desc')
      <span class="text-danger">{{$message}}</span>
      @enderror
    </div>
    <div class="form-group">
      <label for="">Content</label>
      <textarea type="text" name="description" class="form-control" placeholder="Content goes here...">{{$result['0']->description}}</textarea>
      @error('description')
      <span class="text-danger">{{$message}}</span>
      @enderror
    </div>
    <button class="w-100 mt-3" type="submit" style="background: #fd7e14;color:white;outline:none;border:none;padding:10px 50px;border-radius:25px;">Update Post</button>
  </form>

</div>

@endsection

@section('scripts')
<script>
    CKEDITOR.replace('description');    
</script>
@endsection