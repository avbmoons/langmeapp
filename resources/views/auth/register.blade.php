@extends('layouts.main')

@section('title', 'registration')
@section('content')
<div class="main-left-front"></div>
<div class="main-center-front">
  <div class="title-block-auth">
    <div class="title-box-auth">
      <p class="title-auth">Registration</p>
    </div>
  </div>
  <form method="POST" action="{{ route('register') }}" class="form-input-auth">
    @csrf
    <div class="input-box-auth first">
      <label class="input-lable-auth">Name</label>            
      <input type="text" class="input-text-auth" name="name" value="{{ old('name') }}">              
    </div>
    <div class="input-box-auth">
      <label class="input-lable-auth">E-mail</label>            
      <input type="email" class="input-text-auth" name="email" value="{{ old('email') }}">              
    </div>
    <div class="input-box-auth">
      <label class="input-lable-auth">Password</label>            
      <input type="password" class="input-text-auth" name="password">              
    </div>
    <div class="input-box-auth">
      <label class="input-lable-auth">Password confirmation</label>            
      <input type="password" class="input-text-auth" name="password_confirmation">              
    </div>
    <div class="input-box-auth">
      <button type="submit" class="btn-form-auth">Register</button>
    </div> 
  </form>
</div>
<div class="main-right-front"></div>
@endsection

@push('js')
    <script defer>
      let thisPage = window.location.pathname;
      let thisPageName = thisPage.substring(thisPage.lastIndexOf("/") + 1);
      //let menuFrontHeader = document.getElementById('menuFrontHeader');
      let menuFrontFooter = document.getElementById('menuFrontFooter');
      let btnEnter = document.getElementById('btnEnter');
      let btnAdmin = document.getElementById('btnAdmin');
      let btnEnterMobile = document.getElementById('btnEnterMobile');
      let btnAdminMobile = document.getElementById('btnAdminMobile');
      let menuHeaderHome = document.getElementById('menuHeaderHome');
      let menuHeaderTask = document.getElementById('menuHeaderTask');
      let menuHeaderGuide = document.getElementById('menuHeaderGuide');
      let menuHeaderResults = document.getElementById('menuHeaderResults');
      let menuHeaderAbout = document.getElementById('menuHeaderAbout');

      
      if (thisPage.includes('draftAuth') || thisPage.includes('login') || thisPage.includes('register')) {
       console.log("thisPage = " + "draft-auth"); 
       //menuFrontHeader.style.visibility = 'hidden';
       menuHeaderTask.style.visibility = 'hidden';
       menuHeaderGuide.style.visibility = 'hidden';
       menuHeaderResults.style.visibility = 'hidden';
       menuHeaderAbout.style.visibility = 'hidden';
       menuFrontFooter.style.visibility = "hidden";
       btnEnter.style.visibility = "hidden";
       btnAdmin.style.visibility = "hidden";
       btnEnterMobile.style.visibility = "hidden";
       btnAdminMobile.style.visibility = "hidden";
       //menuHeaderHome.style.visibility - "visible";
      } 
      // else {
      //   console.log("thisPage = " + "other");
      // }

    </script>
@endpush
