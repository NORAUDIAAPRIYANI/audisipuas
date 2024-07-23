@extends('layouts.main')

@section('title', 'Data Buku')
@section('breadcrumb-item', 'DataTable')
@section('breadcrumb-item-active', 'Data Buku')

@section('css')
<!-- [Page specific CSS] start -->
<!-- data tables css -->
<link rel="stylesheet" href="{{ URL::asset('build/css/plugins/dataTables.bootstrap5.min.css') }}">
<!-- [Page specific CSS] end -->
<!-- Stylesheet -->
<style>
    .hidden {
        display: none;
    }
    .add-book-button {
        margin-bottom: 15px;
    }
</style>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@section('content')
<!-- [ Main Content ] start -->
<div class="row">
    <!-- Row Grouping table start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                
                <!-- Add Book Button -->
                <a href="{{ url('tambah_buku') }}" class="btn btn-primary add-book-button">Tambahkan Buku</a>

                <div class="table-responsive dt-responsive">
                    <table id="multi-table" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Kode Buku</th>
                                <th>Kategori</th>
                                <th>Penerbit</th>
                                <th>Judul Buku</th>
                                <th>Tahun Terbit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buku as $b)
                            <tr>
                                <td>{{ $b->kode_buku }}</td>
                                <td>{{ $b->kategori }}</td>
                                <td>{{ $b->nama_penerbit }}</td>
                                <td>{{ $b->judul_buku }}</td>
                                <td>{{ $b->tahun_terbit }}</td>
                                <td>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item m-0">
                                            <a href="{{ url('edit_buku', $b->id) }}" class="avtar avtar-s btn btn-primary">
                                                <i class="ti ti-pencil f-18"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item m-0">
                                            <form action="{{ route('buku_hapus', $b->id) }}" method="POST" onsubmit="return confirmation(event)">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
@endsection

@section('scripts')
<!-- [Page Specific JS] start -->
<!-- datatable Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ URL::asset('build/js/plugins/dataTables.min.js') }}"></script>
<script src="{{ URL::asset('build/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
<!-- datatable Js -->
<script>
    function confirmation(ev) {
        ev.preventDefault();
        var form = ev.target;
        swal({
            title:"Apakah Kamu Yakin Menghapus Data Ini?",
            text: "Kamu tidak bisa mengembalikan data ini",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    }
</script>

<script>
    $(document).ready(function() {
        // Inisialisasi DataTables
        var table = $('#multi-table').DataTable({
            "dom": '<"top"f>rt<"bottom"><"clear">',
            "language": {
                "search": "INPUT",
                "searchPlaceholder": "Cari Buku"
            },
            "paging": false, // Disable pagination
        });

        // Move the search input to span the full width
        $('#multi-table_filter').addClass('full-width');
    });
</script>

@include('sweetalert::alert')
<!-- [Page Specific JS] end -->
@endsection
