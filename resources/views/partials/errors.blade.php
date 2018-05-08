<ul class="mt-3 list-unstyled">
    @if(count($errors->all()) > 0)
        @foreach ($errors->all() as $error)
            <li class="alert alert-danger">{{ $error }}</li>
        @endforeach
    @endif
</ul>