<div class="edu-event-area eduvibe-home-two-event edu-section-gap bg-image " id="sosmed">
            <div class="container eduvibe-animated-shape">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                            <span class="pre-title">Kunjungi dan Ikuti</span>
                            <h3 class="title">Toko Online dan Sosial Media</h3>
                        </div>
                    </div>
                </div>
                @foreach ($social as $item)
                <div class="row g-5 mt--25">
                    <!-- Start Event List  -->
                    <div class="col-lg-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="edu-event event-list radius-small bg-white">
                            <div class="inner">
                                <div class="content">
                                    <div class="content-left">
                                        <h5 class="title"><a href="event-details.html">{{ $item->nama_akun}}</a></h5>
                                        <ul class="event-meta">
                                            <li><i class="ri-handbag-line"></i>{{ $item->platform}}</li>
                                        </ul>
                                    </div>
                                    <div class="content=right read-more-btn">
                                        
                                        <a class="edu-btn btn-sm btn-dark" target="_blank" href="{{$item->link}}">Kunjungi<i class="icon-arrow-right-line-right"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End Event List  -->

                </div>
                @endforeach

                <div class="shape-dot-wrapper shape-wrapper d-xl-block d-none">
                    <div class="shape shape-1"><span class="shape-dot"></span></div>
                </div>
            </div>
        </div>
