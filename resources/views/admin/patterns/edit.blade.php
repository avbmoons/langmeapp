@extends('layouts.admin')

@section('title', 'Admin.Patterns.Edit')

@section('content')
  <div class="admin-content">
    <section class="forms-head-block admin">
      <div class="title-block">
        <div class="title-box">
          <p class="title">Pattern edit</p>
        </div>
      </div>
    </section>
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>        
      @endforeach        
    @endif
    <form method="post" action="{{ route('admin.patterns.update', ['pattern' => $pattern]) }}" class="form-input admin">
      @csrf
      @method('put')
      <div class="input-box admin" name="title-box">
        <label for="title" class="input-lable">Title</label>            
        <input type="text" class="input-text" name="title" id="title" value="{{ $pattern->title }}" @error('title') is-invalid @enderror>              
      </div>
      <div class="input-box admin" name="lang-box">
        <label class="input-lable" for="lang_id">Lang</label>
        <select class="input-text" name="lang_id" id="lang_id" @error('lang_id') is-invalid @enderror>
          <option value="0">--Select lang--</option>
          @foreach ($langs as $lang)
            <option @if ($pattern->lang_id === $lang->id) selected @endif value="{{ $lang->id }}">{{ $lang->title }}</option>
          @endforeach
        </select>
        @error('lang_id') @enderror
      </div>
      <div class="input-box" name="description-box">
        <label for="description" class="input-lable">Description</label>
        <textarea class="input-text area" name="description" id="description">{{ $pattern->description }}</textarea>            
      </div>
      <div class="input-box" name="image-box">
        <div class="input-group">
          <div class="input-box mini" name="status-box">
            <label for="status" class="input-lable">Status</label>            
            <select class="input-text" name="status" id="status">
              @foreach ($statuses as $status)
                 <option @if($pattern->status === $status) selected @endif>{{ $status }}</option> 
              @endforeach              
            </select>
          </div>
        </div>
      </div>
      <div class="input-box" name="btns-box">
        <div class="input-group">
          <button type="submit" class="btn-form">Save & close</button>          
          {{-- <button type="reset" class="btn-form cancel">Clear</button>  --}}
          <a class="btn-form cancel" href="{{ route('admin.patterns.index') }}">Cancel</a>       
        </div>
      </div> 
      @error('title', 'lang_id')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </form>
  </div>
    
@endsection