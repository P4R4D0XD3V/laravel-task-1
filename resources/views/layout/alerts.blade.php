@if (count($errors) > 0)
    <div class="alert-custom alertNotification">
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if(session('success'))
    <div class="alert-custom alertNotification">
        <div class="alert alert-success" role="alert">
            <i class="mdi mdi-check-all mr-2"></i> {{ session('success') }}
        </div>
    </div>
@endif

@if(session('warning'))
    <div class="alert-custom alertNotification">
        <div class="alert alert-warning" role="alert">
            <i class="mdi mdi-alert-outline mr-2"></i> {{ session('warning') }}
        </div>
    </div>
@endif
@if(session('error'))
    <div class="alert-custom alertNotification">
        <div class="alert alert-danger" role="alert">
            <i class="mdi mdi-block-helper mr-2"></i> {{ session('error') }}
        </div>
    </div>
@endif







