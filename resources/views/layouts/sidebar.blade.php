<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">NRW Architect<sup></sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">
<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Components</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
        </div>
    </div>
</li> -->

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
        aria-expanded="false" aria-controls="collapseOne">
        <i class="fas fa-solid fa-users"></i>
        <span>Landing Page</span>
    </a>
    <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Components Profile:</h6> -->
            <a class="collapse-item" href="{{ route('admin.landing.slider.index') }}">Slider</a>
            <a class="collapse-item" href="{{ route('admin.landing.aboutus') }}">About Us</a>
            <a class="collapse-item" href="{{ route('admin.landing.contactus') }}">Contact Us</a>
            <a class="collapse-item" href="{{ route('admin.landing.socialmedia') }}">Social Media</a>
            <a class="collapse-item" href="{{ route('admin.landing.logo') }}">Logo</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="false" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Testimonial</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Components Profile:</h6> -->
            <a class="collapse-item" href="{{ route('admin.testimonial.index') }}">Data Testimonial</a>
            <a class="collapse-item" href="{{ route('admin.testimonial.create') }}">Buat Testimonial</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
        aria-expanded="false" aria-controls="collapseThree">
        <i class="fas fa-fw fa-cog"></i>
        <span>Portofolio</span>
    </a>
    <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Components Profile:</h6> -->
            <a class="collapse-item" href="{{ route('admin.portofolio.index') }}">Data Portofolio</a>
            <a class="collapse-item" href="{{ route('admin.portofolio.create') }}">Buat Portofolio</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
        aria-expanded="false" aria-controls="collapseFour">
        <i class="fas fa-solid fa-user"></i>
        <span>Petugas Admin</span>
    </a>
    <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Components Profile:</h6> -->
            <a class="collapse-item" href="/datapetugasadmin">Data Petugas Admin</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->