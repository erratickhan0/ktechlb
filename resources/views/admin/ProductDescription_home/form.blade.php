@extends('layouts.app')

@section('content')
    @if (!isset($product_description))
        {{ Form::open(['route' => ['admin.mybrand.product-description.store',$design], 'role' => 'form', 'id' => 'icon-form', 'files' => true]) }}
    @else
        {{ Form::open(['route' => ['admin.mybrand.product-description.update',['ProductDescription' =>$product_description->id,'design'=> $design]], 'role' => 'form', 'id' => 'icon-form', 'files' => true]) }}
    @endif
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">

                        <h6 class="h2 text-white d-inline-block mb-0">
                            <span>Homepage Product Description Uploader</span>
                        </h6>

                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.mybrand.product-description',['slug'=> session()->get('selected_brand')->slug,'design' => $design]) }}">Banner</a></li>

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
                                            {{ Form::label('description1', 'Description1', ['for' => 'description1']) }}
                                            {{ Form::textarea('description1',isset($product_description) ? $product_description->description1:null, array('class' => 'form-control wysiwyg','rows' => 6, 'cols' => 40)) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('description2', 'Description2', ['for' => 'description2']) }}
                                            {{ Form::textarea('description2',isset($product_description) ? $product_description->description2:null, array('class' => 'form-control wysiwyg','rows' => 6, 'cols' => 40)) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('description3', 'Description3', ['for' => 'description3']) }}
                                            {{ Form::textarea('description3',isset($product_description) ? $product_description->description3:null, array('class' => 'form-control wysiwyg','rows' => 6, 'cols' => 40)) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('background_image', 'Background Image*', ['for' => 'background_image']) }}
                                            <div>{{ Form::file('background_image') }}</div>
                                        </div>

                                    </div>
                                    @if (isset($product_description->background_image))
                                        <div class="col-6  mt-n3">
                                            <div><img src="{{ asset('storage/' .$product_description->background_image) }}" style="max-width:120px;max-height:120px" alt="Image"></div>
                                            <div><span>Background Image</span></div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group required">
                                            {{ Form::label('image', 'Image*', ['for' => 'image']) }}
                                            <div>{{ Form::file('image') }}</div>
                                        </div>

                                    </div>
                                    @if (isset($product_description->image))
                                        <div class="col-6  mt-n3">
                                            <div><img src="{{ asset('storage/' .$product_description->image) }}" style="max-width:120px;max-height:120px" alt="Image"></div>
                                            <div><span>Image</span></div>
                                        </div>
                                    @endif
                                </div>



                                <div class="row">
                                    <div class="col-6 mt-5">
                                    {{ Form::button('Save', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
                                    <a href="{{ route('admin.mybrand.product-description',['slug' => session()->get('selected_brand')->slug,'design' => $design]) }}" class="btn btn-s btn-outline-primary">Cancel</a>
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
