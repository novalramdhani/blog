<div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('search') }}" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Recipient's username" autocomplete="off" name="query">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="submit" id="button-addon2">Search...</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
