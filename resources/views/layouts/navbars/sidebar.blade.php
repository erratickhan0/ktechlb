<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('admin.home') }}">
           {{-- <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">--}}
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('admin.profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('admin.home') }}">
                            {{--<img src="{{ asset('argon') }}/img/brand/blue.png">--}}
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>

            {{ Form::open(['route' => 'admin.brand.switch', 'method' => 'get', 'id' => 'search-form']) }}
            <div class="row">
                <div class="col-md-12">

                    {{ Form::select('brand', $brands, session()->get('selected_brand')? session()->get('selected_brand')->slug:'',[
                        'placeholder' => 'Please select brand...',
                        'class' => 'form-control',
                        'onChange' => 'this.form.submit();'
                    ]) }}
                </div>
                <div class="col-md-6"></div>

            </div>
            {{ Form::close() }}
            <!-- Navigation -->
            <ul class="navbar-nav">
                {{--<li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>--}}
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fab fa-laravel" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('User Management') }}</span>
                    </a>

                    <div class="collapse show" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.profile.edit') }}">
                                    {{ __('User profile') }}
                                </a>
                            </li>
                            {{--<li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    {{ __('User Management') }}
                                </a>
                            </li>--}}
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('admin.brands.index') }}"  role="button" >
                        <i class="fab fa-laravel" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Brands') }}</span>
                    </a>
                </li>


                @if(session()->get('selected_brand') && $brands)
                <li class="nav-item">
                    <a class="nav-link" href="#navbar-system" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-system">
                        <i class="fas fa-cog text-primary"></i>
                        <span class="nav-link-text">{{ __(session()->get('selected_brand')->name) }}</span>
                    </a>

                    <div class="collapse" id="navbar-system">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.mybrand.settings',session()->get('selected_brand')->slug) }}">
                                    {{ __('Settings') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#navbar-system-general" class="nav-link" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-system-general">M1 DESIGN</a>
                                <div class="collapse show" id="navbar-system-general" style="">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.slider',['slug' => session()->get('selected_brand')->slug,'design' => 'm1']) }}">
                                                {{ __('Top Slider Section') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.icon',session()->get('selected_brand')->slug) }}">
                                                {{ __('Icon Uploader Section') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.product',session()->get('selected_brand')->slug) }}">
                                                {{ __('Product Uploader Section') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.banner',['slug'=> session()->get('selected_brand')->slug,'design'=>'m1']) }}">
                                                {{ __('Banners Uploader Section') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.box-icon',session()->get('selected_brand')->slug) }}">
                                                {{ __('BoxIcon Uploader Section') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.logo-title',session()->get('selected_brand')->slug) }}">
                                                {{ __('Logo Title Uploader Section') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.button-accordian',['slug' => session()->get('selected_brand')->slug,'design' => 'm1']) }}">
                                                {{ __('Button/Accordian Section') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.news',['slug' => session()->get('selected_brand')->slug,'design' => 'm1']) }}">
                                                {{ __('News/Blog Section') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.flipbook',session()->get('selected_brand')->slug) }}">
                                                {{ __('Flipbook Settings') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#navbar-system-general-m2" class="nav-link" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-system-general-m2">M2 DESIGN</a>
                                <div class="collapse show" id="navbar-system-general-m2" style="">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.slider',['slug' => session()->get('selected_brand')->slug,'design' => 'm2']) }}">
                                                {{ __('Top Slider Section') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.section2',['slug' => session()->get('selected_brand')->slug,'design' => 'm2']) }}">
                                                {{ __('Section2') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.section5',['slug' => session()->get('selected_brand')->slug,'design' => 'm2']) }}">
                                                {{ __('Section5') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.section6',['slug' => session()->get('selected_brand')->slug,'design' => 'm2']) }}">
                                                {{ __('Section6') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.product-m2',session()->get('selected_brand')->slug) }}">
                                                {{ __('Product Uploader Section') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.banner',['slug'=> session()->get('selected_brand')->slug,'design'=>'m2']) }}">
                                                {{ __('Banners Uploader Section') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.button-accordian',['slug' => session()->get('selected_brand')->slug,'design' => 'm2']) }}">
                                                {{ __('Button/Accordian Section') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.news',['slug' => session()->get('selected_brand')->slug,'design' => 'm2']) }}">
                                                {{ __('News/Blog Section') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.article',['slug' => session()->get('selected_brand')->slug,'design' => 'm2']) }}">
                                                {{ __('Article/Blog Section') }}
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#navbar-system-general-m3" class="nav-link" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-system-general-m3">M3 DESIGN</a>
                                <div class="collapse show" id="navbar-system-general-m3" style="">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.slider',['slug' => session()->get('selected_brand')->slug,'design' => 'm3']) }}">
                                                {{ __('Top Slider Section') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.section2',['slug' => session()->get('selected_brand')->slug,'design' => 'm3']) }}">
                                                {{ __('Section2') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.product-m3',session()->get('selected_brand')->slug) }}">
                                                {{ __('Product Uploader Section') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.bg-description',['slug' => session()->get('selected_brand')->slug,'design' => 'm3']) }}">
                                                {{ __('Background Image with Desc') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.slider2',['slug' => session()->get('selected_brand')->slug,'design' => 'm3']) }}">
                                                {{ __('Slider#2 Uploader') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.product-description',['slug' => session()->get('selected_brand')->slug,'design' => 'm3']) }}">
                                                {{ __('Product Image with Desc') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.button-accordian',['slug' => session()->get('selected_brand')->slug,'design' => 'm3']) }}">
                                                {{ __('Button/Accordian Section') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.section6',['slug' => session()->get('selected_brand')->slug,'design' => 'm3']) }}">
                                                {{ __('Section6') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.article',['slug' => session()->get('selected_brand')->slug,'design' => 'm3']) }}">
                                                {{ __('Article/Blog Section') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.banner',['slug'=> session()->get('selected_brand')->slug,'design'=>'m3']) }}">
                                                {{ __('Banners Uploader Section') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.mybrand.news',['slug' => session()->get('selected_brand')->slug,'design' => 'm3']) }}">
                                                {{ __('News/Blog Section') }}
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>

                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('admin.p1.index') }}"  role="button" >
                        <i class="fab fa-laravel" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('P1') }}</span>
                    </a>
                </li>

            </ul>

                {{--<li class="nav-item">
                    <a class="nav-link" href="{{ route('icons') }}">
                        <i class="ni ni-planet text-blue"></i> {{ __('Icons') }}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('map') }}">
                        <i class="ni ni-pin-3 text-orange"></i> {{ __('Maps') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('table') }}">
                      <i class="ni ni-bullet-list-67 text-default"></i>
                      <span class="nav-link-text">Tables</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-circle-08 text-pink"></i> {{ __('Register') }}
                    </a>
                </li>
                <li class="nav-item mb-5 mr-4 ml-4 pl-1 bg-danger" style="position: absolute; bottom: 0;">
                    <a class="nav-link text-white" href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank">
                        <i class="ni ni-cloud-download-95"></i> Upgrade to PRO
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Documentation</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/getting-started/overview.html">
                        <i class="ni ni-spaceship"></i> Getting started
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/foundation/colors.html">
                        <i class="ni ni-palette"></i> Foundation
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/components/alerts.html">
                        <i class="ni ni-ui-04"></i> Components
                    </a>
                </li>
            </ul>--}}
        </div>
    </div>
</nav>
