

<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
  <div class="card overflow-hidden sales-card bg-primary-gradient">
    <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
      <div class="">
        <h6 class="mb-3 tx-12 text-white">NITROGEN</h6>
      </div>
      <div class="pb-0 mt-0">
        <div class="d-flex">
          <div class="">
            <h4 class="tx-20 fw-bold mb-1 text-white">{{$data['nitrogen']->value ?? 0}} mg/kg</h4>
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
            <h4 class="tx-20 fw-bold mb-1 text-white">{{$data['phosphorous']->value ?? 0}} mg/kg</h4>
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
            <h4 class="tx-20 fw-bold mb-1 text-white">{{$data['potassium']->value ?? 0}} mg/kg</h4>
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
            <h4 class="tx-20 fw-bold mb-1 text-white">{{$data['humidity_soil_first']->value ?? 0}} %</h4>
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
            <h4 class="tx-20 fw-bold mb-1 text-white">{{$data['humidity_air_first']->value ?? 0}} °C</h4>
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
            <h4 class="tx-20 fw-bold mb-1 text-white">{{$data['temperature_first']->value ?? 0}}%</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
