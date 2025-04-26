@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <button onclick="modalAction('{{ url('/suplier/import') }}')" class="btn btn-info btn-sm mt-1">Import Suplier</button>
                    <a href="{{ url('/suplier/export_excel') }}" class="btn btn-primary"><i class="fa fa-file excel"></i> Export Suplier Excel</a>
                    <a href="{{ url('/suplier/export_pdf') }}" class="btn btn-danger"><i class="fa fa-file pdf"></i> Export Suplier PDF</a>
                <button onclick="modalAction('{{ url('suplier/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah Ajax</button>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <table class="table table-bordered table-striped table-hover table-sm" id="table_suplier">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Suplier</th>
                        <th>Kontak</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"
        data-keyboard="false" data-width="75%" aria-hidden="true"></div>
@endsection

@push('css')
@endpush

@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }

        var tableSuplier;
        $(document).ready(function() {
            tableSuplier = $('#table_suplier').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('suplier/list') }}",
                    "dataType": "json",
                    "type": "GET",
                    "data": function(d) {
                        d.filter_suplier = $('.filter_suplier').val();
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "nama_suplier",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "kontak",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "alamat",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "aksi",
                        className: "",
                        orderable: false,
                        searchable: false
                    }
                ]
            });
            $('#table_suplier_filter input').unbind().bind().on('keyup', function(e) {
                if (e.keyCode == 13) { // enter key
                    tableSuplier.search(this.value).draw();
                }
            });
            $('.filter_suplier').change(function() {
                tableSuplier.draw();
            });
        });
    </script>
@endpush
