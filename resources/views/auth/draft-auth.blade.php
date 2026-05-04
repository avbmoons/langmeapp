@extends('layouts.main')

@section('title', 'Draft-auth view')
@section('content')
<div class="main-left-front">
  {{-- <a href="{{ route('login') }}">LOGIN</a> --}}
</div>
<div class="main-center-front">
  <div class="title-block-auth single-title-block">
    <div class="title-box-auth">
      <p class="title-auth">Confirm your E-mail</p>
    </div>
    <div class="title-box-auth text-auth">
      <p class="terve-auth">Thank your for registering!</p>
      <p class="terve-auth">Please confirm your email address by clicking on the link we just sent you!</p>
    </div>
    @if (session('status') == 'verification-link-sent')
      <div class="alert">
        {{ __('A new confirmation link has been sent to the email address that you provided during registration.') }}
      </div>
    @endif
  </div>
  <div class="form-input-auth single-btn-block">
    <form method="POST" action="{{ route('verification.send') }}" class="form-input-auth single-btn">
      @csrf
      <div class="input-box-auth">
        <button type="submit" class="btn-form-auth link-btn">Resend the message</button>
      </div> 
    </form>    
    <form method="POST" action="{{ route('logout') }}" class="form-input-auth single-btn">
    @csrf
    <div class="input-box-auth">
      <button type="submit" class="btn-form-auth exit-btn">Exit</button>
    </div> 
  </form>
  <a href="{{ route('social.auth.redirect', ['driver' => 'github']) }}"><strong>Enter with GitHub</strong></a>
  </div>

  
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
