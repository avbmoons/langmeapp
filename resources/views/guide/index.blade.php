@extends('layouts.main')

@section('title', 'Guide')
@section('content')
  @include('guide.' . app()->getLocale())  
   
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
