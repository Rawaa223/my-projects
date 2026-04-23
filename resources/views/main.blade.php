<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Restaurantly</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="user/assets/img/favicon.png" rel="icon">
  <link href="user/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="user/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="user/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="user/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="user/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="user/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="user/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Restaurantly
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">
  <style>
    #date,
    #time {
      color-scheme: dark;
    }
  </style>
   <div style="margin-top: 100px;" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn"
   >@yield('content')</div> 


  <header id="header" class="header fixed-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@restaurantly.com">contact@restaurantly.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
        </div>
        </div>
      </div>

    <div class="branding d-flex align-items-cente">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <h1 class="sitename">Restaurantly</h1>
        </a>
        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="#hero" class="active">Home<br></a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#menu">Menu</a></li>
            <li><a href="#specials">Specials</a></li>
            <li><a href="#events">Events</a></li>
            <li><a href="#chefs">Chefs</a></li>
            <li><a href="#gallery">Gallery</a></li>              
            <li><a href="#contact">Contact</a></li>
            <li class="nav-auth-spacer" aria-hidden="true"></li>
            @if (Route::has('login'))
              @guest
                <li><a href="{{ route('login') }}" class="nav-auth-link nav-auth-link-primary">Login</a></li>
              @endguest
            @endif
            @if (Route::has('register'))
              @guest
                <li><a href="{{ route('register') }}">Sign Up</a></li>
              @endguest
            @endif
            @auth
              <li><a href="{{ route('food.cart') }}" class="nav-auth-link">Cart</a></li>

              <li><a href="{{ route('dashboard') }}" class="nav-auth-link">Dashboard</a></li>
              <li class="nav-auth-form-item">
                <form method="POST" action="{{ route('logout') }}" class="nav-auth-form">
                  @csrf
                  <button type="submit" class="nav-auth-button nav-auth-button-primary">Logout</button>
                </form>
              </li>
            @endauth
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

        </nav>

      </div>

    </div>

  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="user/assets/img/hero-bg.jpg" alt="" data-aos="fade-in">

      <div class="container">
        <div class="row">
          <div class="col-lg-8 d-flex flex-column align-items-center align-items-lg-start">
            <h2 data-aos="fade-up" data-aos-delay="100">Welcome to <span>Restaurantly</span></h2>
            <p data-aos="fade-up" data-aos-delay="200">Delivering great food for more than 18 years!</p>
            <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
              <a href="#menu" class="cta-btn">Our Menu</a>
              <a href="#book-a-table" class="cta-btn">Book a Table</a>
            </div>
          </div>
          <div class="col-lg-4 d-flex align-items-center justify-content-center mt-5 mt-lg-0">
            <a href="https://www.youtube.com/watch?v=xPPLbEFbCAo" class="glightbox pulsating-play-btn"></a>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-6 order-1 order-lg-2">
            <img src="user/assets/img/about.jpg" class="img-fluid about-img" alt="">
          </div>
          <div class="col-lg-6 order-2 order-lg-1 content">
            <h3>Authentic Flavors & Fresh Ingredients</h3>
            <p class="fst-italic">
              We believe in serving the finest cuisine crafted from the freshest local and imported ingredients, prepared by our experienced chefs with passion and dedication.
            </p>
            <ul>
              <li><i class="bi bi-check2-all"></i> <span>Award-winning dishes prepared with traditional recipes and modern techniques.</span></li>
              <li><i class="bi bi-check2-all"></i> <span>Fresh seafood, meats, and vegetables sourced daily from premium suppliers.</span></li>
              <li><i class="bi bi-check2-all"></i> <span>Our expert culinary team brings over 50 years of combined experience in fine dining and international cuisine.</span></li>
            </ul>
            <p>
              Since 1985, we've been committed to delivering an exceptional dining experience with outstanding service, elegant ambiance, and unforgettable meals that celebrate the art of gastronomy.
            </p>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->
  

    <!-- Why Us Section -->
    <section id="why-us" class="why-us section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>WHY US</h2>
        <p>Why Choose Our Restaurant</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card-item">
              <span>01</span>
              <h4><a  class="stretched-link">Premium Quality</a></h4>
              <p>We source only the finest ingredients from trusted suppliers worldwide to ensure the highest quality in every dish.</p>
            </div>
          </div><!-- Card Item -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card-item">
              <span>02</span>
              <h4><a  class="stretched-link">Expert Chefs</a></h4>
              <p>Our talented chefs combine culinary excellence with creativity to deliver innovative dishes that delight your palate.</p>
            </div>
          </div><!-- Card Item -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card-item">
              <span>03</span>
              <h4><a class="stretched-link">Exceptional Service</a></h4>
              <p>Our attentive staff ensures a memorable dining experience with personalized attention to every detail.</p>
            </div>
          </div><!-- Card Item -->

        </div>

      </div>

    </section><!-- /Why Us Section -->


    <!-- Menu Section -->
    @auth
    <section id="menu" class="menu section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Menu</h2>
        <p>Check Our Tasty Menu</p>
      </div><!-- End Section Title -->

      <div class="container isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul class="menu-filters isotope-filters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-starters">Starters</li>
              <li data-filter=".filter-salads">Salads</li>
              <li data-filter=".filter-specialty">Specialty</li>
            </ul>
          </div>
          @yield('home')
        </div><!-- Menu Filters -->

        <!-- Menu Container -->

      </div>

    </section><!-- /Menu Section -->
    @endauth
     <!-- Specials Section -->
    @auth
    <section id="specials" class="specials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Specials</h2>
        <p>Check Our Specials</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#specials-tab-1">Grilled Salmon</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#specials-tab-2">Ribeye Steak</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#specials-tab-3">Lobster Pasta</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#specials-tab-4">Duck Confit</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#specials-tab-5">Seafood Platter</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="specials-tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Pan-Seared Grilled Salmon</h3>
                    <p class="fst-italic">Fresh Atlantic salmon fillet, perfectly grilled to a delicate flake with a golden crust.</p>
                    <p>Our signature salmon is served with roasted seasonal vegetables, lemon butter sauce, and complemented by a side of creamy mashed potatoes. This dish showcases the natural flavors of premium quality seafood, finished with fresh herbs and a touch of Mediterranean elegance.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="user/assets/img/specials-1.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="specials-tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Premium Ribeye Steak</h3>
                    <p class="fst-italic">Dry-aged USDA Prime cut, expertly grilled to perfection and basted with herb-infused butter.</p>
                    <p>Our finest steak offering features a thick-cut ribeye, aged for 28 days to enhance tenderness and flavor. Served with truffle mashed potatoes, grilled asparagus, and topped with a red wine reduction. Each bite delivers the perfect balance of tenderness and rich, beefy flavors.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="user/assets/img/specials-2.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="specials-tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Lobster Pasta Al Dente</h3>
                    <p class="fst-italic">Fresh Canadian lobster tossed with handmade tagliatelle in a light garlic and white wine sauce.</p>
                    <p>This elegant dish combines succulent lobster meat with perfectly cooked pasta, finished with fresh parsley, lemon zest, and a drizzle of premium olive oil. Every component is prepared with precision to create a harmonious blend of flavors that celebrates the richness of lobster.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="user/assets/img/specials-3.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="specials-tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>French-Style Duck Confit</h3>
                    <p class="fst-italic">Tender duck leg slow-cooked in its own fat until fork-tender and golden brown.</p>
                    <p>This classic French delicacy is served with creamy French lentils, roasted root vegetables, and finished with a silky red wine gastrique. The succulent duck meat pairs perfectly with seasonal sides, delivering an unforgettable blend of flavors and textures.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="user/assets/img/specials-4.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="specials-tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Luxurious Seafood Platter</h3>
                    <p class="fst-italic">A stunning selection of the finest seafood offerings showcased on a bed of ice.</p>
                    <p>This spectacular platter features fresh oysters, shrimp, crab, lobster, and assorted market fish, beautifully arranged and served with citrus vinaigrettes and mignonette sauce. Perfect for sharing or enjoying as a complete seafood experience.</p>
                  </div>
                    <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="user/assets/img/specials-5.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Specials Section -->
    @endauth

    <!-- Events Section -->
    @auth
    <section id="events" class="events section">

      <img class="slider-bg" src="assets/img/events-bg.jpg" alt="" data-aos="fade-in">

      <div class="container">

        <div class="swiper init-swiper" data-aos="fade-up" data-aos-delay="100">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="row gy-4 event-item">
                <div class="col-lg-6">
                  <img src="user/assets/img/events-slider/events-slider-1.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Birthday Parties</h3>
                  <div class="price">
                    <p><span>$189</span></p>
                  </div>
                  <p class="fst-italic">
                    Celebrate your special day with us in an intimate and elegant setting. Our team will ensure a memorable experience for you and your guests.
                  </p>
                  <ul>
                    <li><i class="bi bi-check2-circle"></i> <span>Customized menu tailored to your preferences.</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>Dedicated server and special attention to detail.</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>Private dining room available for groups.</span></li>
                  </ul>
                  <p>
                    Make your birthday unforgettable at our restaurant with exceptional food, warm hospitality, and an atmosphere perfect for celebration.
                  </p>
                </div>
              </div>
            </div><!-- End Slider item -->

            <div class="swiper-slide">
              <div class="row gy-4 event-item">
                <div class="col-lg-6">
                  <img src="user/assets/img/events-slider/events-slider-2.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Private Parties</h3>
                  <div class="price">
                    <p><span>$290</span></p>
                  </div>
                  <p class="fst-italic">
                    Host your exclusive gathering in our elegant dining space. Perfect for corporate events, anniversaries, and intimate celebrations.
                  </p>
                  <ul>
                    <li><i class="bi bi-check2-circle"></i> <span>Private dining room with full customization options.</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>Tailored menu and beverage selection.</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>Professional staff dedicated to your event.</span></li>
                  </ul>
                  <p>
                    We create the perfect ambiance for your private celebration with attentive service and an unforgettable culinary experience.
                  </p>
                </div>
              </div>
            </div><!-- End Slider item -->

            <div class="swiper-slide">
              <div class="row gy-4 event-item">
                <div class="col-lg-6">
                  <img src="user/assets/img/events-slider/events-slider-3.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Custom Parties</h3>
                  <div class="price">
                    <p><span>$99</span></p>
                  </div>
                  <p class="fst-italic">
                    Create your perfect event tailored to your unique needs and preferences. We'll work with you to bring your vision to life.
                  </p>
                  <ul>
                    <li><i class="bi bi-check2-circle"></i> <span>Fully customizable menu and dining arrangements.</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>Flexible timing and flexible group sizes.</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>Special themes and decorations available.</span></li>
                  </ul>
                  <p>
                    Whether it's a special occasion or a casual get-together, let us handle all the details while you enjoy great food and company.
                  </p>
                </div>
              </div>
            </div><!-- End Slider item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Events Section -->
    @endauth


   

    
    <!-- Book A Table Section -->
    <section id="book-a-table" class="book-a-table section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>RESERVATION</h2>
        <p>Book a Table</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <form action="{{ route('book.table') }}" method="post" role="form" class="php-email-form" data-laravel-form="true">
          @csrf
          <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="{{ old('name') }}" required="">
            </div>
            <div class="col-lg-4 col-md-6">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="{{ old('email') }}" required="">
            </div>
            <div class="col-lg-4 col-md-6">
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" value="{{ old('phone') }}" required="">
            </div>
            <div class="col-lg-4 col-md-6">
              <input type="date" name="date" class="form-control" id="date" placeholder="Date" value="{{ old('date') }}" required="">
            </div>
            <div class="col-lg-4 col-md-6">
              <input type="time" class="form-control" name="time" id="time" placeholder="Time" value="{{ old('time') }}" required="">
            </div>
            <div class="col-lg-4 col-md-6">
              <input type="number" class="form-control" name="guest_number" id="people" placeholder="Number Of Guests" value="{{ old('guest_number') }}" max="20" min="1" required="" >
            </div>
          </div>

          <div class="error-message"></div>

          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message">{{ old('message') }}</textarea>
          </div>

          <div class="text-center mt-3">
            <div class="loading">Loading</div>
            @if(session('booking_message'))
              <div class="sent-message d-block">{{ session('booking_message') }}</div>
            @else
              <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
            @endif
            <button type="submit">Book a Table</button>
          </div>
        </form><!-- End Reservation Form -->

      </div>

    </section><!-- /Book A Table Section -->
    @auth

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>What they're saying about us</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper" data-speed="600" data-delay="5000" data-breakpoints="{ &quot;320&quot;: { &quot;slidesPerView&quot;: 1, &quot;spaceBetween&quot;: 40 }, &quot;1200&quot;: { &quot;slidesPerView&quot;: 3, &quot;spaceBetween&quot;: 40 } }">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 20
                }
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item" "="">
            <p>
              <i class=" bi bi-quote quote-icon-left"></i>
                <span>The food quality and presentation were absolutely outstanding. Every dish was prepared to perfection, and the service was impeccable. I highly recommend this restaurant!</span>
                <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <img src="user/assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>We had an amazing dinner here for our anniversary. The ambiance was romantic, the food was exquisite, and the staff made us feel truly special. We'll definitely be coming back!</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <img src="user/assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Best seafood I've had in years! The chef clearly knows their craft. Fresh ingredients, perfect seasoning, and beautiful plating. This is my new favorite restaurant!</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <img src="user/assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Outstanding service and incredible food. The staff treated us like family, and every dish was a culinary masterpiece. Highly recommend for special occasions!</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <img src="user/assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>The wine selection is exceptional, and the sommelier provided excellent recommendations. Paired with the perfect cuisine, it was an unforgettable evening of fine dining.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <img src="user/assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->
    @endauth
    @auth
    <!-- Gallery Section -->
    <section id="gallery" class="gallery section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Gallery</h2>
        <p>Some photos from Our Restaurant</p>
      </div><!-- End Section Title -->

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="user/assets/img/gallery/gallery-1.jpg" class="glightbox" data-gallery="images-gallery">
                <img src="user/assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="user/assets/img/gallery/gallery-2.jpg" class="glightbox" data-gallery="images-gallery">
                <img src="user/assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="user/assets/img/gallery/gallery-3.jpg" class="glightbox" data-gallery="images-gallery">
                <img src="user/assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="user/assets/img/gallery/gallery-4.jpg" class="glightbox" data-gallery="images-gallery">
                <img src="user/assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="user/assets/img/gallery/gallery-5.jpg" class="glightbox" data-gallery="images-gallery">
                <img src="user/assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="user/assets/img/gallery/gallery-6.jpg" class="glightbox" data-gallery="images-gallery">
                <img src="user/assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="user/assets/img/gallery/gallery-7.jpg" class="glightbox" data-gallery="images-gallery">
                <img src="user/assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="user/assets/img/gallery/gallery-8.jpg" class="glightbox" data-gallery="images-gallery">
                <img src="user/assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

        </div>

      </div>

    </section><!-- /Gallery Section -->
    @endauth

    <!-- Chefs Section -->
    @auth
    <section id="chefs" class="chefs section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Team</h2>
        <p>Meet Our Expert Culinary Team</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <img src="user/assets/img/chefs/chefs-1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Walter White</h4>
                  <span>Master Chef</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <img src="user/assets/img/chefs/chefs-2.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Sarah Jhonson</h4>
                  <span>Patissier</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <img src="user/assets/img/chefs/chefs-3.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>William Anderson</h4>
                  <span>Cook</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>

    </section><!-- /Chefs Section -->
    @endauth

   

   

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </div><!-- End Section Title -->

      <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
        <iframe style="border:0; width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div><!-- End Google Maps -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Location</h3>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Open Hours</h3>
                <p>Monday-Saturday:<br>11:00 AM - 2300 PM</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+1 5589 55488 55</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>contact@restaurantly.com</p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <div class="col-lg-8">
            <form action="{{ route('contact.send') }}#contact" method="post">
              @csrf
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="text-center mt-3">

  <button type="submit">Send Message</button>

  @if(session('success_message'))
    <div class="sent-message d-block mt-2">
      {{ session('success_message') }}
    </div>
  @endif

</div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Restaurantly</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>contact@restaurantly.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Restaurantly</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="user/assets/vendor/php-email-form/validate.js"></script>
  <script src="user/assets/vendor/aos/aos.js"></script>
  <script src="user/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="user/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="user/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="user/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="user/assets/js/main.js"></script>

</body>

</html>
