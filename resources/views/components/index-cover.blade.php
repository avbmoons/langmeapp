<div class="index-cover" id="indexCover">
  <div class="wellcome">
    <div class="wellcome-header">
      <img src="{{ Vite::asset('resources/images/images/logo-front-modal-light.png')}}" alt="logo" />
      <button type="button">
        <a href="{{ route('home') }}">
          <img src="{{ Vite::asset('resources/images/icons/icon-close.png')}}" alt="close" />
        </a>
      </button>
    </div>
    <div class="wellcome-main">
      <p class="terve heading">Welcome to langMe!</p>
      <p>&#9679;&emsp;6 languages,</p>
      <p>&#9679;&emsp;50 topics and concepts,</p>
      <p>&#9679;&emsp;more than 1300 words,</p>
      <p style="margin-bottom: 30px;">&#9679;&emsp;4 operating modes and your results,</p>
      <p class="terve">Compare and memorize&emsp;&#128578;</p>
      <p class="terve" style="margin-bottom: 30px;">And it's just interesting!</p>
      {{-- <p>
        Are you trying to speak several languages and they get mixed up in
        your head? Using langMe, you can solve this issue. Practice not to
        confuse words and phrases on different languages. Now we have the
        basic words and phrases for you on Russian, English, Armenian,
        Greek, Finnish and Latvian, and a few tasks so that they don't get
        mixed up in your practice.
      </p> --}}
    </div>
    <div class="wellcome-button">
      <button class="btn-go" id="goButton" onclick="openTutor()">
        Go!
      </button>
    </div>
  </div>
</div>