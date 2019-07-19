@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong> 
        @if (count($errors->all()) == 1)
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        @else
            Some errors occured,
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            
        @endif
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
@endif

{{-- @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong> <strong style="color:black;">{{ session()->get('success') }}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
@endif --}}

@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" style="color:black;" role="alert">
        <strong>Error! </strong> {{ session()->get('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
@endif

