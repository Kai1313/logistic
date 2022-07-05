<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Invoice Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/lte/dist/css/adminlte.min.css') }}">
</head>
<body>
<div class="wrapper">
    <section class="invoice">
      <div class="row">
        <div class="col-12">
          <h2 class="page-header">
            <i class="fas fa-globe"></i> {{ $setting["name"]->setting_value }}
            <small class="float-right">Date: {{ date('d/m/Y', strtotime($invoice->invoice_date)) }}</small>
          </h2>
        </div>
      </div>
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>{{ $setting["name"]->setting_value }}</strong><br>
            {{ $setting["address"]->setting_value }}<br>
            Phone: {{ $setting["phone"]->setting_value }}<br>
            {{-- Email: info@almasaeedstudio.com --}}
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong>{{ $agent->agent_name }}</strong><br>
            {{ $agent->agent_address }}<br>
            Phone: {{ $agent->agent_phone }}<br>
            {{-- Email: john.doe@example.com --}}
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
          <b>Invoice {{ $invoice->invoice_code }}</b><br>
          <br>
          {{-- <b>Order ID:</b> 4F3S8J<br>
          <b>Payment Due:</b> 2/22/2014<br>
          <b>Account:</b> 968-34567 --}}
        </div>
      </div>

      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Qty</th>
                <th>Product</th>
                <th>Description</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>{{ $airwaybill->awb_code }}</td>
                <td>{{ $invoice->invoice_information }}</td>
                <td>Rp {{ $invoice->invoice_amount }}</td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
  
      <div class="row">
        {{-- <div class="col-6">
          <p class="lead">Payment Methods:</p>
          <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
  
          <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
            jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>
        </div> --}}
        <div class="offset-6 col-6">
          {{-- <p class="lead">Amount Due 2/22/2014</p> --}}
  
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>Rp {{ number_format($invoice->invoice_amount, 2) }}</td>
              </tr>
              <tr>
                <th>Tax (10%)</th>
                <td>Rp 0.00</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>Rp {{ number_format($invoice->invoice_total, 2) }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </section>
</div>
<script>
    window.addEventListener("load", window.print());
</script>
</body>
</html>