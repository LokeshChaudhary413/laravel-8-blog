
<?php

// echo "<pre>";
// print_r($result['0']);
// die;

?>


@extends('front/master')

@section('main_content')
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('../front/img/post-sample-image.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>{{$result['0']->title}}</h1>
            <h2 class="subheading">{{$result['0']->short_desc}}</h2>
            <span class="meta">Posted on {{$result['0']->post_date}}</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
         <p>{{$result['0']->long_desc}}</p>
        </div>
      </div>
    </div>
  </article>
@endsection