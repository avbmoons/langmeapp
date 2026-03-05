@extends('layouts.admin')

@section('title', 'Admin.Lexicons.Edit')

@section('content')
  <div class="admin-content">
    <section class="forms-head-block admin">
      <div class="title-block">
        <div class="title-box">
          <p class="title">Lexicon edit</p>
        </div>
      </div>
    </section>
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>        
      @endforeach        
    @endif
    <form method="post" action="{{ route('admin.lexicons.update', ['lexicon' => $lexicon]) }}" class="form-input admin">
      @csrf
      @method('put')
      <div class="input-box admin" name="word-box">
        <label class="input-lable" for="word_id">Word</label>
        <select class="input-text" name="word_id" id="word_id" @error('word_id') is-invalid @enderror>
          <option value="0">--Select word--</option>
          @foreach ($words as $word)
            <option @if ($lexicon->word_id === $word->id) selected @endif value="{{ $word->id }}">{{ $word->title }}</option>
          @endforeach
        </select>
        @error('word_id') @enderror
      </div>
      <div class="input-box admin" name="pattern-box">
        <label class="input-lable" for="pattern_id">Pattern</label>
        <select class="input-text" name="pattern_id" id="pattern_id" @error('pattern_id') is-invalid @enderror>
          <option value="0">--Select pattern--</option>
          @foreach ($patterns as $pattern)
            <option @if ($lexicon->pattern_id === $pattern->id) selected @endif value="{{ $pattern->id }}">{{ $pattern->title }}</option>
          @endforeach
        </select>
        @error('pattern_id') @enderror
      </div>
      <div class="input-box admin" name="translation-box">
        <label for="title" class="input-lable">Translation</label>            
        <input type="text" class="input-text" name="translation" id="translation" value="{{ $lexicon->translation }}" @error('translation') is-invalid @enderror>              
      </div>
      {{-- <div class="input-box admin" name="lang-box">
        <label class="input-lable" for="lang_id">Lang</label>
        <select class="input-text" name="lang_id" id="lang_id" @error('lang_id') is-invalid @enderror>
          <option value="0">--Select lang--</option>
          @foreach ($langs as $lang)
            <option @if ((int) old('lang_id') === $lang->id) selected @endif value="{{ $lang->id }}">{{ $lang->title }}</option>
          @endforeach
        </select>
        @error('lang_id') @enderror
      </div> --}}
      <div class="input-box admin" name="spell-base-box">
        <label for="spell_base" class="input-lable">Spelling base</label>            
        <input type="text" class="input-text" name="spell_base" id="spell_base" value="{{ $lexicon->spell_base }}" @error('spell_base') is-invalid @enderror>              
      </div>
      <div class="input-box admin" name="spell-eng-box">
        <label for="spell_eng" class="input-lable">Spelling eng</label>            
        <input type="text" class="input-text" name="spell_eng" id="spell_eng" value="{{ $lexicon->spell_eng }}" @error('spell_eng') is-invalid @enderror>              
      </div>
      <div class="input-box" name="image-box">
        <div class="input-group">
          <div class="input-box mini" name="status-box">
            <label for="status" class="input-lable">Status</label>            
            <select class="input-text" name="status" id="status">
              @foreach ($statuses as $status)
                 <option @if($lexicon->status === $status) selected @endif>{{ $status }}</option> 
              @endforeach              
            </select>
          </div>
        </div>
      </div>
      <div class="input-box" name="btns-box">
        <div class="input-group">
          <button type="submit" class="btn-form">Save & close</button>          
          {{-- <button type="reset" class="btn-form cancel">Clear</button>  --}}
          <a class="btn-form cancel" href="{{ route('admin.lexicons.index') }}">Cancel</a>       
        </div>
      </div> 
      @error('translation', 'spell_base', 'word_id', 'pattern_id')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </form>
  </div>
    
@endsection