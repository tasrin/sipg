    

<nav class="navbar fixed-bottom footbar bg-white p-0 d-flex d-md-none" style="border-top: 1px solid rgb(222, 226, 230);">
    <div class="col text-center">
        <a href="{{ route('home') }}" class="navbar-brand text-secondary"><i class="fas fa-home"></i> <small class="d-block">Home</small></a>
    </div> 
    <div class="col text-center">
        <a href="{{ route('master.staff.index') }}" class="navbar-brand text-secondary"><i class="fas fa-user-circle"></i> <small class="d-block">Staff</small></a>
    </div> 
    <div class="col text-center">
        <a href="{{ route('absensi.index') }}" class="navbar-brand text-secondary"><i class="fas fa fa-address-book-o"></i> <small class="d-block">Absensi</small></a>
    </div>
    <div class="col text-center">
        <a href="" class="navbar-brand text-secondary nav-link" data-widget="pushmenu"><i class="fas fa-bars"></i> <small class="d-block">Menu</small></a>
    </div>
</nav>

<footer class="main-footer d-none d-md-block">
    <strong>Copyright &copy; {{ date('Y') }} <a href="#" data-toggle="tooltip" title="Lihat Situs" target="_blank">Telsip</a>.</strong> All rights reserved.
</footer>