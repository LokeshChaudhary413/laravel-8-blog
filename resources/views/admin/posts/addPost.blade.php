@extends('admin/admin_master')

@section('main')
<div class="card p-3">
   
    <h2>Add Post</h2>
    <form action="{{url('admin/posts/submit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter Title">
            @error('title')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Short Description</label>
            <input type="text" name="short_desc" id="short_desc" class="form-control" placeholder="Enter Short Description">
            @error('short_desc')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Slug </label>
            <input type="text" name="slug" class="form-control" placeholder="Enter Slug">
            @error('slug')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Content</label>
            <textarea type="text" name="long_desc" id="long_desc" class="form-control" placeholder="Content goes here..."></textarea>
            @error('long_desc')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="">
            <label for="">Image</label>
            <input type="file" name="image" class="form-control">
            @error('image')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Post Date</label>
            <input type="date" name="post_date" class="form-control">
            @error('post_date')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button class="w-100 mt-3" type="submit" style="background:#f96332;color:white;outline:none;border:none;padding:10px 50px;border-radius:25px;">Add Blog</button>
    </form>
</div>

@endsection

@section('scripts')
<script>
    CKEDITOR.replace('short_desc');
    CKEDITOR.replace('long_desc');
</script>
@endsection
