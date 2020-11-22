<div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5">
                @if (session('success'))
                    <div class="alert alert-{{ $alertType }}">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
