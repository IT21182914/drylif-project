<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Home | Ihrachan') </title>
    <link rel="shortcut icon" href="{{ asset('assets/img/icon/favicon.svg') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('assets/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/owlcarousel/owl.theme.default.min.css') }}">
    <!-- Vite CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('styles')
</head>

<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="{{ route('site.index') }}"><img src="{{ asset('assets/img/logo/logo.svg') }}" alt=""
                        srcset=""></a>
            </div>
            <nav class="desktop-menu">
                <ul>
                    <li><a href="{{ route('site.index') }}">Home</a></li>
                    <li><a href="{{ route('site.sourcing') }}">Sourcing</a></li>
                    <li><a href="{{ route('site.shipping') }}">Dropshipping</a></li>
                    <li class="contact-btn">
                        <a href="#contact-us">Contact Us</a>
                    </li>
                </ul>
            </nav>
            <div class="hamburger-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav class="mobile-menu">
                <ul>
                    <li><a href="{{ route('site.index') }}">Home</a></li>
                    <li><a href="{{ route('site.sourcing') }}">Sourcing</a></li>
                    <li><a href="{{ route('site.shipping') }}">Dropshipping</a></li>
                    <li class="contact-btn">
                        <a href="#contact-us">Contact Us</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>



    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="z-index: 999999999999;">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @yield('content')
    <footer>
        @php
            use App\Models\Social;
            use App\Models\Company;
            $socials = Social::all();
            $company = Company::first();

        @endphp
        <div class="container">
            <div class="row">
                <div class="company-details col-lg-6 col-md-6 col-sm-12 mb-4">
                    <div class="logo mb-4">
                        <img src="{{ asset('assets/img/logo/logo.svg') }}" alt="">
                    </div>
                    <div class="social-media mb-4">
                        @foreach ($socials as $social)
                            <a href="{{ $social->link }}">{!! $social->icon !!}</a>
                        @endforeach

                    </div>
                    <div class="details mb-4">
                        <p>{{ $company->address }}
                        </p>
                    </div>
                    <div class="details mb-4">
                        <p>{{ $company->phone_number }}
                        </p>
                    </div>
                    <div class="details mb-4">
                        <p>{{ $company->email }}
                        </p>
                    </div>
                    <div class="details mb-4">

                        <p><i class="fa-brands fa-whatsapp"></i> {{ $company->whatsapp_number }}
                        </p>
                    </div>
                </div>
                <div class="others col-lg-2 col-md-6 col-sm-12 mb-4">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="{{ route('site.sourcing') }}">Sourcing</a></li>
                        <li><a href="{{ route('site.shipping') }}">Dropshipping</a></li>
                    </ul>
                </div>
                <div class="others col-lg-2 col-md-6 col-sm-12 mb-4">
                    <h4>Explore</h4>
                    <ul>
                        <li><a href="#contact-us">Contact Us</a></li>
                    </ul>
                </div>
                <div class="others col-lg-2 col-md-6 col-sm-12 mb-4">
                    <h4>Corporate</h4>
                    <ul>
                        <li><a href="">About Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('assets/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    @yield('scripts')
</body>

</html>
