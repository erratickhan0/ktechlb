@extends('layouts.app')

@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">

                        <h6 class="h2 text-white d-inline-block mb-0">
                            <span>{{ ($brand->id == null) ? 'Create New Brand' : 'Edit Brand' }}</span>
                        </h6>

                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><em class="fas fa-home"></em></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.brands.index') }}">Brands</a></li>
                                <li class="breadcrumb-item active"><a href="#">{{ ($brand->id == null) ? 'Create ' : 'Edit' }}</a></li>
                            </ol>
                        </nav>
                    </div>

                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('admin.brands.index') }}" class="btn btn-s btn-outline-primary">Back to Brands List</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @if($brand->id == null)
                        <brands-form ></brands-form>
                        @else
                        <brands-form :brand = "{{($brand)}}"></brands-form>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
