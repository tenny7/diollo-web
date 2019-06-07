<!-- Nav -->
<ul class="nav nav-tabs nav-overflow header-tabs">
        <li class="nav-item">
            <a href="{{route('admin.promotions.index')}}" class="nav-link active">
            All <span class="badge badge-pill badge-soft-secondary">{{ count($promotions)}}</span>
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
            <a href="{{route('admin.promotions.complete')}}" class="nav-link">
                @php 
                    $completed = \App\Models\Promotion::where('status', \App\Models\Promotion::STATUS_COMPLETED)->get()
                @endphp
              Completed <span class="badge badge-pill badge-soft-secondary">{{ count($completed) }}</span>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a href="products-promoted.html" class="nav-link">
              Promoted <span class="badge badge-pill badge-soft-secondary">71</span>
            </a>
        </li> -->
    </ul>