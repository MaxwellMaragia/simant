<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ Storage::url(Auth::user()->avatar) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i>Logged in</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

          {{--<li><a href="{{ route('role.index') }}"><i class="fa fa-circle-o text-aqua"></i> <span>Roles</span></a></li>--}}

          <li class="treeview">
              <a href="#">
                  <i class="fa fa-rss"></i> <span>Blog</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{ route('post.index') }}"><i class="fa fa-circle-o"></i> Posts</a></li>
                  <li><a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i> Categories</a></li>
                  <li><a href="{{ route('tag.index') }}"><i class="fa fa-circle-o"></i> Tags</a></li>
              </ul>
          </li>
          <li><a href="{{ route('settings.index') }}"><i class="fa fa-gears text-aqua"></i> <span>Settings</span></a></li>

    </ul>



    </section>
    <!-- /.sidebar -->
  </aside>
