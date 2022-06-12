

@extends('front/master')

@section('main_content')

<?php

//  echo "<pre>";
//  print_r($result['0']);die;

?>

<header class="masthead" style="background-image: url('front/img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>{{$result['0']->name}}</h1>
            <span class="subheading">Add this field in the dataBase</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">

    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>{{$result['0']->description}}</p>
      </div>
    </div>

  </div>
 

  @endsection

