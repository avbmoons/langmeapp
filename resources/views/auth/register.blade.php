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
  {{-- Errors output block --}}
  @if ($errors->any())
    <div class="mb-4 text-red-600">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>      
  @endif
  <form method="POST" action="{{ route('register') }}" class="form-input-auth">
    @csrf
    <div class="input-box-auth first">
      <label class="input-lable-auth">Name</label>            
      <input type="text" class="input-text-auth" name="name" value="{{ old('name') }}" required autofocus>              
    </div>
    <div class="input-box-auth">
      <label class="input-lable-auth">E-mail</label>            
      <input type="email" class="input-text-auth" name="email" value="{{ old('email') }}" required>              
    </div>
    <div class="input-box-auth">
      <label class="input-lable-auth">Password</label>            
      <input type="password" class="input-text-auth" name="password" required>              
    </div>
    <div class="input-box-auth">
      <label class="input-lable-auth">Password confirmation</label>            
      <input type="password" class="input-text-auth" name="password_confirmation" required>              
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
