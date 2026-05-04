@extends('layouts.main')

@section('title', 'mail')
@section('content')
<div class="main-left-front"></div>
<div class="main-center-front">
  <div class="title-block-auth">
    <div class="title-box-auth">
      <p class="title-auth">Mail Us</p>
    </div>
  </div>
  {{-- <form method="POST" action="{{ route('login') }}" class="form-input-auth"> --}}
  <form method="POST" action="{{ route('mail.store')}}" class="form-input-auth">
    @csrf
    <div class="input-box-auth">
      <label class="input-lable-auth" hidden>User ID</label>            
      <input type="number" class="input-text-auth readonly" id="user_id" name="user_id" value="{{ auth()->id() }}" readonly hidden>          
    </div>
    <div class="input-box-auth first">
      <label class="input-lable-auth">User name</label>            
      <input type="text" class="input-text-auth readonly" id="username" name="username" value="{{ auth()->user()->name }}" readonly>           
    </div>
    <div class="input-box-auth">
      <label class="input-lable-auth">E-mail</label>            
      <input type="email" class="input-text-auth readonly" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
      {{-- @error('email')
          <span class="error">{{ $message }}</span>
      @enderror              --}}
    </div>
    <div class="input-box-auth" name="description-box">
        <label for="description" class="input-lable-auth">Description</label>
        <textarea class="input-text-auth area" name="description" id="description" autofocus></textarea>            
    </div>
    <div class="input-box-auth">
      <label class="input-lable-auth" hidden>Status</label>            
      <input type="text" class="input-text-auth readonly" id="status" name="status" value="{{ $status }}" readonly hidden>          
    </div>

    <div class="input-box-auth mail-buttons">
      <button type="submit" class="btn-form-auth">Send</button>
      <button type="button" class="btn-form-auth" onclick="history.back()">Cancel</button>
    </div> 

  </form>
</div>
<div class="main-right-front"></div>
@endsection


