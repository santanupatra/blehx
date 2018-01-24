<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::fallback(asset('la-assets/img/user2-160x160.jpg'))->get(Auth::user()->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
        @endif


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MODULES</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ url(config('laraadmin.adminRoute')) }}"><i class='fa fa-home'></i> <span>Dashboard</span></a></li>
            <li><a href="{{ url(config('laraadmin.adminRoute')) }}/users"><i class='fa fa-user'></i> <span>Users</span></a></li>
            <li><a href="{{ url(config('laraadmin.adminRoute')) }}/site_settings"><i class="fa fa-cog"></i><span>Site Settings</span></a></li>
           <!--  <li><a href="{{url(config('laraadmin.adminRoute'))}}/aboutus"><i class="fa fa-group"></i> <span>About Us</span> </a></li> -->
            <li><a href="{{url(config('laraadmin.adminRoute'))}}/banners"><i class="fa fa-group"></i> <span>Banners</span> </a></li>
            <li><a href="{{url(config('laraadmin.adminRoute'))}}/email_templates"><i class="fa fa-group"></i> <span>Email Templates</span> </a></li>
            <li><a href="{{url(config('laraadmin.adminRoute'))}}/contents"><i class="fa fa-group"></i> <span>Contents</span></a></li>
            <li><a href="{{url(config('laraadmin.adminRoute'))}}/faq_categories"><i class="fa fa-group"></i> <span>FAQ</span></a></li>

            <?php
            $menuItems = Dwij\Laraadmin\Models\Menu::where("parent", 0)->orderBy('hierarchy', 'asc')->get();
            //echo '<pre>'; print_r($menuItems); die;?>
            ?>
            
            <!-- LAMenus -->
            <!-- <li><a href="{{url(config('laraadmin.adminRoute'))}}/charities"><i class="fa fa-group"></i> <span>Charities</span> </a></li>
            <li><a href="{{url(config('laraadmin.adminRoute'))}}/charity/archive"><i class="fa fa-group"></i> <span>Charities Archive</span> </a></li> -->
            <!-- <li><a href="{{url(config('laraadmin.adminRoute'))}}/newsletters"><i class="fa fa-group"></i> <span>Send NewsLetter</span> </a></li> -->
            
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
