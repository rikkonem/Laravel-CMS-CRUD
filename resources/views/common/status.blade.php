@if (session('status'))
    <div class="status-info info-box">
        {{ session('status') }}
    </div>
@endif