<aside class="main-sidebar"  >
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <li {{ Request::is('/') == true || Request::is('dashboard') == true ? 'class=active' : '' }}>
                <a href="/">
                    <i class="fa fa-map-marker"></i>
                    <span>Locations</span>
                    <span class="pull-right-container">
                </span>
                </a>
            </li>
            <li {{ Request::is('/google/maps') == true ? 'class=active' : '' }}>
                <a href="/google/maps">
                    <i class="fa fa-google"></i>
                    <span>Google Maps Integration</span>
                    <span class="pull-right-container">
                </span>
                </a>
            </li>

        </ul>

    </section>
    <!-- /.sidebar -->
</aside>
