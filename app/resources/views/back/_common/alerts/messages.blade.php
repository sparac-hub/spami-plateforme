@if(Session::get('success'))
    <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
@endif

@if(!empty($errors->all()))
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" role="alert">
        <ul>
            <li>{{ session('error') }}</li>
        </ul>
    </div>
@endif
