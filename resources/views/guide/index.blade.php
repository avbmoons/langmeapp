@extends('layouts.main')

@section('title', 'Guide')
@section('content')
<div class="main-left-front">
  <x-tutors-button></x-tutors-button>
</div>
<div class="main-center-front-task guide">
  <div class="task-info info-guide">
    <div class="info-title-block guide">
      <div class="info-title-block about">
        <p class="info-title">Guide</p>
      </div>
    </div>
    <div class="info-content-block-about guide">
        <details name="faq" open>
          <summary>Concept</summary>
          <div class="content-about">
            <p class="text-about">You can view and compare the basic concepts in several languages at the same time In our application.</p>
            <p class="text-about">You choose your base language, for example, your native language, and up to five languages to compare basic concepts.</p>
            <p class="text-about">We are giving you some exercises so that these several languages don't get confused when you speak one of them.</p>
            <p class="text-about">Successful and successful scores are calculated for each exercise. &#128578;</p>  
            <p class="text-about">The history of your exercises is saved so that you can see the progress.</p>
            <p class="text-about">You can also just see what something is called in other languages, it's interesting!</p>          
          </div>
        </details>
        <details name="faq">
          <summary>Languages</summary>
          <div class="content-about">
            <p class="text-about">There are currently six languages available in our app.</p>
            <p class="text-about">You can choose any of them as the main one and compare other languages with it.</p>
            <p class="text-about">Here are the languages available in the app now:</p>
            <div class="list-guide">
              <div class="list-guide-block">
                {{-- @foreach ($langsList as $lang)
                    <p class="text-about">&#9679;&emsp;{{ $lang->title }}</p>
                @endforeach --}}
                @for ($i = 0; $i < 2; $i++)
                    <p class="text-about">&#9679;&emsp;{{$langsList[$i]->title}}</p>
                @endfor
              </div>
              <div class="list-guide-block">
                @for ($i = 2; $i < 4; $i++)
                    <p class="text-about">&#9679;&emsp;{{$langsList[$i]->title}}</p>
                @endfor
              </div>
              <div class="list-guide-block">
                @for ($i = 4; $i < 6; $i++)
                    <p class="text-about">&#9679;&emsp;{{$langsList[$i]->title}}</p>
                @endfor
              </div>
            </div>
            <p class="text-about">We plan to add dictionaries to the application in other languages, including we will take into account your wishes in this.</p>
          </div>
        </details>
        <details name="faq">
          <summary>Themes</summary>
          <div class="content-about">
            <p class="text-about">The dictionaries in our app are grouped by topics.</p>
            <p class="text-about">You choose the topics and the basic concepts will be visible in your task.</p>
            <p class="text-about">These are the topics currently available in our app:</p>
            <div class="list-guide">
              <div class="list-guide-block">
                @for ($i = 0; $i < 17; $i++)
                    <p class="text-about">&#9679;&emsp;{{$themesList[$i]->title}}</p>
                @endfor
              </div>
              <div class="list-guide-block">
                @for ($i = 17; $i < 34; $i++)
                    <p class="text-about">&#9679;&emsp;{{$themesList[$i]->title}}</p>
                @endfor
              </div>
              <div class="list-guide-block">
                @for ($i = 34; $i < 50; $i++)
                    <p class="text-about">&#9679;&emsp;{{$themesList[$i]->title}}</p>
                @endfor
              </div>
            </div>
          </div>
        </details>
        <details name="faq">
          <summary>Modes</summary>
          <div class="content-about">
            <p class="text-about">We offer four operating modes with the selected vocabulary.</p>
            <p class="text-about">These are the operating modes currently available in our application:</p>
            <div class="list-guide">
              <div class="list-guide-block">
                @for ($i = 0; $i < 2; $i++)
                    <p class="text-about">&#9679;&emsp;{{$modesList[$i]->title}}</p>
                @endfor
              </div>
              <div class="list-guide-block">
                @for ($i = 2; $i < 4; $i++)
                    <p class="text-about">&#9679;&emsp;{{$modesList[$i]->title}}</p>
                @endfor
              </div>
              <div class="list-guide-block">
                {{-- @for ($i = 4; $i < 6; $i++)
                    <p class="text-about">&#9679;&emsp;{{$langsList[$i]->title}}</p>
                @endfor --}}
              </div>
            </div>
            <p class="text-about"><strong>PLAIN</strong> mode -  is a simple way to view and match words and phrases on selected topics.</p>            
            <p class="text-about"><strong>CHOICE</strong> mode - here you need to choose the correct translation of a given word in each of the selected languages.</p>
            <p class="text-about"><strong>LANG</strong> mode - here you need to choose the correct language in which the spelling of the translation of a given word is written.</p>
            <p class="text-about"><strong>MIX</strong> mode - here you need to choose the right spelling for the translation of a word for a given language.</p>
          </div>
        </details>
        <details name="faq">
          <summary>Home page</summary>
          <div class="content-about">
            <p class="text-about">Get to know each other on the Main page of our application.</p>
            <img
              class="guide-img"
              src="{{ Vite::asset('resources/images/guides/1-home-page.png')}}"
              alt="home-page"
            />
            <p class="text-about">Here you can set up your task and see your overall results, view a short guide and send us a message.</p>
            <p class="text-about">In order to send us messages and view your task history in the future, you need to register in our application.</p>
            <p class="text-about">Here is a list of the main elements of the Main Page with their brief description.:</p>
            <p class="text-about"><strong>1</strong> - login and registration button,</p>
            <p class="text-about"><strong>2</strong> - the menu for navigating through the application pages,</p>
            <p class="text-about"><strong>3</strong> - Task settings button,</p>
            <p class="text-about"><strong>4</strong> - here you can see how you set up your task,</p>
            <p class="text-about"><strong>5</strong> - the button to go to the configured task page,</p>
            <p class="text-about"><strong>6</strong> - buttons to go to the pages of all operating modes, regardless of the mode selected in the settings,</p>
            <p class="text-about"><strong>7</strong> - Here you can see the overall results of all your tasks,</p>
            <p class="text-about"><strong>8</strong> - the button to view your results for all tasks, you can download the file .PDF,</p>
            <p class="text-about"><strong>9</strong> - Here you can see a short guide on our application,</p>
            <p class="text-about"><strong>10</strong> - here you can send us a message, for this you need to register (button - 1).</p>
          </div>
        </details>
        <details name="faq">
          <summary>Settings</summary>
          <div class="content-about">
            <p class="text-about">The task setup form is opened by clicking the "Set task" button on the Main application page.</p>
            <img
              class="guide-img"
              src="{{ Vite::asset('resources/images/guides/4-settings.png')}}"
              alt="settings"
            />
            <p class="text-about">You need to select the following settings:</p>
            <p class="text-about"><strong>1</strong> - your base language, with which you will compare words in other languages,</p>
            <p class="text-about"><strong>2</strong> - from one to five languages for word comparison,</p>
            <p class="text-about"><strong>3</strong> - Dictionary topics,</p>
            <p class="text-about"><strong>4</strong> - Task operating mode.</p>
            <p class="text-about">To make a choice, do not forget to click the "Choose" buttons in each of the lists.</p>
            <p class="text-about"><strong>5</strong> - Here you can see your choice for the task.</p>
            <p class="text-about"><strong>6</strong> - This button must be pressed to confirm your choice.</p>
          </div>
        </details>
        <details name="faq">
          <summary>Task page</summary>
          <div class="content-about">
            <p class="text-about">The task pages are arranged like this:</p>
            <img
              class="guide-img"
              src="{{ Vite::asset('resources/images/guides/2-task-page.png')}}"
              alt="task-page"
            />
            <p class="text-about"><strong>1</strong> -  You can view your task settings on the left.</p>
            <p class="text-about"><strong>2</strong> - here you can change the task settings.</p>            
            <p class="text-about"><strong>3</strong> - in the first column, the words on the selected topics in your basic language.</p>
            <p class="text-about"><strong>4</strong> - These cards show the words in the languages that you have selected for comparison.</p>
            <p class="text-about">In all task modes, except PLAIN, you need to choose the right option, it will turn green.</p>
            <p class="text-about"><strong>5</strong> - there are the buttons for navigating through the task pages.</p>
            <p class="text-about"><strong>6</strong> - Your scores for the current task are counted on the right.</p>
            <p class="text-about"><strong>7</strong> - it's the button to save your results and exit the task.</p>
            <p class="text-about"><strong>IMPORTANT! - to save your results, be sure to press the 7 - "Exit" button.</strong></p>
            <p class="text-about">If you have registered in the app and logged into the session, you will be able to view your results in the future in the "Results" menu.</p>
            <p class="text-about">If you work with tasks without registration, then you can see your results only in the current session of working with the application.</p>
          </div>          
        </details>
        <details name="faq">
          <summary>Results</summary>
          <div class="content-about">
            <p class="text-about">The form for viewing the results of your tasks is opened by clicking the "Results" button on the Main page of the application.</p>
            <img
              class="guide-img"
              src="{{ Vite::asset('resources/images/guides/5-results.png')}}"
              alt="task-page"
            />
            <p class="text-about"><strong>1</strong> - here you can see the results of your tasks for all the modes that you used in the current session of working with the application.</p>
            <p class="text-about"><strong>2</strong> - Your actual results are also shown here.</p>
            <p class="text-about"><strong>3</strong> - You can download your results as a file using this button.PDF</p>
            <p class="text-about"><strong>IMPORTANT!</strong> -  If you have registered and logged into a session, you can view a list of your results for all work sessions. To do this, go to the menu "Results", there will be a list of all your tasks. You can download this list as a file.PDF</p>            
          </div>
        </details>
        <details name="faq">
          <summary>About page</summary>
          <div class="content-about">
            <p class="text-about">On this page, we briefly talk about our project and show real-time statistics of project resources:</p>
            <img
              class="guide-img"
              src="{{ Vite::asset('resources/images/guides/3-about-page.png')}}"
              alt="task-page"
            />
            <p class="text-about">1 - Here you can see a brief information about our project.</p>
            <p class="text-about">2 - Here we show the statistics of our resources in real time.</p>
            <p class="text-about">You can take a look at:</p>
            <p class="text-about">&#9679;&emsp;how many operation task modes are there in the application,</p>
            <p class="text-about">&#9679;&emsp;what languages are available in the application,</p>
            <p class="text-about">&#9679;&emsp;how many topics are there in dictionaries,</p>
            <p class="text-about">&#9679;&emsp;how many words are involved in thematic dictionaries,</p>
            <p class="text-about">&#9679;&emsp;You can track how our dictionaries are being updated.</p>
          </div>
        </details>
    </div>
  </div>
</div>
<div class="main-right-front">
  <x-mail-button></x-mail-button>
</div>
    
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
