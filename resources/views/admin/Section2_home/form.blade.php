@extends('layouts.app')

@section('content')
    @if (!isset($section2))
        {{ Form::open(['route' => ['admin.mybrand.section2.store',$design], 'role' => 'form', 'id' => 'icon-form', 'files' => true]) }}
    @else
        {{ Form::open(['route' => ['admin.mybrand.section2.update',['section2' =>$section2->id,'design'=> $design]], 'role' => 'form', 'id' => 'icon-form', 'files' => true]) }}
    @endif
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">

                        <h6 class="h2 text-white d-inline-block mb-0">
                            <span>Section2 Uploader</span>
                        </h6>

                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.mybrand.section2',['slug'=> session()->get('selected_brand')->slug,'design' => $design]) }}">Banner</a></li>

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
                                            {{ Form::text('heading', isset($section2) ? $section2->heading:null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('description', 'Description', ['for' => 'description']) }}
                                            {{ Form::textarea('description',isset($section2) ? $section2->description:null, array('class' => 'form-control wysiwyg','rows' => 6, 'cols' => 40)) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('btn_text', 'Button Text', ['for' => 'btn_text']) }}
                                            {{ Form::text('btn_text', isset($section2) ? $section2->btn_text:null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('btn_link', 'Button Link', ['for' => 'btn_link']) }}
                                            {{ Form::text('btn_link', isset($section2) ? $section2->btn_link:null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('btn_show', 'Show/Hide Button', ['for' => 'btn_show']) }}
                                            {{ Form::hidden('btn_show', '0') }}
                                            <label class="custom-toggle">
                                                {{ Form::checkbox('btn_show', '1',isset($section2->btn_show) ? $section2->btn_show:false) }}
                                                <span for="btn_show" class="custom-toggle-slider rounded-circle"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-5">
                                    {{ Form::button('Save', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
                                    <a href="{{ route('admin.mybrand.section2',['slug' => session()->get('selected_brand')->slug,'design' => $design]) }}" class="btn btn-s btn-outline-primary">Cancel</a>
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
