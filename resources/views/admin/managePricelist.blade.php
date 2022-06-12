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
                    <h1>MTL - Pricelist</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('homes') }}">Home</a></li>
                    <li class="breadcrumb-item active">Pricelist Management</li>
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
                                <h3 class="card-title">MTL - Pricelist</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <button type="button" class="btn btn-outline-info float-right ml-1" data-toggle="modal" data-target="#modal-import"><i class="fa fa-file-import"></i> Import Pricelist</button>
                                        <a href="{{ route('create-pricelist') }}" class="btn btn-outline-success float-right"><i class="fa fa-plus-circle"></i> Add Pricelist</a>
                                    </div>
                                </div>
                                <table id="pricelist-table" class="table table-bordered table-striped" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Province</th>
                                            <th>City</th>
                                            <th>Destination</th>
                                            <th>Type</th>
                                            <th>Price/Kg</th>
                                            <th>Price/M<sup>3</sup></th>
                                            <th>Min. Weight(Kg)</th>
                                            <th>Min. Volume(M<sup>3</sup>)</th>
                                            <th>Duedate</th>
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
@section('addon-modal')
<div class="modal fade" id="modal-import">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import Pricelist</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
                <div class="modal-body">
                    <form id="import-form" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            <label for="">Imported File (.xls/.xlsx)</label>
                            <input type="file" name="imported" id="imported" class="form-control">
                        </div>
                    </form>
                </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-import">Submit</button>
            </div>
        </div>
    </div>
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
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
        $('#pricelist-table').DataTable({
            "responsive": true,
            "autoWidth": true,
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('pricelist-data') }}",
            "columns": [
                {data: 'pricelist_code', name: 'pricelist_code'},
                {data: 'province', name: 'province'},
                {data: 'regency', name: 'regency'},
                {data: 'pricelist_destination', name: 'pricelist_destination'},
                {data: 'pricelist_type', name: 'pricelist_type'},
                {data: 'pricelist_price', name: 'pricelist_price'},
                {data: 'pricelist_price_volume', name: 'pricelist_price_volume'},
                {data: 'pricelist_minimum_weight', name: 'pricelist_minimum_weight'},
                {data: 'pricelist_minimum_volume', name: 'pricelist_minimum_volume'},
                {data: 'duedate', name: 'duedate', orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        })

        $('#btn-import').on('click', function(){
            let myForm = document.getElementById('import-form')
            let formData = new FormData(myForm)
            console.log(formData)
            $.ajax({
                url: "{{ route('import-pricelist') }}",
                data: formData,
                type: 'POST',
                dataType: 'JSON',
                contentType: false,
                processData: false, 
                success: function(data) {
                    console.log('success')
                    if (data.result) {
                        Swal.fire({
                            title: 'Success!',
                            text: data.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('#pricelist-table').DataTable().ajax.reload()
                            }
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
                    console.log('error')
                    Swal.fire({
                        title: 'Failed!',
                        text: data.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                }
            })
        })
    });
    </script>
@endsection