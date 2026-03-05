@extends('layouts.admin')

@section('title', 'Admin.Tasks.Create')

@section('content')
  <div class="admin-content">
    <section class="forms-head-block admin">
      <div class="title-block">
        <div class="title-box">
          <p class="title">Task create</p>
        </div>
      </div>
    </section>
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>        
      @endforeach        
    @endif
    <form method="post" action="{{ route('admin.tasks.store') }}" class="form-input admin">
      @csrf
      <div class="input-box admin" name="mode-box">
        <label class="input-lable" for="mode_id">Mode</label>
        <select class="input-text" name="mode_id" id="mode_id" @error('mode_id') is-invalid @enderror>
          <option value="0">--Select mode--</option>
          @foreach ($modes as $mode)
            <option @if ((int) old('mode_id') === $mode->id) selected @endif value="{{ $mode->id }}">{{ $mode->title }}</option>
          @endforeach
        </select>
        @error('mode_id') @enderror
      </div>
      <div class="input-box admin" name="langs-box">
        <label class="input-lable" for="lang_ids">Langs</label>
        <select class="input-text multiple" name="lang_ids[]" id="lang_ids" @error('lang_ids[]') is-invalid @enderror multiple>
          <option value="0">--Select langs--</option>
          @foreach ($langs as $lang)
            <option @if ((int) old('lang_id') === $lang->id) selected @endif value="{{ $lang->id }}">{{ $lang->title }}</option>
          @endforeach
        </select>
        @error('lang_ids') @enderror
      </div>
      <div class="input-box admin" name="themes-box">
        <label class="input-lable" for="theme_ids">Theme</label>
        <select class="input-text multiple" name="theme_ids[]" id="theme_ids" @error('theme_ids[]') is-invalid @enderror multiple>
          <option value="0">--Select theme--</option>
          @foreach ($themes as $theme)
            <option @if ((int) old('theme_id') === $theme->id) selected @endif value="{{ $theme->id }}">{{ $theme->title }}</option>
          @endforeach
        </select>
        @error('theme_ids') @enderror
      </div>
      <div class="input-box admin" name="num-enjoy-box">
        <label for="num_enjoy" class="input-lable">Score enjoy</label>            
        <input type="number" class="input-text" name="num_enjoy" id="num_enjoy" value="{{ old('num_enjoy') }}" @error('num_enjoy') is-invalid @enderror>              
      </div> 
      <div class="input-box admin" name="num-normal-box">
        <label for="num_normal" class="input-lable">Score normal</label>            
        <input type="number" class="input-text" name="num_normal" id="num_normal" value="{{ old('num_normal') }}" @error('num_normal') is-invalid @enderror>              
      </div>
      <div class="input-box admin" name="num-worry-box">
        <label for="num_worry" class="input-lable">Score worry</label>            
        <input type="number" class="input-text" name="num_worry" id="num_worry" value="{{ old('num_worry') }}" @error('num_worry') is-invalid @enderror>              
      </div>     
      <div class="input-box" name="image-box">
        <div class="input-group">
          <div class="input-box mini" name="status-box">
            <label for="status" class="input-lable">Status</label>            
            <select class="input-text" name="status" id="status">
              @foreach ($statuses as $status)
                 <option @if(old('status') === $status) selected @endif>{{ $status }}</option> 
              @endforeach              
            </select>
          </div>
        </div>
      </div>
      <div class="input-box" name="btns-box">
        <div class="input-group">
          <button type="submit" class="btn-form">Save & close</button>          
          <button type="reset" class="btn-form cancel">Clear</button> 
          <a class="btn-form cancel" href="{{ route('admin.tasks.index') }}">Cancel</a>       
        </div>
      </div> 
      @error('mode_id', 'lang_ids', 'theme_ids', 'num_enjoy', 'num_normal', 'num_worry')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </form>
  </div>
    
@endsection