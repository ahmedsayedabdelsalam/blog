@if(Session::has('message'))
    <div class="alert alert-primary text-center">
        {{ Session::get('message') }}
    </div>
@endif