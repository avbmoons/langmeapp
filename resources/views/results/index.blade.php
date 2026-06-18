@extends('layouts.main')

@section('title', 'Results')
@section('content')
<div class="main-left-front"></div>
<div class="main-center-front-task guide">
  <div class="task-info" style="margin-top: 40px;">
    <div class="info-title-block results">
      <p class="info-title" >{{ __('Results for user') }}: <strong>{{ auth()->user()->name }}</strong></p>      
    </div>
    <div class="info-service-block">
      <button onclick="window.print()" class="btn-print" id="btnPrint">{{ __('Save to PDF') }}</button>
    </div>
  </div>
  <section class="table-block" style="margin-top: 40px; margin-bottom: 40px;">
    <table style="width: 100%; margin-left: 0; margin-right: 0;">
      <thead>
        <tr>
          <th class="th-id">#ID</th>          
          <th>{{ __('Mode') }}</th>
          <th>{{ __('Langs') }}</th>
          <th>{{ __('Themes') }}</th>
          <th>{{ __('Enjoy score') }}</th>
          {{-- <th>Normal score</th> --}}
          <th>{{ __('Worry score') }}</th>
          <th>{{ __('User') }}</th>
          <th class="th-fixed">{{ __('Updated') }}</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($tasksList as $task)
        <tr>
          <td>{{ $task->id }}</td>
          <td>{{ $task->modes->title }}</td>
          <td>
            @if (!empty($task->langs_ids) && is_array($task->langs_ids))
              @foreach ($task->langs_ids as $id)
                <span class="badge badge-info">
                  {{ $langs[$id] ?? 'Lang #' . $id }}
                </span>                  
              @endforeach
            @else
                <span class="text-muted">No langs</span>                
            @endif
          </td>
          <td>
            @if (!empty($task->themes_ids) && is_array($task->themes_ids))
              @foreach ($task->themes_ids as $id)
                <span class="badge badge-info">
                  {{ $themes[$id] ?? 'Theme #' . $id }}
                </span>                  
              @endforeach
            @else
                <span class="text-muted">No themes</span>                
            @endif
          </td>
          <td>{{ $task->num_enjoy }}</td>
          {{-- <td>{{ $task->num_normal }}</td> --}}
          <td>{{ $task->num_worry }}</td>
          <td>{{ optional($task->users)->name }}</td>
          <td>{{ $task->updated_at->format('d.m.Y H:i') }}</td>
        </tr>
        @empty
          <tr>
            <td colspan="?">No tasks</td>
          </tr>
        @endforelse
      </tbody>
    </table>

    {{-- <div class="custom-pagination">
      {{ $tasksList->links() }}
    </div> --}}

  </section>  
</div>
<div class="main-right-front"></div>
    
@endsection

@push('js')
    {{-- get task --}}
    <script>
      let menuHeaderTaskLink = document.getElementById("menuHeaderTaskLink");
      let menuFooterTaskLink = document.getElementById("menuFooterTaskLink");

      let userModeChoice = localStorage.getItem('modeChoice').trim(); 

      menuHeaderTaskLink.addEventListener('click', function(event) {
        switch(userModeChoice) {
            case "Plain":
                menuHeaderTaskLink.href = "{{ route('taskPlain') }}";
                menuFooterTaskLink.href = "{{ route('taskPlain') }}";
                break;
            case "Choice":
                menuHeaderTaskLink.href = "{{ route('taskChoice') }}";
                menuFooterTaskLink.href = "{{ route('taskChoice') }}";
                break;
            case "Lang":
                menuHeaderTaskLink.href = "{{ route('taskLang') }}";
                menuFooterTaskLink.href = "{{ route('taskLang') }}";
                break;
            case "Mix":
                menuHeaderTaskLink.href = "{{ route('taskMix') }}";
                menuFooterTaskLink.href = "{{ route('taskMix') }}";
                break;
          }
      })      
    </script>
@endpush
