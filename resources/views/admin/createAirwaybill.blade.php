@extends('admin.master')
@section('addon-css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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
                                        <span class="h4" id="showDestination">SMA 17 Agustus</span>
                                        <span class="h4" id="showVillage">Desa Setail</span>
                                        <span class="h4" id="show District">Genteng</span>
                                        <span class="h4" id="showRegency">Banyuwangi</span>
                                        <span class="h4" id="showProvince">Jawa Timur</span>
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
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Cost/kg</label>
                                            <h3 for="" id="showCost">Rp5000</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Package Cost</label>
                                            <h3 for="" id="showPackageCost">Rp5000</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Insurance</label>
                                            <h3 for="" id="showInsuranceCost">Rp5000</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Additional</label>
                                            <h3 for="" id="showAdditionalCost">Rp5000</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Packaging</label>
                                            <h3 for="" id="showPackagingCost">Rp5000</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Discount</label>
                                            <h3 for="" id="showDiscountCost">Rp5000</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="hiddenPricelist" id="hiddenPricelist" value="0">
                                            <label for="">Pricelist</label>
                                            <select name="pricelist" id="pricelist" class="form-control select2bs4" style="width: 100%;">
                                                <option value="">Pick a price</option>
                                                @foreach ($pricelists as $pricelist)
                                                    <option value="{{ $pricelist->pricelist_id }}">{{ $pricelist->pricelist_destination }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Promotion Code</label>
                                            <input type="text" name="promo_code" class="form-control" id="" placeholder="Promotion Code">
                                        </div>
                                    </div>
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Discount</label>
                                            <input type="text" name="discount" class="form-control" id="discount" placeholder="Additional Cost">
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
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
  </div>
@endsection
@section('addon-js')
    <!-- Select2 -->
    <script src="{{ asset('assets/lte/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- jquery-validation -->
    <script src="{{ asset('assets/lte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
@endsection
@section('script-js')
<script>
    $(function () {
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        // Dimension change
        $("#weight").change(function() {
            dimensionSum()
            costSum()
        })
        $("#length").change(function() {
            dimensionSum()
        })
        $("#width").change(function() {
            dimensionSum()
        })
        $("#height").change(function() {
            dimensionSum()
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
        $("#pricelist").on('change', function() {
            fetchPricelist($("#pricelist").val())
        })
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
                // code: {
                //     required: true,
                // },
                // province: {
                //     required: true,
                // },
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
                    alert(data.message)
                }
                else {
                    alert(data.message)
                }
            }
        })
    }

    function costSum() {
        let weight = ($("#weight").val() == "") ? parseFloat(1) : parseFloat($("#weight").val())
        let packaging = ($("#packagingCost").val() == "") ? parseFloat(0) : parseFloat($("#packagingCost").val())
        let insurance = ($("#insurance").val() == "") ? parseFloat(0) : parseFloat($("#insurance").val())
        let additional = ($("#additional").val() == "") ? parseFloat(0) : parseFloat($("#additional").val())
        let pricelist = ($("#pricelist").val() == "") ? parseFloat(0) : parseFloat($("#hiddenPricelist").val())
        let package = weight*pricelist
        let discount = ($("#discount").val() == "") ? parseFloat(0) : parseFloat($("#discount").val())
        let sum = packaging+insurance+additional+package-discount
        $("#showCost").text('Rp'+pricelist)
        $("#showPackageCost").text('Rp'+package)
        $("#showPackagingCost").text('Rp'+packaging)
        $("#showInsuranceCost").text('Rp'+insurance)
        $("#showAdditionalCost").text('Rp'+additional)
        $("#showDiscountCost").text('Rp'+discount)
        $("#showTotalCost").text('Rp'+sum)
        console.log('hitung cost')
    }
    
    function dimensionSum() {
        let weight = ($("#weight").val() == "") ? parseFloat(1) : parseFloat($("#weight").val())
        let length = ($("#length").val() == "") ? parseFloat(1) : parseFloat($("#length").val())
        let width = ($("#width").val() == "") ? parseFloat(1) : parseFloat($("#width").val())
        let height = ($("#height").val() == "") ? parseFloat(1) : parseFloat($("#height").val())
        let sum = length*width*height
        let volume = parseFloat(sum/4000)
        $("#showLength").text(length+'cm')
        $("#showWidth").text(width+'cm')
        $("#showHeight").text(height+'cm')
        let round = rounding(volume)
        if (volume > weight) {
            $("#showWeight").text(round+'kg')
        }
        else {
            $("#showWeight").text(weight+'kg')
        }
        console.log('hitung dimensi')
    }

    function rounding(input) {
      let inp = input
      let prc = (inp*10)%10
      let res = (prc >= 3) ? inp+(10-prc) * .1 : inp.toFixed()
      console.log(res)
      return res
    }

    function fetchPricelist(ids) {
        // console.log($("#hiddenPricelist").val())
        let res = 0
        $.ajax({
            url: "{{ route('fetch-pricelist') }}",
            type: "POSt",
            data: {_token: "{{ csrf_token() }}", ids: ids},
            success: function (data) {
                res = (data.pricelist != null) ? parseFloat(data.pricelist["pricelist_price"]) : parseFloat(0)
                // console.log('ini disini'+res)
                $("#hiddenPricelist").val(res)
                // console.log($("#hiddenPricelist").val())
                costSum()
            }
        })      
    }
</script>
@endsection