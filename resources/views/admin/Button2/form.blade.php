@extends('layouts.app')

@section('content')
    @if($button2 == null)
        {{ Form::open(['route' => ['admin.button2.store'], 'role' => 'form', 'id' => 'news-form', 'files' => true]) }}
    @else
        {{ Form::model($button2, ['role' => 'form', 'route' => ['admin.button2.update', $button2->id], 'method' => 'put', 'id' => 'p1-form', 'files' => true]) }}
    @endif
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">

                        <h6 class="h2 text-white d-inline-block mb-0">
                            <span>Create New button page</span>
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
                                            {{ Form::label('title', 'Title*', ['for' => 'name']) }}
                                            {{ Form::text('title', null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('subtitle', 'Sub Title*', ['for' => 'name']) }}
                                            {{ Form::text('subtitle', null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('image1', 'Cover Image*', ['for' => 'image']) }}
                                            <div>{{ Form::file('image1') }}</div>
                                            @if($button2 != null)
                                                <img width="100px" height="70px" src="{{asset('storage/'.$button2->image1)}}" />
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('image2', 'Hover Image*', ['for' => 'image']) }}
                                            <div>{{ Form::file('image2') }}</div>
                                            @if($button2 != null)
                                                <img width="100px" height="70px" src="{{asset('storage/'.$button2->image2)}}" />
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-5">
                                    {{ Form::button('Save', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
                                    <a href="{{ route('admin.button2.index') }}" class="btn btn-s btn-outline-primary">Cancel</a>
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
