@extends('layouts.main')

@section('title', 'About')
@section('content')

<div class="main-left-front">
  <x-tutors-button></x-tutors-button>
</div>
<div class="main-center-front-task">
    <div class="task-info info-about">
      <div class="info-title-block about">
        <p class="info-title">About project</p>
      </div>
      <div class="info-content-block-about">
        <details name="faq" open>
          <summary>What we doing</summary>
          <div class="content-about">
            <p class="text-about">&#9679;&emsp;We show the basic concepts in several languages at ones</p>
            <p class="text-about">&#9679;&emsp;We are giving you some modes so that these several languages don't get confused when you speak one of them.</p>
            <p class="text-about">&#9679;&emsp;We keep a history of your exercises so that you can see the progress.</p>            
          </div>
        </details>
        <details name="faq">
          <summary>How it working</summary>
          <div class="content-about">
            <p class="text-about">&#9679;&emsp;You choose the base language that you want to compare other languages with, such as your native language.</p>
            <p class="text-about">&#9679;&emsp;You choose the languages with which you want to compare the basic concepts of the base language.</p>
            <p class="text-about">&#9679;&emsp;You choose the topics of the basic concepts that interest you.</p>
            <p class="text-about">&#9679;&emsp;You choose a mode and work with the selected vocabulary.</p>
            <p class="text-about">&#9679;&emsp;You are viewing the results of your tasks</p>
            <p class="text-about">&#9679;&emsp;You can also save your task history if you register.</p>
          </div>
        </details>
        <details name="faq">
          <summary>We have now</summary>
          <div class="content-about">
            <p class="text-about">&#9679;&emsp;Six languages: Russian, English, Armenian, Greek, Finnish, Latvian</p>
            <p class="text-about">&#9679;&emsp;Fifty topics: from numbers to verbs</p>
            <p class="text-about">&#9679;&emsp;Four operating  modes</p>
            <p class="text-about">&#9679;&emsp;The results of your tasks in the current session, regardless of registration.</p>
            <p class="text-about">&#9679;&emsp;The history of the results of your tasks, if you register.</p>
            <p class="text-about">&#9679;&emsp;Sending your feedback and requests to upload a history of your results if you register</p>
          </div>
        </details>
        <details name="faq">
          <summary>What we planing</summary>
          <div class="content-about">
            <p class="text-about">&#9679;&emsp;Expand the language composition</p>
            <p class="text-about">&#9679;&emsp;Supplement the vocabulary of dictionaries</p>
            <p class="text-about">&#9679;&emsp;Add operating modes</p>            
            <p class="text-about">&#9679;&emsp;Provide an independent review of the task history for you</p>
            <p class="text-about">&#9679;&emsp;Develop a mobile application for a website</p>
          </div>
        </details>
        {{-- <div class="task-description-about" name="what-we-doing">
          <p class="info-title-about">What we doing</p>
          <p class="info-content">Using langMe, you can solve the issue of several languages mixing if you trying to speak ones. Practice not to confuse words and phrases on different languages.</p>
          <p class="info-content">Now we have the basic words and phrases for you on Russian, English, Armenian, Greek, Finnish and Latvian, and a few tasks so that they don't get mixed up in your practice.</p>
          <p class="info-content then">And then, it's just interesting and useful!</p>
        </div> --}}
      </div>
    </div>
    <div class="chart-rows-block charts-about">
      <div class="charts-title-block">
        <p class="charts-title">What's there now</p>
      </div>
      <div class="chart-mini-row">
        <div class="chart-mini">
          <canvas id="testChart2"></canvas>
        </div>
        <div class="chart-mini">
          <canvas id="testChart3"></canvas>
        </div>
        <div class="chart-mini">
          <canvas id="testChart4"></canvas>
        </div>
        <div class="chart-mini">
          <canvas id="testChart1"></canvas>
        </div>
      </div>
      <div class="chart-one-row">
        <canvas id="testChart"></canvas>
      </div>
    </div>
</div>
<div class="main-right-front">
  <x-mail-button></x-mail-button>  
</div>
@endsection

@push('js')
    <script defer src="{{ asset('js/tutor.js')}}"></script>
    <script defer src="{{ asset('js/charts.js') }}"></script>

    {{-- for charts --}}
    <script defer>  
      // for chart Modes   
      const modesCh = @json($modesCh);
      console.log(modesCh);
      const modesString = @json($modesString);
      console.log(modesString);
      let modesStr = [];
      for (let i=0; i<modesString.length; i++) {
        switch (modesString[i]) {
          case 'draft':
            modesStr[i] = '1';
            break;
          case 'active':
            modesStr[i] = '2';
            break;
          case 'blocked':
            modesStr[i] = '3';
            break;
          case 'close':
            modesStr[i] = '4';
            break;
        }
      }
      console.log(modesStr);

      //for chart Langs
      const langsCh = @json($langsCh);
      console.log(langsCh);
      const langsString = @json($langsString);
      console.log(langsString);
      let langsStr = [];
      for (let i=0; i<langsString.length; i++) {
        switch (langsString[i]) {
          case 'draft':
            langsStr[i] = '1';
            break;
          case 'active':
            langsStr[i] = '2';
            break;
          case 'blocked':
            langsStr[i] = '3';
            break;
          case 'close':
            langsStr[i] = '4';
            break;
        }
      }
      console.log(langsStr);

      //for chart Words
      let wordsDraft = [];
      let wordsActive = [];
      let wordsBlocked = [];
      let wordsClose = [];

      let sumWordsDraft = 0;
      let sumWordsActive = 0;
      let sumWordsBlocked = 0;
      let sumWordsClose = 0;

      const wordsSt = @json($wordsSt);

      for (let i=0; i<wordsSt.length; i++) {
        switch (wordsSt[i]) {
          case 'draft':
            wordsDraft.push(1);
            break;
          case 'active':
            wordsActive.push(1);
            break;
          case 'blocked':
            wordsBlocked.push(1);
            break;
          case 'close':
            wordsClose.push(1);
            break;
        }
      }
      
      wordsDraft.forEach(item => {
        sumWordsDraft += item;
      });
      wordsActive.forEach(item => {
        sumWordsActive += item;
      });
      wordsBlocked.forEach(item => {
        sumWordsBlocked += item;
      });
      wordsClose.forEach(item => {
        sumWordsClose += item;
      });

      //for chart Themes
      let themesDraft = [];
      let themesActive = [];
      let themesBlocked = [];
      let themesClose = [];

      let sumThemesDraft = 0;
      let sumThemesActive = 0;
      let sumThemesBlocked = 0;
      let sumThemesClose = 0;

      const themesSt = @json($themesSt);

      for (let i=0; i<themesSt.length; i++) {
        switch (themesSt[i]) {
          case 'draft':
            themesDraft.push(1);
            break;
          case 'active':
            themesActive.push(1);
            break;
          case 'blocked':
            themesBlocked.push(1);
            break;
          case 'close':
            themesClose.push(1);
            break;
        }
      }
      
      themesDraft.forEach(item => {
        sumThemesDraft += item;
      });
      themesActive.forEach(item => {
        sumThemesActive += item;
      });
      themesBlocked.forEach(item => {
        sumThemesBlocked += item;
      });
      themesClose.forEach(item => {
        sumThemesClose += item;
      });

      //for chart Words by themes
      const themesCh = @json($themesCh); 

      const wordsWithThemes = @json($wordsWithThemes);
      console.log(wordsWithThemes);

      const themesWithWords = @json($themesWithWords);
      console.log(themesWithWords);

      let themesNum = themesWithWords.length;
      console.log('themesNum = ' + themesNum);

      let themesWords = [];
      let themesWordsStr = [];

      for (let i=0; i < themesNum; i++) {
        let wordsNum = 0;
        for (let j=0; j < wordsWithThemes.length; j++) {
          if (wordsWithThemes[j].themes.length !== 0) {
            for (let k=0; k < wordsWithThemes[j].themes.length; k++) {
              if (wordsWithThemes[j].themes[k].id === themesWithWords[i].id) {
                wordsNum++;
              }
            }
          }
        }
        themesWords[i] = wordsNum;
      }

      console.log(themesWords);
      
      for (let i=0; i < themesWords.length; i++) {
        themesWordsStr[i] = themesWords[i].toString();
      }
      
      console.log(themesWordsStr);

    </script>

    {{-- close tutors --}}
    <script defer>
      let tutorClose = document.getElementById("tutorClose");
      let tutorSkip = document.getElementById("tutorSkip");

      if (tutorClose) {
        tutorClose.addEventListener('click', function(event) {
        tutorClose.onclick = closeTutorPages();
        });
      }

      // tutorClose.addEventListener('click', function(event) {
      //   tutorClose.onclick = closeTutorPages();
      // })

      tutorSkip.addEventListener('click', function(event) {
        tutorSkip.onclick = closeTutorPages();
      })
    </script>

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
