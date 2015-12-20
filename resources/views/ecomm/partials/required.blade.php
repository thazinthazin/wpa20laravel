@if($errors->has())
<div class="alert alert-danger" role="alert" align="center">   
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif 