@extends('layouts.main')
@section('title', 'Dropshipping | Ihrachan')
@section('content')
    <section class="main">
        <div class="container">
            <div class="left-content">
                <p data-aos="fade-up" data-aos-delay="300">{{ $category->span }}</p>
                <h2 data-aos="fade-up" data-aos-delay="400">{{ $category->header }}</h2>
                <h6 data-aos="fade-up" data-aos-delay="500">{{ $category->paragraph }}</h6>
                <div class="contact-btn" data-aos="fade-up" data-aos-delay="600">
                    <a href="#contact-us">JOIN NOW<i class="fa-solid fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="right-content">
                <div class="banner">
                    <img src="{{ asset($category->image) }}" alt="" style="width: 100%; bottom: 30%;">
                </div>
                <div class="background-image">
                    <img src="{{ asset('assets/img/patterns/boxes.svg') }}" alt="" srcset="">
                </div>

            </div>
        </div>
    </section>

    <section class="sourcing">
        <div class="container">
            <div class="title">
                <h1 data-aos="fade-up" data-aos-delay="400">{{ $category->title }}</h1>
            </div>
            <div class="row d-flex flex-wrap">
                <div class="col-lg-6 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="500">
                    <div class="card h-100 mb-4">
                        <img src="{{ asset($category->side_image) }}" alt="" srcset="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="600">
                    @foreach ($sub_categories as $index => $sub_category)
                        <div class="card menu-card  mb-4">
                            <a href="{{ route('site.subCategoryShow', ['slug' => $sub_category->slug]) }}">
                                <div class="card-body option-card">
                                    <h4 class="card-text">{{ $index + 1 }}. {{ $sub_category->title }}</h4>
                                    <p>{{ $sub_category->sub_title }}</p>
                                    <div class="learn-more">
                                        <p>Learn More</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <section class="sourcing">
        <div class="container">
            <div class="title">
                <h1 data-aos="fade-up" data-aos-delay="400">How We Work</h1>
            </div>
            <div class="row d-flex flex-wrap">
                <div class="workflow-container">
                    <div class="step">
                        <h3>STEP 1</h3>
                        <img src="{{ asset('assets/img/icon/authorize.png') }}" alt="Step 1">
                        <p>Authorize Your Store</p>
                    </div>
                    <div class="step">
                        <h3>STEP 2</h3>
                        <img src="{{ asset('assets/img/icon/products.png') }}" alt="Step 2">
                        <p>Find Products</p>
                    </div>
                    <div class="step">
                        <h3>STEP 3</h3>
                        <img src="{{ asset('assets/img/icon/order.png') }}" alt="Step 3">
                        <p>Sync & Place Orders</p>
                    </div>
                    <div class="step">
                        <h3>STEP 4</h3>
                        <img src="{{ asset('assets/img/icon/delivery.png') }}" alt="Step 4">
                        <p>Fulfill And Deliver</p>
                    </div>
                    <div class="step">
                        <h3>STEP 5</h3>
                        <img src="{{ asset('assets/img/icon/profits.png') }}" alt="Step 5">
                        <p>Get Your Profit</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="clients">
        <div class="container">
            <div class="title">
                <h1>Quality Shipping Partners</h1>
            </div>
            <div class="logo-grid">
                @foreach ($partners as $partner)
                    <div class="logo-item"><img src="{{ asset($partner->logo) }}" alt="Client Logo"></div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="contact-us" id="contact-us" data-aos="fade-up" data-aos-delay="400">
        <div class="container">
            <div class="title">
                <h1>Submit the form to have our experts solution</h1>
            </div>
            <form class="row g-3" action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="col-md-6">
                    <label for="first_name" class="form-label">First Name <span class="text-light">*</span></label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                        placeholder="Enter Your First Name" required>
                </div>
                <div class="col-md-6">
                    <label for="last_name" class="form-label">Last Name <span class="text-light">*</span></label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                        placeholder="Enter Your Last Name" required>
                </div>
                <div class="col-md-6">
                    <label for="phone_number" class="form-label">Phone Number <span class="text-light">*</span></label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                        placeholder="Enter Your Phone Number" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email <span class="text-light">*</span></label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="Enter Your Email Address" required>
                </div>

                <div class="col-12">
                    <label class="form-label">Which Marketplace Do You Sell On? <span class="text-light">*</span></label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="amazon" name="marketplaces[]"
                            value="Amazon">
                        <label class="form-check-label" for="amazon">Amazon</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ebay" name="marketplaces[]"
                            value="Ebay">
                        <label class="form-check-label" for="ebay">Ebay</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="etsy" name="marketplaces[]"
                            value="ETSY">
                        <label class="form-check-label" for="etsy">ETSY</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="walmart" name="marketplaces[]"
                            value="Walmart">
                        <label class="form-check-label" for="walmart">Walmart</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="wayfair" name="marketplaces[]"
                            value="Wayfair">
                        <label class="form-check-label" for="wayfair">Wayfair</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="other" name="marketplaces[]"
                            value="Other">
                        <label class="form-check-label" for="other">Other</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="none" name="marketplaces[]"
                            value="I Do Not Sell On Marketplaces">
                        <label class="form-check-label" for="none">I Do Not Sell On Marketplaces</label>
                    </div>
                </div>

                <div class="col-12">
                    <label for="message" class="form-label">Your Message <span class="text-light">*</span></label>
                    <textarea class="form-control" id="message" name="message" rows="10"></textarea>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <button type="submit" class="btn btn-submit">Submit</button>
                </div>
            </form>


        </div>

    </section>

@endsection
@section('scripts')
    <script>
        AOS.init();
    </script>
@endsection
