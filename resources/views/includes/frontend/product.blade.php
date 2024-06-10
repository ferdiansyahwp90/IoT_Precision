<div class="edu-course-area eduvibe-home-two-course course-three-wrapper edu-section-gap bg-color-white" id="product">
    <div class="container eduvibe-animated-shape">
        <div class="row g-5 align-items-center mb--30">
            <div class="col-lg-6">
                <div class="section-title text-start" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <span class="pre-title">IOT Control</span>
                    <h3 class="title">Produk yang terdaftar di sistem kami</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="button-group isotop-filter filters-button-group d-flex justify-content-start justify-content-lg-end">
                    <button data-filter="*" class="is-checked"><span class="filter-text">All</span></button>
                    @foreach ($types as $type)
                        <button data-filter=".cat--{{$type->id}}"><span class="filter-text">{{$type->kategori}}</span></button>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row g-5">
            <div class="col-12">
                <div class="grid-metro3 mesonry-list">
                    <div class="resizer"></div>
                    @foreach ($products as $product)
                        <!-- Start Single Card  -->
                        <div class="grid-metro-item cat--1 cat--3">
                            <div class="edu-card card-type-3 radius-small">
                                <div class="inner">
                                    <div class="thumbnail">
                                        <a href="#" style="height: 200px">
                                            <img class="w-100" src="{{$product->foto ?? asset(Helper::profile()->logo) }}" alt="Course Meta">
                                        </a>
                                        <div class="wishlist-top-right">
                                            <button class="wishlist-btn"><i class="icon-Heart"></i></button>
                                        </div>
                                        <div class="top-position status-group left-bottom">
                                            <span class="eduvibe-status status-03">{{$product->kategori->kategori}}</span>
                                        </div>
                                    </div>

                                    <div class="content">
                                        <div class="card-top">
                                            <div class="author-meta">
                                                <div class="author-thumb">
                                                    <a href="#">
                                                        <img src="{{ asset('frontend/images/instructor/instructor-small/instructor-1.jpg') }}" alt="Author Images">
                                                        <span class="author-title">Administrator</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <ul class="edu-meta meta-02">
                                                <li><i class="icon-file-list-3-line"></i>{{ count($product->penjualan)}} Penjualan</li>
                                            </ul>
                                        </div>
                                        <h6 class="title"><a href="#">{{$product->nama}}</a>
                                            <p class="text-muted">Tersedia Di:{{$product->is_available_in}} - {{$product->store}}</p>
                                        </h6>
                                        <div class="card-bottom">
                                            <div class="price-list price-style-02">
                                                <div class="price current-price">{{Helper::rupiah($product->harga_jual)}}</div>
                                                {{-- <div class="price old-price">$65.99</div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-hover-action">
                                    <div class="hover-content">
                                        <div class="content-top">
                                            <div class="top-status-bar">
                                                <span class="eduvibe-status status-03">{{$product->kategori->kategori}}</span>
                                            </div>
                                            <div class="top-wishlist-bar">
                                                <button class="wishlist-btn"><i class="icon-Heart"></i></button>
                                            </div>
                                        </div>
                                        <h6 class="title"><a href="#">{{$product->nama}}</a></h6>

                                        <p class="description">{{$product->deskripsi}}</p>
                                        <p class=" text-white">Tersedia Di:{{$product->is_available_in}} - {{$product->store}}</p>
                                        <div class="price-list price-style-02">
                                            <div class="price current-price">{{Helper::rupiah($product->harga_jual)}}</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->
                    @endforeach


                </div>
            </div>
        </div>

        <div class="shape-dot-wrapper shape-wrapper d-xl-block d-none">
            <div class="shape-image shape-image-1">
                <img src="{{ asset('frontend/images/shapes/shape-04-02.png') }}" alt="Shape Thumb" />
            </div>
            <div class="shape-image shape-image-2">
                <img src="{{ asset('frontend/images/shapes/shape-03-06.png') }}" alt="Shape Thumb" />
            </div>
            <div class="shape-image shape-image-3">
                <img src="{{ asset('frontend/images/shapes/shape-04-03.png') }}" alt="Shape Thumb" />
            </div>
            <div class="shape-image shape-image-4">
                <img src="{{ asset('frontend/images/shapes/shape-07-01.png') }}" alt="Shape Thumb" />
            </div>
        </div>
    </div>
</div>
