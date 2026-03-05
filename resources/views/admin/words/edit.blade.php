@extends('layouts.admin')

@section('title', 'Admin.Words.Edit')

@section('content')
  <div class="admin-content">
    <section class="forms-head-block admin">
      <div class="title-block">
        <div class="title-box">
          <p class="title">Word edit</p>
        </div>
      </div>
    </section>
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>        
      @endforeach        
    @endif
    <form method="post" action="{{ route('admin.words.update', ['word' => $word]) }}" class="form-input admin">
      @csrf
      @method('put')
      <div class="input-box admin" name="title-box">
        <label for="title" class="input-lable">Title</label>            
        <input type="text" class="input-text" name="title" id="title" value="{{ $word->title }}" @error('title') is-invalid @enderror>              
      </div>
      <div class="input-box admin" name="themes-box">
        <label class="input-lable" for="theme_ids">Theme</label>
        <select class="input-text multiple" name="theme_ids[]" id="theme_ids" @error('theme_ids[]') is-invalid @enderror multiple>
          <option value="0">--Select theme--</option>
          @foreach ($themes as $theme)
            <option @if (in_array($theme->id, $word->themes->pluck('id')->toArray())) selected @endif value="{{ $theme->id }}">{{ $theme->title }}</option>
          @endforeach
        </select>
        @error('theme_ids') @enderror
      </div>
      <div class="input-box" name="image-box">
        <div class="input-group">
          <div class="input-box mini" name="code-box">
            <label for="code" class="input-lable">Code</label>
            <input type="number" class="input-text" name="code" id="code" value="{{ $word->code }}" @error('code') is-invalid @enderror>            
          </div>
          <div class="input-box mini" name="status-box">
            <label for="status" class="input-lable">Status</label>            
            <select class="input-text" name="status" id="status">
              @foreach ($statuses as $status)
                 <option @if($word->status === $status) selected @endif>{{ $status }}</option> 
              @endforeach              
            </select>
          </div>
        </div>
      </div>
      <div class="input-box" name="btns-box">
        <div class="input-group">
          <button type="submit" class="btn-form">Save & close</button>          
          {{-- <button type="reset" class="btn-form cancel">Clear</button>  --}}
          <a class="btn-form cancel" href="{{ route('admin.words.index') }}">Cancel</a>       
        </div>
      </div> 
      @error('title', 'code', 'theme_ids')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </form>
  </div>
    
@endsection