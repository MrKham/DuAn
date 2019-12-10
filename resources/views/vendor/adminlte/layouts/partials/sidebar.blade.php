<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
       
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->

            <li class="@yield('sidebar_post')">
                <a href="{{ url('post') }}">
                    <i class='fa fa-archive'></i> <span>Products</span>
                </a>
            </li>

            <li class="@yield('sidebar_category')">
                <a href="{{ url('category') }}">
                    <i class='fa fa-tags'></i> <span>Categories</span>
                </a>
            </li>
            
            <li class="@yield('sidebar_order')">
                <a href="{{ url('order') }}">
                    <i class='fa fa-shopping-bag'></i> <span>Order</span>
                </a>
            </li>

            <li class="@yield('sidebar_user')">
                <a href="{{ url('user') }}">
                    <i class='fa fa-user '></i> <span>User</span>
                </a>
            </li>

          
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
