<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>home">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Desa Kalikatir</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Query Menu -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu`. `id`, `menu`  
                    FROM `user_menu` JOIN `user_akses_menu` 
                    ON `user_menu`.`id` = `user_akses_menu`.`menu_id`
                    WHERE `user_akses_menu`.`role_id`= $role_id
                    ORDER BY `user_akses_menu`.`menu_id` ASC
                    ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>


    <!-- Looping Menu -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>
        <?php
        $menuid = $m['id'];
        $querySubmenu = "SELECT *  FROM `user_sub_menu`
                        WHERE `menu_id`=  $menuid
                        AND `is_active` = 1";
        $submenu = $this->db->query($querySubmenu)->result_array();
        ?>
        <?php foreach ($submenu as $sm) : ?>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
            </li>
        <?php endforeach; ?>
        <hr class="sidebar-divider d-none d-md-block">
    <?php endforeach; ?>



    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->