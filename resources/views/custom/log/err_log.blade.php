@if (\Session::has($name))
    <div class="row">
        <article class="col-lg-12">
            <div class="alert alert-danger" role="alert">
                <button class="close" data-dismiss="alert">
                    ×
                </button>
                </strong> {{ \Session::get($name) }}
            </div>
        </article>
    </div>
@endif