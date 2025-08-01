<html>
    <head>
        <title>Home</title>
        <link rel="icon" href="/logosenopati.png" type="image">
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        
    </head>
    <body> 
    <div class="container-fluid flex-nowrap">
    <div class="row flex-nowrap ">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-primary" >
            <div class="d-flex flex-column align-items-center align-items-sm-start px-1 pt-2 font-monospace text-white min-vh-100">
                <a href="/mainmenu" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-light text-decoration-none">
                    <span class="fs-1 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-light">
                            <i class="fs-5 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard |||</span> </a>

                        <ul class="collapse show nav flex-column ms-1 " id="submenu1" data-bs-parent="#menu">

                            <li class="w-100">
                                <a href="/pegawai" class="nav-link px-0 text-light"> <span class="d-none d-sm-inline">Pegawai</span></a>
                            </li>
                            <li>
                                <a href="/pekerja" class="nav-link px-0 text-light"> <span class="d-none d-sm-inline">Pekerja</span></a>
                            </li>
                            <li>
                                <a href="/pendidikan" class="nav-link px-0 text-light"> <span class="d-none d-sm-inline">Pendidikan</span></a>
                            </li>
                            <li>
                                <a href="/fprint" class="nav-link px-0 text-light"> <span class="d-none d-sm-inline">Finger Print</span></a>
                            </li>
                            <li>
                                <a href="/presensi" class="nav-link px-0 text-light"> <span class="d-none d-sm-inline">Presensi</span></a>
                            </li>
                            <li>
                                <a href="/absensi" class="nav-link px-0 text-light"> <span class="d-none d-sm-inline">Absensi</span></a>
                            </li>
                            <li>
                                <a href="/kantor" class="nav-link px-0 text-light"> <span class="d-none d-sm-inline">Kantor</span></a>
                            </li>
                            <li>
                                <a href="/divisi" class="nav-link px-0 text-light"> <span class="d-none d-sm-inline">Divisi</span></a>
                            </li>
                            
                        </ul>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/aaaa.jpg" alt="profile" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">Putra Hikmah Febryan</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="/home">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">
        @yield('navbar')
        </div>
    </div>
</div>
<script src="/js/bootstrap.bundle.min.js" rel="javascript"></script>
</body>

</html>
