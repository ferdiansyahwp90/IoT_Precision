<!-- Start Footer Area  -->
<footer class="eduvibe-footer-one edu-footer footer-style-default">
    <div class="footer-top">
        <div class="container eduvibe-animated-shape">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="edu-footer-widget">
                        <div class="logo">
                            <a href="#">
                                <img class="logo-light" src="{{ asset($profiles->light_logo) }}" alt="Site Logo">
                            </a>
                        </div>
                        <p class="description">{{ $profiles->deskripsi }}</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="edu-footer-widget explore-widget">
                        <h5 class="widget-title">Social Media</h5>
                        <div class="inner">
                            <ul class="footer-link link-hover">
                                @foreach ($social as $soc)
                                    <li><a target="_blank" href="{{ url($soc->link) }}"><i
                                                class="icon-Double-arrow"></i>{{ $soc->nama_akun }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="edu-footer-widget quick-link-widget">
                        <h5 class="widget-title">Produk</h5>
                        <div class="inner">
                            <ul class="footer-link link-hover">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($products as $product)
                                    @if ($i <= 5)
                                        <li><a href="#"><i class="icon-Double-arrow"></i>{{ $product->nama }}</a>
                                        </li>
                                        @php
                                            $i++;
                                        @endphp
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="edu-footer-widget">
                        <h5 class="widget-title">Contact Info</h5>
                        <div class="inner">
                            <div class="widget-information">
                                <ul class="information-list">
                                    <li><i class="icon-map-pin-line"></i>{{ $profiles->address }}</li>
                                    <li><i class="icon-phone-fill"></i><a
                                            href="tel:{{ $profiles->phone }}">{{ $profiles->phone }}</a></li>
                                    <li><i class="icon-mail-line-2"></i><a target="_blank"
                                            href="mailto:yourmailaddress@example.com">{{ $profiles->email }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="shape-dot-wrapper shape-wrapper d-md-block d-none">
                <div class="shape-image shape-image-1">
                    <img src="{{ asset('frontend/images/shapes/shape-21-01.png') }}" alt="Shape Thumb" />
                </div>
                <div class="shape-image shape-image-2">
                    <img src="{{ asset('frontend/images/shapes/shape-35.png') }}" alt="Shape Thumb" />
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area copyright-default">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner text-center">
                        <p>Copyright {{ date('Y') }} <a href="#">IOT Control</a> . All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
