@if (isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        @if (count($errors) == 1)
            {{ $errors->first() }}
        @else
            <ul class="mb-0">
                @foreach ($errors->all('<li>:message</li>') as $error)
                    {!! $error !!}
                @endforeach
            </ul>
        @endif
    </div>
@endif
@if (Session::get('success'))
    <div class="alert alert-success alert-dismissible" data-autoclose>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ Session::get('success') }}
    </div>
@endif
@if (Session::get('status'))
    <div class="alert alert-success alert-dismissible" data-autoclose>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ Session::get('status') }}
    </div>
@endif
@if (Session::get('error'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ Session::get('error') }}
    </div>
@endif
@if (Session::get('info'))
    <div class="alert alert-info alert-dismissible" data-autoclose>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ Session::get('info') }}
    </div>
@endif
