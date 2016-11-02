<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-lock"></i> 权限控制 <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/admin/route"><i class="fa fa-circle-o"></i> 路由</a></li>
                    <li><a href="/admin/permission"><i class="fa fa-circle-o"></i> 权限</a></li>
                    <li><a href="/admin/role"><i class="fa fa-circle-o"></i> 角色</a></li>
                    <li><a href="/admin/assignment"><i class="fa fa-circle-o"></i> 分配</a></li>
                    <li><a href="/admin/menu"><i class="fa fa-circle-o"></i> 菜单</a></li>
                    <li><a href="/user"><i class="fa fa-circle-o"></i> 用户管理</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-lock"></i> 入会管理 <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/member"><i class="fa fa-circle-o"></i>入会信息</a></li>
                    <li><a href="/level"><i class="fa fa-circle-o"></i>级别管理</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-lock"></i> 法律援助 <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/laws"><i class="fa fa-circle-o"></i> 政策法规</a></li>
                    <li><a href="/member"><i class="fa fa-circle-o"></i>你问我答</a></li>
                    <li><a href="/level"><i class="fa fa-circle-o"></i>在线咨询</a></li>
                    <li><a href="/lawyer"><i class="fa fa-circle-o"></i>律师管理</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>
