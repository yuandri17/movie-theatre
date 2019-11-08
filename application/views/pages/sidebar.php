<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('film') ?>">
            <i class="fa fa-fw fa-film"></i>
            <span>Film</span>
        </a>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('jadwal') ?>">
            <i class="fa fa-fw fa-calendar"></i>
            <span>Jadwal</span></a>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('genre') ?>">
            <i class="fa fa-fw fa-book"></i>
            <span>Genre</span></a>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('studio') ?>">
            <i class="fa fa-fw fa-play"></i>
            <span>Studio</span></a>
    </li>
</ul>