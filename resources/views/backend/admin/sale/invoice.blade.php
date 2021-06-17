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
            background: #FFFFFF;
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
            margin-top: -10px;
            font-weight: 500;
            text-transform: uppercase;
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

            <table width="100%" style="
							    background: #2c0b75;
							">
                <tr>
                    <td align="left" style="width: 50%;vertical-align: middle;">
                        <img src="{{ asset('/backend/') }}/logo.png" style="
											    background: #fff;
											    padding: 5px 10px;
											    margin: 18px 10px 10px;
											    width: 200px!important;

											">
                    </td>
                    <td align="left" style="width: 50%;vertical-align: middle;">
                        <h2>Invoice</h2>
                    </td>
                </tr>
            </table>

            <table width="100%">
                <tr class="three">
                    <td align="left" style="width: 50%;vertical-align: top;">
                        <h5>
                            @if($invoice->sale->invoice_no)
                            INVOICE NO: #{{ $invoice->sale->invoice_no }}
                            @endif
                        </h5>
                    </td>
                    <td align="right" style="width: 50%;vertical-align: top;">
                        <h5>DATE: {{ date('m-d-Y', strtotime($invoice->created_at)) }}</h5>
                    </td>
                </tr>
            </table>

            <table width="100%">
                <tr class="three">
                    <td align="left" style="width: 60%;vertical-align: top;">
                        <h5 style="
									    margin-top: 0;color: #2c0b75;
									">SELLER DETAILS</h5>
                        <p>COMPANY NAME: DIPLOMACY KEY</p>
                        <p>CONTACT NUMBER: +971566668084</p>
                        <p>ADDRESS: DUBAI, UAE</p>
                    </td>
                    <td align="left" style="width: 40%;vertical-align: top;">
                        <h5 style="
								    margin-top: 0;color: #2c0b75;
								">CUSTOMER DETAILS</h5>
                        <p>
                            @if(isset($invoice->customer->name))
                            NAME: {{ $invoice->customer->name }}
                            @endif
                        </p>
                        <p>
                            @if(isset($invoice->customer->mobile_no_one))
                            CONTACT NUMBER: {{ $invoice->customer->mobile_no_one }}
                            @endif
                        </p>
                        <p>
                            @if(isset($invoice->customer->address_one))
                            ADDRESS: {{ $invoice->customer->address_one }}
                            @endif
                        </p>
                    </td>
                </tr>
            </table>

            <table class="table table-bordered" width="100%">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">PRODUCT NAME </th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">SKU</th>
                    <th scope="col">QUANTITY</th>
                    <th scope="col">UNIT PRICE</th>
                    <th scope="col">TOTAL PRICE</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row" style="text-transform: capitalize">{{ isset($invoice->product) ? $invoice->product->name : '' }}</th>
                    <td style="width: 10%;"><img src="{{ asset('/product/'.$invoice->product->image) }}" style="height: 50px; width: 50px;"></td>
                    <td>{{ isset($invoice->product) ? $invoice->product->sku : '' }}</td>
                    <td>{{ isset($invoice->product) ? $invoice->product->qty : '' }}</td>
                    <td>${{ isset($invoice->product) ? $invoice->product->sale_price : '' }}</td>
                    <td>
                        @if(isset($invoice->product->qty) && isset($invoice->product->sale_price))
                        ${{ $grandTotal = $invoice->product->qty * $invoice->product->sale_price }}
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>

            <table width="100%">
                <tr class="three">
                    <td align="left" style="width: 65%;vertical-align: top;">

                    </td>
                    <td align="left" style="width: 35%;vertical-align: top;">
                        <h5 style="margin: 8px 0px;">SUB TOTAL: <span style="
												    float: right;
												    color: #2c0b75;
												">${{ $grandTotal }}</span></h5>
                        <h5 style="margin: 8px 0px;">SHIPPING CHARGE: <span style="
													    float: right;
													    color: #2c0b75;
													">$00</span></h5>
                        <h5 style="margin: 8px 0px;">TOTAL: <span style="
													    float: right;
													    color: #2c0b75;
													">${{ $grandTotal }}</span></h5>
                    </td>
                </tr>
            </table>

            <table width="100%" style="padding-top: 40px;">
                <tr class="three">
                    <td align="left" style="width: 30%;vertical-align: top;">
                        <h5 style="margin: 8px 0px;">
                            @if(isset($invoice->sale->created_by))
                                {{ $invoice->sale->created_by }}
                            @else
                                Diplomacy Key
                            @endif
                        </h5>
                        <h5 style="
									    border-top: 2px solid #676666;
									    padding-top: 8px; margin: 0;
									">SELLER'S SIGNATURE</h5>
                        <h5 style="margin: 8px 0px;">
                            @if(isset($invoice->sale->created_at))
                            DATE: {{ date('m-d-Y', strtotime($invoice->sale->created_at)) }}
                            @endif
                        </h5>
                    </td>

                    <td align="left" style="width: 30%;vertical-align: top;"></td>

                    <td align="left" style="width: 30%; margin: 8px 0px;">

                        <h5 style="margin: 8px 0px;">
                            @if($invoice->customer)
                            {{ $invoice->customer->name }}
                            @else
                                DiplomacyKey
                            @endif
                        </h5>
                        <h5 style="
									    border-top: 2px solid #676666;
									    padding-top: 8px;margin: 0;
									">CUSTOMER'S SIGNATURE</h5>
                        <h5 style="margin: 8px 0px;">
                            @if(isset($invoice->sale->created_at))
                            DATE: {{ date('m-d-Y', strtotime($invoice->sale->created_at)) }}
                            @endif
                        </h5>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</section>

</body>
</html>
