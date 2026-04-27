@extends('layouts.admin')

@section('title', 'Admin.Users.Create')

@section('content')
  <div class="admin-content">
    <section class="forms-head-block admin">
      <div class="title-block">
        <div class="title-box">
          <p class="title">User create</p>
        </div>
      </div>
    </section>
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>        
      @endforeach        
    @endif
    <form method="post" action="{{ route('admin.users.store') }}" class="form-input admin">
      @csrf
      <div class="input-box first" name="status-box">
            <label for="is_admin" class="input-lable">IsAdmin</label>            
            <select class="input-text" name="is_admin" id="is_admin">
              @foreach ($isAdmins as $isAdmin)
                 <option @if(old('is_admin') === $isAdmin) selected @endif>{{ $isAdmin }}</option> 
              @endforeach              
            </select>
      </div>
      {{-- <div class="input-box admin" name="title-box">
        <label for="is_admin" class="input-lable">IsAdmin</label>            
        <input type="text" class="input-text" name="is_admin" id="is_admin" value="{{ old('is_admin') }}" @error('is_admin') is-invalid @enderror>              
      </div> --}}
      <div class="input-box admin" name="title-box">
        <label for="name" class="input-lable">Name</label>            
        <input type="text" class="input-text" name="name" id="name" value="{{ old('name') }}" @error('name') is-invalid @enderror>              
      </div>
      <div class="input-box admin" name="title-box">
        <label for="email" class="input-lable">E-mail</label>            
        <input type="email" class="input-text" name="email" id="email" value="{{ old('email') }}" @error('email') is-invalid @enderror>              
      </div>
      <div class="input-box admin" name="title-box">
        <label for="password" class="input-lable">Password</label>            
        <input type="text" class="input-text" name="password" id="password" value="{{ old('password') }}" @error('password') is-invalid @enderror>              
      </div>
      <div class="input-box" name="btns-box">
        <div class="input-group">
          <button type="submit" class="btn-form">Save & close</button>          
          <button type="reset" class="btn-form cancel">Clear</button> 
          <a class="btn-form cancel" href="{{ route('admin.users.index') }}">Cancel</a>       
        </div>
      </div> 
      @error('name', 'email', 'password')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </form>
  </div>
    
@endsection