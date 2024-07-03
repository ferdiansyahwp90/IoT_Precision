@extends('layouts.app')
@section('content-app')
<div class="container mt-5">
  <!-- breadcrumb -->
  <!-- row -->
  <div class="row">
   <form action="" method="GET" class="row">

      <div class="form-group col-md-2 offset-md-3">
          <select name="tool_id" id="" class="form-control">
              <option value="">Pilih alat</option>
              @foreach ($tools as $item)
                  <option {{request()->tool_id == $item->id ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
              @endforeach
          </select>
      </div>
      <div class="form-group col-md-2">
          <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="start_date" value="{{request()->start_date}}" class="form-control" placeholder="Start Date">
      </div>
      <div class="form-group col-md-2">
          <input type="text"  onfocus="(this.type='date')" onblur="(this.type='text')"  name="end_date" value="{{request()->end_date}}" class="form-control"  placeholder="End Date">
      </div>
  
      <div class="col-md-1">
          <button class="btn btn-primary">Filter</button>
      </div>
      <div class="col-md-3"></div>
  </form>
  </div>
  <div class="row row-sm" id="content">
    @include('pages.dashboard.child')
  </div>
  <!-- /row -->
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">Soil Fertility detection (NPK)</h4>
        </div>
        <!-- Modal -->
        <div class="card-body">
            <div class="chartjs-wrapper-demo">
                <canvas id="npkChart"></canvas>
            </div>
          <div class="table-responsive">
            <table class="table table-striped" id="npk">
              <thead>
                <tr>
                  <th>Created At</th>
                  <th>Category</th>
                  <th>Value</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['npk'] as $item)
                <tr>
                  <td>{{$item->created_at ?? '-'}}</td>
                  <td>{{$item->category ?? '-'}}</td>
                  <td>{{$item->value}}</td>
                  <td ><span class="badge text-white {{$item->value >= 50 && $item->value <= 60 ? 'bg-primary' : 'bg-warning'}}">{{$item['status']}}</span></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Soil moisture detection (Kelembapan tanah)</h4>
        </div>
        <div class="card-body">
            <div class="chartjs-wrapper-demo">
                <canvas id="humiditySoilChart"></canvas>
            </div>
          <div class="table-responsive">
            <table class="table table-striped" id="soil">
              <thead>
                <tr>
                  <th>Created At</th>
                  <th>Value</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['humidity_soil'] as $item)
                <tr>
                  <td>{{$item->created_at ?? '-'}}</td>
                  <td>{{$item->value}}</td>
                  <td ><span class="badge text-white {{$item->value >= 550 && $item->value <= 650 ? 'bg-primary' : 'bg-warning'}}">{{$item['status']}}</span></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Air humidity detection (Kelembapan Udara)</h4>
        </div>
        <div class="card-body">
            <div class="chartjs-wrapper-demo">
                <canvas id="humidityAirChart"></canvas>
            </div>
          <div class="table-responsive">
            <table class="table table-striped" id="air">
              <thead>
                <tr>
                  <th>Created At</th>
                  <th>Value</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['humidity_air'] as $item)
                <tr>
                  <td>{{$item->created_at ?? '-'}}</td>
                  <td>{{$item->value}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Temperature (Suhu udara)</h4>
        </div>
        <div class="card-body">
            <div class="chartjs-wrapper-demo">
                <canvas id="temperatureChart"></canvas>
            </div>
          <div class="table-responsive">
            <table class="table table-striped" id="temperature">
              <thead>
                <tr>
                  <th>Created At</th>
                  <th>Value</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['temperature'] as $item)
                <tr>
                  <td>{{$item->created_at ?? '-'}}</td>
                  <td>{{$item->value}}</td>
                  <td ><span class="badge text-white {{$item->value >= 550 && $item->value <= 650 ? 'bg-primary' : 'bg-warning'}}">{{$item['status']}}</span></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@push('script')
        <script>
            $(function(){
                // load dashboard.child in #content
                // make load every 5 seconds
                // one minutes

                setInterval(() => {
                    // update body without reload
                    $('#content').load(document.URL + ' #content');
                    $('#npk').load(document.URL + ' #npk');
                    $('#soil').load(document.URL + ' #soil');
                    $('#air').load(document.URL + ' #air');
                    $('#temperature').load(document.URL + ' #temperature');
                }, 5000);

                var datapie = {
                    labels: {!!$chart['npk']['label']!!},
                    datasets: [{
                        data: {!!$chart['npk']['data']!!},
                        backgroundColor: ['#285cf7', '#f10075', '#8500ff', '#7987a1', '#74de00']
                    }]
                };
                var optionpie = {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: {
                        display: false,
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    }
                };
                // For a doughnut chart
                var ctx6 = document.getElementById('npkChart');
                var myPieChart6 = new Chart(ctx6, {
                    type: 'doughnut',
                    data: datapie,
                    options: optionpie
                });
                var ctx8 = document.getElementById('humiditySoilChart');
                    new Chart(ctx8, {
                        type: 'line',
                        data: {
                            labels: {!!$chart['humidity_soil']['label']!!},
                            datasets: [ {
                                data: {!!$chart['humidity_soil']['data']!!},
                                borderColor: '#007bff',
                                borderWidth: 1,
                                backgroundColor: '#007bff6e'
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            legend: {
                                display: false,
                                labels: {
                                    display: false
                                }
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        fontSize: 10,
                                        max: 100,
                                        fontColor: "rgba(171, 167, 167,0.9)",
                                    },
                                    gridLines: {
                                        display: true,
                                        color: 'rgba(171, 167, 167,0.2)',
                                        drawBorder: false
                                    },
                                }],
                                xAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        fontSize: 11,
                                        fontColor: "rgba(171, 167, 167,0.9)",
                                    },
                                    gridLines: {
                                        display: true,
                                        color: 'rgba(171, 167, 167,0.2)',
                                        drawBorder: false
                                    },
                                }]
                            }
                        }
                    });

                    var ctx8 = document.getElementById('humidityAirChart');
                    new Chart(ctx8, {
                        type: 'line',
                        data: {
                            labels: {!!$chart['humidity_air']['label']!!},
                            datasets: [ {
                                data: {!!$chart['humidity_air']['data']!!},
                                borderColor: '#74de00',
                                borderWidth: 1,
                                backgroundColor: '#74de0061'
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            legend: {
                                display: false,
                                labels: {
                                    display: false
                                }
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        fontSize: 10,
                                        max: 100,
                                        fontColor: "rgba(171, 167, 167,0.9)",
                                    },
                                    gridLines: {
                                        display: true,
                                        color: 'rgba(171, 167, 167,0.2)',
                                        drawBorder: false
                                    },
                                }],
                                xAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        fontSize: 11,
                                        fontColor: "rgba(171, 167, 167,0.9)",
                                    },
                                    gridLines: {
                                        display: true,
                                        color: 'rgba(171, 167, 167,0.2)',
                                        drawBorder: false
                                    },
                                }]
                            }
                        }
                    });

                    var ctx8 = document.getElementById('temperatureChart');
                    new Chart(ctx8, {
                        type: 'line',
                        data: {
                            labels: {!!$chart['temperature']['label']!!},
                            datasets: [ {
                                data: {!!$chart['temperature']['data']!!},
                                borderColor: '#8500ff',
                                borderWidth: 1,
                                backgroundColor: '#8500ff6e'
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            legend: {
                                display: false,
                                labels: {
                                    display: false
                                }
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        fontSize: 10,
                                        max: 100,
                                        fontColor: "rgba(171, 167, 167,0.9)",
                                    },
                                    gridLines: {
                                        display: true,
                                        color: 'rgba(171, 167, 167,0.2)',
                                        drawBorder: false
                                    },
                                }],
                                xAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        fontSize: 11,
                                        fontColor: "rgba(171, 167, 167,0.9)",
                                    },
                                    gridLines: {
                                        display: true,
                                        color: 'rgba(171, 167, 167,0.2)',
                                        drawBorder: false
                                    },
                                }]
                            }
                        }
                    });


            })
        </script>
    @endpush
@endsection
