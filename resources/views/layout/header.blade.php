
<nav class="navigasi-bar fixed-top">
    <div class="row">
        <div class="col-lg-4" style="padding-left: 10px;">
            <div class="d-flex">
                <img src="/img/logobalikpapan.png" width="40" height="50" alt="">
                <div class="side-img-logo">
                    <h6>Balikpapan</h6>
                    <small>Pengaduan Masyarakat</small>
                </div>
                
                <div class="menu-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>  

            </div>
        </div>

        {{-- LIST ITEM NAVBAR PC --}}
        <div class="list-item-nav col-lg-4">
            <ul class="navigasi-item">
                <li><a href="/" class="{{ Request::is('dashboardRiwayatLaporan*') ? 'active' : '' }}">Home</a></li>

                {{-- UBAH HREF DILUAR HALAMAN HOME --}}
                @if(!Request::is('/'))
                <li><a href="/">About</a></li>
                @else
                <li><a href="#about">About</a></li>
                @endif

                {{-- UBAH HREF DILUAR HALAMAN HOME --}}
                @if (!Request::is('/'))
                <li><a href="/">Buat laporan</a></li>
                @else
                <li><a href="#buatlaporan">Buat laporan</a></li>
                @endif

                {{-- MENGUBAH HREF DAN VALUE KETIKA USER SUDAH LOGIN --}}
                @if (session()->has('userlogin') || session()->has('adminlogin'))
                <li><a href="/dashboardHome">Dashboard</a></li>
                @else
                <li><a href="/adminLogin">Admin</a></li>
                @endif

            </ul>
        </div>

        {{-- MERUBAH HREF DAN VALUE KETIKA SUDAH LOGIN --}}
        <div class="login-link col-lg-4">
            @if (session()->has('userlogin'))
            <a href="/logout">Logout</a>
            @elseif(session()->has('adminlogin'))
            <a href="/logoutAdmin">Logout Admin</a>
            @else
            <a href="/login">Login</a>
            @endif
        </div>


            {{-- SIDEBAR NAVIGATION FOR MOBLIE --}}
        <div class="side-bar">
            <ul class="side-bar-item">
                <li class="close-toggle" style="font-size: 20px"><i class="bi bi-x-square"></i></li>
                <hr style="margin: 1px">
                <li><a href="/">Home</a></li>
                {{-- SAMA AJA TAPI VERSI MOBILE --}}
                @if (!Request::is('/'))
                <li><a href="/">About</a></li>
                @else
                <li><a href="#about">About</a></li>
                @endif
                {{-- SAMA AJA TAPI VERSI MOBILE --}}
                @if (!Request::is('/'))
                <li><a href="/">Buat laporan</a></li>
                @else
                <li><a href="#buatlaporan">Buat laporan</a></li>
                @endif
                {{-- SAMA AJA TAPI VERSI MOBILE --}}
                @if (session()->has('userlogin') || session()->has('adminlogin'))
                <li><a href="/dashboardHome">Dashboard</a></li>
                @else
                <li><a href="/adminLogin">Admin</a></li>
                @endif
                {{-- SAMA AJA TAPI VERSI MOBILE --}}
                @if (session()->has('userlogin'))
                <li><a href="/logout">Logout</a></li>
                @elseif(session()->has('adminlogin'))
                <li><a href="/logoutAdmin">Logout Admin</a></li>
                @else
                <li><a href="/login">Login</a></li>
                @endif
            </ul>
        </div>

    </div>
</nav>



<script>
    const toggle = document.querySelector('.menu-toggle')
    const sidebar = document.querySelector('.side-bar')

    toggle.addEventListener('click',function(){
        sidebar.classList.toggle('slide')  
    })

    const closeSidebar = document.querySelector('.close-toggle')
    closeSidebar.addEventListener('click', function(){
        sidebar.classList.toggle('slide')
    })
</script>