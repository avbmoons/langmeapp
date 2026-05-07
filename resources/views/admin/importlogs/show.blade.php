@extends('layouts.admin')

@section('title', 'Admin.Import.Create')

@section('content')
  <div class="admin-content">
    <section class="forms-head-block admin">
      <div class="title-block">
        <div class="title-box">
          <p class="title">Import csv show</p>
        </div>
      </div>
    </section>
    {{-- @if ($errors->any())
      @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>        
      @endforeach        
    @endif
    <form method="post" action="{{ route('admin.importlogs.store') }}" class="form-input admin" enctype="multipart/form-data">
      @csrf
      <div class="input-box" name="btns-box">
        <div class="input-group">
          <input type="file" class="input-text" name="csv_file">
          <button type="submit" class="btn-form">Import start</button>          
          <a class="btn-form cancel" href="{{ route('admin.importlogs.index') }}">Cancel</a>       
        </div>
      </div> 
    </form> --}}

    @if ($importLog)
      {{-- <div class="alert {{ $importLog->status === 'success' ? 'alert-success' : 'alert-warning' }}">
        <h4>Import result: {{ $importLog->filename }}</h4>
        <p><strong>Status: </strong> {{ strtoupper($importLog->status) }}</p>
        <p><strong>Rows processed: </strong> {{ $importLog->rows_processed }}</p>
        <hr>
        <p><strong>Details: </strong> {{ $importLog->message }}</p>

        <a href="{{ route('admin.importlogs.index')}}" class="btn btn-link">Go to all logs</a>
      </div> --}}
      <div class="form-input" style="margin-bottom: 0; margin-top: 0;">
        <div class="input-box admin" name="filename-box">
          <label for="filename" class="input-lable">Import file</label>            
          <input type="text" class="input-text notread" name="filename" id="filename" value="{{ $importLog->filename }}" readonly>              
        </div>
        <div class="input-group show">
          <div class="input-box mini" name="status-box">
            <label for="status" class="input-lable">Import status</label>            
            <input type="text" class="input-text notread" name="status" id="status" value="{{ strtoupper($importLog->status) }}" readonly>              
          </div>
          <div class="input-box mini" name="rows-box">
            <label for="rows" class="input-lable">Rows processed</label>            
            <input type="text" class="input-text notread" name="rows" id="rows" value="{{ $importLog->rows_processed }}" readonly>              
          </div>
        </div>
        <div class="input-box" name="details-box">
          <label for="details" class="input-lable">Details</label>            
          <input type="text" class="input-text notread" name="details" id="details" value="{{ $importLog->message }}" readonly>              
        </div>
        <div class="input-box" name="btns-box">
          <div class="input-group">
            <a class="btn-form close-back" href="{{ route('admin.importlogs.index') }}">Close</a>       
          </div>
        </div>        
      </div>

      @php $currentLog = $importLog; @endphp

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