<header-front class="header-front">
  <div class="header-left-front">
    <div class="header-left-block-front">
      <img class="logo-front" src="{{ Vite::asset('resources/images/images/logo-front-light.png')}}" alt="logo">
    </div>
  </div>
  <div class="header-center-front">
    <div class="header-center-block-front">
      <menu-front class="menu-front">        
        <button class="menu-item-front header">
          <a class="btn-link-menu" href="{{ route('home') }}">Home</a>          
        </button>        
        <button class="menu-item-front future">
          <a class="btn-link-menu" href="">Guide</a>
        </button>         
        <button class="menu-item-front future">
          <a class="btn-link-menu" href="">About</a>
        </button>                
      </menu-front>
      <div class="service-time">
        <p id="currentTime"></p>
      </div>
    </div>
  </div>
  <div class="header-right-front">
    <div class="header-right-block-front">
      <menu-front class="menu-front">
        <div class="combo-block-front" id="appLang">
          <button class="menu-item-front header" id="appLangEngChoice">
            <a class="btn-link-menu" href="">Eng</a>
          </button>
        <div class="combo-list-front" id="appLangChoice"></div>
        </div>
        <button class="menu-item-front header">
          <a class="btn-link-menu" href="">
              <svg
                width="18"
                height="18"
                viewBox="0 0 18 18"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M14.4324 13.25C13.4805 11.6044 12.0137 10.4244 10.3018 9.86501C11.1486 9.36092 11.8065 8.59281 12.1744 7.67863C12.5424 6.76445 12.6001 5.75476 12.3387 4.8046C12.0773 3.85445 11.5112 3.01638 10.7274 2.41908C9.94359 1.82179 8.98538 1.49831 7.99993 1.49831C7.01447 1.49831 6.05626 1.82179 5.27244 2.41908C4.48863 3.01638 3.92255 3.85445 3.66114 4.8046C3.39973 5.75476 3.45744 6.76445 3.82542 7.67863C4.19339 8.59281 4.85128 9.36092 5.69805 9.86501C3.98618 10.4238 2.5193 11.6038 1.56743 13.25C1.53252 13.3069 1.50936 13.3703 1.49933 13.4363C1.4893 13.5023 1.49259 13.5696 1.509 13.6343C1.52542 13.6991 1.55463 13.7598 1.59492 13.8131C1.63521 13.8663 1.68575 13.911 1.74357 13.9444C1.80138 13.9778 1.8653 13.9992 1.93155 14.0075C1.99781 14.0158 2.06505 14.0108 2.12931 13.9927C2.19358 13.9745 2.25356 13.9437 2.30573 13.9021C2.3579 13.8604 2.40119 13.8087 2.43305 13.75C3.61055 11.715 5.6918 10.5 7.99993 10.5C10.3081 10.5 12.3893 11.715 13.5668 13.75C13.5987 13.8087 13.642 13.8604 13.6941 13.9021C13.7463 13.9437 13.8063 13.9745 13.8705 13.9927C13.9348 14.0108 14.002 14.0158 14.0683 14.0075C14.1345 13.9992 14.1985 13.9778 14.2563 13.9444C14.3141 13.911 14.3646 13.8663 14.4049 13.8131C14.4452 13.7598 14.4744 13.6991 14.4908 13.6343C14.5073 13.5696 14.5106 13.5023 14.5005 13.4363C14.4905 13.3703 14.4673 13.3069 14.4324 13.25ZM4.49993 6.00001C4.49993 5.30777 4.7052 4.63108 5.08978 4.05551C5.47437 3.47994 6.02099 3.03133 6.66053 2.76643C7.30007 2.50152 8.00381 2.43221 8.68274 2.56726C9.36168 2.70231 9.98531 3.03565 10.4748 3.52513C10.9643 4.01462 11.2976 4.63826 11.4327 5.31719C11.5677 5.99612 11.4984 6.69986 11.2335 7.3394C10.9686 7.97894 10.52 8.52557 9.94442 8.91015C9.36885 9.29474 8.69216 9.50001 7.99993 9.50001C7.07197 9.49901 6.18231 9.12995 5.52615 8.47378C4.86999 7.81762 4.50092 6.92796 4.49993 6.00001Z"
                  fill="#0F1A1C"
                />
              </svg>
          </a>
        </button>
        <button class="menu-item-front header">
          <a class="btn-link-menu" href="{{ route('admin.index') }}">Admin</a>
        </button>     
      </menu-front>
    </div>
  </div>
</header-front>