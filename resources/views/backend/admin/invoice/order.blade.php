<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">

    <style type="text/css">

        /* Google Fonts */
        @import url('https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900|Poppins:100,200,300,400,500,600,700,800,900&display=swap');
        /* Global CSS */
        html{
            scroll-behavior: smooth;
        }
        body{
            background: #ffffff;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            color: #333333;
        }
        h1, h2, h3, h4, h5, h6{
            font-family: 'Montserrat', sans-serif;
        }
        p{
            font-family: 'Poppins', sans-serif;
            color: #333333;
        }
        .img-fluid{
            max-width: 100%;
            height: auto;
        }

        .section-one{
            background: #fff;
            width: 700px;
            display: block;
            margin: 0 auto;
            margin-top: 60px;
            padding: 50px;
        }
        .one{
            padding: 10px 35px 0px 35px;
        }
        .section-one p{
            color: #676666;
            font-size: 13px;
            margin-top: -15px;
        }
        .section-one h2{
            font-size: 36px;
            text-transform: uppercase;
            font-weight: 700;
            color: #fff;
            text-align: right;
            padding: 15px 10px;
            margin: 0;
        }

        .section-one .two h1{
            color: #283592;
            font-size: 40px;
            font-weight: 800;
            margin-bottom: 0;
            padding-left: 0;
            margin-top: 0px;
        }
        .section-one .two p{
            color: #ec3485;
            font-weight: 700;
            font-size: 14px;
            margin: 0px;
        }
        .section-one .two .service{
            color: #434343;
            font-weight: 700;
        }
        .section-one .three p{
            color: #434343;
            font-size: 13px;
            margin-top: -2px;
            font-weight: 500;
        }
        .section-one .pad h4{
            margin-top: 0px;
        }
        .section-two{
            background: #fff;
            width: 800px;
            display: block;
            margin: 0 auto;
            padding: 0px 50px 30px 50px;
        }
        .two{
            padding: 0px 35px;
        }
        .section-two h2{
            color: #283592;
            font-size: 40px;
            font-weight: 800;
            margin-bottom: 0;
        }
        .section-two p{
            color: #ec3485;
            font-weight: 700;
            font-size: 14px;
        }
        .section-two .serv{
            margin-bottom: 0;
        }
        .section-two .service{
            color: #434343;
            font-weight: 700;
        }

        .table .thead-dark th {
            font-size: 14px;
            background: #2c0b75;
            color: #fff;
            padding: 8px 0px;
        }
        .table-bordered th {
            font-size: 14px;
            padding: 10px 0px;
            color: #2c0b75;
        }
        .table-bordered td {
            font-size: 14px;
            color: #2c0b75;
        }
        .table-bordered th {
            border: 1px solid #dee2e6;
            text-align: center;
        }
        .table-bordered td {
            border: 1px solid #dee2e6;
            text-align: center;
        }
        .table .thead-dark th {
            font-size: 14px;
        }
        .table-bordered th {
            font-size: 14px;
            font-weight: 500;
        }
        .table-bordered td {
            font-size: 14px;
            font-weight: 500;
        }


        .section-one .four p{
            color: #676666;
            font-size: 13px;
            margin-top: -15px;
        }
        .section-one .four h5{
            margin-top: -15px;
        }

        @media (max-width: 767.98px){
            .section-one{
                padding: 30px 10px 0px 10px;
                width: 100%;
                margin-top: 0px;
            }
            .section-one .col-md-2{
                width: 0%;
            }

            .one {

                padding: 20px 0px 0px 0px;
            }
            .section-one img {
                width: 200px;
                padding-bottom: 15px;
            }
            .section-one h2 {
                font-size: 19px;
            }

            .two {
                padding: 0px 0px;
            }


            .table .thead-dark th {
                font-size: 12px;
            }
            .table-bordered th {
                font-size: 12px;
            }
            .table-bordered {
                margin-left: -5px;
            }


        }

    </style>

</head>

<body>

<section class="section-one">
    <div class="container">
        <div class="row one">

            <table width="100%">
                <tr>
                    <td align="center">
                        <img src="{{ asset('/fontend/') }}/logo.png" height="40" width="" class="">
                    </td>
                </tr>
            </table>
            <table width="100%" style="
                                                    background: #eeefef;
                                                    padding: 10px 5px 5px 5px;
                                                ">
                <tr>
                    <td align="left" style="width: 40%">
                        <h1 style="margin: 0; color: #2c0b75; font-size: 28px;">Diplomacy Key LLC</h1>
                    </td>
                    <td align="center" style="width: 20%">
                        <img src="{{ asset('/fontend/') }}/favicon.PNG" height="30" width="30" class="" style="width: 33%;">
                    </td>
                    <td align="left" style="width: 40%">
                        <h1 style="margin: 0; color: #2c0b75; font-size: 28px;">Billing Invoice</h1>
                    </td>
                </tr>
            </table>

            <table width="100%" style="padding-top: 25px;">
                <tr class="three">
                    <td align="left" style="width: 25%;vertical-align: top;">
                        <h5 style="margin-top: 0;color: #2c0b75; text-transform: uppercase;
									">Company Address:</h5>
                    </td>
                    <td align="left" style="width: 40%;vertical-align: top;">
                        <p>21/C, Ace Building, Dubai, Ubited Arab Emirates</p>
                    </td>
                    <td align="left" style="width: 15%;vertical-align: top;">
                        <h5 style="margin-top: 0;color: #2c0b75; text-transform: uppercase;
                                    ">INVOICE NO:</h5>
                    </td>
                    <td align="left" style="width: 35%;vertical-align: top;">
                        <p>#{{ $customer->customer->invoice_no }}</p>
                    </td>
                </tr>
            </table>

            <table width="100%">
                <tr class="three">
                    <td align="left" style="width: 25%;vertical-align: top;">
                        <h5 style="margin-top: 0;color: #2c0b75; text-transform: uppercase;
                                    ">CONTACT NUMBER:</h5>
                    </td>
                    <td align="left" style="width: 40%;vertical-align: top;">
                        <p>9978873838833</p>
                    </td>
                    <td align="left" style="width: 15%;vertical-align: top;">
                        <h5 style="margin-top: 0;color: #2c0b75; text-transform: uppercase;
                                    ">DATE:</h5>
                    </td>
                    <td align="left" style="width: 35%;vertical-align: top;">
                        <p>{{ date('d/m/Y', strtotime($customer->created_at)) }}</p>
                    </td>
                </tr>
            </table>

            <table width="100%">
                <tr class="three">
                    <td align="left" style="width: 25%;vertical-align: top;">
                        <h5 style="margin-top: 0;color: #2c0b75; text-transform: uppercase;
                                    ">EMAIL:</h5>
                    </td>
                    <td align="left" style="width: 40%;vertical-align: top;">
                        <p>admin@dkcc.com</p>
                    </td>
                    <td align="left" style="width: 15%;vertical-align: top;">
                        <h5 style="margin-top: 0;color: #2c0b75; text-transform: uppercase;
                                    ">CURRENCY:</h5>
                    </td>
                    <td align="left" style="width: 35%;vertical-align: top;">
                        <p>USD</p>
                    </td>
                </tr>
            </table>

            <table width="100%" style="background: #eeefef; padding: 10px 0px">
                <tr>
                    <td align="left" style="">

                    </td>
                </tr>
            </table>

            <table width="100%" style="padding-top: 25px;">
                <tr class="three">
                    <td align="left" style="width: 25%;vertical-align: top;">
                        <h5 style="margin-top: 0;color: #2c0b75; text-transform: uppercase;
                                    ">BILL TO:</h5>
                    </td>
                    <td align="left" style="width: 40%;vertical-align: top;">
                        <p>21/C, Ace Building, Dubai, Ubited Arab Emirates</p>
                    </td>
                    <td align="left" style="width: 15%;vertical-align: top;">
                        <h5 style="margin-top: 0;color: #2c0b75; text-transform: uppercase;
                                    ">SHIP TO:</h5>
                    </td>
                    <td align="left" style="width: 35%;vertical-align: top;">
                        <p>Dubai, Ubited Arab Emirates</p>
                    </td>
                </tr>
            </table>

            <table width="100%">
                <tr class="three">
                    <td align="left" style="width: 25%;vertical-align: top;">
                        <h5 style="margin-top: 0;color: #2c0b75; text-transform: uppercase;
                                    ">CONTACT NO:</h5>
                    </td>
                    <td align="left" style="width: 40%;vertical-align: top;">
                        <p>9978873838833</p>
                    </td>
                    <td align="left" style="width: 15%;vertical-align: top;">
                        <h5 style="margin-top: 0;color: #2c0b75; text-transform: uppercase;
                                    ">CONTACT:</h5>
                    </td>
                    <td align="left" style="width: 35%;vertical-align: top;">
                        <p>9978873838833</p>
                    </td>
                </tr>
            </table>

            <table width="100%">
                <tr class="three">
                    <td align="left" style="width: 25%;vertical-align: top;">
                        <h5 style="margin-top: 0;color: #2c0b75; text-transform: uppercase;
                                    ">EMAIL:</h5>
                    </td>
                    <td align="left" style="width: 40%;vertical-align: top;">
                        <p>admin@dkcc.com</p>
                    </td>
                    <td align="left" style="width: 15%;vertical-align: top;">
                        <h5 style="margin-top: 0;color: #2c0b75; text-transform: uppercase;
                                    ">EMAIL:</h5>
                    </td>
                    <td align="left" style="width: 35%;vertical-align: top;">
                        <p>admin@dkcc.com</p>
                    </td>
                </tr>
            </table>

            <table class="table table-bordered" width="100%">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">SI</th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">SKU</th>
                    <th scope="col">ITEM</th>
                    <th scope="col">QTY</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">AMOUNT</th>
                </tr>
                </thead>
                <tbody>
                @php($total = 0)
                @php($shipping = 0)
                @php($tax = 0)
                @foreach($orderInvoice as $key => $invoice)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td style="width: 10%;"><img src="{{ asset('/product/'.$invoice->product->image) }}" height="100" width="100" class="img-fluid"></td>
                    <td>{{ $invoice->product->sku }}</td>
                    <th scope="row">{{ $invoice->product_name }}</th>
                    <td>{{ $invoice->product_qty }}</td>
                    <td>${{ $invoice->product_price }}</td>
                    <td>${{ $totalSum = $invoice->product_qty * $invoice->product_price }}</td>
                </tr>
                <?php $total = $total+$totalSum; ?>
                <?php $shipping = $shipping+$invoice->product->shipping_cost; ?>
                <?php $tax = $tax+$invoice->product->tax; ?>

                <?php $netChargeTotal = $total + $shipping + $tax; ?>
                @endforeach
                </thead>
                </tbody>
            </table>
            <br/>
            <table width="100%">
                <tr class="three">
                    <td align="left" style="width: 65%;vertical-align: top;">
                        <p style="padding-top: 10px;">NOTE: <span>Something</span></p>
                    </td>
                    <td align="right" style="width: 35%;vertical-align: top;">
                        <h5 style="margin: 8px 0px;">TOTAL CHARGE: <span style="
												    margin-left: 80px;
												    color: #2c0b75;
												">${{ number_format($total,2) }}</span></h5>
                        <h5 style="margin: 8px 0px;">SHIPPING CHARGE: <span style="
													    margin-left: 75px;
													    color: #2c0b75;
													">${{ number_format($shipping,2) }}</span></h5>
                        <h5 style="margin: 8px 0px;">TAX: <span style="
                                                        margin-left: 175px;
                                                        color: #2c0b75;
                                                    ">${{ number_format($tax,2) }}</span></h5>
                        <h5 style="margin: 8px 0px;">NET TOTAL CHARGE: <span style="
                                                        margin-left: 65px;
                                                        color: #2c0b75;
                                                    ">${{ number_format($netChargeTotal,2) }}</span></h5>
                        <h5 style="margin: 8px 0px;">PAID: <span style="
                                                        margin-left: 170px;
                                                        color: #2c0b75;
                                                    ">${{ number_format($netChargeTotal,2) }}</span></h5>
                        <h5 style="margin: 8px 0px;">DUE: <span style="
                                                        margin-left: 175px;
                                                        color: #2c0b75;
                                                    ">${{ $netChargeTotal - $total }}</span></h5>
                        <h5 style="margin: 8px 0px;border-top: 1px solid #434343;padding-top: 5px;">TOTAL BILL: <span style="
													    margin-left: 110px;
													    color: #2c0b75;
													">${{ number_format($netChargeTotal,2) }}</span></h5>
                    </td>
                </tr>
            </table>

            <table width="100%" style="padding-top: 40px;">
                <tr class="three">
                    <td align="left" style="width: 30%;vertical-align: top;">
                        <h5 style="margin: 8px 0px;">Diplomacy Key</h5>
                        <h5 style="
									    border-top: 2px solid #676666;
									    padding-top: 8px; margin: 0;
									">SELLER'S SIGNATURE</h5>
                        <h5 style="margin: 8px 0px;">DATE: 20-02-2021</h5>
                    </td>

                    <td align="left" style="width: 30%;vertical-align: top;"></td>

                    <td align="left" style="width: 30%; margin: 8px 0px;">

                        <h5 style="margin: 8px 0px;">Customer</h5>
                        <h5 style="
									    border-top: 2px solid #676666;
									    padding-top: 8px;margin: 0;
									">CUSTOMER'S SIGNATURE</h5>
                        <h5 style="margin: 8px 0px;">DATE: 20-02-2021</h5>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</section>

</body>
</html>
