<!-- Modal: Activity -->
<div class="modal fade" id="sidebarModalActivity" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-vertical" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <!-- Title -->
                <h4 class="modal-title">
                    Notifications
                </h4>

                <!-- Close -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
        
            </div>
            <div class="modal-body">

                <!-- List group -->
                <div class="list-group list-group-flush my--3">
                    @forelse(Auth::user()->unreadNotifications as $notification)
                    <a class="list-group-item px-0" href="#!">
                        <div class="row">
                            <div class="col ml--2">
                                <!-- Content -->
                                <div class="small text-muted">
                                @include('partials.admin.notification.'.snake_case(class_basename($notification->type)))
                                {{-- <strong class="text-body">{{ $notification->data['user']['first_name'] }} {{ $notification->data['message'] }}</strong> --}}
                                 {{-- @elseif($notification->notifiable_id == 11)  --}}
                                {{-- <strong class="text-body">{{ $notification->data['name']}} {{ $notification->data['message'] }}</strong> --}}
                                {{-- {{ snake_case(class_basename($notification->type)) }} --}}
                                {{-- <strong class="text-body">Adolfo Hess</strong>, and 
                                <strong class="text-body">3 others</strong> paid for the items <strong class="text-body">Sony 12" LED TV</strong>,
                                 <strong class="text-body">Apple Macbook Pro 12"</strong>, ... --}}
                                </div>
                             

                            </div>
                            <div class="col-auto">
                                <small class="text-muted">
                                        {{ $notification->data['user']['created_at'] }}
                                </small>                       
                            </div>
                        </div> <!-- / .row -->
                    </a>
                    @empty 
                {{-- <a href="">No notification</a>  --}}
                    @endforelse
                    
                    {{-- <a class="list-group-item px-0" href="#!">

                        <div class="row">
                            <div class="col ml--2">
                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Christian Jombo</strong> has picked up the item <strong class="text-body">LG Side-by-side Reridgerator</strong>.
                                </div>
                            </div>
                            <div class="col-auto">
                                <small class="text-muted">
                                    10m
                                </small>
                            </div>
                        </div> <!-- / .row -->

                    </a>
                    <a class="list-group-item px-0" href="#!">
                        <div class="row">
                            <div class="col ml--2">
                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Adolfo Hess</strong> returned the item <strong class="text-body">Butterfly Manual Sewing Machine</strong>
                                </div>
                            </div>
                            <div class="col-auto">
                                <small class="text-muted">
                                    13m
                                </small>
                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item px-0" href="#!">
                        <div class="row">
                            <div class="col ml--2">
                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Raphael Emediong</strong> has reserved the item <strong class="text-body">Apple Macbook Pro 12"</strong> for 24 hours.
                                </div>
                            </div>
                            <div class="col-auto">
                                <small class="text-muted">
                                    21m
                                </small>
                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item px-0" href="#!">
                        <div class="row">
                            <div class="col ml--2">
                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Miyah Myles</strong> has paid for the item <strong class="text-body">D&G Summer Crop top</strong>.
                                </div>
                            </div>
                            <div class="col-auto">
                                <small class="text-muted">
                                    27m
                                </small>
                            </div>
                        </div> <!-- / .row -->
                    </a>
                    <a class="list-group-item px-0" href="#!">

                    <div class="row">
                        
                        <div class="col ml--2">
                            <!-- Content -->
                            <div class="small text-muted">
                                <strong class="text-body">Ryu Duke</strong> has returned the item <strong class="text-body">Nokia 3310 Black</strong>.
                            </div>
                        </div>
                        <div class="col-auto">
                            <small class="text-muted">
                                32m
                            </small>
                        </div>
                    </div> <!-- / .row -->

                    </a>
                    <a class="list-group-item px-0" href="#!">
                        <div class="row">
                            <div class="col ml--2">
                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Cosmas Asuquo</strong>, <strong class="text-body">Samuel Ogu</strong> and <strong class="text-body">Kenneth Ekanem</strong> picked up the item <strong class="text-body">Apple iPhone X Max</strong>
                                </div>
                            </div>
                            <div class="col-auto">
                                <small class="text-muted">
                                    2m
                                </small>
                            </div>
                        </div> <!-- / .row -->
                    </a> --}}
                    
                </div>

            </div>
        </div>
    </div>
</div>