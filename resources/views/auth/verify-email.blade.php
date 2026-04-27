@extends('layouts.main')

@section('title', 'Draft-auth view')
@section('content')
<div class="main-left-front"></div>
<div class="main-center-front">
  <div class="title-block-auth">
    <div class="title-box-auth">
      <p class="title-auth">Confirm your E-mail</p>
    </div>
    <div class="title-box-auth text-auth">
      <p class="terve-auth">Thanks for registering!</p>
      <p class="terve-auth">Please confirm your email address by clicking on the link we just sent you?</p>
    </div>
    @if (session('status') == 'verification-link-sent')
      <div class="alert">
        {{ __('A new confirmation link has been sent to the email address that you provided during registration.') }}
      </div>
    @endif
  </div>
  <div class="form-input-auth">
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
  </div>

  
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
