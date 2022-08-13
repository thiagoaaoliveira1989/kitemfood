@if ($errors->any())
    <div class="alert alert-warning">
        @foreach ($errors->all() as $error)
            <p> {{ $error }} </p>
        @endforeach
    </div>
@endif

@if (session('message'))
    <div class="alert-success">
        {{ session('menssage') }}
    </div>
@endif

@if (session('error'))
    <div class="alert-danger text-center" style="font-size: 20px; color:yellow;">
        {{ session('error') }}
    </div>
@endif

@if (session('info'))
    <div class="alert-warning">
        {{ session('info') }}
    </div>
@endif