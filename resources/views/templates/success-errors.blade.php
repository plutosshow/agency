@if($errors->any())
    <div class="alert">
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item list-group-item-danger">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
    @endif
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
