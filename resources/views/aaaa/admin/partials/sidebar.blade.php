<nav class="side-navbar box-scroll sidebar-scroll">
    <!-- Begin Main Navigation -->
    <ul class="list-unstyled">
        <li class="active"><a href="#dropdown-db" aria-expanded="true" data-toggle="collapse"><i class="la la-columns"></i><span>Home</span></a>
            <ul id="dropdown-db" class="collapse list-unstyled show pt-0">
                <li><a href="{{ route('admin') }}">DashBoard</a></li>
                <li><a href="{{ route('alldata') }}">All Data</a></li>
            </ul>
        </li>
        <li><a href="#dropdown-app" aria-expanded="false" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>Applications</span></a>
            <ul id="dropdown-app" class="collapse list-unstyled pt-0">
                <li><a href="app-calendar.html">Calendar</a></li>
                <li><a href="app-chat.html">Chat</a></li>
                <li><a href="app-mail.html">Mail</a></li>
                <li><a href="app-contact.html">Contact</a></li>
            </ul>
        </li>
        <li><a href="components-widgets.html"><i class="la la-spinner"></i><span>Widgets</span></a></li>
    </ul>
    <!-- End Main Navigation -->
</nav>