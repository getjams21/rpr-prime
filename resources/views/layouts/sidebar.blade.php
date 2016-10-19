<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/components/images/avatar/male_default.png") }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Welcome {{Auth::user()->first_name}}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Options</li>
            <!-- Optionally, you can add icons to the links -->
            <!-- <li class="active"><a href="#"><span>Link</span></a></li>
            <li><a href="#"><span>Another Link</span></a></li> -->
            <li class="treeview">
                <a href="#" id="change-arrow"><span><i class="fa fa-file-text-o">&nbsp;&nbsp;</i>File Maintenance</span> <i class="fa fa-angle-down pull-right change-arrow"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/users">&nbsp;<i class="fa fa-users">&nbsp;</i>Users</a></li>
                    <li><a href="/branches">&nbsp;<i class="fa fa-building ">&nbsp;</i>Branches</a></li>
                    <li><a href="/customers">&nbsp;<i class="fa fa-user">&nbsp;</i>Customers</a></li>
                    <li><a href="/items">&nbsp;<i class="fa fa-camera">&nbsp;</i>Items</a></li>
                </ul>
            </li>
            <li class="treeview" =>
                <a href="#" id="change-arrow-2"><span><i class="fa fa-list">&nbsp;&nbsp;</i>Transactions</span> <i class="fa fa-angle-down pull-right change-arrow-2"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/quotations">&nbsp;<i class="fa fa-dollar">&nbsp;</i>Quotations</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>