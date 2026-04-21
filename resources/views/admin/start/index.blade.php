@extends('layouts.admin')

@section('title', 'Start')

@section('content')
<div class="admin-content">
  <section class="head-block">
    <div class="title-block">
      <div class="title-box">
        <p class="title">Admin start</p>
      </div>
    </div>
    <div class="services-block">
      <div class="services-box">
        {{-- <div class="search-block">
          <div class="search-box">
            <input type="text" class="input-search" placeholder="Search"/>
            <button class="btn-search">
              <img src="{{ Vite::asset('resources/images/icons/icon-Search.svg') }}" />
            </button>
          </div>
        </div>
        <div class="add-block">
          <div class="add-box">
            <button class="btn-add">
              <svg
                            class="img-add"
                            width="36"
                            height="36"
                            viewBox="0 0 36 36"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              fill-rule="evenodd"
                              clip-rule="evenodd"
                              d="M16.875 16.875V5.25H19.125V16.875H30.75V19.125H19.125V30.75H16.875V19.125H5.25V16.875H16.875Z"
                              fill="#1B1357"
                            />
              </svg>
            </button>
            <p class="lable-add">Add item</p>
          </div>
        </div> --}}
      </div>
    </div>
  </section>
  <div class="chart-block">
    <canvas class="chart-box" id="myChart"></canvas>
  </div>

  <!-- <script>
                const ctx = document.getElementById('myChart');

                Chart.defaults.font.size = 12

                new Chart(ctx, {
                  type: 'line',
                  data: {
                    labels: ['Oct-24', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'],
                    datasets: [
                      {
                      label: 'Visits',
                      data: [12, 15, 3, 5, 2, 3, 9, 11, 13, 8, 9, 4, 12, 9, 3, 5, 2, 3, 9, 11, 13, 8, 9, 4, 12, 13, 3, 5, 2, 3, 9, 11, 13, 8, 9, 4, 8],
                      borderColor: '#2641af',
                      backgroundColor: '#2641af', 
                      borderWidth: 2         ,
                      pointBorderWidth: 0,
                      pointBackgroundColor: 'rgba(0, 0, 0, 0.0)',
                    }, 
                    {
                      label: 'Users',
                      data: [10, 13, 5, 7, 1, 8, 5, 7, 6, 3, 11, 7, 10, 13, 5, 7, 1, 8, 5, 7, 6, 3, 11, 7, 10, 13, 5, 7, 1, 8, 5, 7, 6, 3, 11, 7, 10],
                      borderColor: '#34B639',
                      backgroundColor: '#34B639',
                      borderWidth: 2,
                      pointBorderWidth: 0,
                      pointBackgroundColor: 'rgba(0, 0, 0, 0.0)',
                    },
                    {
                      label: 'Messages',
                      data: [5, 2, 3, 9, 11, 13, 8, 9, 4, 12, 13, 3, 5, 2, 3, 9, 11, 13, 8, 9, 4, 12, 14, 3, 5, 2, 3, 9, 11, 13, 8, 9, 4, 8, 8, 5, 7],
                      borderColor: '#35BFDE',
                      backgroundColor: '#35BFDE',
                      borderWidth: 2,
                      pointBorderWidth: 0,
                      pointBackgroundColor: 'rgba(0, 0, 0, 0.0)',
                    },
                    {
                      label: 'Exports',
                      data: [8, 5, 7, 6, 3, 11, 7, 10, 13, 5, 7, 1, 8, 5, 7, 6, 3, 11, 7, 10, 13, 5, 7, 1, 8, 5, 7, 6, 3, 11, 7, 10, 9, 4, 12, 17],
                      borderColor: '#EB9041',
                      backgroundColor: '#EB9041',
                      borderWidth: 2,
                      pointBorderWidth: 0,
                      pointBackgroundColor: 'rgba(0, 0, 0, 0.0)',
                    }
                  
                  ]
                  },
                  options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                      y: {
                        beginAtZero: true
                      }
                    },
                    plugins: {
                      legend: {
                        align: 'end',
                        labels: {
                          boxWidth: 14,
                          font: {
                            size: 14
                          }
                        }
                      }
                    }
                  }
                });
  </script> -->

</div>
    
@endsection

@push('js')
    <script>
      //for chart Modes
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
    <script src="{{ asset('js/charts.js') }}"></script>
    {{-- <script defer src="{{ asset('js/charts.js')}}"></script> --}}
@endpush


