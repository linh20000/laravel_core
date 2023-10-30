<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img
                @if (!empty(Auth::user()->avatar))
                src="{{ asset('storage/' . Auth::user()->avatar) }}"
                @else
                src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}"
                @endif
                 class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
        </div>
    </div>
    <!-- search form -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        {!! renderMenu(config('menu-admin')) !!}
        <li>
            <a>
            <i class="fa fa-circle-o text-blue"></i>
            <span style="color:white">HĐH: <?php echo getOperatingSystem(); ?></span>
            </a>
        </li>

        <li>
            <a>
            <i class="fa fa-circle-o text-blue"></i>
            <span style="color:white">
                <?php
                    echo floor(disk_total_space("/") / (1024 * 1024 * 1024)) . " GB";
                ?>
            </span>
            </a>
        </li>
        <li>
            <a>
                <i class="fa fa-circle-o text-blue"></i>
                <span style="color:white">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</span>
            </a>
        </li>

    </ul>
</section>
<!-- /.sidebar -->
