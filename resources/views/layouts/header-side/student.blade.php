<!--=================================
 header start-->
<link href="{{ asset('wizard.css') }}" rel="stylesheet">
<nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <!-- logo -->
    <div class="text-left navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset('assets/images/logo-dark.png')}}" alt=""></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('assets/images/logo-icon-dark.png')}}"
                                                                       alt=""></a>
    </div>
    <!-- Top bar left -->
    <ul class="nav navbar-nav mr-auto">
        <li class="nav-item">
            <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
               href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
        </li>
        <li class="nav-item">
            <div class="search">
                <a class="search-btn not_click" href="javascript:void(0);"></a>
                <div class="search-box not-click">
                    <input type="text" class="not-click form-control" placeholder="Search" value=""
                           name="search">
                    <button class="search-button" type="submit"> <i class="fa fa-search not-click"></i></button>
                </div>
            </div>
        </li>
    </ul>

    <!-- top bar right -->
    <ul class="nav navbar-nav ml-auto">
        <ul>
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li>
                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                </li>
            @endforeach
        </ul>
        <li class="nav-item fullscreen">
            <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
        </li>
        <li class="nav-item dropdown ">
            <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
               aria-expanded="false">
                <i class="fa fa-bell"></i>
                <span class="badge badge-danger notification-status"> </span>
                <span class="badge badge-pill badge-warning" id="count_msg">{{$notification->count()}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">


                <div class="dropdown-header notifications" id="my_msg">
                    <div class="dropdown-header notifications">
                        <strong>Notifications</strong>
                    </div>

                    @foreach($notification as $item)
                        <div  class="dropdown-item">{{$item->content}}<small
                                class="float-right text-muted time">Just now</small></div>
                        @endforeach

                </div>







            </div></li>
        <li class="nav-item dropdown mr-30">
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false">
                <img src="{{asset('assets/images/profile-avatar.jpg')}}" alt="avatar">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0">Michael Bean</h5>
                            <span>michael-bean@mail.com</span>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="text-secondary ti-reload"></i>Activity</a>
                <a class="dropdown-item" href="#"><i class="text-success ti-email"></i>Messages</a>
                <a class="dropdown-item" href="#"><i class="text-warning ti-user"></i>Profile</a>
                <a class="dropdown-item" href="#"><i class="text-dark ti-layers-alt"></i>Projects <span
                        class="badge badge-info">6</span> </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>Settings</a>
                <a class="dropdown-item" href="{{route("logout")}}"><i class="text-danger ti-unlock"></i>Logout</a>
            </div>
        </li>
    </ul>
</nav>

<script src="{{asset('https://js.pusher.com/7.2/pusher.min.js')}}"></script>
<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('9ece6d69cf79c2f23c69', {
        cluster: 'ap2',
        channelAuthorization: {
            endpoint: "/broadcasting/auth",
            headers: { "X-CSRF-Token": "{{csrf_token()}}" },
        },
    });

    var channel = pusher.subscribe("private-lecture.{{$my_section_id}}");
    channel.bind('App\\Events\\Teacher\\lecuterEvent', function(data) {

        var notification =document.getElementById("my_msg");
        var num_notification =document.getElementById("count_msg");
        var n2=parseInt(num_notification.innerText);
        num_notification.innerText=++n2;
        notification.innerHTML=notification.innerHTML+"<div  class=\"dropdown-item\">"+ data.data+"<small\n" +
            "class=\"float-right text-muted time\">Just now</small></div>"
    });
</script>
