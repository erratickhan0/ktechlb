@extends('layouts.app')

@section('content')
    @if (!isset($logo_title))
        {{ Form::open(['route' => ['admin.mybrand.logo-title.store'], 'role' => 'form', 'id' => 'icon-form', 'files' => true]) }}
    @else
        {{ Form::open(['route' => ['admin.mybrand.logo-title.update',$logo_title->id], 'role' => 'form', 'id' => 'icon-form', 'files' => true]) }}
    @endif
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">

                        <h6 class="h2 text-white d-inline-block mb-0">
                            <span>Homepage LogoTitle Uploader</span>
                        </h6>

                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.mybrand.logo-title',['slug'=> session()->get('selected_brand')->slug]) }}">Banner</a></li>

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
                                            {{ Form::label('title1', 'Title 1*', ['for' => 'title1']) }}
                                            {{ Form::text('title1', isset($logo_title) ? $logo_title->title1:null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('title2', 'Title 2*', ['for' => 'title2']) }}
                                            {{ Form::text('title2', isset($logo_title) ? $logo_title->title2:null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('description', 'Description', ['for' => 'description']) }}
                                            {{ Form::textarea('description',isset($logo_title) ? $logo_title->description:null, array('class' => 'form-control wysiwyg','rows' => 6, 'cols' => 40)) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('logo', 'Logo*', ['for' => 'logo']) }}
                                            <div>{{ Form::file('logo') }}</div>
                                        </div>

                                    </div>
                                    @if (isset($logo_title->logo))
                                        <div class="col-6  mt-n3">
                                            <div><img src="{{ asset('storage/' .$logo_title->logo) }}" style="max-width:120px;max-height:120px" alt="Logo"></div>
                                            <div><span>Logo</span></div>
                                        </div>
                                    @endif
                                </div>



                                <div class="row">
                                    <div class="col-6 mt-5">
                                    {{ Form::button('Save', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
                                    <a href="{{ route('admin.mybrand.logo-title',['slug' => session()->get('selected_brand')->slug]) }}" class="btn btn-s btn-outline-primary">Cancel</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(isset($logo_title))
    <div class="container-fluid mt-6">
    <middle-banner-details></middle-banner-details>
    </div>
    @endif
    {{ Form::close() }}
@endsection
