@extends('layouts.app')

@section('content')
    @if (!isset($bg_description))
        {{ Form::open(['route' => ['admin.mybrand.bg-description.store',$design], 'role' => 'form', 'id' => 'icon-form', 'files' => true]) }}
    @else
        {{ Form::open(['route' => ['admin.mybrand.bg-description.update',['BgDescription' =>$bg_description->id,'design'=> $design]], 'role' => 'form', 'id' => 'icon-form', 'files' => true]) }}
    @endif
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">

                        <h6 class="h2 text-white d-inline-block mb-0">
                            <span>Homepage Bg Description Uploader</span>
                        </h6>

                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.mybrand.bg-description',['slug'=> session()->get('selected_brand')->slug,'design' => $design]) }}">Banner</a></li>

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
                                            {{ Form::label('heading', 'Heading*', ['for' => 'heading']) }}
                                            {{ Form::text('heading', isset($bg_description) ? $bg_description->heading:null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('description', 'Description', ['for' => 'description']) }}
                                            {{ Form::textarea('description',isset($bg_description) ? $bg_description->description:null, array('class' => 'form-control wysiwyg','rows' => 6, 'cols' => 40)) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('bg_image', 'Background Image*', ['for' => 'bg_image']) }}
                                            <div>{{ Form::file('bg_image') }}</div>
                                        </div>

                                    </div>
                                    @if (isset($bg_description->bg_image))
                                        <div class="col-6  mt-n3">
                                            <div><img src="{{ asset('storage/' .$bg_description->bg_image) }}" style="max-width:120px;max-height:120px" alt="Image"></div>
                                            <div><span>Background Image</span></div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('btn_text', 'Button Text', ['for' => 'btn_text']) }}
                                            {{ Form::text('btn_text', isset($bg_description) ? $bg_description->btn_text:null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('btn_link', 'Button Link', ['for' => 'btn_link']) }}
                                            {{ Form::text('btn_link', isset($bg_description) ? $bg_description->btn_link:null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('btn_show', 'Show/Hide Button', ['for' => 'btn_show']) }}
                                            {{ Form::hidden('btn_show', '0') }}
                                            <label class="custom-toggle">
                                                {{ Form::checkbox('btn_show', '1',isset($bg_description->btn_show) ? $bg_description->btn_show:false) }}
                                                <span for="btn_show" class="custom-toggle-slider rounded-circle"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-5">
                                    {{ Form::button('Save', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
                                    <a href="{{ route('admin.mybrand.bg-description',['slug' => session()->get('selected_brand')->slug,'design' => $design]) }}" class="btn btn-s btn-outline-primary">Cancel</a>
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
