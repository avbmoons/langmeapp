@extends('layouts.main')

@section('title', 'forgot-password')
@section('content')
<div class="main-left-front"></div>
<div class="main-center-front">
  <div class="title-block-auth">
    <div class="title-box-auth">
      <p class="title-auth">Forgot your password?</p>
    </div>
  </div>
  <form method="POST" action="{{ route('password.email') }}" class="form-input-auth">
    @csrf
    <div class="input-box-auth first">
      <label class="input-lable-auth">E-mail</label>            
      <input type="email" class="input-text-auth" name="email" value="{{ old('email') }}" autofocus>              
    </div>
    <div class="input-box-auth">
      <button type="submit" class="btn-form-auth">Send link</button>
    </div> 
  </form>
</div>
<div class="main-right-front">
  {{-- <button><a href="{{ route('password.update')}}">to reset password</a></button> --}}
</div>
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
