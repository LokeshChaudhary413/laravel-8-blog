@extends('admin/admin_master')

@section('main')



<!-- <button type="button" style="background: #fd7e14;color:white;outline:none;border:none;padding:10px 50px;border-radius:25px;" data-toggle="modal" data-target="#exampleModal">Add Blog</button> -->
<div class="card p-3">
  <span class="flash_msg" style="color:green;font-weight:600;font-size:18px;">{{session('msg')}}</span>
  <a href="{{url('admin/pages/addPage')}}" style="background: #fd7e14;color:white;outline:none;border:none;padding:10px 50px;border-radius:25px;">Add Page</a>
        
  <table class="table">
    <thead>
      <th width="5%">No.</th>
      <th width="10%">Name</th>
      <th width="20%">Slug</th>
      <th width="40%">Description</th>
      <th width="25%">Action</th>
    </thead>
    <tbody>
      @foreach($result as $value)
      <tr>
        <td>{{$value->id}}</td>
        <td>{{$value->name}}</td>
        <td>{{$value->slug}}</td>
        <td>{{$value->description}}</td>
        <td>
          <a href="{{url('admin/pages/editPage/'.$value->id)}}" style="background: #fd7e14;color:white;outline:none;border:none;padding:10px 30px;border-radius:25px;">Edit</a>
          <a href="{{url('admin/pages/deletePage/'.$value->id)}}" style="background: #fd7e14;color:white;outline:none;border:none;padding:10px 30px;border-radius:25px;">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection