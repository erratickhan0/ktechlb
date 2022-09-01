@extends('layouts.app')

@section('content')
    @if (!isset($banner))
        {{ Form::open(['route' => ['admin.mybrand.banner.store',['design' => $design]], 'role' => 'form', 'id' => 'icon-form', 'files' => true]) }}
    @else
        {{ Form::open(['route' => ['admin.mybrand.banner.update',$banner->id,$design], 'role' => 'form', 'id' => 'icon-form', 'files' => true]) }}
    @endif
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">

                        <h6 class="h2 text-white d-inline-block mb-0">
                            <span>Homepage Banner Uploader</span>
                        </h6>

                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.mybrand.banner',['slug'=> session()->get('selected_brand')->slug,'design' => $design]) }}">Banner</a></li>

                            </ol>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        @include('layouts.partials.alerts')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('fullwidth_banner1_fixed', 'Fullwidth Banner1 Fixed*', ['for' => 'fullwidth_banner1_fixed']) }}
                                            <div>{{ Form::file('fullwidth_banner1_fixed') }}</div>
                                        </div>

                                    </div>
                                    @if (isset($banner->fullwidth_banner1_fixed))
                                        <div class="col-6  mt-n3">
                                            <div><img src="{{ asset('storage/' .$banner->fullwidth_banner1_fixed) }}" style="max-width:120px;max-height:120px" alt="Banner1 Fixed"></div>
                                            <div><span>Banner1 Fixed</span></div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('fullwidth_banner2_fixed', 'Fullwidth Banner2 Fixed', ['for' => 'fullwidth_banner2_fixed']) }}
                                            <div>{{ Form::file('fullwidth_banner2_fixed') }}</div>
                                        </div>

                                    </div>
                                    @if (isset($banner->fullwidth_banner2_fixed))
                                        <div class="col-6  mt-n3">
                                            <div><img src="{{ asset('storage/' .$banner->fullwidth_banner2_fixed) }}" style="max-width:120px;max-height:120px" alt="Banner2 Fixed"></div>
                                            <div><span>Banner2 Fixed</span></div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('fullwidth_banner1_unfixed', 'Fullwidth Banner3 Fixed', ['for' => 'fullwidth_banner1_unfixed']) }}
                                            <div>{{ Form::file('fullwidth_banner1_unfixed') }}</div>
                                        </div>
                                    </div>
                                    @if (isset($banner->fullwidth_banner1_unfixed))
                                        <div class="col-6  mt-n3">
                                            <div><img src="{{ asset('storage/' .$banner->fullwidth_banner1_unfixed) }}" style="max-width:120px;max-height:120px" alt="Banner1 UnFixed"></div>
                                            <div><span>Banner1 UnFixed</span></div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('fullwidth_video', 'Fullwidth Video', ['for' => 'fullwidth_video']) }}
                                            <div>{{ Form::file('fullwidth_video') }}</div>
                                        </div>
                                    </div>
                                    @if (isset($banner->fullwidth_video))
                                        <div class="col-6 mt-3">
                                            <div><a target="_blank" href="{{ asset('storage/' .$banner->fullwidth_video) }}" alt="Video Fixed">Video link</a></div>
                                        </div>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-6 mt-5">
                                    {{ Form::button('Save', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
                                    <a href="{{ route('admin.mybrand.banner',['slug' => session()->get('selected_brand')->slug,'design' => $design]) }}" class="btn btn-s btn-outline-primary">Cancel</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection
