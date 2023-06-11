@extends('layouts.app')

@section('content')
    @if($p1 == null)
    {{ Form::open(['route' => ['admin.p1.store'], 'role' => 'form', 'id' => 'p1-form', 'files' => true]) }}
    @else
    {{ Form::model($p1, ['role' => 'form', 'route' => ['admin.p1.update', $p1->id], 'method' => 'put', 'id' => 'p1-form', 'files' => true]) }}
    @endif
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">

                        <h6 class="h2 text-white d-inline-block mb-0">
                            <span>Create New Page</span>
                        </h6>

                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.p1.index') }}">P1</a></li>
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
                                    <div class="col-12">
                                        <h3>Top Section</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        {{ Form::select('page_font', [1 =>'Classic' ,2 => 'Modern'], $p1? $p1->page_font:'',[
                                            'placeholder' => 'Please choose b/w page fonts...',
                                            'class' => 'form-control',
                                            'id' => 'image-selection'
                                        ]) }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('heading', 'Heading*', ['for' => 'heading']) }}
                                            {{ Form::text('heading', null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('title', 'Title*', ['for' => 'title']) }}
                                            {{ Form::text('title', null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('image', 'Image*', ['for' => 'image']) }}
                                            <div>{{ Form::file('image',['accept' => 'image/*']) }}</div>
                                            @if($p1 != null)
                                                <img width="100px" height="70px" src="{{asset('storage/'.$p1->image)}}" />
                                             @endif
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('video_link', 'Video Link*', ['for' => 'video_link']) }}
                                            {{ Form::text('video_link', null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h3>Middle  Section</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('section2_heading', 'Heading Middle Sec*', ['for' => 'section2_heading']) }}
                                            {{ Form::text('section2_heading', null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('section2_title', 'Title Middle Sec*', ['for' => 'section2_title']) }}
                                            {{ Form::text('section2_title', null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('section2_image', 'Image Middle Sec*', ['for' => 'section2_image']) }}
                                            <div>{{ Form::file('section2_image',['accept' => 'image/*']) }}</div>
                                            @if($p1 != null)
                                                <img alt="No Image Found" width="100px" height="70px" src="{{asset('storage/'.$p1->section2_image)}}" />
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-5">
                                        {{ Form::button('Save', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
                                        <a href="{{ route('admin.p1.index') }}" class="btn btn-s btn-outline-primary">Cancel</a>
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
