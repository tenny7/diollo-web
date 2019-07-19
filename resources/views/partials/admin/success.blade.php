@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible  show" role="alert" style="font-size:17px;">
        <strong>Success! </strong> {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
@endif
{{-- @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong> <strong style="color:black;">{{ session()->get('danger') }}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
@endif --}}

{{-- @if(isset($success))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success! </strong> <strong style="color:black;">{{ $success }}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
</div>
@endif --}}