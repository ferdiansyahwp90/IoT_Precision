@extends('layouts.app')
@section('content-app')
<div class="container mt-5">
  <!-- breadcrumb -->
  <!-- row -->
  <div class="row row-sm">
    <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
      <div class="card overflow-hidden sales-card bg-primary-gradient">
        <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
          <div class="">
            <h6 class="mb-3 tx-12 text-white">NITROGEN</h6>
          </div>
          <div class="pb-0 mt-0">
            <div class="d-flex">
              <div class="">
                <h4 class="tx-20 fw-bold mb-1 text-white">{{$data['nitrogen']->value}} mg/kg</h4>
                {{-- 
                <p class="mb-0 tx-12 text-white op-7">{{end($soil)['status']}}</p>
                --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
      <div class="card overflow-hidden sales-card bg-danger-gradient">
        <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
          <div class="">
            <h6 class="mb-3 tx-12 text-white">Fosfor</h6>
          </div>
          <div class="pb-0 mt-0">
            <div class="d-flex">
              <div class="">
                <h4 class="tx-20 fw-bold mb-1 text-white">{{$data['phosphorous']->value}} mg/kg</h4>
                {{-- 
                <p class="mb-0 tx-12 text-white op-7">{{end($moisture)['status']}}</p>
                --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
      <div class="card overflow-hidden sales-card bg-success-gradient">
        <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
          <div class="">
            <h6 class="mb-3 tx-12 text-white">Kalium</h6>
          </div>
          <div class="pb-0 mt-0">
            <div class="d-flex">
              <div class="">
                <h4 class="tx-20 fw-bold mb-1 text-white">{{$data['potassium']->value}} mg/kg</h4>
                {{-- 
                <p class="mb-0 tx-12 text-white op-7">{{end($light)['status']}}</p>
                --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
      <div class="card overflow-hidden sales-card bg-success-gradient">
        <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
          <div class="">
            <h6 class="mb-3 tx-12 text-white">Kelembapan Tanah</h6>
          </div>
          <div class="pb-0 mt-0">
            <div class="d-flex">
              <div class="">
                <h4 class="tx-20 fw-bold mb-1 text-white">{{$data['humidity_soil_first']->value}} %</h4>
                {{-- 
                <p class="mb-0 tx-12 text-white op-7">{{end($ambient)['status']}}</p>
                --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
      <div class="card overflow-hidden sales-card bg-warning-gradient">
        <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
          <div class="">
            <h6 class="mb-3 tx-12 text-white">Kelembapan Udara</h6>
          </div>
          <div class="pb-0 mt-0">
            <div class="d-flex">
              <div class="">
                <h4 class="tx-20 fw-bold mb-1 text-white">{{$data['humidity_air_first']->value}} °C</h4>
                {{-- 
                <p class="mb-0 tx-12 text-white op-7">{{end($ambient)['status']}}</p>
                --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
      <div class="card overflow-hidden sales-card bg-primary-gradient">
        <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
          <div class="">
            <h6 class="mb-3 tx-12 text-white">Suhu Udara</h6>
          </div>
          <div class="pb-0 mt-0">
            <div class="d-flex">
              <div class="">
                <h4 class="tx-20 fw-bold mb-1 text-white">{{$data['temperature_first']->value}}%</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
          <div class="table-responsive">
            <table class="table table-striped">
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
          <div class="table-responsive">
            <table class="table table-striped">
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
          <div class="table-responsive">
            <table class="table table-striped">
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
          <div class="table-responsive">
            <table class="table table-striped">
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
@endsection