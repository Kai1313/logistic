@extends('admin.master')
@section('addon-css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/sweetalert2/sweetalert2.css') }}">
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Agent</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Agent</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit New Agent <small></small></h3>
                        </div>
                        <form id="quickForm" action="" method="POST">
                            <div class="card-body">
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                <input type="hidden" name="ids" id="ids" value="{{ $agent->agent_id }}">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" id="" value="{{ $agent->agent_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Province</label>
                                    <select name="province" id="province" class="form-control select2bs4" style="width: 100%;">
                                        <option value="">Pick Province</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}" {{ ($agent->province == $province->id) ? 'selected' : '' }}>{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Regency</label>
                                    <select name="regency" id="regency" class="form-control select2bs4" style="width: 100%;">
                                        <option value="">Pick Regency</option>
                                        @foreach ($regencies as $regency)
                                            <option value="{{ $regency->id }}" {{ ($agent->regency == $regency->id) ? 'selected' : '' }}>{{ $regency->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">District</label>
                                    <select name="district" id="district" class="form-control select2bs4" style="width: 100%;">
                                        <option value="">Pick District</option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}" {{ ($agent->district == $district->id) ? 'selected' : '' }}>{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Village</label>
                                    <select name="village" id="village" class="form-control select2bs4" style="width: 100%;">
                                        <option value="">Pick Village</option>
                                        @foreach ($villages as $village)
                                            <option value="{{ $village->id }}" {{ ($agent->village == $village->id) ? 'selected' : '' }}>{{ $village->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" name="address" class="form-control" id="" value="{{ $agent->agent_address }}">
                                </div>
                                <div class="form-group">
                                    <label>Note</label>
                                    <textarea name="note" class="form-control" rows="3" placeholder="Agent Note ...">{{ $agent->agent_description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="" value="{{ $agent->agent_phone }}">
                                </div>                                
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control" id="" value="{{ $agent->agent_email }}">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
            </div>
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
    <!-- SweetAlert2 -->
    <script src="{{ asset('assets/lte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection
@section('script-js')
<script>
    $(function () {
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        $('#province').on('change', function () {
            getPopulate($('#province').val(), '#regency', "{{ route('pricelist-get-regencies') }}", 'Pick Regency')
        })

        $('#regency').on('change', function () {
            getPopulate($('#regency').val(), '#district', "{{ route('pricelist-get-districts') }}", 'Pick District')
        })

        $('#district').on('change', function () {
            getPopulate($('#district').val(), '#village', "{{ route('pricelist-get-villages') }}", 'Pick Village')
        })

        $.validator.setDefaults({
            submitHandler: function () {
                // alert( "Form successful submitted!" );
                update()
            }
        });
        $('#quickForm').validate({
            rules: {
                code: {
                    required: true,
                },
                province: {
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

    function update() {
        $.ajax({
            url: "{{ route('update-agent') }}",
            type: "POST",
            data: $('#quickForm').serialize(),
            success: function (data) {
                if (data.result) {
                    Swal.fire(
                        'Good job!',
                        data.message,
                        'success'
                    )
                    // alert(data.message)
                }
                else {
                    Swal.fire(
                        'Ooopss!',
                        data.message,
                        'error'
                    )
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