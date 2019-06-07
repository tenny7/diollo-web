@if (session()->has('status'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Status! </strong> {{ session()->get('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
@endif