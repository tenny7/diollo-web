@if (session()->has('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Warning! </strong> {{ session()->get('warning') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
@endif