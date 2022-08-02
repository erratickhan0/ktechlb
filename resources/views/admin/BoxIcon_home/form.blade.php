@extends('layouts.app')

@section('content')
        {{ Form::open(['route' => ['admin.mybrand.box-icon.store'], 'role' => 'form', 'id' => 'box-icon-form', 'files' => true]) }}

    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">

                        <h6 class="h2 text-white d-inline-block mb-0">
                            <span>Create New Box-Icon</span>
                        </h6>

                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.mybrand.box-icon',['slug'=> session()->get('selected_brand')->slug]) }}">box-icon</a></li>
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
                                            {{ Form::label('title', 'Box-icon Title*', ['for' => 'title']) }}
                                            {{ Form::text('title', null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('description', 'Description', ['for' => 'description']) }}
                                            {{ Form::textarea('description', null, array('class' => 'form-control wysiwyg','rows' => 4, 'cols' => 40)) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('box_icon', 'Box-icon Image*', ['for' => 'box_icon']) }}
                                            <div>{{ Form::file('box_icon') }}</div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-5">
                                    {{ Form::button('Save', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
                                    <a href="{{ route('admin.mybrand.box-icon',['slug' => session()->get('selected_brand')->slug]) }}" class="btn btn-s btn-outline-primary">Cancel</a>
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
