@if(Session::has('success'))

    <div class="alert alert-danger">
        <strong>Success :</strong> {{ \Illuminate\Support\Facades\Session::get('success') }}
    </div>

@endif