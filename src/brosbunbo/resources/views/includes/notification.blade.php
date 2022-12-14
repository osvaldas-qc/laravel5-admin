@if(count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{!! $error !!}</li>
        @endforeach
    </ul>
</div>
@endif

@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif