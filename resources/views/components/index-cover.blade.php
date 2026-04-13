<div class="index-cover" id="indexCover">
  <div class="wellcome">
    <div class="wellcome-header">
      <img src="{{ Vite::asset('resources/images/images/logo-front-modal-light.png')}}" alt="logo" />
      <button onclick="window.location.href='pages/home.html'">
        <a href="{{ route('home') }}">
          <img src="{{ Vite::asset('resources/images/icons/icon-close.png')}}" alt="close" />
        </a>
      </button>
    </div>
    <div class="wellcome-main">
      <p class="terve">Welcome to langMe!</p>
      <p>
        Are you trying to speak several languages and they get mixed up in
        your head? Using langMe, you can solve this issue. Practice not to
        confuse words and phrases on different languages. Now we have the
        basic words and phrases for you on Russian, English, Armenian,
        Greek, Finnish and Latvian, and a few tasks so that they don't get
        mixed up in your practice.
      </p>
    </div>
    <div class="wellcome-button">
      <button class="btn-go" id="goButton" onclick="openTutor()">
        Go!
      </button>
    </div>
  </div>
</div>