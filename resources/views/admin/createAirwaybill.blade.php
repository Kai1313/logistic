@extends('admin.master')
@section('addon-css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('onpage-css')
    <style>
        .capitalized {
            text-transform: capitalize;
        }
    </style>
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Airwaybill</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Airwaybill</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form id="quickForm" action="" method="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Item Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="h2 mr-2" id="showType">REG</span>
                                        <span class="h4" id="showDestination" class="capitalized">SMA 17 Agustus</span>
                                        <span class="h4" id="showVillage" class="capitalized">Desa Setail</span>
                                        <span class="h4" id="showDistrict" class="capitalized">Genteng</span>
                                        <span class="h4" id="showRegency" class="capitalized">Banyuwangi</span>
                                        <span class="h4" id="showProvince" class="capitalized">Jawa Timur</span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Dimension and Weight</label>
                                        <br>
                                        <span class="h2" id="showLength">10cm</span>
                                        <span class="h2">x</span>
                                        <span class="h2" id="showWidth">10cm</span>
                                        <span class="h2">x</span>
                                        <span class="h2 mr-2" id="showHeight">10cm</span>
                                        <span class="h2 mr-2" id="showWeight">1kg</span>
                                        <br>
                                        <span class="h2" id="showPackaging">- Packaging</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-2 col-6">
                                        <div class="form-group">
                                            <label for="">Min. Cost</label>
                                            <h3 for="" id="showCost">Rp5000</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <div class="form-group">
                                            <label for="">Min. Weight</label>
                                            <h3 for="" id="showMinimumWeight">1kg</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <div class="form-group">
                                            <label for="">Package Cost</label>
                                            <h3 for="" id="showPackageCost">Rp5000</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <div class="form-group">
                                            <label for="">Insurance</label>
                                            <h3 for="" id="showInsuranceCost">Rp5000</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <div class="form-group">
                                            <label for="">Additional</label>
                                            <h3 for="" id="showAdditionalCost">Rp5000</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <div class="form-group">
                                            <label for="">Packaging</label>
                                            <h3 for="" id="showPackagingCost">Rp5000</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 col-6">
                                        <div class="form-group">
                                            <label for="">Discount</label>
                                            <h3 for="" id="showDiscountCost">Rp5000</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-6">
                                        <div class="form-group">
                                            <label for="">Total</label>
                                            <h1 for="" id="showTotalCost">Rp20000</h1>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Weight (Kg)</label>
                                            <input type="text" name="weight" class="form-control" id="weight" placeholder="Airwaybill Weight (Kg)">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Length (cm)</label>
                                            <input type="text" name="length" class="form-control" id="length" placeholder="Airwaybill Length (cm)">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Width (cm)</label>
                                            <input type="text" name="width" class="form-control" id="width" placeholder="Airwaybill Width (cm)">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Height (cm)</label>
                                            <input type="text" name="height" class="form-control" id="height" placeholder="Airwaybill Height (cm)">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Packaging</label>
                                            <select name="packaging" id="packaging" class="form-control select2bs4" style="width: 100%;">
                                                <option value="0">Without Packaging</option>
                                                <option value="1">Wood Packaging</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Packaging Cost</label>
                                            <input type="text" name="packagingCost" class="form-control" id="packagingCost" placeholder="Package Cost">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Weight Type</label>
                                            <select name="weightType" id="weightType" class="form-control select2bs4" style="width: 100%;">
                                                <option value="0">Normal</option>
                                                <option value="1">Cargo</option>
                                                <option value="2">EMKL</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="pricelist" id="pricelist" value="0">
                                            <input type="hidden" name="hiddenPricelist" id="hiddenPricelist" value="0">
                                            <input type="hidden" name="hiddenSpecialPricelist" id="hiddenSpecialPricelist" value="0">
                                            <input type="hidden" name="hiddenMinimumWeight" id="hiddenMinimumWeight" value="0">
                                            <input type="hidden" name="hiddenSubCost" id="hiddenSubCost" value="0">
                                            <input type="hidden" name="hiddenTotalCost" id="hiddenTotalCost" value="0">
                                            <label for="">Pricelist</label>
                                            {{-- <select name="pricelist" id="pricelist" class="form-control select2bs4" style="width: 100%;">
                                                <option value="">Pick a price</option>
                                                @foreach ($pricelists as $pricelist)
                                                    <option value="{{ $pricelist->pricelist_id }}">{{ $pricelist->pricelist_destination }}</option>
                                                @endforeach
                                            </select> --}}
                                            <div class="input-group mb-3">
                                                <input id="pricelistShow" name="pricelistShow" type="text" class="form-control" readonly>
                                                <div class="input-group-prepend">
                                                  <button id="btn-find" type="button" class="btn btn-info"><i class="fa fa-search"></i> Find</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Promotion Code</label>
                                            <input type="text" name="promo_code" class="form-control" id="" placeholder="Promotion Code">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Discount</label>
                                            <input type="text" name="discount" class="form-control" id="discount" placeholder="Additional Cost">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Insurance Cost</label>
                                            <input type="text" name="insurance" class="form-control" id="insurance" placeholder="Insurance Cost">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Additional Cost</label>
                                            <input type="text" name="additional" class="form-control" id="additional" placeholder="Additional Cost">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Shipping Information <small></small></h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control" rows="3" placeholder="Airwaybill Note ..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Special Instruction</label>
                                            <textarea name="specialInstruction" class="form-control" rows="3" placeholder="Airwaybill Special Instruction ..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Payment Method</label>
                                            <select name="payment" id="payment" class="form-control select2bs4" style="width: 100%;">
                                                <option value="0">Cash</option>
                                                <option value="1">Cashless</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Acceptance Method</label>
                                            <select name="acceptance" id="acceptance" class="form-control select2bs4" style="width: 100%;">
                                                <option value="0">Non-COD</option>
                                                <option value="1">COD</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Shipper Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Origin Name</label>
                                            <input type="text" name="originName" class="form-control" id="" placeholder="Origin Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Origin Contact</label>
                                            <input type="text" name="originContact" class="form-control" id="" placeholder="Origin Contact">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Origin Description</label>
                                            <textarea name="originDescription" class="form-control" rows="3" placeholder="Origin Description ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Alias Name</label>
                                            <input type="text" name="aliasName" class="form-control" id="" placeholder="Alias Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alias Contact</label>
                                            <input type="text" name="aliasContact" class="form-control" id="" placeholder="Alias Contact">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alias Description</label>
                                            <textarea name="aliasDescription" class="form-control" rows="3" placeholder="Alias Description ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Destination Name</label>
                                            <input type="text" name="destinationName" class="form-control" id="" placeholder="Destination Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Destination Contact</label>
                                            <input type="text" name="destinationContact" class="form-control" id="" placeholder="Destination Contact">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Destination Description</label>
                                            <textarea name="destinationDescription" class="form-control" rows="3" placeholder="Destination Description ..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer float-right">
                                <button id="btn-print" type="button" class="btn btn-outline-success float-right" disabled><i class="fas fa-print"></i> Print</button>
                                <button type="submit" class="btn btn-primary float-right mr-1">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
@section('addon-modal')
    <div class="modal fade" id="modal-pricelist">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Extra Large Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table id="pricelist-table" class="table table-bordered table-striped" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Code</th>
                                            <th>Destination</th>
                                            <th>Type</th>
                                            <th>Price/Kg</th>
                                            <th>Price/M<sup>3</sup></th>
                                            <th>Min. <br> Weight(Kg)</th>
                                            <th>Min. <br> Volume(M<sup>3</sup>)</th>
                                            <th>Duedate</th>                                            
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default float-right" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('addon-js')
    <!-- Select2 -->
    <script src="{{ asset('assets/lte/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- jquery-validation -->
    <script src="{{ asset('assets/lte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
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
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        
        // Pricelist modal
        $("#btn-find").on('click', function() {
            $("#modal-pricelist").modal('show')
            $('#priceist-table').DataTable().ajax.reload()
        })

        $('#pricelist-table').DataTable({
            "responsive": true,
            "autoWidth": true,
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('pricelist-find') }}",
            "columns": [
                {data: 'action', name: 'action', orderable: false, searchable: false,},
                {data: 'pricelist_code', name: 'pricelist_code'},
                {data: 'pricelist_destination', name: 'pricelist_destination'},
                {data: 'pricelist_type', name: 'pricelist_type'},
                {data: 'pricelist_price', name: 'pricelist_price'},
                {data: 'pricelist_price_volume', name: 'pricelist_price_volume'},
                {data: 'pricelist_minimum_weight', name: 'pricelist_minimum_weight'},
                {data: 'pricelist_minimum_volume', name: 'pricelist_minimum_volume'},
                {data: 'duedate', name: 'duedate', orderable: false, searchable: false},
            ]
        })

        $('#btn-print').on('click', function() {
            let printId = $("#btn-print").data("printId")
            console.log(printId)
            let url = "{{ route('print-airwaybill', ['ids'=>':ids']) }}".replace(':ids', printId)
            window.open(url, '_blank').focus()
        })

        // Dimension change
        $("#weight").change(function() {
            costSum()
        })
        $("#length").change(function() {
            costSum()
        })
        $("#width").change(function() {
            costSum()
        })
        $("#height").change(function() {
            costSum()
        })

        // Packaging change
        $("#packaging").on('change', function() {
            let pack = $("#packaging").val()
            $("#showPackaging").text((pack == 0)?'- Packaging':'Wood Packaging')
        })

        // Cost change
        $("#packagingCost").change(function() {
            costSum()
        })
        $("#weightType").on('change', function() {
            costSum()
        })
        // $("#pricelist").on('change', function() {
        //     fetchPricelist($("#pricelist").val())
        // })
        $("#insurance").change(function() {
            costSum()
        })
        $("#additional").change(function() {
            costSum()
        })
        $("#discount").change(function() {
            costSum()
        })

        $.validator.setDefaults({
            submitHandler: function () {
                store()
            }
        });
        $('#quickForm').validate({
            rules: {
                weight: {
                    required: true, number: true,
                },
                width: {
                    required: true, number: true,
                },
                length: {
                    required: true, number: true,
                },
                height: {
                    required: true, number: true,
                },
                packagingCost: {
                    required: true, number: true,
                },
                pricelistShow: {
                    required: true,
                },
                description: {
                    required: true,
                },
                originName: {
                    required: true,
                },
                originContact: {
                    required: true,
                },
                originDescription: {
                    required: true,
                },
                destinationName: {
                    required: true,
                },
                destinationContact: {
                    required: true,
                },
                destinationDescription: {
                    required: true,
                },
            },
            messages: {
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a valid email address"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                terms: "Please accept our terms"
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });

    function getPopulate(que, container, url, str) {
        $.ajax({
            url: url,
            type: "GET",
            data: {que: que},
            success: function (data) {
                if (data.result) {
                    console.log(data.message)
                    populateOptions(data.data, container, str)
                }
                else {
                    alert(data.message)
                }
            }
        })
    }

    function populateOptions(data, container, str) {
        $(container).empty()
        let html = '<option value="">'+str+'</option>'
        data.forEach(element => {
            html += '<option value="'+element.id+'">'+element.name+'</option>'
        })
        $(container).append(html).trigger('change')
    }

    function store() {
        $.ajax({
            url: "{{ route('store-airwaybill') }}",
            type: "POST",
            data: $('#quickForm').serialize(),
            success: function (data) {
                if (data.result) {
                    Swal.fire({
                        title: 'Success!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    })
                    $('#btn-print').attr('disabled', false).data('printId', data.airwaybill["awb_id"])
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
                Swal.fire({
                    title: 'Failed!',
                    text: data.message,
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            }
        })
    }

    function costSum() {
        // Init value
        let vol = 0
        let volume = 0
        let round = 0
        let pckage = 0
        let sum = 0
        let weight = ($("#weight").val() == "") ? parseFloat(1) : parseFloat($("#weight").val())
        let minWeight = $("#hiddenMinimumWeight").val()
        let specialPrice = $("#hiddenSpecialPricelist").val()
        let weightType = $("#weightType").val()
        let length = ($("#length").val() == "") ? parseFloat(1) : parseFloat($("#length").val())
        let width = ($("#width").val() == "") ? parseFloat(1) : parseFloat($("#width").val())
        let height = ($("#height").val() == "") ? parseFloat(1) : parseFloat($("#height").val())
        let packaging = ($("#packagingCost").val() == "") ? parseFloat(0) : parseFloat($("#packagingCost").val())
        let insurance = ($("#insurance").val() == "") ? parseFloat(0) : parseFloat($("#insurance").val())
        let additional = ($("#additional").val() == "") ? parseFloat(0) : parseFloat($("#additional").val())
        let pricelist = ($("#pricelist").val() == "") ? parseFloat(0) : parseFloat($("#hiddenPricelist").val())
        let discount = ($("#discount").val() == "") ? parseFloat(0) : parseFloat($("#discount").val())

        // Check weighing type
        switch (weightType) {
            case '1':
                let finWeight = (minWeight > weight) ? minWeight : weight
                let minPrice = finWeight*pricelist
                vol = length*width*height
                volume = parseFloat(vol/4000)
                round = rounding(volume)
                pckage = (volume > finWeight) ? (round-minWeight)*pricelist+minPrice : (finWeight-minWeight)*pricelist+minPrice
                sum = packaging+insurance+additional+pckage-discount
                $("#hiddenSubCost").val(pckage)
                $("#hiddenTotalCost").val(sum)
                $("#showWeight").text((volume > finWeight)?round+'kg':finWeight+'kg')
                $("#showMinimumWeight").html(minWeight+'kg')
                $("#showCost").text('Rp'+pricelist)
                $("#showPackageCost").text('Rp'+pckage)
                break;
            case '2':
                vol = length*width*height
                volume = (parseFloat(vol/1000000) < 1) ? parseFloat(1) : parseFloat(vol/1000000)
                pckage = volume*specialPrice
                sum = packaging+insurance+additional+pckage-discount
                $("#hiddenSubCost").val(pckage)
                $("#hiddenTotalCost").val(sum)
                $("#showWeight").html(volume+'m<sup>3</sup>')
                $("#showMinimumWeight").html(volume+'m<sup>3</sup>')
                $("#showCost").text('Rp'+specialPrice)
                $("#showPackageCost").text('Rp'+pckage)
                break;
            default:
                vol = length*width*height
                volume = parseFloat(vol/4000)
                round = rounding(volume)
                pckage = (volume > weight) ? volume*pricelist : weight*pricelist
                sum = packaging+insurance+additional+pckage-discount
                $("#hiddenSubCost").val(pckage)
                $("#hiddenTotalCost").val(sum)
                $("#showWeight").text((volume > weight)?round+'kg':weight+'kg')
                $("#showMinimumWeight").html('1kg')
                $("#showCost").text('Rp'+pricelist)
                $("#showPackageCost").text('Rp'+pckage)
                break;
        }
        $("#showLength").text(length+'cm')
        $("#showWidth").text(width+'cm')
        $("#showHeight").text(height+'cm')
        $("#showPackagingCost").text('Rp'+packaging)
        $("#showInsuranceCost").text('Rp'+insurance)
        $("#showAdditionalCost").text('Rp'+additional)
        $("#showDiscountCost").text('Rp'+discount)
        $("#showTotalCost").text('Rp'+sum)
        console.log('Cost Summary')
    }

    function rounding(input) {
      let inp = input
      let prc = (inp*10)%10
      let res = (prc >= 3) ? inp+(10-prc) * .1 : inp.toFixed()
      return res
    }

    function fetchPricelist(ids) {
        let weight = ($("#weight").val() == "") ? parseFloat(1) : parseFloat($("#weight").val())
        let res = 0
        $.ajax({
            url: "{{ route('fetch-pricelist') }}",
            type: "POST",
            data: {_token: "{{ csrf_token() }}", ids: ids},
            success: function (data) {
                let price = (data.pricelist != null) ? parseFloat(data.pricelist["pricelist_price"]) : parseFloat(0)
                let specialPrice = (data.pricelist != null) ? parseFloat(data.pricelist["pricelist_price_volume"]): parseFloat(0)
                let minWeight = parseFloat(data.pricelist["pricelist_minimum_weight"])
                $("#pricelistShow").val(data.pricelist["pricelist_destination"])
                $("#pricelist").val(data.pricelist["pricelist_id"])
                $("#hiddenPricelist").val(price)
                $("#hiddenSpecialPricelist").val(specialPrice)
                $("#hiddenMinimumWeight").val(minWeight)

                // Set pricelist info
                $("#showType").text(data.pricelist["pricelist_type"])
                $("#showDestination").text(data.pricelist["pricelist_destination"])
                $("#showVillage").text(data.pricelist["village_name"])
                $("#showDistrict").text(data.pricelist["district_name"])
                $("#showRegency").text(data.pricelist["regency_name"])
                $("#showProvince").text(data.pricelist["province_name"])

                // Recalculate
                costSum()
                $("#modal-pricelist").modal('hide')
            }
        })      
    }

    function pickPricelist(ids) {
        fetchPricelist(ids)
    }
</script>
@endsection