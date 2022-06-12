@extends('admin/admin_master')

@section('main')



<!-- <button type="button" style="background: #fd7e14;color:white;outline:none;border:none;padding:10px 50px;border-radius:25px;" data-toggle="modal" data-target="#exampleModal">Add Blog</button> -->
<div class="card p-3">

        <h2>Add Page</h2>
        <form action="{{url('admin/pages/submit')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Page Name">
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="">Slug</label>
            <input type="text" name="slug" class="form-control" placeholder="Enter Short Description">
            @error('slug')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="">Description</label>
            <textarea type="text" name="description" class="form-control" placeholder="Content goes here..."></textarea>
            @error('description')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <button class="w-100 mt-3" type="submit" style="background:#f96332;color:white;outline:none;border:none;padding:10px 50px;border-radius:25px;">Add Blog</button>
        </form>
      </div>
    </div>
  </div>

@endsection