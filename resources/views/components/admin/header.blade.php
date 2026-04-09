<header>
  <div class="header-block">
    <div class="header-logo-box">
      <div class="header-logo">
        <img src="{{ Vite::asset('resources/images/images/logo-admin.png') }}" alt="logo">
      </div>
    </div>
    <div class="menu-box">
      <div class="menu">
        <div class="menu-item-box">
          <a href="{{ route('home') }}" class="menu-item">Home</a>
        </div>
        <div class="menu-item-box">
          <a href="" class="menu-item">Guide</a>
        </div>
        <div class="menu-item-box">
          <a href="{{ route('about') }}" class="menu-item">About</a>
        </div>
      </div>
    </div>
    <div class="services-box">
      <div class="services">
        <div class="service-time">
          <p id="currentTime"></p>
        </div>
        <a href="{{ route('home') }}">
          <button class="service-button">Sign Out</button>
        </a>
      </div>
    </div>
  </div>
</header> 