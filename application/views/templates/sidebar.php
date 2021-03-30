<div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try{ace.settings.loadState('main-container')}catch(e){}
            </script>

            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <script type="text/javascript">
                    try{ace.settings.loadState('sidebar')}catch(e){}
                </script>

                <div class="sidebar-shortcuts" id="sidebar-shortcuts">

                    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                        <button class="btn btn-success">
                           <i class="ace-icon fa fa-signal"></i>
                        </button>
 
                        <button class="btn btn-info">
                            <i class="ace-icon fa fa-pencil"></i>
                        </button>

                        <button class="btn btn-warning">
                            <i class="ace-icon fa fa-users"></i>
                        </button>

                        <button class="btn btn-danger">
                            <i class="ace-icon fa fa-cogs"></i>
                        </button>
                    </div>
                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class="btn btn-success"></span>

                        <span class="btn btn-info"></span>

                        <span class="btn btn-warning"></span>

                        <span class="btn btn-danger"></span>
                    </div>
                </div><!-- /.sidebar-shortcuts -->

                <!-- Query dari menu yang bisa diakses oleh admin atau user -->

               <?php //melakukan join antar tabel

                $role_id = $this->session->userdata('role_id');

                $queryMenu = "SELECT `user_menu`.`id`,`menu`
                                FROM `user_menu` JOIN `user_access_menu`
                                ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                                WHERE `user_access_menu`.`role_id` = $role_id
                                ORDER BY `user_access_menu`.`menu_id` ASC"; //ini bukan tanda petik(''), tapi backtick(``)  
                
                 //order  by untuk mengurutkan berdasar menu_id pada tabel user_access_menu
                $menu = $this->db->query($queryMenu)->result_array(); //memanggil queryMenu diatas
                
                ?>
                <!-- LOOPING MENU -->
              <?php foreach ($menu as $m) : ?>
                 
                <div class="sidebar-heading">
                    <center><?= $m['menu']; ?></center>
                </div>

                <!-- siapkan submenu sesuai menu -->
                <?php
                //Query Sub Menu untuk join tabel user_menu dengan tabel user_sub_menu
                $menuId = $m['id'];
                $querySubMenu = "SELECT *
                                FROM `user_sub_menu` JOIN `user_menu` 
                                ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                WHERE `user_sub_menu`.`menu_id` = $menuId
                                AND `user_sub_menu`.`is_active` = 1
                                ";
                $subMenu = $this->db->query($querySubMenu)->result_array(); //menu-icon fa fa-tachometer
                ?>

                <?php foreach($subMenu as $sm) : ?>
                    <!-- untuk keaktifan link active -->
                    <ul class="nav nav-list">
                    <?php if ($title == $sm['title']): ?> 
                        <li class="active">
                    <?php else: ?>
                        <li class="">
                    <?php endif; ?>

                        <a href="<?= base_url($sm['url']); ?>">
                            <i class="<?= $sm['icon']; ?>"></i>
                            <span class="menu-text"> <?= $sm['title']; ?> </span>
                        </a>

                        <b class="arrow"></b>
                    </li>
                <?php endforeach ?>
                <?php endforeach; ?>
                

                <div class="sidebar-heading">
                    <center>Logout</center>
                </div>
                    <li class="">
                        <a href="<?= base_url('auth/logout'); ?>" class="log-sweet">
                            <i class="menu-icon fa fa-sign-out"></i>
                            <span class="menu-text"> Logout </span>
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul><!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>