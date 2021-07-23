<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
            <i class="fas fa-fw fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SPK BEASISWA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!--QUERY MENU-->
    <?php $queryMenu = "SELECT * FROM user_menu";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!--LOOPING MENU-->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>

        <!--SIAPKAN SUB MENU-->
        <?php
        $menuID = $m['id'];
        $querySubMenu = "SELECT * FROM user_sub_menu JOIN user_menu
                    ON user_sub_menu.menu_id = user_menu.id
                    WHERE user_sub_menu.menu_id = $menuID
                    AND user_sub_menu.is_active = 1";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) :   ?>
            <?php if ($title == $sm['title']) :   ?>
                <li class="nav-item active">
                <?php else :   ?>
                <li class="nav-item">
                <?php endif;  ?>
                <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= ($sm['icon']); ?>"></i>
                    <span><?= ($sm['title']); ?></span></a>
                </li>
            <?php endforeach; ?>
        <?php endforeach; ?>


        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->