@extends('layouts.app')

@section('content')
    @if($slide_changer == null)
    {{ Form::open(['route' => ['admin.p1-slide-changer.store',['p1' => request()->p1]], 'role' => 'form', 'id' => 'p1-form', 'files' => true]) }}
    @else
    {{ Form::model($slide_changer, ['role' => 'form', 'route' => ['admin.p1-slide-changer.update', [$slide_changer->id,'p1' => $slide_changer->p1_id]], 'method' => 'put', 'id' => 'p1-form', 'files' => true]) }}
    @endif
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
                                <li class="breadcrumb-item"><a href="{{ route('admin.p1-slide-changer.index') }}">P1</a></li>
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
                                            {{ Form::label('heading', 'Heading*', ['for' => 'heading']) }}
                                            {{ Form::text('heading', null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                        <div class="col-6">
                                            <div class="form-group required">
                                                {{ Form::label('description', 'Description', ['for' => 'description']) }}
                                                {{ Form::textarea('description',null, array('class' => 'form-control wysiwyg','rows' => 6, 'cols' => 40)) }}
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('left_image', 'Left Image*', ['for' => 'image']) }}
                                            <div>{{ Form::file('left_image') }}</div>
                                            @if($slide_changer != null)
                                                <img width="100px" height="70px" src="{{asset('storage/'.$slide_changer->left_image)}}" />
                                             @endif
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('right_image', 'Right Image*', ['for' => 'image']) }}
                                            <div>{{ Form::file('right_image') }}</div>
                                            @if($slide_changer != null)
                                                <img width="100px" height="70px" src="{{asset('storage/'.$slide_changer->right_image)}}" />
                                            @endif
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('right_bg_image', 'Right Background Image', ['for' => 'section2_image']) }}
                                            <div>{{ Form::file('right_bg_image') }}</div>
                                            @if($slide_changer != null)
                                                <img alt="No Image Found" width="100px" height="70px" src="{{asset('storage/'.$slide_changer->right_bg_image)}}" />
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-5">
                                        {{ Form::button('Save', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
                                        <a href="{{ route('admin.p1-slide-changer.index',['p1' => request()->p1]) }}" class="btn btn-s btn-outline-primary">Cancel</a>
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
