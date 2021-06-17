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
                        <h5>INVOICE NO: #{{ isset($customer->invoice_no) ? $customer->invoice_no : '' }}</h5>
                    </td>
                    <td align="right" style="width: 50%;vertical-align: top;">
                        <h5>DATE: {{ date('m-d-Y', strtotime( isset($customer->created_at) ? $customer->created_at : '')) }}</h5>
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
                        <p>NAME: {{ $customer->name }}</p>
                        <p>CONTACT NUMBER: {{ $customer->mobile_no_one }}</p>
                        <p>ADDRESS: {{ $customer->address_one }}</p>
                    </td>
                </tr>
            </table>

            <table class="table table-bordered" width="100%">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">NET TOTAL</th>
                    <th scope="col">DEBIT</th>
                    <th scope="col">CREDIT</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ isset($customer->net_total) ? $customer->net_total : '' }}</td>
                    <td>${{ isset($customer->paid_amount) ? $customer->paid_amount : '' }}</td>
                    <td>
                        @if(isset($customer->net_total) && isset($customer->paid_amount))
                        ${{ $grandTotal = $customer->net_total - $customer->paid_amount }}
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
												">${{ isset($grandTotal) ? $grandTotal : '' }}</span></h5>
                        <h5 style="margin: 8px 0px;">SHIPPING CHARGE: <span style="
													    float: right;
													    color: #2c0b75;
													">$00</span></h5>
                        <h5 style="margin: 8px 0px;">TOTAL: <span style="
													    float: right;
													    color: #2c0b75;
													">${{ isset($grandTotal) ? $grandTotal : '' }}</span></h5>
                    </td>
                </tr>
            </table>

            <table width="100%" style="padding-top: 40px;">
                <tr class="three">
                    <td align="left" style="width: 30%;vertical-align: top;">
                        <h5 style="margin: 8px 0px;">
                            @if(isset($customer->created_by))
                                {{ $customer->created_by }}
                            @else
                                Diplomacy Key
                            @endif
                        </h5>
                        <h5 style="
									    border-top: 2px solid #676666;
									    padding-top: 8px; margin: 0;
									">SELLER'S SIGNATURE</h5>
                        <h5 style="margin: 8px 0px;">DATE: {{ date('m-d-Y', strtotime($customer->created_at)) }}</h5>
                    </td>

                    <td align="left" style="width: 30%;vertical-align: top;"></td>

                    <td align="left" style="width: 30%; margin: 8px 0px;">

                        <h5 style="margin: 8px 0px;">{{ isset($customer->name) ? $customer->name : '' }}</h5>
                        <h5 style="
									    border-top: 2px solid #676666;
									    padding-top: 8px;margin: 0;
									">CUSTOMER'S SIGNATURE</h5>
                        <h5 style="margin: 8px 0px;">DATE: {{ isset($customer->created_at) ? date('m-d-Y', strtotime($customer->created_at)) : '' }}</h5>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</section>

</body>
</html>
