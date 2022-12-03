<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MDC CAFETERIA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet" href="css/bootstrap-multiselect.css">
    <link rel="stylesheet" href="{{ asset('frontends/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontends/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontends/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontends/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontends/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontends/css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('frontends/css/pricing.css') }}">
    <link rel="stylesheet" href="{{ asset('frontends/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontends/css/bootstrap-datetimepicker.min.css') }}">


    <script src="{{ asset('frontends/js/jquery-1.11.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontends/js/jquery.flexslider.min.js') }}"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlsContainer: ".flexslider-container"
            });
        });
    </script>



</head>
<body data-spy="scroll" data-target="#template-navbar">
<!--== 4. Navigation ==-->
<nav id="template-navbar" class="navbar navbar-default custom-navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#Food-fair-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            
            <a class="navbar-brand" href="#">
                <img id="logo" src="{{ asset('frontends/mdc/MDC.png') }}" class="logo img-responsive">
            </a>
        </div>
    
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="Food-fair-toggle">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#about">about</a></li>
                <li><a href="#menu-list">menu list</a></li>
                <li><a href="#reserve">reservation</a></li>
                <li><a href="#contact">contact</a></li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!--== 5. Header ==-->
<section id="header-slider" class="owl-carousel">
    @foreach($sliders as $key=>$slider)
        <div class="item">
            <div class="container">
                <div class="header-content">
                    <h1 class="header-title">{{ $slider->title }}</h1>
                    <p class="header-sub-title">{{ $slider->sub_title }}</p>
                </div> <!-- /.header-content -->
            </div>
        </div>
    @endforeach
</section>



<section id="about" class="about">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row dis-table">
                <div class="hidden-xs col-sm-6 section-bg about-bg dis-table-cell">

                </div>
                <div class="col-xs-12 col-sm-6 dis-table-cell">
                    <div class="section-content">
                        <h2 class="section-content-title">ABOUT US</h2>
                        <p class="section-content-para">
                            <b>Vision:</b> Mater Dei College is a community of dedicated educators and community-oriented students who believe in the search for truth that leads
                            to wisdom; unselfish living through service as an expression of charity and the pursuit of prayer life through living the Gospel, as exemplified by
                            Mary, the mother of God in whose honor the college identifies herself.
                        </p>

                        <p class="section-content-para">
                         <b>Mission:</b> Mater Dei College commits herself to provide a holistic Catholic education to deserving youth with preferential option for the
                            economically-disadvantaged of northern Bohol to enable them to become responsible citizens and servant leaders in nation building.
                        </p>
                        </p>
                    </div> <!-- /.section-content -->
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div> <!-- /.wrapper -->
</section> <!-- /#about -->



<!--==  7. Afordable Pricing  ==-->
<section id="menu-list" class="menu-list">
    <div id="w">
        <div class="pricing-filter">
            <div class="pricing-filter-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="section-header">
                                <h2 class="pricing-title">Our Menu List</h2>
                                <ul id="filter-list" class="clearfix">
                                    <li class="filter" data-filter="all">All</li>
                                    @foreach($categories as $category)
                                        <li class="filter" data-filter="#{{ $category->slug }}">{{ $category->name }} <span class="badge">{{ $category->items->count() }}</span></li>
                                    @endforeach
                                </ul><!-- @end #filter-list -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <ul id="menu-pricing" class="menu-price">

                        @foreach($items as $item)
                            <li class="item" id="{{ $item->category->slug }}">
                                <a href="#">
                                    <img src="{{ asset('uploads/item/'.$item->image) }}" class="img-responsive" alt="Item" style="height: 200px; width: 269px;" >
                                    <div class="menu-desc text-center">
                                            <span>
                                                <h3>{{ $item->name }}</h3>
                                                {{ $item->description }}
                                            </span>
                                    </div>
                                </a>
                                <h2 class="white">₱ {{ $item->price }}</h2>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>



<!--== 15. Reserve A Food! ==-->
<section id="reserve" class="reserve">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{ asset('frontends/images/icons/caf.png') }}">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row dis-table">
                <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                    <h2 class="section-title">Reserve Food !</h2>
                </div>
                <div class="col-xs-6 col-sm-6 dis-table-cell section-bg">

                </div>
            </div> <!-- /.dis-table -->
        </div> <!-- /.row -->
    </div> <!-- /.wrapper -->
</section> <!-- /#reserve -->



<section class="reservation">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{ asset('frontends/images/icons/reservation.png') }}">
    <div class="wrapper">
        <div class="container-fluid">
            <div class=" section-content">
                <div class="row">
                    <div class="col-md-5 col-sm-6">
                        <form class="reservation-form" method="post" action="{{ route('reservation.reserve') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control reserve-form empty iconified" name="name" id="name"
                                               placeholder="  &#xf007;  Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control reserve-form empty iconified" id="email"  placeholder="  &#xf1d8;  e-mail" required>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="tel" class="form-control reserve-form empty iconified" name="phone" id="phone"  placeholder="  &#xf095;  Phone" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control reserve-form empty iconified" name="dateandtime" id="datetimepicker1" placeholder="&#xf017;  Time" required>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <select name="items[]" id="items" class="mul_select" multiple="true" size="6">
                                        @forelse ($items as $item )

                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @empty
                                        <option value="">No Item Available</option>
                                        @endforelse

                                    </select>

                                        </div>
                                    </div>



                                <div class="col-md-12 col-sm-12">
                                    <textarea type="text" name="message" class="form-control reserve-form empty iconified" id="message" rows="3"  placeholder="  &#xf086;  Other Concern's"></textarea>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <button type="submit" id="submit" name="submit" class="btn btn-reservation">
                                        <span><i class="fa fa-check-circle-o"></i></span>
                                        Make a reservation
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="col-md-2 hidden-sm hidden-xs"></div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="opening-time">
                            <h3 class="opening-time-title">Hours</h3>
                            <p>Mon to Fri: 7:30 AM - 11:30 AM</p>
                            <p>Sat: 8:00 AM - 12:00 AM</p>

                            <div class="launch">
                                <h4>Lunch</h4>
                                <p>Mon to Fri: 12:00 PM - 5:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>




<section id="contact" class="contact">
    <div class="container-fluid color-bg">
        <div class="row dis-table">
            <div class="hidden-xs col-sm-6 dis-table-cell">
                <h2 class="section-title">Contact &nbsp; With Us<img src="image/in-love.png" alt="smile" height="18%" width="18%"></h2>
            </div>

            <div class="col-xs-6 col-sm-6 dis-table-cell">
                <div class="section-content-title2">
                    <p style="font-family: 'Old English Text MT">Mater Dei College</p>
                    <p>Cabulijan, Tubigon, Bohol</p>
                    <p>https://materdeicollege.com </p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                <div class="row">
                    <form class="contact-form" method="post" action="{{ route('contact.send') }}">
                        @csrf
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input  name="name" type="text" class="form-control" id="name" required="required" placeholder="  Name">
                            </div>
                            <div class="form-group">
                                <input name="email" type="email" class="form-control" id="email" required="required" placeholder="  Email">
                            </div>
                            <div class="form-group">
                                <input name="subject" type="text" class="form-control" id="subject" required="required" placeholder="  Subject">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <textarea name="message" type="text" class="form-control" id="message" rows="7" required="required" placeholder="  Message"></textarea>
                        </div>

                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <div class="text-center">
                                <button type="submit" id="submit" name="submit" class="btn btn-send">Send </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    <script>
    $(document).ready(function() {
	$('.mul_select').select2({
		placeholder: "Select Item",
        tags: true,
        tokenSeparators: ['/',',',','," "]

	});
});
    </script>

    <style>
        .mul_select{
            width: 100%;
        }
        </style>
</section>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="copyright text-center text">
                    <p>
                        &copy; Copyright, {{ date('Y') }} <a href="#"> MDC CAFETERIA</a> <strong> Developed By: </strong>
                        <a href="#" target="_blank"> MDC BSIT STUDENTS</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script data-main="dist/js/" src="js/require.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{ asset('frontends/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontends/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontends/js/jquery.mixitup.min.js') }}" ></script>
<script src="{{ asset('frontends/js/wow.min.js') }}"></script>
<script src="{{ asset('frontends/js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontends/js/jquery.hoverdir.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontends/js/jQuery.scrollSpeed.js') }}"></script>
<script src="{{ asset('frontends/js/script.js') }}"></script>
<script src="{{ asset('frontends/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<script>
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: "dd MM yyyy - HH:11 P",
            showMeridian: true,
            autoclose: true,
            todayBtn: true
        });
    })
</script>


</body>
<style>
    @foreach($sliders as $key=>$slider)

        .owl-carousel .owl-wrapper, .owl-carousel .owl-item:nth-child({{ $key + 1 }}) .item
        {
            background: url({{ asset('uploads/slider/'.$slider->image) }});
            background-size: cover;
        }
    @endforeach
</style>

</html>
