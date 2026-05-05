@extends('layouts.admin')

@section('title', 'Admin.Notification.Create')

@section('content')
  <div class="admin-content">
    <section class="forms-head-block admin">
      <div class="title-block">
        <div class="title-box">
          <p class="title">Notification create</p>
        </div>
      </div>
    </section>
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>        
      @endforeach        
    @endif
    <form method="post" action="{{ route('admin.notifications.store') }}" class="form-input admin">
      @csrf
      <div class="input-box admin" name="title-box">
        <label for="email" class="input-lable">User E-mail</label>  
        <select class="input-text" name="user_id" id="user_id">
          @foreach (App\Models\User::all() as $user)
              <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
          @endforeach
        </select>          
        {{-- <input type="email" class="input-text" name="email" id="email" value="{{ old('email') }}" @error('email') is-invalid @enderror>               --}}
      </div>
      <div class="input-box admin" name="subject-box">
        <label for="subject" class="input-lable">Subject</label>            
        <input type="text" class="input-text" name="subject" id="subject" value="{{ old('subject') }}" @error('subject') is-invalid @enderror>              
      </div>
      <div class="input-box" name="description-box">
        <label for="message" class="input-lable">Message</label>
        <textarea class="input-text area" name="message" id="message">{{ old('message') }}</textarea>            
      </div>     
      {{-- <div class="input-box" name="image-box">
        <div class="input-group">
          <div class="input-box mini" name="code-box">
            <label for="code" class="input-lable">Code</label>
            <input type="number" class="input-text" name="code" id="code" value="{{ old('code') }}" @error('code') is-invalid @enderror>            
          </div>
          <div class="input-box mini" name="status-box">
            <label for="status" class="input-lable">Status</label>            
            <select class="input-text" name="status" id="status">
              @foreach ($statuses as $status)
                 <option @if(old('status') === $status) selected @endif>{{ $status }}</option> 
              @endforeach              
            </select>
          </div>
        </div>
      </div> --}}
      <div class="input-box" name="btns-box">
        <div class="input-group">
          <button type="submit" class="btn-form">Send & close</button>          
          <button type="reset" class="btn-form cancel">Clear</button> 
          <a class="btn-form cancel" href="{{ route('admin.notifications.index') }}">Cancel</a>       
        </div>
      </div> 
      @error('email', 'subject', 'message')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </form>
  </div>
    
@endsection