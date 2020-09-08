    <!-- Start Main Top -->
    <header class="main-header border-bottom">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container-fluid">
                <!-- Start Header Navigation -->
                    <div class="col-12 col-md-6 px-0">
                <div class="navbar-header text-center w-100 text-md-left">
                    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button> -->
            <a class="navbar-brand" href="/"><img src="{{asset('images/logo.png')}}" class="logo" alt=""></a>
                </div>
                    </div>
                    <div class="col-12 col-md-6 px-0">
                <div class="d-flex justify-content-center justify-content-md-end">
                    <ul class="nav justify-content-center">
                        @guest
                        <li class="nav-item"><a class="nav-link" href="/auth">Login</a></li> 
                        @else 
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Account</a>
                            <ul class="dropdown-menu w-auto" style="z-index: 5">
                                <li><a class="border-0" href="{{ route('account') }}">My account</a></li>
                                @admin
                                <li><a class="border-0" href="{{ route('orders') }}">Admin panel</a></li>
                                @endadmin
                                
                                <li><a class="border-0" href="{{ route('account_orders') }}">My orders</a></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a></li>
                            </ul>
                        </li>                        
                        @endguest

                    <li class="nav-item"><a class="nav-link" href="{{route('cart')}}">Cart</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="service.html">Our Service</a></li> -->
                    </ul>
                </div>
                    </div>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                

                <!-- Start Atribute Navigation -->

                <!-- <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu"><a href="#">
						<i class="fa fa-shopping-bag"></i>
                            <span class="badge">3</span>
					</a></li>
                    </ul>
                </div> -->
                <!-- End Atribute Navigation -->
            </div>
            {{-- <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>1x - <span class="price">$80.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-02.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Omnes ocurreret</a></h6>
                            <p>1x - <span class="price">$60.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-03.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Agam facilisis</a></h6>
                            <p>1x - <span class="price">$40.00</span></p>
                        </li>
                        <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu --> --}}
        </nav>
        <!-- End Navigation -->



        <!-- <div class="float-right mx-4">
            <a class="btn hvr-hover text-white" href="">Login</a>
            <a class="btn hvr-hover text-white" href="">Register</a>
            <a class="btn hvr-hover text-white" href="">Cart[2]</a>        
        </div> -->
    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav pt-0" style="z-index: 4">
        <div class="container-fluid">



            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu2">
                <ul class="mr-auto nav navbar-nav" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li> -->
                    <li class="dropdown megamenu-fw">
                        <a href="#" class="nav-link dropdown-toggle"  data-toggle="dropdown">Product</a>
                        <ul class="dropdown-menu megamenu-content" role="menu">
                            <li>
                                <div class="row">
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">Top</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="shop.html">Jackets</a></li>
                                                <li><a href="shop.html">Shirts</a></li>
                                                <li><a href="shop.html">Sweaters & Cardigans</a></li>
                                                <li><a href="shop.html">T-shirts</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end col-3 -->
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">Bottom</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="shop.html">Swimwear</a></li>
                                                <li><a href="shop.html">Skirts</a></li>
                                                <li><a href="shop.html">Jeans</a></li>
                                                <li><a href="shop.html">Trousers</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end col-3 -->
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">Clothing</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="shop.html">Top Wear</a></li>
                                                <li><a href="shop.html">Party wear</a></li>
                                                <li><a href="shop.html">Bottom Wear</a></li>
                                                <li><a href="shop.html">Indian Wear</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">Accessories</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="shop.html">Bags</a></li>
                                                <li><a href="shop.html">Sunglasses</a></li>
                                                <li><a href="shop.html">Fragrances</a></li>
                                                <li><a href="shop.html">Wallets</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end col-3 -->
                                </div>
                                <!-- end row -->
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">SHOP</a>
                        <ul class="dropdown-menu mt-0">
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="my-account.html">My Account</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li><a href="shop-detail.html">Shop Detail</a></li>
                        </ul>
                    </li>
                    <!-- <li class="nav-item"><a class="nav-link" href="service.html">Our Service</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="contact-us.html">Contact Us</a></li>
                </ul>

            </div>   
            <form class="navbar-form navbar-right form-inline justify-content-center">
                <div class="form-group mb-0">
                    <input type="text" placeholder="Enter Keyword Here ..." class="form-control rounded-0">
                </div>
                <button type="submit" class="btn hvr-hover text-white"><i class="fa fa-search"></i></button>
            </form> 
            
            <div class="navbar-header float-left w-auto">                  
                <button class="navbar-toggler m-0" type="button" data-toggle="collapse" data-target="#navbar-menu2" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            </div>
            <!-- /.navbar-collapse -->
            
        </div>
        <!-- Start Side Menu -->
        <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <li class="cart-box">
                <ul class="cart-list">
                    <li>
                        <a href="#" class="photo"><img src="images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
                        <h6><a href="#">Delica omtantur </a></h6>
                        <p>1x - <span class="price">$80.00</span></p>
                    </li>
                    <li>
                        <a href="#" class="photo"><img src="images/img-pro-02.jpg" class="cart-thumb" alt="" /></a>
                        <h6><a href="#">Omnes ocurreret</a></h6>
                        <p>1x - <span class="price">$60.00</span></p>
                    </li>
                    <li>
                        <a href="#" class="photo"><img src="images/img-pro-03.jpg" class="cart-thumb" alt="" /></a>
                        <h6><a href="#">Agam facilisis</a></h6>
                        <p>1x - <span class="price">$40.00</span></p>
                    </li>
                    <li class="total">
                        <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                        <span class="float-right"><strong>Total</strong>: $180.00</span>
                    </li>
                </ul>
            </li>
        </div>
        <!-- End Side Menu -->
    </nav>
    <!-- End Main Top -->