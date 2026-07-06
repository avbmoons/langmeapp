<div class="index-cover" id="indexCover">
  <div class="wellcome">
    <div class="wellcome-header">
      <img src="{{ Vite::asset('resources/images/images/logo-front-modal-light.png')}}" alt="logo" />
      <div class="menu-langs">
      <button class="menu-item-front header" id="appLangEngChoice">
        <a class="btn-link-menu {{ app()->getLocale() === 'en' ? 'active' : ''}}" href="{{ route('lang.switch', 'en') }}">Eng</a>
      </button>
      <button class="menu-item-front header" id="appLangRusChoice">
        <a class="btn-link-menu {{ app()->getLocale() === 'ru' ? 'active' : ''}}" href="{{ route('lang.switch', 'ru') }}">Рус</a>
      </button>
      </div>
      <button type="button">
        <a href="{{ route('home') }}">
          <img src="{{ Vite::asset('resources/images/icons/icon-close.png')}}" alt="close" />
        </a>
      </button>
    </div>
    <div class="wellcome-main">
      <p class="terve heading">{{ __('Welcome to langMeApp') }}!</p>
      <p>&#9679;&emsp;{{ __('6 languages') }},</p>
      <p>&#9679;&emsp;{{ __('50 topics and concepts') }},</p>
      <p>&#9679;&emsp;{{ __('more than 1300 words') }},</p>
      <p style="margin-bottom: 30px;">&#9679;&emsp;{{ __('4 operating modes and your results') }},</p>
      <p class="terve">{{ __('Compare and memorize') }}&emsp;&#128578;</p>
      <p class="terve" style="margin-bottom: 30px;">{{ __("And it's just interesting") }}!</p>
    </div>
    <div class="wellcome-button">
      <button class="btn-go" id="goButton" onclick="openTutor()">
        {{ __('Go') }}!
      </button>
    </div>
  </div>
</div>