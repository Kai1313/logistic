@extends('admin.master')
@section('addon-css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $setting["alias"]->setting_value }} - Airwaybill</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('homes') }}">Home</a></li>
                    <li class="breadcrumb-item active">Airwaybill Management</li>
                    </ol>
                </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ $setting["alias"]->setting_value }} - Airwaybill</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <a href="{{ route('create-airwaybill') }}" class="btn btn-outline-success float-right"><i class="fa fa-plus-circle"></i> Add Airwaybill</a>
                                    </div>
                                </div>
                                <table id="airwaybill-table" class="table table-bordered table-striped" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Acceptance</th>
                                            <th>Origin</th>
                                            <th>Destination</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('addon-js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endsection
@section('script-js')
    <script>
        $(function () {
            $('#airwaybill-table').DataTable({
                "responsive": true,
                "autoWidth": true,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('airwaybill-data') }}",
                "columns": [
                    {data: 'awb_code', name: 'awb_code'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'description', name: 'description'},
                    {data: 'acceptance', name: 'acceptance', orderable: false, searchable: false},
                    {data: 'origin_name', name: 'origin_name'},
                    {data: 'destination_name', name: 'destination_name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            })

            $(document).on("click", ".btn-void, .btn-approve", function() {
                let ident = $(this).data('identifier')
                let ids = $(this).data('id')
                console.log(ident)
                switch (ident) {
                    case 'btn-approve':
                        approveAirwaybill(ids)
                        break;
                    default:
                        voidAirwaybill(ids)
                        break;
                }
            })
        });

        function approveAirwaybill(ids) {
            $.ajax({
                url: "{{ route('airwaybill-approve') }}",
                type: "POST",
                data: {_token: '{{ csrf_token() }}', ids: ids},
                success: function (data) {
                    if (data.result) {
                        $('#airwaybill-table').DataTable().ajax.reload()
                        Swal.fire({
                            title: 'Success!',
                            text: data.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        })
                    }
                    else {
                        Swal.fire({
                            title: 'Failed!',
                            text: data.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        })
                    }
                },
                error: function() {
                    Swal.fire(
                        'Oooopsss!',
                        'Something goes wrong!',
                        'error'
                    )
                }
            })
        }

        function voidAirwaybill(ids) {
            $.ajax({
                url: "{{ route('airwaybill-void') }}",
                type: "POST",
                data: {_token: '{{ csrf_token() }}', ids: ids},
                success: function (data) {
                    if (data.result) {
                        $('#airwaybill-table').DataTable().ajax.reload()
                        Swal.fire({
                            title: 'Success!',
                            text: data.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        })
                    }
                    else {
                        Swal.fire({
                            title: 'Failed!',
                            text: data.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        })
                    }
                },
                error: function() {
                    Swal.fire(
                        'Oooopsss!',
                        'Something goes wrong!',
                        'error'
                    )
                }
            })
        }
    </script>
@endsection