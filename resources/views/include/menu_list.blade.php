<div class="main-menu material-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true"  style="background-image: repeating-radial-gradient(#0A0E45, #0A246A);">
    <div class="user-profile">
        <div class="user-info text-center pb-2">
            <img class="user-img img-fluid rounded-circle w-25 mt-2" src="../../../app-assets/images/portrait/small/avatar-s-1.png" alt="" />
            <div class="name-wrapper d-block dropdown mt-1">
                <a class="white dropdown-toggle" id="user-account" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="user-name">{{session('NmApoteker')}}</span>
                </a>
                <div class="text-light">Apoteker</div>
            </div>
        </div>
    </div>
    
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"  style="background-image: repeating-radial-gradient(#0A0E45, #0A246A);">
            <li class="nav-item">
                <a href="/beranda" class="menu-item">
                    <i class="material-icons">settings_input_svideo</i>
                    <span class="menu-title" data-i18n="Dashboard">Beranda</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/apoteker" class="menu-item">
                    <i class="material-icons">settings_input_svideo</i>
                    <span class="menu-title" data-i18n="Dashboard">Master Apoteker</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/obat" class="menu-item">
                    <i class="material-icons">settings_input_svideo</i>
                    <span class="menu-title" data-i18n="Dashboard">Master Obat</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/laporan" class="menu-item">
                    <i class="material-icons">settings_input_svideo</i>
                    <span class="menu-title" data-i18n="Dashboard">Laporan</span>
                </a>
            </li>
           
        </ul>
    </div>
</div>

