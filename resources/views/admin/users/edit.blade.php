@extends('layouts.admin')

@section('title', 'Admin.Users.Edit')

@section('content')
  <div class="admin-content">
    <section class="forms-head-block admin">
      <div class="title-block">
        <div class="title-box">
          <p class="title">User edit</p>
        </div>
      </div>
    </section>
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>        
      @endforeach        
    @endif
    <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}" class="form-input admin">
      @csrf
      @method ('put')
      <div class="input-box first" name="status-box">
            <label for="is_admin" class="input-lable">IsAdmin</label>            
            <select class="input-text" name="is_admin" id="is_admin">
              @foreach ($isAdmins as $isAdmin)
                 <option @if($user->is_admin === $isAdmin) selected @endif>{{ $isAdmin }}</option> 
              @endforeach              
            </select>
      </div>
      <div class="input-box admin" name="title-box">
        <label for="name" class="input-lable">Name</label>            
        <input type="text" class="input-text" name="name" id="name" value="{{ $user->name }}" @error('name') is-invalid @enderror>              
      </div>
      <div class="input-box admin" name="title-box">
        <label for="email" class="input-lable">E-mail</label>            
        <input type="email" class="input-text" name="email" id="email" value="{{ $user->email }}" @error('email') is-invalid @enderror>              
      </div>
      <div class="input-box admin" name="title-box">
        <label for="password" class="input-lable">Password</label>            
        <input type="text" class="input-text" name="password" id="password" value="{{ $user->password }}" @error('password') is-invalid @enderror>              
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