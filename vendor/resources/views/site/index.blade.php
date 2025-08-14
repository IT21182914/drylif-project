@extends('layouts.main')
@section('title', 'Home | Ihrachan')
@section('content')
    <section class="main">
        <div class="container">
            <div class="left-content">
                <p data-aos="fade-up" data-aos-delay="300">Product Sourcing and Drop Shipping Service</p>
                <h2 data-aos="fade-up" data-aos-delay="400">We keep your items safe, expertly prepare your purchases,
                    and
                    manage the shipping
                    process.</h2>
                <h6 data-aos="fade-up" data-aos-delay="500">
                    Streamline your logistics, cut warehouse costs, and deliver top-notch service to your customers.
                    Claim your complimentary quote today to grow your business!</h6>
                <div class="contact-btn" data-aos="fade-up" data-aos-delay="600">
                    <a href="#contact-us">Get Start <i class="fa-solid fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="right-content">
                <div class="banner">
                    <img src="{{ asset('assets/img/banner/1.png') }}" alt="" style="width: 80%; bottom: 0;">
                </div>
                <div class="background-image">
                    <img src="{{ asset('assets/img/patterns/boxes.svg') }}" alt="" srcset="">
                </div>

            </div>
        </div>
    </section>
    <section class="commitment mx-5">
        <div class="container">

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="500">
                    <div class="card mb-4">
                        <div class="card-body">
                            <img src="{{ asset('assets/img/icon/icon_customer.webp') }}">
                            <h6 class="card-text">Customer First</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="600">
                    <div class="card mb-4">
                        <div class="card-body">
                            <img src="{{ asset('assets/img/icon/icon_risk.webp') }}">
                            <h6 class="card-text">100% Risk Free</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="700">
                    <div class="card mb-4">
                        <div class="card-body">
                            <img src="{{ asset('assets/img/icon/icon_privacy.webp') }}">
                            <h6 class="card-text">Privacy</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="800">
                    <div class="card mb-4">
                        <div class="card-body">
                            <img src="{{ asset('assets/img/icon/icon_deligence.webp') }}">
                            <h6 class="card-text">Due Deligence</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="services mx-5">
        <div class="container">
            <div class="title">
                <h1>Our Services</h1>
            </div>
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4 class="card-text">{{ $service->title }}</h4>
                                <p>{{ $service->paragraph }}</p>
                            </div>
                            <img src="{{ asset('assets/img/patterns/wave-pattern.png') }}">
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <section class="supply-chain">
        <div class="container">
            <div class="title">
                <h1>Supply Chain Optimization</h1>
            </div>
            <ul class="nav nav-pills mb-3 align-items-center justify-content-center" id="pills-tab" role="tablist"
                data-aos="fade-up" data-aos-delay="500">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="true">Streamlined Supply
                        Line</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                        type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Worry-Free
                        Solution</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                        type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Power Behind
                        Your Business Growth</button>
                </li>
            </ul>
            <div class="row d-flex flex-wrap">
                <div class="col-lg-6 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="600">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <div class="card mb-4 h-100">
                                <div class="card-body">
                                    <h4 class="card-text">A Streamlined Supply Line</h4>
                                    <p>Whatever products you need, we develop source and deliver them to you, and help
                                        you achieve your sourcing goals: Cost saving, Higher quality, and Faster
                                        delivery.</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab" tabindex="0">
                            <div class="card mb-4 h-100">
                                <div class="card-body">
                                    <h4 class="card-text">Worry-Free Solution</h4>
                                    <p>We bear all the buying risks for you. Our expert team will follow up on each
                                        detail of every single order with our high standard. We deliver upon our
                                        promise.</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab" tabindex="0">
                            <div class="card mb-4 h-100">
                                <div class="card-body">
                                    <h4 class="card-text">The Power Behind Your Business Growth</h4>
                                    <p>Wherever you are in your seller’s journey, Ihraçhane helps to improve your supply
                                        chain, build your brand & maximize your profits so as to grow your business.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="700">
                    <div class="card mb-4 h-100">
                        <img src="{{ asset('assets/img/banner/supply-chain-banner.png') }}" alt=""
                            srcset="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="choose-us">
        <div class="container">
            <div class="title">
                <h1 data-aos="fade-up" data-aos-delay="400">We are More Than a Supplier</h1>
            </div>
            <div class="row d-flex flex-wrap">
                <div class="col-lg-6 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="500">
                    <div class="card mb-4 h-100">
                        <img src="{{ asset('assets/img/banner/supplier.png') }}" alt="" srcset="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="600">
                    <div class="card mb-4 h-100">
                        <div class="card-body">
                            <h6 class="card-text">Exclusive Pricing and Favorable Terms</h6>
                            <p>Your dedicated sourcing specialist will work with you and handle any of your requests,
                                ensuring you collaborate seamlessly with the Ihraçhane team.</p>
                            <h6 class="card-text">Stable Quality and Priority Delivery</h6>
                            <p>By working with the Ihraçhane supply chain network, we will help you to achieve cost
                                savings,
                                higher quality products, and faster delivery.</p>
                            <h6 class="card-text">Streamlined Procurement Process</h6>
                            <p>Ihraçhane will bear all your buying risks instead of you. You do not need to worry about
                                your
                                payment security, bad quality, and late delivery when you work with Ihraçhane.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial">
        <div class="container">
            <div class="title" data-aos="fade-up" data-aos-delay="400">
                <h1>Hear from our customers</h1>
            </div>
            <div class="row">
                @foreach ($testimonials as $testimonial)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card" data-aos="fade-up" data-aos-delay="500">
                            <div class="card-header">
                                <img src="{{ asset($testimonial->logo) }}" alt="" srcset="">
                            </div>
                            <div class="card-body">
                                <p>{{ $testimonial->feedback }}</p>
                            </div>
                            <div class="card-footer">
                                <img src="{{ asset($testimonial->client_pic) }}" alt="">
                                <div class="profile">
                                    <h6 class="name">{{ $testimonial->client_name }}</h6>
                                    <p>{{ $testimonial->designation }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </section>

    <section class="clients">
        <div class="container">
            <div class="title">
                <h1>Our Clients</h1>
            </div>
            <div id="slider" class="owl-carousel">
                @foreach ($clients as $client)
                    <div class="box">
                        <a href="">
                            <img src="{{ asset($client->logo) }}" alt="">
                        </a>
                    </div>
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
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            dots: true,
            responsiveClass: true,
            nav: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
@endsection
