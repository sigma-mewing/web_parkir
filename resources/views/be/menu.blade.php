<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('location.index') }}" target="_blank">
            <img src="{{ asset('assets/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Soft UI locations</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link @if ($title == 'locations') active @endif"
                    href="{{ route('location.index') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="icon-dinamis">
                            <path8.69 8.69a.75.75 
                                d="M11.47 3.841a.75.75 0 0 1 1.06 0l0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                            <path
                                d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                        </svg>

                    </div>
                    <span class="nav-link-text ms-1">locations</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if ($title == 'transactions') active @endif"
                    href="{{ route('transaction.index') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="icon-dinamis">
                            <path8.69 8.69a.75.75 
                                d="M11.47 3.841a.75.75 0 0 1 1.06 0l0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                            <path
                                d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                        </svg>

                    </div>
                    <span class="nav-link-text ms-1">Transactions</span>
                </a>
            </li>
            {{-- <style>
                .icon-dinamis {
                    color: #344767;
                    /* Warna gelap default template */
                    transition: all 0.3s ease;
                    /* Biar transisinya halus */
                }

                /* 2. Warna kotak saat menu di-klik (class active) atau di-hover */
                .nav-link.active .icon-shape,
                .icon-shape:hover {
                    background-color: #cb0c9f !important;
                    /* Warna pink/magenta mirip di gambar */
                    box-shadow: 0 4px 6px rgba(203, 12, 159, 0.2);
                    /* Bayangan tipis biar elegan */
                }

                /* 3. Warna icon berubah jadi putih saat aktif/hover */
                .nav-link.active .icon-shape .icon-dinamis,
                .icon-shape:hover .icon-dinamis {
                    color: #ffffff !important;
                }
            </style> --}}
            <li class="nav-item">
                <a class="nav-link  @if ($title == 'vehicle') active @endif " href="{{ route('vehicle.index') }}">

                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="icon-dinamis">
                            <path
                                d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                        </svg>



                    </div>
                    <span class="nav-link-text ms-1">vehicle Type</span>
                </a>
            </li>
            

        </ul>
    </div>

</aside>
