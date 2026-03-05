@extends('layouts.admin')

@section('title', 'Admin.Langs.Edit')

@section('content')
  <div class="admin-content">
    <section class="forms-head-block admin">
      <div class="title-block">
        <div class="title-box">
          <p class="title">Lang edit</p>
        </div>
      </div>
    </section>
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>        
      @endforeach        
    @endif
    <form method="post" action="{{ route('admin.langs.update', ['lang' => $lang]) }}" class="form-input admin">
      @csrf
      @method('put')
      <div class="input-box admin" name="title-box">
        <label for="title" class="input-lable">Title</label>            
        <input type="text" class="input-text" name="title" id="title" value="{{ $lang->title }}" @error('title') is-invalid @enderror>              
      </div>
      <div class="input-box" name="native-box">
        <label for="native" class="input-lable">Native</label>            
        <input type="text" class="input-text" name="native" id="native" value="{{ $lang->native }}" @error('native') is-invalid @enderror>              
      </div>
      <div class="input-box" name="alias-box">
        <label for="alias" class="input-lable">Alias</label>            
        <input type="text" class="input-text" name="alias" id="alias" value="{{ $lang->alias }}" @error('alias') is-invalid @enderror>              
      </div>         
      <div class="input-box" name="image-box">
        <div class="input-group">
          <div class="input-box mini edit" name="id-box">
            <label for="id-field" class="input-lable">ID#</label>
            <input type="text" class="input-text notread" name="id-field" id="id-field" value="{{ $lang->id }}" readonly>            
          </div>
          <div class="input-box mini edit" name="code-box">
            <label for="code" class="input-lable">Code</label>
            <input type="number" class="input-text" name="code" id="code" value="{{ $lang->code }}" @error('code') is-invalid @enderror>            
          </div>
          <div class="input-box mini edit" name="status-box">
            <label for="status" class="input-lable">Status</label>            
            <select class="input-text" name="status" id="status">
              @foreach ($statuses as $status)
                 <option @if($lang->status === $status) selected @endif>{{ $status }}</option> 
              @endforeach              
            </select>
          </div>
          <div class="input-box mini edit" name="position-box">
            <label for="position" class="input-lable">Position</label>            
            <select class="input-text" name="position" id="position">
              @foreach ($positions as $position)
                 <option @if($lang->position === $position) selected @endif>{{ $position }}</option> 
              @endforeach
            </select>              
          </div> 
        </div>
      </div>
      <div class="input-box" name="btns-box">
        <div class="input-group">
          <button type="submit" class="btn-form">Save & close</button>
          {{-- <button type="reset" class="btn-form cancel">Clear</button>           --}}
          <a class="btn-form cancel" href="{{ route('admin.langs.index') }}">Cancel</a>          
        </div>
      </div> 
      @error('title', 'code', 'native', 'alias')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </form>
  </div>
    
@endsection