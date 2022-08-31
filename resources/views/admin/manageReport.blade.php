@extends('admin.master')
@section('addon-css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/sweetalert2/sweetalert2.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
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
                            <form action="{{ route('fetch-report') }}" method="post">
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
@endsection
@section('script-js')
    <script>
        $(function () {
            $("#startDate").datetimepicker({
                format: "L"
            })
            $("#endDate").datetimepicker({
                format: "L"
            })
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
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

        function approveDeposit(ids) {
            $.ajax({
                url: "{{ route('deposit-approve') }}",
                type: "POST",
                data: {_token: '{{ csrf_token() }}', ids: ids},
                success: function (data) {
                    if (data.result) {
                        $('#deposit-table').DataTable().ajax.reload()
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

        function voidDeposit(ids) {
            $.ajax({
                url: "{{ route('deposit-void') }}",
                type: "POST",
                data: {_token: '{{ csrf_token() }}', ids: ids},
                success: function (data) {
                    if (data.result) {
                        $('#deposit-table').DataTable().ajax.reload()
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

        function cancelDeposit(ids) {
            $.ajax({
                url: "{{ route('deposit-cancel') }}",
                type: "POST",
                data: {_token: '{{ csrf_token() }}', ids: ids},
                success: function (data) {
                    if (data.result) {
                        $('#deposit-table').DataTable().ajax.reload()
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