@extends('layouts.app')

@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-6">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">
                            <span>Product Section</span>
                        </h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active"><a href="#">Product Section</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 mt-2 text-right">
                        <a href="{{ route('admin.mybrand.product.create') }}" class="btn btn-primary">Create new product</a>
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
                                    <th>Title</th>
                                    <th>Created At</th>
                                    <th>Product Image</th>
                                    <th><!--Actions --></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products ?? []  as $product)
                               <tr>
                                        <td class="align-middle name mb-0 text-sm">{{$product->title}}</td>
                                        <td class="align-middle">{{$product->created_at}}</td>

                                        <td class="align-middle">

                                            <img width="100px" height="70px" src="{{asset('storage/'.$product->product_image)}}" />
                                        </td>
                                        <td class="text-right">
                                            <div class="nav-item dropdown text-right">
                                                <a class="btn btn-default dropdown-toggle" href="javascript:;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Actions <span class="caret"></span>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right" >
                                                    <a href="javascript:;"
                                                       class="dropdown-item"
                                                       data-toggle="modal"
                                                       data-target="#confirm_delete"
                                                       data-action="{{ route('admin.mybrand.product.delete',['product' =>$product->id] ) }}"
                                                       data-confirm="Are you sure you want to delete this Product?">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="float-right"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="confirm_delete" tabindex="-1" role="dialog" aria-labelledby="confirmDelete" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Confirm Delete</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">Are you sure you would like to delete this entry?</div>
                    <div class="modal-footer">
                        <?php echo Form::open(['role' => 'form']); ?>
                        <input name="_method" type="hidden" value="DELETE">
                        <button dusk="confirm-delete" type="submit" class="btn btn-danger pull-left js-default-button">Yes, Delete</button>
                        <?php echo Form::close(); ?>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
