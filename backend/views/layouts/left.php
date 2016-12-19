<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->username?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
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
<!--                    <li><a href="/admin/route"><i class="fa fa-circle-o"></i> 路由</a></li>-->
<!--                    <li><a href="/admin/permission"><i class="fa fa-circle-o"></i> 权限</a></li>-->
<!--                    <li><a href="/admin/role"><i class="fa fa-circle-o"></i> 角色</a></li>-->
<!--                    <li><a href="/admin/assignment"><i class="fa fa-circle-o"></i> 分配</a></li>-->
<!--                    <li><a href="/admin/menu"><i class="fa fa-circle-o"></i> 菜单</a></li>-->
                    <li><a href="/user"><i class="fa fa-circle-o"></i> 用户管理</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-lock"></i> 入会管理 <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/member"><i class="fa fa-circle-o"></i>入会信息</a></li>
                    <li><a href="/changemember"><i class="fa fa-circle-o"></i>转会信息</a></li>
                    <li><a href="/ghdepart"><i class="fa fa-circle-o"></i>会员注册统计</a></li>
                    <li><a href="/level"><i class="fa fa-circle-o"></i>级别管理</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-lock"></i> 法律援助 <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/laws"><i class="fa fa-circle-o"></i> 政策法规</a></li>
                    <li><a href="/laws-qa"><i class="fa fa-circle-o"></i>你问我答</a></li>
                    <li><a href="/lawsonline"><i class="fa fa-circle-o"></i>在线咨询</a></li>
                    <li><a href="/lawscase"><i class="fa fa-circle-o"></i>案例解析</a></li>
                    <li><a href="/lawyer"><i class="fa fa-circle-o"></i>律师管理</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-lock"></i> 心理咨询 <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/mindknowledge"><i class="fa fa-circle-o"></i> 心理知识</a></li>
                    <li><a href="/mindcase"><i class="fa fa-circle-o"></i>案例精选</a></li>
                    <li><a href="/mindonline"><i class="fa fa-circle-o"></i>在线咨询</a></li>
                    <li><a href="/minders"><i class="fa fa-circle-o"></i>心理专家管理</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-lock"></i> 我有话说 <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/mysay"><i class="fa fa-circle-o"></i> 我有话说</a></li>
                    <li><a href="/mysaylevel"><i class="fa fa-circle-o"></i>我有话说-发往地管理</a></li>
                    <li><a href="/mysaytype"><i class="fa fa-circle-o"></i>我有话说-类别管理</a></li>
                    <li><a href="/mysayaddress"><i class="fa fa-circle-o"></i>我有话说-事发地管理</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>
