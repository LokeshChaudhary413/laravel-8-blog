
@extends('front/master')


@section('main_content')
<header class="masthead" style="background-image: url('front/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Clear BLog</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
  @foreach($result as $list)  
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
          <a href="{{url('post/'.$list->slug)}}">
            <h2 class="post-title">
            {{$list->title}}
            </h2>
            <h3 class="post-subtitle">
            {{$list->short_desc}}
            </h3>
          </a>
          <p class="post-meta">Posted on {{$list->post_date}}</p>
        </div>
        <hr>
      </div>
    </div>
    @endforeach
  </div>


@endsection