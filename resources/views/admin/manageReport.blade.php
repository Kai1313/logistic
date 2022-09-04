@extends('admin.master')
@section('addon-css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/sweetalert2/sweetalert2.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
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
                    <h1>{{ $setting["alias"]->setting_value }} - Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('homes') }}">Home</a></li>
                    <li class="breadcrumb-item active">Report Management</li>
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
                                <h3 class="card-title">{{ $setting["alias"]->setting_value }} - Report</h3>
                            </div>
                            <form action="{{ route('fetch-report') }}" method="POST">
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Start Date</label>
                                                <div class="input-group date" id="startDate" data-target-input="nearest">
                                                    <input type="text" name="startDate" class="form-control datetimepicker-input datetimepicker-input" data-target="#startDate"/>
                                                    <div class="input-group-append" data-target="#startDate" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">End Date</label>
                                                <div class="input-group date" id="endDate" data-target-input="nearest">
                                                    <input type="text" name="endDate" class="form-control datetimepicker-input datetimepicker-input" data-target="#endDate"/>
                                                    <div class="input-group-append" data-target="#endDate" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Type</label>
                                                <select name="type" id="type" class="form-control select2bs4" style="width: 100%;">
                                                    {{-- <option value="">Pick Type</option> --}}
                                                    <option value="Airwaybill">Airwaybill</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary float-right" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>

                        <div class="card">
                            <table>
                            </table>
                        </div>
                        <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">DataTable with default features</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>Rendering engine</th>
                                  <th>Browser</th>
                                  <th>Platform(s)</th>
                                  <th>Engine version</th>
                                  <th>CSS grade</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                  <td>Trident</td>
                                  <td>Internet
                                    Explorer 4.0
                                  </td>
                                  <td>Win 95+</td>
                                  <td> 4</td>
                                  <td>X</td>
                                </tr>
                                <tr>
                                  <td>Trident</td>
                                  <td>Internet
                                    Explorer 5.0
                                  </td>
                                  <td>Win 95+</td>
                                  <td>5</td>
                                  <td>C</td>
                                </tr>
                                <tr>
                                  <td>Trident</td>
                                  <td>Internet
                                    Explorer 5.5
                                  </td>
                                  <td>Win 95+</td>
                                  <td>5.5</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Trident</td>
                                  <td>Internet
                                    Explorer 6
                                  </td>
                                  <td>Win 98+</td>
                                  <td>6</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Trident</td>
                                  <td>Internet Explorer 7</td>
                                  <td>Win XP SP2+</td>
                                  <td>7</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Trident</td>
                                  <td>AOL browser (AOL desktop)</td>
                                  <td>Win XP</td>
                                  <td>6</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Gecko</td>
                                  <td>Firefox 1.0</td>
                                  <td>Win 98+ / OSX.2+</td>
                                  <td>1.7</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Gecko</td>
                                  <td>Firefox 1.5</td>
                                  <td>Win 98+ / OSX.2+</td>
                                  <td>1.8</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Gecko</td>
                                  <td>Firefox 2.0</td>
                                  <td>Win 98+ / OSX.2+</td>
                                  <td>1.8</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Gecko</td>
                                  <td>Firefox 3.0</td>
                                  <td>Win 2k+ / OSX.3+</td>
                                  <td>1.9</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Gecko</td>
                                  <td>Camino 1.0</td>
                                  <td>OSX.2+</td>
                                  <td>1.8</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Gecko</td>
                                  <td>Camino 1.5</td>
                                  <td>OSX.3+</td>
                                  <td>1.8</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Gecko</td>
                                  <td>Netscape 7.2</td>
                                  <td>Win 95+ / Mac OS 8.6-9.2</td>
                                  <td>1.7</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Gecko</td>
                                  <td>Netscape Browser 8</td>
                                  <td>Win 98SE+</td>
                                  <td>1.7</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Gecko</td>
                                  <td>Netscape Navigator 9</td>
                                  <td>Win 98+ / OSX.2+</td>
                                  <td>1.8</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Gecko</td>
                                  <td>Mozilla 1.0</td>
                                  <td>Win 95+ / OSX.1+</td>
                                  <td>1</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Gecko</td>
                                  <td>Mozilla 1.1</td>
                                  <td>Win 95+ / OSX.1+</td>
                                  <td>1.1</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Gecko</td>
                                  <td>Mozilla 1.2</td>
                                  <td>Win 95+ / OSX.1+</td>
                                  <td>1.2</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Gecko</td>
                                  <td>Mozilla 1.3</td>
                                  <td>Win 95+ / OSX.1+</td>
                                  <td>1.3</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Gecko</td>
                                  <td>Mozilla 1.4</td>
                                  <td>Win 95+ / OSX.1+</td>
                                  <td>1.4</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Gecko</td>
                                  <td>Mozilla 1.5</td>
                                  <td>Win 95+ / OSX.1+</td>
                                  <td>1.5</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Gecko</td>
                                  <td>Mozilla 1.6</td>
                                  <td>Win 95+ / OSX.1+</td>
                                  <td>1.6</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Gecko</td>
                                  <td>Mozilla 1.7</td>
                                  <td>Win 98+ / OSX.1+</td>
                                  <td>1.7</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Gecko</td>
                                  <td>Mozilla 1.8</td>
                                  <td>Win 98+ / OSX.1+</td>
                                  <td>1.8</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Gecko</td>
                                  <td>Seamonkey 1.1</td>
                                  <td>Win 98+ / OSX.2+</td>
                                  <td>1.8</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Gecko</td>
                                  <td>Epiphany 2.20</td>
                                  <td>Gnome</td>
                                  <td>1.8</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Webkit</td>
                                  <td>Safari 1.2</td>
                                  <td>OSX.3</td>
                                  <td>125.5</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Webkit</td>
                                  <td>Safari 1.3</td>
                                  <td>OSX.3</td>
                                  <td>312.8</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Webkit</td>
                                  <td>Safari 2.0</td>
                                  <td>OSX.4+</td>
                                  <td>419.3</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Webkit</td>
                                  <td>Safari 3.0</td>
                                  <td>OSX.4+</td>
                                  <td>522.1</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Webkit</td>
                                  <td>OmniWeb 5.5</td>
                                  <td>OSX.4+</td>
                                  <td>420</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Webkit</td>
                                  <td>iPod Touch / iPhone</td>
                                  <td>iPod</td>
                                  <td>420.1</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Webkit</td>
                                  <td>S60</td>
                                  <td>S60</td>
                                  <td>413</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Presto</td>
                                  <td>Opera 7.0</td>
                                  <td>Win 95+ / OSX.1+</td>
                                  <td>-</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Presto</td>
                                  <td>Opera 7.5</td>
                                  <td>Win 95+ / OSX.2+</td>
                                  <td>-</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Presto</td>
                                  <td>Opera 8.0</td>
                                  <td>Win 95+ / OSX.2+</td>
                                  <td>-</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Presto</td>
                                  <td>Opera 8.5</td>
                                  <td>Win 95+ / OSX.2+</td>
                                  <td>-</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Presto</td>
                                  <td>Opera 9.0</td>
                                  <td>Win 95+ / OSX.3+</td>
                                  <td>-</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Presto</td>
                                  <td>Opera 9.2</td>
                                  <td>Win 88+ / OSX.3+</td>
                                  <td>-</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Presto</td>
                                  <td>Opera 9.5</td>
                                  <td>Win 88+ / OSX.3+</td>
                                  <td>-</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Presto</td>
                                  <td>Opera for Wii</td>
                                  <td>Wii</td>
                                  <td>-</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Presto</td>
                                  <td>Nokia N800</td>
                                  <td>N800</td>
                                  <td>-</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Presto</td>
                                  <td>Nintendo DS browser</td>
                                  <td>Nintendo DS</td>
                                  <td>8.5</td>
                                  <td>C/A<sup>1</sup></td>
                                </tr>
                                <tr>
                                  <td>KHTML</td>
                                  <td>Konqureror 3.1</td>
                                  <td>KDE 3.1</td>
                                  <td>3.1</td>
                                  <td>C</td>
                                </tr>
                                <tr>
                                  <td>KHTML</td>
                                  <td>Konqureror 3.3</td>
                                  <td>KDE 3.3</td>
                                  <td>3.3</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>KHTML</td>
                                  <td>Konqureror 3.5</td>
                                  <td>KDE 3.5</td>
                                  <td>3.5</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Tasman</td>
                                  <td>Internet Explorer 4.5</td>
                                  <td>Mac OS 8-9</td>
                                  <td>-</td>
                                  <td>X</td>
                                </tr>
                                <tr>
                                  <td>Tasman</td>
                                  <td>Internet Explorer 5.1</td>
                                  <td>Mac OS 7.6-9</td>
                                  <td>1</td>
                                  <td>C</td>
                                </tr>
                                <tr>
                                  <td>Tasman</td>
                                  <td>Internet Explorer 5.2</td>
                                  <td>Mac OS 8-X</td>
                                  <td>1</td>
                                  <td>C</td>
                                </tr>
                                <tr>
                                  <td>Misc</td>
                                  <td>NetFront 3.1</td>
                                  <td>Embedded devices</td>
                                  <td>-</td>
                                  <td>C</td>
                                </tr>
                                <tr>
                                  <td>Misc</td>
                                  <td>NetFront 3.4</td>
                                  <td>Embedded devices</td>
                                  <td>-</td>
                                  <td>A</td>
                                </tr>
                                <tr>
                                  <td>Misc</td>
                                  <td>Dillo 0.8</td>
                                  <td>Embedded devices</td>
                                  <td>-</td>
                                  <td>X</td>
                                </tr>
                                <tr>
                                  <td>Misc</td>
                                  <td>Links</td>
                                  <td>Text only</td>
                                  <td>-</td>
                                  <td>X</td>
                                </tr>
                                <tr>
                                  <td>Misc</td>
                                  <td>Lynx</td>
                                  <td>Text only</td>
                                  <td>-</td>
                                  <td>X</td>
                                </tr>
                                <tr>
                                  <td>Misc</td>
                                  <td>IE Mobile</td>
                                  <td>Windows Mobile 6</td>
                                  <td>-</td>
                                  <td>C</td>
                                </tr>
                                <tr>
                                  <td>Misc</td>
                                  <td>PSP browser</td>
                                  <td>PSP</td>
                                  <td>-</td>
                                  <td>C</td>
                                </tr>
                                <tr>
                                  <td>Other browsers</td>
                                  <td>All others</td>
                                  <td>-</td>
                                  <td>-</td>
                                  <td>U</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                  <th>Rendering engine</th>
                                  <th>Browser</th>
                                  <th>Platform(s)</th>
                                  <th>Engine version</th>
                                  <th>CSS grade</th>
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
    </div>
@endsection
@section('addon-js')
    <script src="{{ asset('assets/lte/plugins/moment/moment.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('assets/lte/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- jquery-validation -->
    <script src="{{ asset('assets/lte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('assets/lte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('assets/lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
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
@endsection