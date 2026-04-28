@extends('layouts.main')

@section('title', 'login')
@section('content')
<div class="main-left-front"></div>
<div class="main-center-front">
  <div class="title-block-auth">
    <div class="title-box-auth">
      <p class="title-auth">Sign In</p>
    </div>
  </div>
  <form method="POST" action="{{ route('login') }}" class="form-input-auth">
    @csrf
    <div class="input-box-auth first">
      <label class="input-lable-auth">E-mail</label>            
      <input type="email" class="input-text-auth" id="email" name="email" value="{{ old('email') }}">
      @error('email')
          <span class="error">{{ $message }}</span>
      @enderror             
    </div>
    <div class="input-box-auth">
      <label class="input-lable-auth">Password</label>            
      <input type="password" class="input-text-auth" id="password" name="password">  
      @error('password')
          <span class="error">{{ $message }}</span>
      @enderror            
    </div>
    <div class="input-box-auth">
      <label class="input-lable-auth">Remember me</label>            
      <input type="checkbox" class="input-text-auth check-box" id="remember_me" name="remember">              
    </div>
    <div class="input-box-auth">
      <a href="{{ route('password.request') }}" class="link-page-auth">Forgot your password?</a>   
     {{--  <a href="" class="link-page-auth">Forgot your password?</a> --}}           
    </div>
    <div class="input-box-auth">
      <a href="{{ route('register') }}" class="link-page-auth">Registration</a> 
      {{-- <a href="" class="link-page-auth">Registration</a>  --}}            
    </div>
    <div class="input-box-auth">
      <button type="submit" class="btn-form-auth">Sign In</button>
    </div> 

  </form>
</div>
<div class="main-right-front"></div>
@endsection

@push('js')
    <script defer>
      let thisPage = window.location.pathname;
      let thisPageName = thisPage.substring(thisPage.lastIndexOf("/") + 1);

      let btnEnter = document.getElementById('btnEnter');
      let btnAdmin = document.getElementById('btnAdmin');
      let btnEnterMobile = document.getElementById('btnEnterMobile');
      let btnAdminMobile = document.getElementById('btnAdminMobile');

      let menuHeaderTask = document.getElementById('menuHeaderTask');
      let menuHeaderResults = document.getElementById('menuHeaderResults');

      let menuFooterTask = document.getElementById('menuFooterTask');
      let menuFooterResults = document.getElementById('menuFooterResults');
      
      //if (thisPage.includes('login') || thisPage.includes('register')) {
       //btnEnter.style.visibility = "hidden";
       //btnAdmin.style.visibility = "hidden";
       //btnEnterMobile.style.visibility = "hidden";
       //btnAdminMobile.style.visibility = "hidden";

      //  menuHeaderTask.style.visibility = 'hidden';
      //  menuHeaderResults.style.visibility = 'hidden';

       menuHeaderTask.style.display = 'none';
       menuHeaderResults.style.display = 'none';

      //  menuFooterTask.style.visibility = 'hidden';
      //  menuFooterResults.style.visibility = 'hidden';

       menuFooterTask.style.display = 'none';
       menuFooterResults.style.display = 'none';
      //} 

    </script>
@endpush
