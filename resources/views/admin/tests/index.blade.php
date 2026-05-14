@extends('layouts.admin')

@section('title', 'Admin.Tests')

@section('content')
<div class="admin-content">
  <section class="head-block2"></section>
  <section class="head-block">
    <div class="title-block">
      <div class="title-box">
        <p class="title">Tests</p>
      </div>
    </div>
    <div class="services-block">
      <div class="services-box">
        <div class="search-block">
          <div class="search-box">
            <input type="text" class="input-search" placeholder="Search"/>
            <a href="">
              <button class="btn-search">
                <img src="{{ Vite::asset('resources/images/icons/icon-Search.svg') }}" alt="search">
              </button>
            </a>
          </div>
        </div>
        <div class="add-block" >
          <div class="add-box">            
              <button class="btn-add">
                <a href="">
                <svg class="img-add" width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M16.875 16.875V5.25H19.125V16.875H30.75V19.125H19.125V30.75H16.875V19.125H5.25V16.875H16.875Z" fill="#1B1357"/>
                </svg>
                </a>
              </button>            
            <p class="lable-add">Add notification</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="table-block"></section>
</div>
    
@endsection
