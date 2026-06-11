<div class="d-flex align-items-center gap-3">
    @foreach ($vehicle_types as $vt)
        @php
            $isActive = $selectedVehicle == $vt->id;
            $bgColor = $isActive ? '#6c757d' : '#ffffff';
            $textColor = $isActive ? '#ffffff' : '#1e2a45';
            $border = $isActive ? 'none' : '1px solid #e5e7eb';
        @endphp
        <button class="btn mb-0"
            style="background-color: {{ $bgColor }}; color: {{ $textColor }}; font-weight: 700; font-size: 0.78rem; padding: 8px 16px; border-radius: 8px; border: {{ $border }}; letter-spacing: 0.5px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); transition: all 0.2s;"
            onmouseover="this.style.backgroundColor='{{ $isActive ? '#5a6268' : '#f3f4f6' }}'; this.style.transform='translateY(-1px)';"
            onmouseout="this.style.backgroundColor='{{ $bgColor }}'; this.style.transform='translateY(0)';"
            onclick="window.location.href='?vehicle_id={{ $vt->id }}'">
            <i
                class="fa-solid @if (Str::contains(strtolower($vt->jenis), 'motor')) fa-motorcycle @elseif(Str::contains(strtolower($vt->jenis), 'car')) fa-car @else fa-truck @endif me-1"></i>
            {{ strtoupper($vt->jenis) }}
        </button>
    @endforeach

    <button type="button" class="btn mb-0"
        style="background-color: #cb0c9f; color: #ffffff; font-weight: 700; font-size: 0.78rem; padding: 8px 18px; border-radius: 8px; border: none; letter-spacing: 0.5px; box-shadow: 0 4px 14px rgba(203, 12, 159, 0.4); transition: all 0.2s;"
        onmouseover="this.style.backgroundColor='#b30a8c'; this.style.boxShadow='0 6px 18px rgba(203, 12, 159, 0.55)'; this.style.transform='translateY(-1px)';"
        onmouseout="this.style.backgroundColor='#cb0c9f'; this.style.boxShadow='0 4px 14px rgba(203, 12, 159, 0.4)'; this.style.transform='translateY(0)';"
        onclick="submitEnterForm()">
        <i class="fa-solid fa-plus me-1"></i> ENTER VEHICLE
    </button>

    {{-- <a href="#"
        class="nav-link text-body font-weight-bold px-0 text-nowrap d-flex align-items-center mb-0"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        style="font-size: 0.82rem;">
        <i class="fa-solid fa-sign-out-alt me-2"></i>
        <span class="d-sm-inline d-none">Sign Out</span>
    </a> --}}
</div>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-8">
            <div class="row">


                <div class="col-md-12 mb-lg-0 mb-4">
                    <div style="display: flex; gap: 16px; align-items: stretch; margin-bottom: 20px;">
                        <div style="flex: 0 0 200px;">
                            <div
                                style="position: relative; border-radius: 16px; color: #fff; padding: 24px 20px; text-align: center; height: 100%; box-shadow: 0 8px 24px rgba(30, 60, 114, 0.35); display: flex; flex-direction: column; align-items: center; justify-content: center; background: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35)), url('{{ asset('assets/img/curved-images/curved6.jpg') }}'); background-size: cover; background-position: center; overflow: hidden;">
                                <img src="{{ asset('assets/img/parkir.png') }}" alt="Logo Parkir"
                                    style="max-height: 45px; margin-bottom: 10px; position: relative; z-index: 1;" />
                                <div id="dayName"
                                    style="font-size: 1.15rem; font-weight: 600; margin-bottom: 2px; position: relative; z-index: 1;">
                                    Loading...</div>
                                <div id="dateFull"
                                    style="font-size: 0.78rem; opacity: 0.9; position: relative; z-index: 1;">Loading...
                                </div>
                                <div id="clock"
                                    style="font-size: 2.1rem; font-weight: 800; margin-top: 14px; letter-spacing: 2px; position: relative; z-index: 1;">
                                    00:00:00</div>
                            </div>
                        </div>

                        <div style="flex: 1; overflow: hidden;">
                            <div style="display: flex; gap: 14px; overflow-x: auto; padding-bottom: 4px;"
                                class="h-100 align-items-stretch">
                                @foreach ($locations as $loc)
                                    @php
                                        $sisaMotor = $loc->getSisaSlot(1);
                                        $sisaCar = $loc->getSisaSlot(2);
                                        $sisaOther = $loc->getSisaSlot(3);
                                    @endphp
                                    <div id="card-loc-{{ $loc->id }}" class="location-card"
                                        onclick="selectBuildingCard({{ $loc->id }}, this)"
                                        style="border: 2px solid #cb0c9f; border-radius: 16px; padding: 16px 14px; text-align: center; min-width: 148px; background: #fff; box-shadow: 0 4px 16px rgba(192, 38, 211, 0.1); transition: all 0.2s; flex-shrink: 0; cursor: pointer;">

                                        <div id="circle-loc-{{ $loc->id }}" class="location-circle"
                                            style="width: 50px; height: 50px; border-radius: 50%; background-color: #cb0c9f; display: flex; align-items: center; justify-content: center; margin: 0 auto 10px; box-shadow: 0 4px 12px rgba(192, 38, 211, 0.35); transition: all 0.2s;">
                                            <i class="fa-solid fa-building" style="color: #fff; font-size: 1.2rem;"></i>
                                        </div>

                                        <div
                                            style="font-size: 0.9rem; font-weight: 700; color: #1e2a45; margin-bottom: 10px;">
                                            {{ $loc->location_name }}</div>

                                        <div class="border-bottom pb-1 mb-1 text-muted"
                                            style="display: flex; justify-content: space-around; font-size: 0.68rem; opacity:0.7; font-weight: 600;">
                                            <span><i class="fa-solid fa-motorcycle"></i>
                                                {{ $loc->max_motorcyle }}</span>
                                            <span><i class="fa-solid fa-car"></i> {{ $loc->max_car }}</span>
                                            <span><i class="fa-solid fa-truck"></i> {{ $loc->max_other }}</span>
                                        </div>
                                        <div
                                            style="display: flex; justify-content: space-around; font-size: 0.8rem; font-weight: 600;">
                                            <span style="color: {{ $sisaMotor <= 0 ? '#dc2626' : '#2dce89' }};"><i
                                                    class="fa-solid fa-motorcycle"></i> {{ $sisaMotor }}</span>
                                            <span style="color: {{ $sisaCar <= 0 ? '#dc2626' : '#2dce89' }};"><i
                                                    class="fa-solid fa-car"></i> {{ $sisaCar }}</span>
                                            <span style="color: {{ $sisaOther <= 0 ? '#dc2626' : '#2dce89' }};"><i
                                                    class="fa-solid fa-truck"></i> {{ $sisaOther }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div
                        style="background: #ffffff; border-radius: 16px; padding: 45px 28px; box-shadow: 0 4px 20px rgba(0,0,0,0.07); border: none; width: 100%;">
                        <form action="/transactions/exit" method="POST">
                            @csrf
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 style="font-size: 1.15rem; font-weight: 800; color: #cb0c9f;">Transaction <span
                                        class="text-dark font-weight-normal">Input Form</span></h5>
                                <button type="submit"
                                    style="background-color: #1e2a45; color: #fff; font-weight: 700; font-size: 0.82rem; padding: 10px 20px; border-radius: 10px; border: none; display: flex; align-items: center; gap: 8px;"
                                    class="btn" onmouseover="this.style.backgroundColor='#0f1620';"
                                    onmouseout="this.style.backgroundColor='#1e2a45';"><i
                                        class="fa-solid fa-arrow-right-from-bracket"></i> EXIT VEHICLE</button>
                            </div>
                            <div class="row m 10 ">
                                <div class="col-md-6 mb-3 ">
                                    <div
                                        style="border: 1.5px solid #e5e7eb; border-radius: 12px; padding: 10px 18px; background: #ffffff;">
                                        <label class="form-label text-uppercase text-muted font-weight-bolder d-block"
                                            style="font-size: 0.68rem; letter-spacing: 0.5px; margin-bottom: 2px;">Ticket
                                            Number</label>
                                        <input type="text" class="form-control text-uppercase" name="no_tiket"
                                            id="exit-ticket-no" placeholder="Ticket Number"
                                            style="background: transparent; border: none; font-size: 1.25rem; font-weight: 700; color: #1e2a45; padding: 0; height: auto; letter-spacing: 0.5px; box-shadow: none; width: 100%; margin-top: 4px;"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div
                                        style="border: 1.5px solid #e5e7eb; border-radius: 12px; padding: 10px 18px; background: #ffffff;">
                                        <label class="form-label text-uppercase text-muted font-weight-bolder d-block"
                                            style="font-size: 0.68rem; letter-spacing: 0.5px; margin-bottom: 2px;">Police
                                            Number</label>
                                        <input type="text" class="form-control text-uppercase" name="no_polisi"
                                            id="exit-police-no" placeholder="Police Number"
                                            style="background: transparent; border: none; font-size: 1.25rem; font-weight: 700; color: #1e2a45; padding: 0; height: auto; letter-spacing: 0.5px; box-shadow: none; width: 100%; margin-top: 4px;"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div
                style="background: #ffffff; border-radius: 16px; padding: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.07); display: flex; flex-direction: column; height: 100%; max-height: 495px; overflow: hidden;">
                <div
                    style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 12px; border-bottom: 1.5px solid #f3f4f6; margin-bottom: 16px; flex-shrink: 0;">
                    <span style="font-size: 1.1rem; font-weight: 700; color: #1e2a45;">Tickets</span>
                    <button type="button"
                        style="font-size: 0.75rem; font-weight: 700; color: #cb0c9f; border: 1.5px solid #cb0c9f; border-radius: 8px; padding: 4px 14px; background: transparent;"
                        class="btn" onmouseover="this.style.backgroundColor='rgba(192, 38, 211, 0.1)';"
                        onmouseout="this.style.backgroundColor='transparent';" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">VIEW ALL</button>
                </div>

                <div
                    style="flex-grow: 1; overflow-y: auto; padding-right: 4px; display: flex; flex-direction: column;">
                    @forelse($tickets as $t)
                        <div class="d-flex align-items-center p-2 mb-2 bg-white border border-light shadow-sm"
                            style="border-radius: 12px; border-left: 4px solid {{ $t->keluar ? '#94a3b8' : '#cb0c9f' }} !important; cursor: pointer; transition: 0.2s;"
                            @if (!$t->keluar) onclick="populateExitFields('{{ $t->no_tiket }}')" @endif
                            onmouseover="this.style.backgroundColor='#f8f9fe';"
                            onmouseout="this.style.backgroundColor='#ffffff';">

                            <div class="flex-grow-1" style="min-width: 0; padding-right: 8px;">
                                <span class="text-muted d-block"
                                    style="font-size: 0.68rem; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{ date('Y-m-d H:i:s', strtotime($t->masuk)) }}
                                </span>
                                <span
                                    style="font-weight: 800; color: #1e2a45; font-size: 0.76rem; block-size: auto; word-wrap: break-word;">
                                    #{{ $t->no_tiket }}
                                </span>
                            </div>

                            <div class="d-flex align-items-center gap-2 flex-shrink-0">
                                @if ($t->keluar)
                                    <div class="text-end">
                                        <span
                                            style="font-size: 0.78rem; font-weight: 800; color: #4a5568; white-space: nowrap;">
                                            Rp {{ number_format($t->total_bayar, 0, ',', '.') }}
                                        </span>
                                    </div>
                                @else
                                    <div class="d-flex align-items-center gap-2">
                                        <span
                                            style="font-size: 0.65rem; font-weight: 700; background: #e0f2fe; color: #0369a1; border-radius: 4px; padding: 2px 6px; white-space: nowrap;">
                                            ACTIVE
                                        </span>
                                        @if ($t->no_polisi && $t->no_polisi != '-')
                                            <span
                                                style="font-size: 0.7rem; font-weight: 700; background: #f0f1f3; color: #4a5568; border-radius: 4px; padding: 2px 6px; max-width: 75px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"
                                                class="text-uppercase">
                                                {{ $t->no_polisi }}
                                            </span>
                                        @endif
                                    </div>
                                @endif

                                <div class="d-flex align-items-center gap-2">
                                    <button type="button" class="btn btn-link p-0 mb-0 btn-show-detail"
                                        style="color: #17c1e8; font-size: 1.05rem; border: none; background: transparent;"
                                        data-no-tiket="{{ $t->no_tiket }}" data-no-polisi="{{ $t->no_polisi }}"
                                        data-lokasi="{{ $t->lokasi->location_name ?? '-' }}"
                                        data-jenis="{{ $t->jenisKendaraan->jenis ?? '-' }}"
                                        data-masuk="{{ $t->masuk }}"
                                        data-keluar="{{ $t->keluar ?? 'Masih Parkir' }}"
                                        data-total-jam="{{ $t->total_jam ?? 0 }}"
                                        data-total-bayar="{{ $t->total_bayar ?? 0 }}"
                                        data-tarif-pertama="Rp {{ number_format($t->jenisKendaraan->tarif_pertama ?? 0, 0, ',', '.') }}"
                                        data-tarif-berikutnya="Rp {{ number_format($t->jenisKendaraan->tarif_berikutnya ?? 0, 0, ',', '.') }}"
                                        data-tarif-maksimal="Rp {{ number_format($t->jenisKendaraan->tarif_maksimal ?? 0, 0, ',', '.') }}"
                                        data-pdf-url="/transactions/ticket/{{ $t->id }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <a href="/transactions/ticket/{{ $t->id }}" target="_blank"
                                        style="color: #ef4444; font-size: 1.05rem; transition: 0.2s;"
                                        onmouseover="this.style.transform='scale(1.1)';"
                                        onmouseout="this.style.transform='scale(1)';">
                                        <i class="fa-solid fa-file-pdf"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-muted m-auto py-4">
                            <i class="fa-solid fa-ticket fa-2x mb-2 d-block" style="color:#e0d0e8;"></i>
                            <small style="font-size: 0.75rem;">No tickets available</small>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>


</div>
<!-- View All Modal -->
<div class="modal fade" id="staticBackdrop" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content"
            style="border-radius: 16px; overflow: hidden; border: none; box-shadow: 0 20px 60px rgba(0,0,0,0.15);">
            <div class="modal-header"
                style="background: linear-gradient(135deg, #1e2a45, #cb0c9f); border: none; padding: 18px 24px;">
                <h5 class="modal-title text-white font-weight-bolder mb-0">
                    <i class="fa-solid fa-list-check me-2"></i> All Transactions Log
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0" style="min-width: 900px;">
                        <thead style="background: #f8f9fe;">
                            <tr>
                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center ps-3"
                                    style="padding: 12px 8px;">No</th>
                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center"
                                    style="padding: 12px 8px;">Aksi</th>
                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7"
                                    style="padding: 12px 8px;">No. Tiket</th>
                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7"
                                    style="padding: 12px 8px;">No. Polisi</th>
                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7"
                                    style="padding: 12px 8px;">Lokasi</th>
                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7"
                                    style="padding: 12px 8px;">Jenis</th>
                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center"
                                    style="padding: 12px 8px;">Waktu Masuk</th>
                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center"
                                    style="padding: 12px 8px;">Waktu Keluar</th>
                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center"
                                    style="padding: 12px 8px;">Durasi</th>
                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center"
                                    style="padding: 12px 8px;">Total Bayar</th>
                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center"
                                    style="padding: 12px 8px;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $key => $t)
                                <tr style="border-bottom: 1px solid #f3f4f6; transition: background 0.15s;"
                                    onmouseover="this.style.backgroundColor='#f8f9fe';"
                                    onmouseout="this.style.backgroundColor='transparent';">
                                    <td class="text-center text-sm font-weight-bold" style="padding: 10px 8px;">
                                        {{ $key + 1 }}</td>
                                    <td class="text-center" style="padding: 10px 8px;">
                                        <div class="d-flex justify-content-center align-items-center gap-2">
                                            <button type="button" class="btn-icon-detail btn-show-detail"
                                                title="Lihat Detail"
                                                style="width:30px;height:30px;border-radius:8px;border:none;background:#e0f7fc;color:#17c1e8;font-size:0.9rem;cursor:pointer;display:flex;align-items:center;justify-content:center;"
                                                data-no-tiket="{{ $t->no_tiket }}"
                                                data-no-polisi="{{ $t->no_polisi }}"
                                                data-lokasi="{{ $t->lokasi->location_name ?? '-' }}"
                                                data-jenis="{{ $t->jenisKendaraan->jenis ?? '-' }}"
                                                data-masuk="{{ $t->masuk }}"
                                                data-keluar="{{ $t->keluar ?? '' }}"
                                                data-total-jam="{{ $t->total_jam ?? 0 }}"
                                                data-total-bayar="{{ $t->total_bayar ?? 0 }}"
                                                data-tarif-pertama="Rp {{ number_format($t->jenisKendaraan->tarif_pertama ?? 0, 0, ',', '.') }}"
                                                data-tarif-berikutnya="Rp {{ number_format($t->jenisKendaraan->tarif_berikutnya ?? 0, 0, ',', '.') }}"
                                                data-tarif-maksimal="Rp {{ number_format($t->jenisKendaraan->tarif_maksimal ?? 0, 0, ',', '.') }}"
                                                data-pdf-url="/transactions/ticket/{{ $t->id }}">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                            <a href="/transactions/ticket/{{ $t->id }}" target="_blank"
                                                title="Cetak PDF"
                                                style="width:30px;height:30px;border-radius:8px;background:#fff0f0;color:#ef4444;font-size:0.9rem;display:flex;align-items:center;justify-content:center;text-decoration:none;transition:0.2s;"
                                                onmouseover="this.style.transform='scale(1.1)';"
                                                onmouseout="this.style.transform='scale(1)';">
                                                <i class="fa-solid fa-file-pdf"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td style="padding: 10px 8px;">
                                        <span class="text-sm font-weight-bold"
                                            style="color: #1e2a45;">#{{ $t->no_tiket }}</span>
                                    </td>
                                    <td style="padding: 10px 8px;">
                                        <span
                                            class="text-sm text-uppercase font-weight-bold">{{ $t->no_polisi }}</span>
                                    </td>
                                    <td style="padding: 10px 8px;">
                                        <span class="text-sm">{{ $t->lokasi->location_name ?? '-' }}</span>
                                    </td>
                                    <td style="padding: 10px 8px;">
                                        <span
                                            class="text-sm text-uppercase">{{ $t->jenisKendaraan->jenis ?? '-' }}</span>
                                    </td>
                                    <td class="text-center text-secondary text-xs"
                                        style="padding: 10px 8px; white-space: nowrap;">{{ $t->masuk }}</td>
                                    <td class="text-center text-secondary text-xs"
                                        style="padding: 10px 8px; white-space: nowrap;">{{ $t->keluar ?? '-' }}</td>
                                    <td class="text-center text-xs font-weight-bold"
                                        style="padding: 10px 8px; color: #6366f1;">{{ $t->total_jam ?? 0 }} Jam</td>
                                    <td class="text-center text-xs font-weight-bold"
                                        style="padding: 10px 8px; color: #2dce89;">
                                        Rp {{ number_format($t->total_bayar ?? 0, 0, ',', '.') }}
                                    </td>
                                    <td class="text-center" style="padding: 10px 8px;">
                                        @if ($t->keluar)
                                            <span
                                                style="font-size:0.68rem;font-weight:700;background:#e2fce8;color:#1a7a3e;border-radius:6px;padding:3px 8px;">SELESAI</span>
                                        @else
                                            <span
                                                style="font-size:0.68rem;font-weight:700;background:#e0f2fe;color:#0369a1;border-radius:6px;padding:3px 8px;">AKTIF</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #f3f4f6; padding: 12px 24px;">
                <span class="text-muted text-xs">Total: <strong>{{ count($tickets) }}</strong> transaksi</span>
                <button type="button" class="btn btn-sm mb-0" data-bs-dismiss="modal"
                    style="background:#1e2a45;color:#fff;border-radius:8px;font-size:0.8rem;font-weight:600;padding:6px 18px;">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Detail Transaction Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 480px;">
        <div class="modal-content"
            style="border-radius: 18px; overflow: hidden; border: none; box-shadow: 0 20px 60px rgba(0,0,0,0.15);">
            <div class="modal-header"
                style="background: linear-gradient(135deg, #1e2a45, #cb0c9f); border: none; padding: 18px 24px;">
                <h6 class="modal-title text-white font-weight-bolder mb-0">
                    <i class="fa-solid fa-ticket me-2"></i> Detail Transaksi
                </h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div style="padding: 24px;">
                    <!-- Ticket Number Badge -->
                    <div class="text-center mb-4">
                        <span id="detail-no-tiket-badge"
                            style="font-size:1.1rem;font-weight:800;color:#cb0c9f;background:#fdf0fb;border-radius:10px;padding:8px 20px;letter-spacing:1px;display:inline-block;"></span>
                    </div>
                    <!-- Info Grid -->
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
                        <div style="background:#f8f9fe;border-radius:12px;padding:12px 14px;">
                            <div
                                style="font-size:0.65rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:4px;">
                                No. Polisi</div>
                            <div id="detail-no-polisi"
                                style="font-size:0.95rem;font-weight:800;color:#1e2a45;text-transform:uppercase;">
                            </div>
                        </div>
                        <div style="background:#f8f9fe;border-radius:12px;padding:12px 14px;">
                            <div
                                style="font-size:0.65rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:4px;">
                                Jenis Kendaraan</div>
                            <div id="detail-jenis"
                                style="font-size:0.95rem;font-weight:800;color:#1e2a45;text-transform:uppercase;">
                            </div>
                        </div>
                        <div style="background:#f8f9fe;border-radius:12px;padding:12px 14px;">
                            <div
                                style="font-size:0.65rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:4px;">
                                Lokasi</div>
                            <div id="detail-lokasi" style="font-size:0.85rem;font-weight:700;color:#1e2a45;"></div>
                        </div>
                        <div style="background:#f8f9fe;border-radius:12px;padding:12px 14px;">
                            <div
                                style="font-size:0.65rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:4px;">
                                Durasi</div>
                            <div id="detail-total-jam" style="font-size:0.95rem;font-weight:800;color:#6366f1;"></div>
                        </div>
                        <div style="background:#f8f9fe;border-radius:12px;padding:12px 14px;">
                            <div
                                style="font-size:0.65rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:4px;">
                                Waktu Masuk</div>
                            <div id="detail-masuk" style="font-size:0.8rem;font-weight:700;color:#1e2a45;"></div>
                        </div>
                        <div style="background:#f8f9fe;border-radius:12px;padding:12px 14px;">
                            <div
                                style="font-size:0.65rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:4px;">
                                Waktu Keluar</div>
                            <div id="detail-keluar" style="font-size:0.8rem;font-weight:700;color:#1e2a45;"></div>
                        </div>
                        
                    <!-- Total -->
                    <div
                        style="margin-top:18px;background:linear-gradient(135deg,#1e2a45,#cb0c9f);border-radius:12px;padding:16px 20px;text-align:center;">
                        <div
                            style="font-size:0.7rem;font-weight:700;color:rgba(255,255,255,0.75);text-transform:uppercase;letter-spacing:0.5px;margin-bottom:4px;">
                            Total Bayar</div>
                        <div id="detail-total-bayar" style="font-size:1.6rem;font-weight:800;color:#fff;"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border-top:1px solid #f3f4f6;padding:12px 24px;gap:8px;">
                <a id="detail-pdf-link" href="#" target="_blank" class="btn btn-sm mb-0"
                    style="background:#ef4444;color:#fff;border-radius:8px;font-size:0.8rem;font-weight:600;padding:6px 16px;">
                    <i class="fa-solid fa-print me-1"></i> Cetak Tiket
                </a>
                <button type="button" class="btn btn-sm mb-0" data-bs-dismiss="modal"
                    style="background:#f3f4f6;color:#4a5568;border-radius:8px;font-size:0.8rem;font-weight:600;padding:6px 18px;">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>



<!-- Hidden form for entering vehicle -->
<form id="hidden-enter-form" action="{{ route('transaction.storeEnter') }}" method="POST" style="display: none;">
    @csrf
    <input type="hidden" id="hidden-id-lokasi" name="id_lokasi">
    <input type="hidden" name="id_jenis" value="{{ $selectedVehicle }}">
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function selectBuildingCard(locId, element) {
        document.querySelectorAll('.location-card').forEach(card => {
            card.style.border = '2px solid #cb0c9f';
            card.style.boxShadow = '0 4px 16px rgba(192, 38, 211, 0.1)';
        });

        document.querySelectorAll('.location-circle').forEach(circle => {
            circle.style.backgroundColor = '#cb0c9f';
            circle.style.boxShadow = '0 4px 12px rgba(192, 38, 211, 0.35)';
        });


        element.style.border = '3px solid #1e2a45';
        element.style.boxShadow = '0 6px 20px rgba(30, 42, 69, 0.35)';

        const activeCircle = document.getElementById('circle-loc-' + locId);
        if (activeCircle) {
            activeCircle.style.backgroundColor = '#1e2a45';
            activeCircle.style.boxShadow = '0 4px 12px rgba(30, 42, 69, 0.2)';
        }

        document.getElementById('hidden-id-lokasi').value = locId;
    }

    function submitEnterForm() {
        const locId = document.getElementById('hidden-id-lokasi').value;
        if (!locId) {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Silakan pilih/klik salah satu kartu gedung terlebih dahulu!',
                icon: 'warning',
                confirmButtonColor: '#cb0c9f'
            });
            return;
        }
        document.getElementById('hidden-enter-form').submit();
    }

    function populateExitFields(ticketNo) {
        document.getElementById('exit-ticket-no').value = ticketNo;
        document.getElementById('exit-police-no').value = '';
        document.getElementById('exit-police-no').focus();
    }

    function updateCibinongTime() {
        const now = new Date();
        const timeOptions = {
            timeZone: 'Asia/Jakarta',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false
        };
        document.getElementById('clock').textContent = new Intl.DateTimeFormat('en-US', timeOptions).format(now)
            .replace(/\./g, ':');
        document.getElementById('dayName').textContent = new Intl.DateTimeFormat('en-US', {
            timeZone: 'Asia/Jakarta',
            weekday: 'long'
        }).format(now);
        document.getElementById('dateFull').textContent = new Intl.DateTimeFormat('en-US', {
            timeZone: 'Asia/Jakarta',
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        }).format(now);
    }
    setInterval(updateCibinongTime, 1000);
    updateCibinongTime();

    // Detail modal listener
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.btn-show-detail');
        if (!btn) return;

        const d = btn.dataset;
        document.getElementById('detail-no-tiket-badge').textContent = '#' + d.noTiket;
        document.getElementById('detail-no-polisi').textContent = d.noPolisi || '-';
        document.getElementById('detail-jenis').textContent = d.jenis || '-';
        document.getElementById('detail-lokasi').textContent = d.lokasi || '-';
        document.getElementById('detail-masuk').textContent = d.masuk || '-';
        document.getElementById('detail-keluar').textContent = d.keluar || 'Masih Parkir';
        document.getElementById('detail-total-jam').textContent = (d.totalJam || 0) + ' Jam';

        // 🌟 Pemanggilan data yang sudah disesuaikan dengan HTML
        document.getElementById('detail-jam-pertama').textContent = d.tarifPertama || '-';
        document.getElementById('detail-jam-berikutnya').textContent = d.tarifBerikutnya || '-';
        document.getElementById('detail-max-perhari').textContent = d.tarifMaksimal || '-';

        // Format currency (Hanya format nilai jika belum memiliki format Rp)
        const raw = parseFloat(d.totalBayar) || 0;
        document.getElementById('detail-total-bayar').textContent =
            'Rp ' + raw.toLocaleString('id-ID', {
                minimumFractionDigits: 0
            });

        // Status badge
        const isActive = !d.keluar || d.keluar === '' || d.keluar === 'Masih Parkir';
        document.getElementById('detail-total-bayar').style.color = isActive ? 'rgba(255,255,255,0.6)' : '#fff';

        // PDF link
        if (d.pdfUrl) {
            document.getElementById('detail-pdf-link').href = d.pdfUrl;
            document.getElementById('detail-pdf-link').style.display = '';
        } else {
            document.getElementById('detail-pdf-link').style.display = 'none';
        }

        // Open modal
        const detailModal = new bootstrap.Modal(document.getElementById('detailModal'));
        detailModal.show();
    });

    @if (session('masuk_success'))
        Swal.fire({
            title: 'Kendaraan Masuk!',
            text: 'Tiket berhasil dibuat. Silakan cetak tiket.',
            icon: 'success',
            showCancelButton: true,
            confirmButtonText: '<i class="fa-solid fa-print"></i> Cetak Tiket',
            cancelButtonText: 'Tutup',
            confirmButtonColor: '#cb0c9f'
        }).then((result) => {
            if (result.isConfirmed) {
                window.open('/transactions/ticket/' + "{{ session('masuk_success') }}", '_blank');
            }
        });
    @endif

    @if (session('keluar_success'))
        @php
            $tx = session('keluar_success');
        @endphp
        Swal.fire({
            title: 'Kendaraan Keluar!',
            html: `
                <div class="text-start" style="font-size: 0.95rem; line-height: 1.6; padding: 10px;">
                    <p class="mb-1"><strong>No Tiket:</strong> {{ $tx->no_tiket }}</p>
                    <p class="mb-1"><strong>No Polisi:</strong> {{ $tx->no_polisi }}</p>
                    <p class="mb-1"><strong>Waktu Masuk:</strong> {{ $tx->masuk }}</p>
                    <p class="mb-1"><strong>Waktu Keluar:</strong> {{ $tx->keluar }}</p>
                    <p class="mb-1"><strong>Durasi:</strong> {{ $tx->total_jam }} Jam</p>
                    <hr class="my-2">
                    <h5 class="text-center mt-3 text-success font-weight-bolder" style="font-size: 1.25rem;">Total Bayar: Rp {{ number_format($tx->total_bayar, 0, ',', '.') }}</h5>
                </div>
            `,
            icon: 'success',
            confirmButtonColor: '#cb0c9f'
        });
    @endif
</script>
