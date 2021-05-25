<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{asset('css/receipt.css')}}" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('css/no_print.css')}}" media="print">
    <title>Restaurant App : Receipt - SaleID : {{$sale->id}}</title>
</head>

<body>
    <div id="wrapper">
        <div id="receipt-header">
            <h3 id="restaurant-name">Restaurant App Devtamin</h3>
            <p>Address : 341 N Vakanda Ave </p>
            <p>Analpolis ,Md 12345</p>
            <p>Tel : 473-XXX-XXX</p>
            <p>Reference Receipt : <strong>{{$sale->id}}</strong></p>
        </div>
        <div id="receipt-body">
            <table class="tb-sale-detail">

                <thead>
                <tr>
                    <th >#</th>
                    <th >Menu</th>
                    <th >Qty</th>
                    <th >Price</th>
                    <th >Total</th>

                </tr>
                </thead>
                <tbody>
                @foreach($saleDetails as $saleDetail)
                    <tr>
                        <td width="30">{{$saleDetail->menu_id}}</td>
                        <td width="30">{{$saleDetail->menu_name}}</td>
                        <td width="30">{{$saleDetail->quantity}}</td>
                        <td width="30">{{$saleDetail->menu_price}}</td>
                        <td width="30">{{$saleDetail->menu_price * $saleDetail->quantity }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="tb-sale-total">
                <tbody>
                <tr>
                    <td>Total Quantity</td>
                    <td>{{$saleDetails->count()}}</td>
                    <td>Total</td>
                    <td>{{number_format($sale->total_price,2)}}</td>
                </tr>
                <tr>
                    <td>Payment Type</td>
                    <td>{{$sale->payment_type}}</td>
                </tr>
                <tr>
                    <td>Paid Amount</td>
                    <td>{{number_format($sale->total_received,2)}}</td>
                </tr>
                <tr>
                    <td>Change</td>
                    <td>{{number_format($sale->change,2)}}</td>
                </tr>
                </tbody>

            </table>
        </div>
        <div id="receipt-footer">
            <p>Thank you !!</p>
        </div>
       <div id="buttons">
          <a href="/cashier">
              <button class="btn btn-back">
                  Back to Cashier
              </button>
          </a>
           <button class="btn btn-print" type="button" onclick="window.print(); return false;">Print</button>

       </div>




    </div>
</body>
</html>



