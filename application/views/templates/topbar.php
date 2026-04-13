<nav class="navbar navbar-expand navbar-light bg-gray-500 topar mb-4 static top shadow">

<button id="sidebarToogleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown no-arrow">
        <a class ="nav-link dropdown-toogle" href="#" id="userDropdown" role="button" data-toogle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/ProfilAdmin.jpeg')?>" width="40" height="40">
        </a>
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="#">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400">Profile</i>
        </a>
        <div class="dropdown-divider"></div>
        <span class="dropdown-item text-muted small">Last login:</span>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="<?= site_url('auth/logout')?>">
            <i class="fas fa-sign-out-all fa-sm fa-fw mr-2 text-gray-400">Logout</i>
        </a>
    </div>
    </li>
</ul>

</nav>