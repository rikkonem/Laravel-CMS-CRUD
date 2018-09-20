<div class="alert info-box">
    @foreach($errors->all() as $error)
        <p class="alert-content">{{$error}}</p>
    @endforeach
</div>