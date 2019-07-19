<!-- Nav -->
<ul class="nav nav-tabs nav-overflow header-tabs">
        <li class="nav-item">
            <a href="{{route('admin.agents.index')}}" class="nav-link">
                    @php 
                    $allAgents = \App\Models\User::where('role',\App\Models\User::ROLE_AGENT)->get();
                @endphp
            All <span class="badge badge-pill badge-soft-secondary">{{ count($allAgents)}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.agents.suspended')}}" class="nav-link">
                    @php 
                    $suspended = \App\Models\User::where('status',\App\Models\User::STATUS_SUSPENDED)->where('role',\App\Models\User::ROLE_AGENT)->get();
                @endphp
                Suspended <span class="badge badge-pill badge-soft-secondary">{{ count($suspended)}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.agents.applications')}}" class="nav-link active">
                    @php 
                    $applications = \App\Models\AgentApplication::all();
                @endphp
                Applications <span class="badge badge-pill badge-soft-secondary">{{ count($applications) }}</span>
            </a>
        </li>
    </ul>