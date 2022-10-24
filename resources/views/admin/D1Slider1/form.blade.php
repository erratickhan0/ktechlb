@extends('layouts.app')

@section('content')
        {{ Form::open(['route' => ['admin.d1-slide-changer1.store'], 'role' => 'form', 'id' => 'slider-form', 'files' => true]) }}

    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">

                        <h6 class="h2 text-white d-inline-block mb-0">
                            <span>Create New Slide</span>
                        </h6>

                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active"><a href="#">Create</a></li>
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
                                            {{ Form::label('title', 'Slider Title*', ['for' => 'name']) }}
                                            {{ Form::text('title', null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('description', 'Description', ['for' => 'description']) }}
                                            {{ Form::text('description', null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('file_path', 'Banner Image or Video*', ['for' => 'file_path']) }}
                                            <div>{{ Form::file('file_path') }}</div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        {{ Form::select('colour', ['black' =>'BLACK','white' => 'WHITE'], 'black',[
                                            'placeholder' => 'Select Colour for title...',
                                            'class' => 'form-control',
                                            'id' => 'colour-selection'
                                        ]) }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-5">
                                    {{ Form::button('Save', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
                                    <a href="{{ route('admin.d1.index') }}" class="btn btn-s btn-outline-primary">Cancel</a>
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
