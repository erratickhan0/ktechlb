@extends('layouts.app')

@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">

                        <h6 class="h2 text-white d-inline-block mb-0">
                            <span>Brands Management</span>
                            <small class="badge badge-light ml-1">Total</small>
                        </h6>

                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active"><a href="#">Brands Management</a></li>
                            </ol>
                        </nav>

                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">Create Brand</a>
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
                    <div class="card-header bg-transparent">

                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center">
                                <thead class="thead-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Affiliate </th>
                                    <th>Agency</th>
                                    <th>Domain</th>
                                    <th>Product</th>
                                    <th>Order ID</th>
                                    <th>Affiliate Commission</th>

                                    <th><!--Actions --></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                        <td class="align-middle name mb-0 text-sm"></td>
                                        <td class="align-middle"></td>
                                        <td class="align-middle"></td>
                                        <td class="align-middle"></td>
                                        <td class="align-middle"></td>
                                        <td class="align-middle"></td>
                                        <td class="align-middle" style="text-align: right;">$</td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="float-right"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
