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
        <div class="search-block">
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
        </div>
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