@extends('admin/admin_master')

@section('main')
<!-- <button type="button" style="background: #fd7e14;color:white;outline:none;border:none;padding:10px 50px;border-radius:25px;" data-toggle="modal" data-target="#exampleModal">Add Blog</button> -->
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card py-3">
      <div class="card-body">

        <span class="flash_msg" id="notify" style="color:green;font-weight:600;font-size:18px;">{{session('msg')}}</span>
        <a href="{{url('admin/posts/addPost')}}" style="background: #fd7e14;color:white;outline:none;border:none;padding:10px 50px;border-radius:25px;">Add Post</a>
        <div class="table-responsive">

          <table class="table">
            <thead>
              <th width="5%">No.</th>
              <th width="5%">Title</th>
              <!-- <th width="10%">Slug</th> -->
              <th width="10%">Short_desc</th>
              <th width="25%">Content</th>
              <th width="10%">Image</th>
              <th width="10%">Post Date</th>
              <!-- <th>Status</th> -->
              <th width="25%">Action</th>
            </thead>
            <tbody>
              @foreach($result as $value)
              <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->title}}</td>
                <!-- <td>{{$value->slug}}</td> -->
                <td>{{$value->short_desc}}</td>
                <td>{{$value->long_desc}}</td>
                <td><img src="{{asset('/storage/post/'.$value->image)}}" width="100" height="100" alt="Image"></td>
                <td>{{$value->post_date}}</td>
                <!-- <td width="5%">{{$value->status}}</td> -->
                <td>
                  <a href="{{url('admin/posts/editPost/'.$value->id)}}" style="background: #fd7e14;color:white;outline:none;border:none;padding:10px 30px;border-radius:25px;">Edit</a>
                  <a href="{{url('admin/posts/deletePost/'.$value->id)}}" style="background: #fd7e14;color:white;outline:none;border:none;padding:10px 30px;border-radius:25px;">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection