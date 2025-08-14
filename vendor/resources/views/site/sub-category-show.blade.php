@extends('layouts.main')
@section('content')
    <section class="main">
        <div class="container">
            <div class="left-content">
                <h2 data-aos="fade-up" data-aos-delay="400">{{ $sub_category->title }}</h2>
                <h6 data-aos="fade-up" data-aos-delay="500">{{ $sub_category->sub_title }}</h6>
                <div class="contact-btn" data-aos="fade-up" data-aos-delay="600">
                    <a href="#contact-us">Get Start <i class="fa-solid fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="right-content">
                <div class="banner">
                    <img src="{{ asset($sub_category->banner) }}" alt="" style="width: 110%; bottom: 10%;">
                </div>
                <div class="background-image">
                    <img src="{{ asset('assets/img/patterns/boxes.svg') }}" alt="" srcset="">
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
                @foreach ($sub_category_services as $index => $sub_category_service)
                    @if ($index % 2 == 0)
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4" data-aos="fade-up" data-aos-delay="500">
                            <div class="card mb-4 h-100">
                                <img src="{{ asset($sub_category_service->image) }}" alt="" srcset="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4" data-aos="fade-up" data-aos-delay="600">
                            <div class="card mb-4 h-100">
                                <div class="card-body">
                                    <h4 class="card-text">{{ $sub_category_service->name }}</h4>
                                    <p>{{ $sub_category_service->paragraph }}</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4" data-aos="fade-up" data-aos-delay="600">
                            <div class="card mb-4 h-100">
                                <div class="card-body">
                                    <h4 class="card-text">{{ $sub_category_service->name }}</h4>
                                    <p>{{ $sub_category_service->paragraph }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4" data-aos="fade-up" data-aos-delay="500">
                            <div class="card mb-4 h-100">
                                <img src="{{ asset($sub_category_service->image) }}" alt="" srcset="">
                            </div>
                        </div>
                    @endif
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
