<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/lte/dist/css/adminlte.min.css') }}">
</head>
    <body>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">DataTable with default features</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>No Resi</th>
                                            <th>Agen</th>
                                            <th>Status</th>
                                            <th>Pricelist</th>
                                            <th>Pembayaran</th>
                                            <th>COD</th>
                                            <th>Berat</th>
                                            <th>Volume</th>
                                            <th>Biaya Kirim</th>
                                            <th>Biaya Packing</th>
                                            <th>Biaya Tambahan</th>
                                            <th>Biaya Asuransi</th>
                                            <th>Diskon</th>
                                            <th>Biaya Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $dt)
                                            <tr>
                                                <td>{{ date('d-m-Y', strtotime($dt->created_at)); }}</td>
                                                <td>{{ $dt->awb_code; }}</td>
                                                <td>{{ $dt->agent_name; }}</td>
                                                <td>{{ ($dt->awb_status == 0)?'VOID':'ACTIVE'; }}</td>
                                                <td>{{ $dt->pricelist_code; }}</td>
                                                <td>{{ ($dt->payment_method == 0)?'CASH':'CREDIT'; }}</td>
                                                <td>{{ ($dt->acceptance_method == 0)?'TIDAK':'COD'; }}</td>
                                                <td>{{ $dt->awb_weight; }}</td>
                                                <td>{{ $dt->awb_volume; }}</td>
                                                <td>{{ $dt->awb_cost; }}</td>
                                                <td>{{ $dt->awb_packaging_cost; }}</td>
                                                <td>{{ $dt->awb_additional_cost; }}</td>
                                                <td>{{ $dt->awb_insurance_cost; }}</td>
                                                <td>{{ $dt->awb_discount; }}</td>
                                                <td>{{ $dt->awb_total_cost; }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>No Resi</th>
                                            <th>Agen</th>
                                            <th>Status</th>
                                            <th>Pricelist</th>
                                            <th>Pembayaran</th>
                                            <th>COD</th>
                                            <th>Berat</th>
                                            <th>Volume</th>
                                            <th>Biaya Kirim</th>
                                            <th>Biaya Packing</th>
                                            <th>Biaya Tambahan</th>
                                            <th>Biaya Asuransi</th>
                                            <th>Diskon</th>
                                            <th>Biaya Total</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- jQuery -->
        <script src="{{ asset('assets/lte/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
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
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/lte/dist/js/adminlte.min.js') }}"></script>
        <script>
            $(function () {
                $("#example1").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                var tables = $('#deposit-table').DataTable({
                    "responsive": true,
                    "autoWidth": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('deposit-data') }}",
                    "columns": [
                        {data: 'deposit_code', name: 'deposit_code'},
                        {data: 'agent_name', name: 'agents.agent_name'},
                        {data: 'deposit_amount', name: 'deposit_amount'},
                        {data: 'deposit_proof', name: 'deposit_proof'},
                        {data: 'deposit_note', name: 'deposit_note'},
                        // {data: 'deposit_status', name: 'deposit_status'},
                        {data: 'status', name: 'status', orderable: false, searchable: false},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                })

                $(document).on("click", ".btn-void, .btn-approve, .btn-cancel", function() {
                    let ident = $(this).data('identifier')
                    let ids = $(this).data('id')
                    console.log(ident)
                    switch (ident) {
                        case 'btn-approve':
                            approveDeposit(ids)
                            break;
                        case 'btn-cancel':
                            cancelDeposit(ids)
                            break;
                    
                        default:
                            voidDeposit(ids)
                            break;
                    }
                })
            })
        </script>
    </body>
</html>