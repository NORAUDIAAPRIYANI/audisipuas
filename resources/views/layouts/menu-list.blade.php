<li class="pc-item">
            <a href="{{ url('/') }}" class="pc-link">
                <span class="pc-micon">
                    <i class="ph-duotone ph-house"></i>
                </span>
                <span class="pc-mtext">Dashboard</span>
            </a>
        </li>
        <li class="pc-item">
            <a href="{{ url('tambah_anggota') }}" class="pc-link">
                <span class="pc-micon">
                    <i class="ph-duotone ph-user-plus"></i>
                </span>
                <span class="pc-mtext">Tambah Data Anggota</span>
            </a>
        </li>
        <li class="pc-item">
            <a href="{{ url('lihat_anggota') }}" class="pc-link">
                <span class="pc-micon">
                    <i class="ph-duotone ph-users"></i>
                </span>
                <span class="pc-mtext">Data Anggota</span>
            </a>
        </li>
        <li class="pc-item">
            <a href="{{ url('lihat_buku') }}" class="pc-link">
                <span class="pc-micon">
                    <i class="ph-duotone ph-book"></i>
                </span>
                <span class="pc-mtext">Data Buku</span>
            </a>
        </li>

        <li class="pc-item">
            <a href="{{ url('daftar_peminjaman') }}" class="pc-link">
                <span class="pc-micon">
                    <i class="ph-duotone ph-handshake"></i>
                </span>
                <span class="pc-mtext">Daftar Peminjaman Buku</span>
            </a>
        </li>

        <li class="pc-item">
        <a href="{{ url('/admin/buku-dipinjam') }}" class="pc-link">
                <span class="pc-micon">
                    <i class="ph-duotone ph-handshake"></i>
                </span>
                <span class="pc-mtext">Riwayat Peminjaman Buku</span>
            </a>
        </li>