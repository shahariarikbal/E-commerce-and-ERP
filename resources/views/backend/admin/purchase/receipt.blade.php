<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">

    <style type="text/css">
        @page { margin: 0px; padding: 0px; }
        /* Google Fonts */
        /*@import url('https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900|Poppins:100,200,300,400,500,600,700,800,900&display=swap');*/
        /* Global CSS */
        html{
            scroll-behavior: smooth;
        }
        body{
            background: white;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            color: #333333;
            height: 100%;
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
            padding: 30px 50px 20px 50px;
        }
        .one{
            border-top: 6px solid #e69138;
            padding: 10px 35px 0px 35px;
        }
        .section-one p{
            color: #676666;
            font-size: 13px;
            margin-top: -15px;
        }
        .section-one h2{
            font-size: 15px;
            vertical-align: middle;
            text-transform: uppercase;
            font-weight: 700;
            font-family: "Helvetica Neue", sans-serif;
            padding-left: 20px;
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
            color: #676666;
            font-size: 13px;
            margin-top: -10px;
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
            background: #343a40;
            color: #fff;
            padding: 8px 0px;
        }
        .table-bordered th {
            font-size: 14px;
            padding: 10px 0px;
        }
        .table-bordered td {
            font-size: 14px;
            padding: 10px 0px;
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
        }
        .table-bordered td {
            font-size: 14px;
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
                border-top: 6px solid #e69138;
                padding: 10px 0px 0px 0px;
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
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
<section class="section-one">
    <div class="container">
        <table style="width: 100%; border: 1px solid #000000">
            <tr style="width: 100%">
                <td>SL</td>
                <td>Date</td>
                <td>Type</td>
                <td>Invoice No</td>
                <td>Tax</td>
                <td>Vat</td>
                <td>Shipping Cost</td>
                <td>Misc Cost</td>
                <td>Grand Total</td>
            </tr>
            @foreach($purchases as $key => $purchase)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $purchase->purchase_date }}</td>
                <td>{{ $purchase->types }}</td>
                <td>{{ $purchase->invoice_no }}</td>
                <td>{{ $purchase->tax }}</td>
                <td>{{ $purchase->vat }}</td>
                <td>{{ $purchase->shipping_cost }}</td>
                <td>{{ $purchase->misc_cost }}</td>
                <td>{{ $purchase->grand_total }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</section>
</body>
</html>
