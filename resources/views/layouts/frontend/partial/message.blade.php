@if(session('success'))
    <div class="col-sm-12 flash">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Sucess</span> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>
@endif

@if(session('warning'))
    <div class="col-sm-12 flash">
        <div class="alert  alert-warning alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-warning">Warning</span> {{ session('warning') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="col-sm-12 flash">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-danger">Danger</span> {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>
    @endforeach
@endif