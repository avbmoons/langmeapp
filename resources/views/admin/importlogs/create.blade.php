@extends('layouts.admin')

@section('title', 'Admin.Import.Create')

@section('content')
  <div class="admin-content">
    <section class="forms-head-block admin">
      <div class="title-block">
        <div class="title-box">
          <p class="title">Import csv create</p>
        </div>
      </div>
    </section>
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>        
      @endforeach        
    @endif
    <form method="post" action="{{ route('admin.importlogs.store') }}" class="form-input admin" enctype="multipart/form-data" style="margin-bottom: 20px;">
      @csrf
      {{-- <div class="input-box admin" name="title-box">
        <label for="title" class="input-lable">Title</label>            
        <input type="text" class="input-text" name="title" id="title" value="{{ old('title') }}" @error('title_base') is-invalid @enderror>              
      </div>
      <div class="input-box" name="description-box">
        <label for="description" class="input-lable">Description</label>
        <textarea class="input-text area" name="description" id="description">{{ old('description') }}</textarea>            
      </div>     
      <div class="input-box" name="image-box">
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
        <div class="input-group" >
          <div class="input-box file-button" name="file-box" style="width: 100%; margin-bottom: 0; margin-top: 20px;">
            <label for="csv_file" class="input-lable file-label" style="width: 22.5%">Select file</label>
            <input type="file" class="input-text file-input" name="csv_file" id="csv_file" style="height: 60px;">
            <span class="file-name">File not selected</span>
          </div>
        </div>
      </div>
      <div class="input-box" name="btns-box">
        <div class="input-group import-buttons">
          {{-- <input type="file" class="input-text" name="csv_file"> --}}
          <button type="submit" class="btn-form" style="margin-top: 0; margin-bottom: 0;">Import start</button>          
          {{-- <button type="reset" class="btn-form cancel">Clear</button>  --}}
          <a class="btn-form cancel" href="{{ route('admin.importlogs.index') }}" style="margin-top: 0; margin-bottom: 0;">Close</a>       
        </div>
      </div> 
      {{-- @error('title', 'code')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror --}}
    </form>

    @if ($lastLog)
      {{-- <div class="alert {{ $lastLog->status === 'success' ? 'alert-success' : 'alert-warning' }}">
        <h4>Import result: {{ $lastLog->filename }}</h4>
        <p><strong>Status: </strong> {{ strtoupper($lastLog->status) }}</p>
        <p><strong>Rows processed: </strong> {{ $lastLog->rows_processed }}</p>
        <hr>
        <p><strong>Details: </strong> {{ $lastLog->message }}</p>

        <a href="{{ route('admin.importlogs.index')}}" class="btn btn-link">Go to all logs</a>
      </div> --}}

      <div class="form-input" style="margin-bottom: 0; margin-top: 0;">
        <div class="input-box admin" name="filename-box">
          <label for="filename" class="input-lable">Import file</label>            
          <input type="text" class="input-text notread" name="filename" id="filename" value="{{ $lastLog->filename }}" readonly>              
        </div>
        <div class="input-group show">
          <div class="input-box mini" name="status-box">
            <label for="status" class="input-lable">Import status</label>            
            <input type="text" class="input-text notread" name="status" id="status" value="{{ strtoupper($lastLog->status) }}" readonly>              
          </div>
          <div class="input-box mini" name="rows-box">
            <label for="rows" class="input-lable">Rows processed</label>            
            <input type="text" class="input-text notread" name="rows" id="rows" value="{{ $lastLog->rows_processed }}" readonly>              
          </div>
        </div>
        <div class="input-box" name="details-box">
          <label for="details" class="input-lable">Details</label>            
          <input type="text" class="input-text notread" name="details" id="details" value="{{ $lastLog->message }}" readonly>              
        </div>
        {{-- <div class="input-box" name="btns-box">
          <div class="input-group">
            <a class="btn-form close-back" href="{{ route('admin.importlogs.index') }}">Close</a>       
          </div>
        </div> --}}
      </div>

      @php $currentLog = $lastLog; @endphp

      {{-- <div class="alert alert-info">File import results: {{ $currentLog->filename }}</div> --}}
      <section class="forms-head-block admin">
        <div class="title-block">
          <div class="title-box">
            <p class="title">File <strong>{{ $currentLog->filename }}</strong> import results</p>
          </div>
        </div>
      </section>

      <section class="table-block" style="margin-top: 0; margin-bottom: 20px;">
        <table class="table">
          <thead>
            <tr>
              <th>#ID</th>
              <th>Pattern ID</th>
              <th>Word ID</th>
              <th>Translation</th>
              <th>Spell base</th>
              <th>Spell eng</th>
              <th>Status</th>
              <th>Import status</th>
              <th>Updated at</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($importDrafts as $importDraft)
              <tr>
                <td>{{ $importDraft->id }}</td>
                <td>{{ $importDraft->pattern_id }}</td>
                <td>{{ $importDraft->word_id }}</td>
                <td>{{ $importDraft->translation }}</td>
                <td>{{ $importDraft->spell_base }}</td>
                <td>{{ $importDraft->spell_eng }}</td>
                <td>{{ $importDraft->status }}</td>
                <td>
                  @if ($importDraft->created_at->eq($importDraft->updated_at))
                    <span class="badge bg-success">Added</span>
                  @else
                    <span class="badge bg-primary">Renew</span>                
                  @endif
                </td>
                <td>{{ $importDraft->updated_at }}</td>
              </tr>              
            @endforeach
          </tbody>
        </table>
      </section>        
    @endif
  </div>
    
@endsection

@push('js')
  <script>
    const fileInput = document.querySelector('.file-input');
    const fileNameSpan = document.querySelector('.file-name');

    fileInput.addEventListener('change', function() {
      const fileName = this.files[0] ? this.files[0].name : "File not selected";

      fileNameSpan.textContent = fileName;
    });
  </script>    
@endpush