<aside class="sidebar navbar navbar-expand-lg bg-dark d-flex flex-column gap-4 align-content-lg-center mx-2 my-2 rounded">
    <h5 class="navbar-brand">PurGym</h5>
    <div class="collapse navbar-collapse flex-grow-0" id="navbarNavDropdown">
        <ul class="navbar-nav flex-column gap-3 px-2">
            <li class="navbar-item rounded {{Request::path() == 'admin/dashboard' ? "bg-info" : ""}}">
                <a href="dashboard" class="nav-link">
                    <div class="d-flex gap-3">
                        <span class="material-icons">dashboard</span>
                        <p class="m-0 p-0">Dashboard</p>
                    </div>
                </a>
            </li>
            <li class="navbar-item rounded {{Request::path() == 'admin/admin_management' ? "bg-info" : ""}}">
                <a href="admin_management" class="nav-link">
                    <div class="d-flex gap-3">
                        <span class="material-icons"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M400-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM80-160v-112q0-33 17-62t47-44q51-26 115-44t141-18h14q6 0 12 2-8 18-13.5 37.5T404-360h-4q-71 0-127.5 18T180-306q-9 5-14.5 14t-5.5 20v32h252q6 21 16 41.5t22 38.5H80Zm560 40-12-60q-12-5-22.5-10.5T584-204l-58 18-40-68 46-40q-2-14-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T628-460l12-60h80l12 60q12 5 22.5 11t21.5 15l58-20 40 70-46 40q2 12 2 25t-2 25l46 40-40 68-58-18q-11 8-21.5 13.5T732-180l-12 60h-80Zm40-120q33 0 56.5-23.5T760-320q0-33-23.5-56.5T680-400q-33 0-56.5 23.5T600-320q0 33 23.5 56.5T680-240ZM400-560q33 0 56.5-23.5T480-640q0-33-23.5-56.5T400-720q-33 0-56.5 23.5T320-640q0 33 23.5 56.5T400-560Zm0-80Zm12 400Z"/></svg></span>
                        <p class="m-0 p-0">Admin</p>
                    </div>
                </a>
            </li>
            <li class="navbar-item rounded {{Request::path() == 'admin/user_management' ? "bg-info" : ""}}">
                <a href="user_management" class="nav-link">
                    <div class="d-flex gap-3">
                        <span class="material-icons">people_alt</span>
                        <p class="m-0 p-0">Member</p>
                    </div>
                </a>
            </li>
            <li class="navbar-item rounded {{Request::path() == 'admin/payment_details' ? "bg-info" : ""}}">
                <a href="payment_details" class="nav-link">
                    <div class="d-flex gap-3">
                        <span class="material-icons"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M760-200v-120H200v120h560Zm0-200v-160H200v160h560Zm0-240v-120H200v120h560ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Z"/></svg></span>
                        <p class="m-0 p-0">Detail Pembayaran</p>
                    </div>
                </a>
            </li>
            <li class="navbar-item rounded {{Request::path() == '' ? "bg-info" : ""}}">
                <a href="/" class="nav-link">
                    <div class="d-flex gap-3">
                        <span class="material-icons">home</span>
                        <p class="m-0 p-0">Home</p>
                    </div>
                </a>
            </li>
            <li class="navbar-item">
                <a href="{{ route('logout') }}" class="nav-link">
                    <div class="d-flex gap-3">
                        <span class="material-icons">logout</span>
                        <p class="m-0 p-0">Logout</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</aside>