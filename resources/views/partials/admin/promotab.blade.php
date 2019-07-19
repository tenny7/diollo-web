<!-- Nav -->
<ul class="nav nav-tabs nav-overflow header-tabs">
        <li class="nav-item">
            <a href="{{route('admin.promotions.index')}}" class="nav-link active">
                @php 
                    $allpromotions = \App\Models\Promotion::all()
                @endphp
            All <span class="badge badge-pill badge-soft-secondary">{{ count($allpromotions)}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.promotions.active')}}" class="nav-link">
                @php 
                    $active = \App\Models\Promotion::where('status', \App\Models\Promotion::STATUS_ACTIVE)->get()
                @endphp
            Active <span class="badge badge-pill badge-soft-secondary">{{ count($active) }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.promotions.slider')}}" class="nav-link">
                @php 
                    $slider = \App\Models\Promotion::where('promo_type', 'slider')->get()
                @endphp
              Home sliders <span class="badge badge-pill badge-soft-secondary">{{ count($slider) }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.promotions.topselling')}}" class="nav-link">
                @php 
                    $topselling = \App\Models\Promotion::where('promo_type', 'topselling')->get()
                @endphp
              Top Selling <span class="badge badge-pill badge-soft-secondary">{{ count($topselling) }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.promotions.newstock')}}" class="nav-link">
                @php 
                    $newstock = \App\Models\Promotion::where('promo_type', 'newstock')->get()
                @endphp
              New Stock <span class="badge badge-pill badge-soft-secondary">{{ count($newstock) }}</span>
            </a>
        </li>
        <li class="nav-item">
                <a href="{{route('admin.promotions.storeBanner')}}" class="nav-link">
                    @php 
                        $storeBanner = \App\Models\Promotion::where('promo_type', 'store')->get()
                    @endphp
                  Store Banners <span class="badge badge-pill badge-soft-secondary">{{ count($storeBanner) }}</span>
                </a>
            </li>
        <!-- <li class="nav-item">
            <a href="products-promoted.html" class="nav-link">
              Promoted <span class="badge badge-pill badge-soft-secondary">71</span>
            </a>
        </li> -->
    </ul>