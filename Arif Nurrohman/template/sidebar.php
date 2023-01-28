<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" data-aos="fade-right">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['role']; ?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if($page == "Dashboard") echo "active" ?>">
        <a class="nav-link" href="index2.php">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span></a>
    </li>
    <?php if(!isset($_SESSION['role']) || $_SESSION['role'] == 'admin'){ ?>
        <!-- echo " -->
        <li class="nav-item <?php if($page == "datakarywan") echo "active" ?>">
        <a class="nav-link " href="datakaryawan.php">
            <i class="bi bi-receipt"></i>
            <span>Data Absensi Karyawan</span></a>
        </li>
        <li class='nav-item <?php if($page == "datausers") echo "active" ?>'>
            <a class='nav-link' href='datausers.php'>
                <i class="bi bi-person-workspace"></i>
                <span>Data Karyawan</span></a>
        </li>
        
<?php
    } else{ ?>
        <li class='nav-item <?php if($page == "absensi") echo "active" ?>'>
        <a class='nav-link' href='attendance.php'>
            <i class="bi bi-person-vcard"></i>
            <span>Absensi</span></a>
        </li>
        
    <?php } ?>
    
    
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    
</ul>