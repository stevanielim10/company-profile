@extends('layouts.front')

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>About</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li>About</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs -->
  
      <!-- ======= About Us Section ======= -->
      <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up">
  
          <div class="row content">
            <div class="col-lg-6" data-aos="fade-right">
              <h2>{{ $about->title }}</h2>
              <h3>{{ $about->subject }}</h3>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
              <p>
                {!! $about->desc !!}
              </p>
             
            </div>
          </div>
  
        </div>
      </section><!-- End About Us Section -->
  
      <!-- ======= Our Team Section ======= -->
      <section id="team" class="team section-bg">
        <div class="container">
  
          <div class="section-title" data-aos="fade-up">
            <h2>Our <strong>Team</strong></h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>
  
          <div class="row">
  
           @foreach ($team as $team)
           <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up">
              <div class="member-img">
                <img src="{{ asset('storage/'.$team->photo) }}" class="img-fluid" alt="">
                <div class="social">
                  <a href="{{ $team->twitter }}"><i class="icofont-twitter"></i></a>
                  <a href="{{ $team->facebook }}"><i class="icofont-facebook"></i></a>
                  <a href="{{ $team->instagram }}"><i class="icofont-instagram"></i></a>
                  <a href="{{ $team->linkedin }}"><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>{{ $team->name }}</h4>
                <span>{{ $team->position }}</span>
              </div>
            </div>
          </div>
           @endforeach
  
          </div>
  
        </div>
      </section><!-- End Our Team Section -->
  
      <!-- ======= Our Clients Section ======= -->
      <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Partners</h2>
          </div>
  
          <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">
  
            @foreach ($partner as $partner)
            <div class="col-lg-3 col-md-4 col-6">
              <div class="client-logo">
                <a href="{{ $partner->link }}" target="_blank" rel="noopener noreferrer">
                  <img src="{{ asset('storage/'.$partner->cover) }}" class="img-fluid" alt="{{ $partner->name }}">
                </a>
              </div>
            </div>
            @endforeach
  
          </div>
  
        </div>
      </section><!-- End Our Clients Section -->

       <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Frequently Asked Questions</h2>
          </div>
  
          <div class="faq-list">
            <ul>
              @foreach ($faq as $key => $faq)
              <li data-aos="fade-up">
                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-{{ $faq->id }}">{{ $faq->question }} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-{{ $faq->id }}" class="collapse {{$key == 0 ? 'show' : '' }}" data-parent=".faq-list">
                  <p>
                    {{ $faq->answer }}
                  </p>
                </div>
              </li>
              @endforeach
  
              {{-- <li data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                  <p>
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                  </p>
                </div>
              </li>
  
              <li data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed">Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                  <p>
                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                  </p>
                </div>
              </li>
  
              <li data-aos="fade-up" data-aos-delay="300">
                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                  <p>
                    Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                  </p>
                </div>
              </li>
  
              <li data-aos="fade-up" data-aos-delay="400">
                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                  <p>
                    Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                  </p>
                </div>
              </li> --}}
  
            </ul>
          </div>
  
        </div>
      </section><!-- End Frequently Asked Questions Section -->
  
    </main><!-- End #main -->
@endsection