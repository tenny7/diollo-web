<!-- Nav -->
<ul class="nav nav-tabs nav-overflow header-tabs">
        <li class="nav-item">
            <a href="{{route('admin.products.index')}}" class="nav-link active">
                @php 
                    $products = \App\Models\Product::all();
                @endphp
            All <span class="badge badge-pill badge-soft-secondary">{{ count($products)}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.products.clearance')}}" class="nav-link">
                @php 
                    $clearance = \App\Models\Product::where('status', \App\Models\Product::CLEARANCE_PRODUCT)->get()
                @endphp
            Clearance <span class="badge badge-pill badge-soft-secondary">{{ count($clearance) }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.products.featured')}}" class="nav-link">
                @php 
                    $featured = \App\Models\Product::where('status', \App\Models\Product::FEATURED_PRODUCT)->get()
                @endphp
              Featured <span class="badge badge-pill badge-soft-secondary">{{ count($featured) }}</span>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a href="products-promoted.html" class="nav-link">
              Promoted <span class="badge badge-pill badge-soft-secondary">71</span>
            </a>
        </li> -->
    </ul>