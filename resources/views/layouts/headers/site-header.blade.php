<header class="fixed-top">
    @if(isset($brand->brand_settings))
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm bg-dark border-bottom d-none">
        <div class="container-fluid">
            <div class="navbar-collapse" id="navbar4">
                <ul class="navbar-nav ml-auto pl-lg-1 flex-row">
                    <li class="nav-item px-2 "> <a class="nav-link" href="#"> <span class="d-inline-block icon-width"><i class="fas fa-mobile pr-2" aria-hidden="true"></i></span>
                            <span>045628900</span>
                        </a>
                    </li>
                    @if($brand->brand_settings->store_nav_header)
                    <li class="nav-item px-2"> <a class="nav-link" href="#"><span class="d-inline-block icon-width"></span>Store</a> </li>
                    @endif
                    @if($brand->brand_settings->support_nav_header)
                    <li class="nav-item px-2"> <a class="nav-link" href="#"><span class="d-inline-block icon-width"></span>Support</a> </li>
                    @endif
                    @if($brand->brand_settings->login_nav_header)
                    <li class="nav-item px-2"> <a class="nav-link" href="#"><span class="d-inline-block icon-width"></span><span>Login</span><i class="fa fa-user-circle pl-2"></i></a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm bg-dark">
        <div class="container-fluid"> <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('storage/'.$brand->logo) }}">
            </a> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar4">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbar4">
                <ul class="navbar-nav ml-auto pl-lg-4">
                    @if($brand->brand_settings->home_nav_header)
                    <li class="nav-item px-lg-2 active"> <a class="nav-link" href="{{ url('/') }}"> <span class="d-inline-block d-lg-none icon-width "></span>Home</a> </li>
                    @endif
                    @if($brand->brand_settings->about_nav_header)
                    <li class="nav-item px-lg-2"> <a class="nav-link" href="#"><span class="d-inline-block d-lg-none icon-width"></i></span>About Us</a> </li>
                    @endif
                    @if($brand->brand_settings->product_nav_header)
                    <li class="nav-item px-lg-2 dropdown">
                        <a class="nav-link " href="#">
                            <span class="d-inline-block icon-width" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span>Product</span><span class="fa fa-angle-down pl-1"></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu bg-dark" role="menu" aria-labelledby="dropdownMenu">
                            <li class="nav-item  inner-dropdown">
                                <a href="#" class="dropdown-item ">colop e-mark
                                    <i class="fa fa-caret-right"></i>
                                </a>
                                <ul class="dropdown-menu bg-dark" role="menu" aria-labelledby="dropdownMenu" style="display:none">
                                    <li class="product mufaddal"><a class="dropdown-item" href="https://ktechlb.com/index.php/page/productdetails/59/9">colop e-mark plus</a></li>
                                </ul>
                            </li>
                            <li class="nav-item ">
                                <a href="#" class="dropdown-item">colop emark create </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if($brand->brand_settings->news_nav_header)
                    <li class="nav-item px-lg-2"> <a class="nav-link" href="#"><span class="d-inline-block d-lg-none icon-width"></span>News</a> </li>
                    @endif
                    @if($brand->brand_settings->contact_nav_header)
                    <li class="nav-item px-lg-2"> <a class="nav-link" href="#"><span class="d-inline-block d-lg-none icon-width"></span>Contact Us</a> </li>
                    @endif
                    @if($brand->brand_settings->dealer_locator_nav_header)
                    <li class="nav-item px-lg-2"> <a class="nav-link" href="#"><span class="d-inline-block d-lg-none icon-width"></span>Dealer Locator</a>
                    </li>
                    @endif
                    <li class="nav-item"> <a class="nav-link" href="#">
                            <i class="fa  fa-search"></i>
                        </a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#">
                            <i class="fa  fa-shopping-cart"></i>
                        </a> </li>
                </ul>
            </div>
        </div>
    </nav>
    @endif
</header>
