@extends('layouts.admin')

@section('title', 'Admin.Langs.Create')

@section('content')
  <div class="admin-content">
    <section class="forms-head-block admin">
      <div class="title-block">
        <div class="title-box">
          <p class="title">Lang create</p>
        </div>
      </div>
    </section>
    <form method="post" action="{{ route('admin.langs.store') }}" class="form-input admin">
      @csrf
      <div class="input-box admin" name="title-box">
        <label for="title" class="input-lable">Title</label>            
        <input type="text" class="input-text" name="title" id="title" value="{{ old('title') }}">              
      </div>
      <div class="input-box" name="native-box">
        <label for="native" class="input-lable">Native</label>            
        <input type="text" class="input-text" name="native" id="native" value="{{ old('native') }}">              
      </div>
      <div class="input-box" name="alias-box">
        <label for="alias" class="input-lable">Alias</label>            
        <input type="text" class="input-text" name="alias" id="alias" value="{{ old('alias') }}">              
      </div>         
      <div class="input-box" name="image-box">
        <div class="input-group">
          <div class="input-box mini" name="code-box">
            <label for="code" class="input-lable">Code</label>
            <input type="number" class="input-text" name="code" id="code" value="{{ old('code') }}">            
          </div>
          <div class="input-box mini" name="status-box">
            <label for="status" class="input-lable">Status</label>            
            <select class="input-text" name="status" id="status">
              @foreach ($statuses as $status)
                 <option @if(old('status') === $status) selected @endif>{{ $status }}</option> 
              @endforeach              
            </select>
          </div>
          <div class="input-box mini" name="position-box">
            <label for="position" class="input-lable">Position</label>            
            <select class="input-text" name="position" id="position">
              @foreach ($positions as $position)
                 <option @if(old('position') === $position) selected @endif>{{ $position }}</option> 
              @endforeach
            </select>              
          </div> 
        </div>
      </div>
      <div class="input-box" name="btns-box">
        <div class="input-group">
          <button type="submit" class="btn-form">Save & close</button>          
          <button type="reset" class="btn-form cancel">Clear</button> 
          <a class="btn-form cancel" href="{{ route('admin.langs.index') }}">Cancel</a>       
        </div>
      </div> 
    </form>
  </div>
    
@endsection