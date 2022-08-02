@extends('layouts.app')

@section('content')
    @if (!isset($button_accordian))
        {{ Form::open(['route' => ['admin.mybrand.button-accordian.store'], 'role' => 'form', 'id' => 'icon-form', 'files' => true]) }}
    @else
        {{ Form::open(['route' => ['admin.mybrand.button-accordian.update',$button_accordian->id], 'role' => 'form', 'id' => 'icon-form', 'files' => true]) }}
    @endif
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">

                        <h6 class="h2 text-white d-inline-block mb-0">
                            <span>Homepage Button/Accordian Section</span>
                        </h6>

                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.mybrand.button-accordian',['slug'=> session()->get('selected_brand')->slug]) }}">Button/Accordian</a></li>

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
                                            {{ Form::label('title', 'Title*', ['for' => 'title']) }}
                                            {{ Form::text('title', isset($button_accordian) ? $button_accordian->title:null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('description', 'Description', ['for' => 'description']) }}
                                            {{ Form::textarea('description',isset($button_accordian) ? $button_accordian->description:null, array('class' => 'form-control wysiwyg','rows' => 6, 'cols' => 40)) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('image', 'Image*', ['for' => 'image']) }}
                                            <div>{{ Form::file('image') }}</div>
                                        </div>

                                    </div>
                                    @if (isset($button_accordian->image))
                                        <div class="col-6  mt-n3">
                                            <div><img src="{{ asset('storage/' .$button_accordian->image) }}" style="max-width:120px;max-height:120px" alt="Image"></div>
                                            <div><span>Image</span></div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            {{ Form::label('show_button', 'Show/Hide Button', ['for' => 'show_button']) }}
                                            {{ Form::hidden('show_button', '0') }}
                                            <label class="custom-toggle">
                                                {{ Form::checkbox('show_button', '1',isset($button_accordian->show_button) ? $button_accordian->show_button:false) }}
                                                <span for="show_button" class="custom-toggle-slider rounded-circle"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('show_accordian', 'Show/Hide Accordian', ['for' => 'show_accordian']) }}
                                            {{ Form::hidden('show_accordian', '0') }}
                                            <label class="custom-toggle">
                                                {{ Form::checkbox('show_accordian', '1',isset($button_accordian->show_accordian)? $button_accordian->show_accordian:false) }}
                                                <span for="show_accordian" class="custom-toggle-slider rounded-circle"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-6 mt-5">
                                    {{ Form::button('Save', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
                                    <a href="{{ route('admin.mybrand.button-accordian',['slug' => session()->get('selected_brand')->slug]) }}" class="btn btn-s btn-outline-primary">Cancel</a>
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
