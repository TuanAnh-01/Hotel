<x-app-layout>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Hiroto Template">
    <meta name="keywords" content="Hiroto, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hiroto | Template</title>

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css" />
    
        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="/css/stylebooking.css" />
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    
    <!-- Header Section End -->

    <!-- Blog Hero Begin -->
    <section class="blog-hero spad set-bg" data-setbg="../images/{{ $showevent->images }}">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10 text-center">
                    <div class="blog__hero__text">
                        <div class="tag">{{ $showevent->name }}</div>
                        <h2>{{ $showevent->title }}</h2>
                        <ul>
                            <li><i class="fa fa-clock-o"></i> {{ $showevent->organization }}</li>
                            <li><i class="fa fa-user"></i>Number of participants : {{ $showevent->Capacity }} </li>
                            {{-- <li><i class="fa fa-clock-o"></i>Services: {{ $showevent->services }}</li> --}}
                            <li><i class="fa fa-money"></i>Pirce : {{ $showevent->Price }}$ </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Hero End -->

    
    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <button  class="primary-btn open-booking-button">Booking Now</button>
                                <div class="booking-form-wrapper" >
                                    <form class="booking-form" action="{{ route('Event.keySession') }}" method="post">
                                      <div class="section-center">
                                          <div class="">
                                              <div class="row">
                                                  <div class="booking-form mt-5 mb-5" >
                                                      <div class="form-header">
                                                          <h1>Make your reservation</h1>
                                                      </div>
                                                      <form >
                                                      @csrf
                                                        <input type="text" name="room_id" value="{{$showevent->id}}" hidden>
                                                        <input type="text" name="name" value="{{$showevent->name}}" hidden>
                                                          <div class="form-group input-not-empty">
                                                              <input class="form-control" type="text" name="title" value="{{$showevent->title}} " readonly>
                                                              <span class="form-label">Event</span>
                                                          </div>
                                                          <div class="row">
                                                              <div class="col-md-6">
                                                                  <div class="form-group input-not-empty">
                                                                      <input class="form-control" name="arrival" type="date" required>
                                                                      <span class="form-label">Check In</span>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group input-not-empty" >
                                                                      <input class="form-control" name="departure" type="date" required>
                                                                      <span class="form-label">Check out</span>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="row">
                                                              <div class="col-md-4">
                                                                  <div class="form-group input-not-empty" >
                                                                      <input class="form-control" type="text" name="venue" value="{{$showevent->venue}} " readonly>
                                                                      <span class="select-arrow"></span>
                                                                      <span class="form-label">Venue</span>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-4">
                                                                  <div class="form-group input-not-empty">
                                                                      <span class="form-label">Capacity</span>
                                                                      <input class="form-control " type="text" name="Capacity"  placeholder="Max {{$showevent->Capacity}} people" required>
                                                                      
                                                                      
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-4">
                                                                  <div class="form-group input-not-empty">
                                                                      <input class="form-control" type="text" name="Price" value="{{$showevent->Price}}" readonly>
                                                                      <span class="select-arrow"></span>
                                                                      <span class="form-label">Price $/day</span>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="row">
                                                              <div class="col-md-6">
                                                                  <div class="form-group input-not-empty">
                                                                      <input class="form-control" type="text" name="email" value="{{ Auth::user()->email }}" readonly>
                                                                      {{-- <x-input id="email" type="email" class="form-control" wire:model.defer="state.email" autocomplete="username" /> --}}
                                                                      <span class="form-label">Email</span>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group input-not-empty">
                                                                      <input class="form-control" type="text" name="phone" placeholder="Enter you Phone" required>
                                                                      <span class="form-label">Phone</span>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="form-btn">
                                                              <button class="submit-btn" type="submit" >Book Now</button>
                                                          </div>
                                                      </form>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                    </form>
                                </div>
            <div class="row d-flex justify-content-center">
                
                <div class="col-lg-10">
                    <div class="blog__details__content">
                        <div class="blog__details__text">
                            
                        </div>
                        
                        <div class="blog__details__desc">
                            
                            <div class="blog__details__desc__item">
                                <h4>1. Contents of the event</h4>
                                <p>{!! $showevent->content !!}</p>
                            </div>
                            <div class="blog__details__desc__item">
                                <h4>2. Event services include</h4>
                                <p>{!! $showevent->services !!}</p>
                                <p>“We always try to bring you the best utilities ^^”</p>
                            </div>
                        </div>
                        <div class="blog__details__widget">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="blog__details__tags">
                                        <a href="#">Hotel</a>
                                        <a href="#">Restaurant</a>
                                        <a href="#">Tips</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="blog__details__share">
                                        <span>Share:</span>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="blog__details__comment">
                            <h3>{{$count}} Comments</h3>
                        @foreach($comment as $cmt)
                        <div class="blog__details__comment__item__pic">
                            <img src="/storage/{{ $cmt->images }}" alt="">
                        </div>
                            <div class="blog__details__comment__item">
                                <div class="blog__details__comment__item__text">
                                    <span>{{$cmt->updated_at}}</span>
                                    <h5>{{$cmt->name}}</h5>
                                    <p>{{$cmt->content}}</p>
                                </div>
                            </div>
                        @endforeach
                        {{ $comment->links('vendor.pagination.simple-bootstrap-4') }}
                        </div>
                        <div class="blog__details__comment__form">
                            <h3>Leave A Comment</h3>
                            <form style="margin-bottom: 40px" action="{{ route('Event.createComment') }}" method="post">
                                @csrf
                                <input type="text" name="name_comment" value="{{ Auth::user()->name }}" hidden>
                                <textarea name="comment" placeholder="Messages"></textarea>
                                <button type="submit">Send Messages</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Fetured Blog Section Begin -->
    
    <!-- Fetured Blog Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer set-bg" data-setbg="../img/footer-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo__carousel owl-carousel">
                        <div class="logo__carousel__item">
                            <a href="#"><img src="img/logo/logo-1.png" alt=""></a>
                        </div>
                        <div class="logo__carousel__item">
                            <a href="#"><img src="img/logo/logo-2.png" alt=""></a>
                        </div>
                        <div class="logo__carousel__item">
                            <a href="#"><img src="img/logo/logo-3.png" alt=""></a>
                        </div>
                        <div class="logo__carousel__item">
                            <a href="#"><img src="img/logo/logo-4.png" alt=""></a>
                        </div>
                        <div class="logo__carousel__item">
                            <a href="#"><img src="img/logo/logo-5.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="footer__content">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer__about">
                            <div class="footer__logo">
                                <a href="#"><img src="../img/logo.png" alt=""></a>
                            </div>
                            <h4>(123) 456-78-91096</h4>
                            <ul>
                                <li>Ernser Vista Suite 437, NY</li>
                                <li>Info.colorlib@gmail.com</li>
                            </ul>
                            <div class="footer__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1 col-md-5 offset-md-1 col-sm-6">
                        <div class="footer__widget">
                            <h4>Quick Link</h4>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Booking</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Review</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Our Room</a></li>
                                <li><a href="#">Restaurants</a></li>
                                <li><a href="#">Payments</a></li>
                                <li><a href="#">Events</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <div class="footer__newslatter">
                            <h4>Subscribe our newlatester</h4>
                            <form action="#">
                                <input type="text" placeholder="Your E-mail Address">
                                <button type="submit">Subscribe</button>
                            </form>
                            <div class="footer__newslatter__find">
                                <h5>Find Us:</h5>
                                <div class="footer__newslatter__find__links">
                                    <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                    <a href="#"><i class="fa fa-map-o"></i></a>
                                    <a href="#"><i class="fa fa-dribbble"></i></a>
                                    <a href="#"><i class="fa fa-forumbee"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__copyright">
                <div class="row">
                    <div class="col-lg-7 col-md-7">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <div class="footer__copyright__text">
                            <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                        </div>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <ul class="footer__copyright__links">
                            <li><a href="#">Terms Of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>
    <script>
        $(document).ready(function() {
      // Bấm vào button "Đặt phòng" để hiển thị form booking
      $('.open-booking-button').click(function() {
        $('.booking-form-wrapper').fadeIn();
      });
      
      // Bấm vào button "Đóng" hoặc bên ngoài form booking để đóng form
      $('.booking-form-wrapper, .booking-form-close-button').click(function(event) {
        if (event.target == this || $(event.target).hasClass('booking-form-close-button')) {
          $('.booking-form-wrapper').fadeOut();
        }
      });
    });
    
    </script>
</body>

</html>
</x-app-layout>