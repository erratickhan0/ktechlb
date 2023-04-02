@extends('layouts.app')

@section('content')
    @if($p2 == null)
    {{ Form::open(['route' => ['admin.p2.store'], 'role' => 'form', 'id' => 'p2-form', 'files' => true]) }}
    @else
    {{ Form::model($p2, ['role' => 'form', 'route' => ['admin.p2.update', $p2->id], 'method' => 'put', 'id' => 'p2-form', 'files' => true]) }}
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
                                <li class="breadcrumb-item"><a href="{{ route('admin.p2.index') }}">p2</a></li>
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
                                            {{ Form::label('title', 'Title*', ['for' => 'title']) }}
                                            {{ Form::text('title', null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('description', 'Description*', ['for' => 'description']) }}
                                            {{ Form::text('description', null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('link', 'Link*', ['for' => 'link']) }}
                                            {{ Form::text('link', null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('bg_image', 'Background Image*', ['for' => 'bg_image']) }}
                                            <div>{{ Form::file('bg_image') }}</div>
                                            @if($p2 != null)
                                                <img width="100px" height="70px" src="{{asset('storage/'.$p2->bg_image)}}" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('image', 'Image*', ['for' => 'image']) }}
                                            <div>{{ Form::file('image') }}</div>
                                            @if($p2 != null)
                                                <img width="100px" height="70px" src="{{asset('storage/'.$p2->image)}}" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mt-5">
                                        {{ Form::button('Save', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
                                        <a href="{{ route('admin.p2.index') }}" class="btn btn-s btn-outline-primary">Cancel</a>
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
