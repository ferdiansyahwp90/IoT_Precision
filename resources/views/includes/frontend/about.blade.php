<div class="edu-about-area about-style-3 edu-section-gap bg-image" id="about">
    <div class="container eduvibe-animated-shape">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 pr--80">
                <div class="gappery-wrapper" data-sal-delay="200" data-sal="fade" data-sal-duration="800">
                    <div class="row g-5 align-items-end">
                        <div class="col-lg-5 col-md-6">
                            <div class="gallery-image mt--85">
                                <img class="w-100" src="{{ asset('frontend/images/about/about-04/gallery-1.jpg') }}" alt="Gallery Images">
                                <div class="icon-badge">
                                    <i class="icon-ribbon"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-6">
                            <div class="gallery-image">
                                <img class="w-100" src="{{ asset('frontend/images/about/about-04/gallery-2.jpg') }}" alt="Gallery Images">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="gallery-image gallery-image-3 text-center">
                                <img src="{{ asset('frontend/images/about/about-04/gallery-3.jpg') }}" alt="Gallery Images">
                                <div class="student-like-status bounce-slide">
                                    <div class="inner">
                                        <div class="icon">
                                            <i class="icon-Smile"></i>
                                        </div>
                                        <div class="content">
                                            <h6 class="title">{{count($products)}}</h6>
                                            <span class="subtitle">Total Products</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="inner">
                    <div class="section-title text-start" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">
                        <span class="pre-title">Tentang Kami</span>
                        <h3 class="title">Kualitas Barang dan jasa prioritas kami</h3>

                    </div>
                    <p class="description mt--40" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">{{$profiles->about}}</p>
                    <div class="read-more-btn mt--60 mt_lg--30 mt_md--30 mt_sm--30" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">
                        <a class="edu-btn" href="{{route('login')}}">Masuk Aplikasi <i class="icon-arrow-right-line-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-dot-wrapper shape-wrapper d-xl-block d-none">
            <div class="shape-image shape-image-1">
                <img src="{{ asset('frontend/images/shapes/shape-21.png') }}" alt="Shape Thumb" />
            </div>
            <div class="shape-image shape-image-2">
                <img src="{{ asset('frontend/images/shapes/shape-13-04.png') }}" alt="Shape Thumb" />
            </div>
            <div class="shape-image shape-image-3">
                <img src="{{ asset('frontend/images/shapes/shape-03-05.png') }}" alt="Shape Thumb" />
            </div>
            <div class="shape-image shape-image-4">
                <img src="{{ asset('frontend/images/shapes/shape-15-02.png') }}" alt="Shape Thumb" />
            </div>
        </div>

    </div>
</div>
