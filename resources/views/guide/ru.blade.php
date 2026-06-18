<div class="main-left-front">
  <x-tutors-button></x-tutors-button>
</div>
<div class="main-center-front-task guide">
  <div class="task-info info-guide">
    <div class="info-title-block guide">
      <div class="info-title-block about">
        <p class="info-title">Инструкции</p>
      </div>
    </div>
    <div class="info-content-block-about guide">
        <details name="faq" open>
          <summary>Концепция</summary>
          <div class="content-about">
            <p class="text-about">В нашем приложении вы можете посмотреть и сравнить основные понятия на нескольких языках одновременно.</p>
            <p class="text-about">Вы выбираете свой базовый язык, например, родной, и до пяти языков для сравнения основных понятий.</p>
            <p class="text-about">Мы даем вам несколько упражнений, чтобы эти несколько языков не путались, когда вы говорите на одном из них.</p>
            <p class="text-about">По каждому упражнению подсчитываются баллы упешные и успешные в будущем. &#128578;</p>  
            <p class="text-about">История ваших упражнений сохраняется, чтобы вы видели прогресс.</p>
            <p class="text-about">Вы можете также просто посмотреть, как что-то называется на других языках, это интересно!</p>          
          </div>
        </details>
        <details name="faq">
          <summary>Языки</summary>
          <div class="content-about">
            <p class="text-about">Сейчас в нашем приложении представлены шесть языков.</p>
            <p class="text-about">Любой из них вы можете выбрать как основной и сравнивать с ним другие языки.</p>
            <p class="text-about">Вот какие языки есть в приложении сейчас:</p>
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
            <p class="text-about">Мы планируем пополнять словари приложения и на других языках, в том числе мы будем учитывать ваши пожелания в этом.</p>
          </div>
        </details>
        <details name="faq">
          <summary>Темы словарей</summary>
          <div class="content-about">
            <p class="text-about">Словари в нашем приложении сгруппированы по темам.</p>
            <p class="text-about">Вы выбираете темы и основные понятия будут видны в вашем упражнении.</p>
            <p class="text-about">Вот какие темы есть сейчас в нашем приложении:</p>
            <div class="list-guide">
              <div class="list-guide-block">
                @for ($i = 0; $i < 17; $i++)
                    <p class="text-about">&#9679;&emsp;{{$themesList[$i]->title_base}}</p>
                @endfor
              </div>
              <div class="list-guide-block">
                @for ($i = 17; $i < 34; $i++)
                    <p class="text-about">&#9679;&emsp;{{$themesList[$i]->title_base}}</p>
                @endfor
              </div>
              <div class="list-guide-block">
                @for ($i = 34; $i < 50; $i++)
                    <p class="text-about">&#9679;&emsp;{{$themesList[$i]->title_base}}</p>
                @endfor
              </div>
            </div>
          </div>
        </details>
        <details name="faq">
          <summary>Режимы задач</summary>
          <div class="content-about">
            <p class="text-about">Мы предлагаем четыре режима работы с выбранной лексикой.</p>
            <p class="text-about">Вот какие режимы работы есть сейчас в нашем приложении:</p>
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
            <p class="text-about"><strong>PLAIN</strong> режим -  это простой просмотр и сопоставление  слов и фраз на выбранные темы.</p>            
            <p class="text-about"><strong>CHOICE</strong> режим - здесь нужно выбрать правильный перевод заданного слова на каждом из выбранных языков.</p>
            <p class="text-about"><strong>LANG</strong> режим - здесь нужно правильно выбрать язык, на котором написан спеллинг перевода заданного слова.</p>
            <p class="text-about"><strong>MIX</strong> режим - здесь нужно правильно выбрать спеллинг перевода слова для заданного языка.</p>
          </div>
        </details>
        <details name="faq">
          <summary>Главная страница</summary>
          <div class="content-about">
            <p class="text-about">Познакомьтесь в Главной страницей нашего приложения.</p>
            <img
              class="guide-img"
              src="{{ Vite::asset('resources/images/guides/1-home-page.png')}}"
              alt="home-page"
            />
            <p class="text-about">Здесь можно настроить задачу и посмотреть ваши общие результаты, посмотреть краткий гид и отправить нам сообщение.</p>
            <p class="text-about">Для того, чтобы отправлять нам сообщения и смотреть историю своих задач в будущем, вам надо зарегистрироваться в нашем приложении.</p>
            <p class="text-about">Вот список основных элементов Главной страницы с их кратким описанием:</p>
            <p class="text-about"><strong>1</strong> - кнопка входа и регистрации,</p>
            <p class="text-about"><strong>2</strong> - меню перехода по страницам приложения,</p>
            <p class="text-about"><strong>3</strong> - кнопка настроек задачи,</p>
            <p class="text-about"><strong>4</strong> - здесь можно посмотреть, как вы настроили свою задачу,</p>
            <p class="text-about"><strong>5</strong> - кнопка перехода на страницу настроенной задачи,</p>
            <p class="text-about"><strong>6</strong> - кнопки перехода на страницы всех рабочих режимов, независимо от выбранного в настройках режима,</p>
            <p class="text-about"><strong>7</strong> - здесь можно посмотреть общие результаты всех ваших задач,</p>
            <p class="text-about"><strong>8</strong> - кнопка для просмотра ваших результатов по всем задачам, можно скачать файл .PDF,</p>
            <p class="text-about"><strong>9</strong> - здесь можно посмотреть краткий гид по нашему приложению,</p>
            <p class="text-about"><strong>10</strong> - здесь можно отправить нам сообщение, для этого надо зарегистрироваться (кнопка - 1).</p>
          </div>
        </details>
        <details name="faq">
          <summary>Настройки задачи</summary>
          <div class="content-about">
            <p class="text-about">Форма настройки задачи открывается по кнопке "Set task" на Главной странице приложения.</p>
            <img
              class="guide-img" id="guideImgSettings"
              src="{{ Vite::asset('resources/images/guides/4-settings.png')}}"
              alt="settings"
            />
            <p class="text-about">Вам надо выбрать следующие настройки:</p>
            <p class="text-about"><strong>1</strong> - ваш базовый язык, с которым вы будете сравнивать слова на других языках,</p>
            <p class="text-about"><strong>2</strong> - от одного до пяти языков для сравнения слов,</p>
            <p class="text-about"><strong>3</strong> - темы словарей,</p>
            <p class="text-about"><strong>4</strong> - рабочий режим задачи.</p>
            <p class="text-about"><strong>ВАЖНО!</strong> - Для выбора не забывайте нажимать кнопки "Choose" в каждом из списков.</p>
            <p class="text-about"><strong>5</strong> - здесь можно посмотреть ваш выбор для задачи.</p>
            <p class="text-about"><strong>6</strong> - эту кнопку надо нажать для подтверждения вашего выбора.</p>
          </div>
        </details>
        <details name="faq">
          <summary>Страница задачи</summary>
          <div class="content-about">
            <p class="text-about">Страницы задач устроены так:</p>
            <img
              class="guide-img"
              src="{{ Vite::asset('resources/images/guides/2-task-page.png')}}"
              alt="task-page"
            />
            <p class="text-about"><strong>1</strong> -  слева можно посмотреть ваши настройки задачи.</p>
            <p class="text-about"><strong>2</strong> - здесь вы можете изменить настройки задачи.</p>            
            <p class="text-about"><strong>3</strong> - в первом столбце слова по выбранным темам на вашем базовом языке.</p>
            <p class="text-about"><strong>4</strong> - в этих карточках показываются слова на языках, которые вы выбрали для сравнения.</p>
            <p class="text-about">Во всех режимах задачи, кроме PLAIN, вам надо выбрать правильный вариант, он подкрасится "зелёным".</p>
            <p class="text-about"><strong>5</strong> - это кнопки для перехода по страницам задачи.</p>
            <p class="text-about"><strong>6</strong> - справа считаются ваши баллы по текущей задаче.</p>
            <p class="text-about"><strong>7</strong> - это кнопка для сохранения ваших результатов и выхода из задачи.</p>
            <p class="text-about"><strong>ВАЖНО!</strong> - для сохранения ваших результаов обязательно нажимайте кнопку 7 - "Exit".</strong></p>
            <p class="text-about">Если вы зарегистрировались в приложении и вошли в сеанс, то вы сможете посмотреть ваши результаты в будущем в меню "Results".</p>
            <p class="text-about">Если вы работаете с задачами без регистрации, то вы можете видеть ваши результаты только в текущем сеансе работы с приложением.</p>
          </div>          
        </details>
        <details name="faq">
          <summary>Результаты задач</summary>
          <div class="content-about">
            <p class="text-about">Форма просмотра результатов ваших задач открывается по кнопке "Results" на Главной странице приложения.</p>
            <img
              class="guide-img" id="guideImgResults"
              src="{{ Vite::asset('resources/images/guides/5-results.png')}}"
              alt="task-page"
            />
            <p class="text-about"><strong>1</strong> - здесь вы можете увидеть результаты ваших задач по всем режимам, которые вы использовали в текущем сеансе работы с приложением.</p>
            <p class="text-about"><strong>2</strong> - здесь также показаны ваши актуальные результаты.</p>
            {{-- <p class="text-about"><strong>3</strong> - по этой кнопке вы можете скачать ваши результаты файлом .PDF</p> --}}
            <p class="text-about"><strong>ВАЖНО!</strong> -  если вы зарегистрировались и вошли в сеанс, вы можете посмотреть список ваших результаов за все сеансы работы. Для этого зайдите в меню, там будет список всех ваших задач. Вы можете скачать этот список файлом .PDF</p>            
          </div>
        </details>
        <details name="faq">
          <summary>О проекте</summary>
          <div class="content-about">
            <p class="text-about">На этой странице мы коротко рассказываем о нашем проекте и показываем статистику ресурсов проекта в реальном времени:</p>
            <img
              class="guide-img"
              src="{{ Vite::asset('resources/images/guides/3-about-page.png')}}"
              alt="task-page"
            />
            <p class="text-about">1 - здесь вы можете посмотреть краткую информацию о нашем проекте.</p>
            <p class="text-about">2 - здесь мы показываем статистику наших ресурсов в реальном времени.</p>
            <p class="text-about">Вы можете посмотреть:</p>
            <p class="text-about">&#9679;&emsp;сколько режимов работы задач есть в приложении,</p>
            <p class="text-about">&#9679;&emsp;какие языки представлены в приложении,</p>
            <p class="text-about">&#9679;&emsp;сколько тем содержится в словарях,</p>
            <p class="text-about">&#9679;&emsp;сколько слов задействовано в тематических словарях,</p>
            <p class="text-about">&#9679;&emsp;можно отслеживать, как пополняются наши словари.</p>
          </div>
        </details>
    </div>
  </div>
</div>
<div class="main-right-front">
  <x-mail-button></x-mail-button>
</div>
    
