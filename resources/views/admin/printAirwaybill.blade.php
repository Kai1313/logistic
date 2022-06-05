<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Airwaybill</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/lte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
    <!-- jQuery -->
    <script src="{{ asset('assets/lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #fafafa;
        }
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        .page {
            min-height: 52mm;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            border: 5px black solid;
        }
        .table-bordered td {
            border: 2px black solid;
        }
        .w-1 {
            width: 8.333333%;
        }
        .w-2 {
            width: 16.666667%;
            vertical-align: middle !important;
        }
        .w-15 {
            width: 12.5%;
        }
        .w-3 {
            width: 25%;
        }
        .w-5 {
            width: 41.666667%;
        }
        .w-6 {
            width: 50%;
        }
        .w-9 {
            width: 75%;
        }
        .center {
            display: block;
            margin: auto;
        }
        .qr-code {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .bold {
            font-weight: 900;
        }
        @page {
            size: 74mm 52mm;
            margin: 0;
        }
        @media print {
            html, body {
                width: 74mm;
                height: 52mm;
            }
            .page {
                width: 74mm;
                min-height: 52mm;
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
            .table-bordered td {
                border: 2px black solid !important;
            }
        }
    </style>
</head>
    <body>
        <div class="page">
            <div class="container-fluid">
                <div class="row">
                    <table class="table table-bordered">
                        <tr>
                            <td class="w-3">
                                <img src="{{ asset('assets/images/logo/mtl-logo.png') }}" alt="" srcset="" width="100%" style="margin: auto; display: block;">
                            </td>
                            <td colspan="5" class="w-9">
                                <div class="header-barcode">
                                    <span><img class="center" src="data:image/png;base64, {{ DNS1D::getBarcodePNG('MTL0101172819', 'C128') }}" alt="barcode" width="60%" /></span>
                                </div>
                                <div class="awb-code">
                                    <h3 class="text-center"><?= strtoupper('MTL0101172819'); ?></h3>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <div class="row">
                                    <div class="col-3">
                                        <h3 class="text-right">Pengirim :</h3>
                                    </div>
                                    <div class="col-9">
                                        <h4>John Doe [08512345689]</h4>
                                        <h4>Prima Estate Wilayut Sukodono Sidoarjo Jawa Timur</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <h3 class="text-right">Penerima :</h3>
                                    </div>
                                    <div class="col-9">
                                        <h4>Lilian Shaw [085987654321]</h4>
                                        <h4>Green Garden Serpong BSD Tangerang Jawa Barat</h4>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="2" class="bold" style="vertical-align: middle;">
                                <div class="row">
                                    <div class="col-6">Tarif</div>
                                    <div class="col-6">Rp 10000</div>
                                </div>
                                <div class="row">
                                    <div class="col-6">Asuransi</div>
                                    <div class="col-6">Rp 10000</div>
                                </div>
                                <div class="row">
                                    <div class="col-6">Tambahan</div>
                                    <div class="col-6">Rp 10000</div>
                                </div>
                                <div class="row">
                                    <div class="col-6">Diskon</div>
                                    <div class="col-6">Rp 10000</div>
                                </div>
                            </td>
                            <td class="w-2 text-center">
                                <span class="bold">1kg</span>
                            </td>
                            <td class="w-2 text-center">
                                <span class="bold">REG</span>
                            </td>
                            <td class="w-2 text-center">
                                <span class="bold">Tunai</span>
                            </td>
                            <td class="w-2 text-center">
                                <span class="bold">Non-COD</span>
                            </td>
                            <td rowspan="2">
                                <div class="qr-code">
                                    <?php echo DNS2D::getBarcodeSVG('https://www.wilanexpress.com/goToTrack?awb=MTL0101222222', 'QRCODE', 5, 5, true); ?>
                                </div>
                            </td>
                        </tr>
                        <tr class="bold">
                            <td colspan="3" style="vertical-align: middle;">
                                <div class="row">
                                    <div class="col-3">Tujuan <span class="float-right">:</span></div>
                                    <div class="col-9">Tangerang Jawa Barat</div>
                                </div>
                                <div class="row">
                                    <div class="col-3">Estimasi <span class="float-right">:</span></div>
                                    <div class="col-9">2 - 3 Hari</div>
                                </div>
                                <div class="row">
                                    <div class="col-3">Informasi <span class="float-right">:</span></div>
                                    <div class="col-9">Barang pecah belah jangan dibanting</div>
                                </div>
                            </td>
                            <td class="text-center">
                                <h4 class="bold">Total Biaya</h4>
                                <h3 class="bold">Rp 20000</h3>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>