@extends('layouts.app')
@push('styles')
@endpush
@section('title', 'index')
@section('content')
    <div class="columns is-fullheight">
        <div class="column left-side is-half-desktop is-hidden-touch">
            <section class="hero is-fullheight is-default is-bold">
                <div class="hero-body">
                    <div class="container has-text-centered welcome">
                        <div>
                            <div class="title is-1">Anonymous Blog</div>
                            <div class="title is-5">Say what you want to say.<br><br>
                                <a class="button is-primary write">Write a post</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="column right-side is-half-desktop is-full-mobile">
            <nav class="nav is-hidden-tablet">
                <div class="nav-left">
                    <a class="nav-item is-brand" href="#">
                        GEO BLOG
                    </a>
                </div>

                <div class="nav-center">
                    <a class="nav-item" href="#">
            <span class="icon">
              <i class="fa fa-github"></i>
            </span>
                    </a>
                    <a class="nav-item" href="#">
            <span class="icon">
              <i class="fa fa-twitter"></i>
            </span>
                    </a>
                </div>

                <span class="nav-toggle">
          <span></span>
          <span></span>
          <span></span>
        </span>

                <div class="nav-right nav-menu">
                    <a class="nav-item" href="#">
                        Home
                    </a>
                    <a class="nav-item write" href="#">
                        Write a post
                    </a>

                    <span class="nav-item">
            <a class="button" >
              <span class="icon">
                <i class="fa fa-twitter"></i>
              </span>
              <span>Tweet</span>
            </a>
            <a class="button is-primary" href="#">
              <span class="icon">
                <i class="fa fa-download"></i>
              </span>
              <span>Download</span>
            </a>
          </span>
                </div>
            </nav>
            @include('includes.form')
            @include('includes.list')
        </div>
    </div>
@endsection
@push('scripts')
@endpush