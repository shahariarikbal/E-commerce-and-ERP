@extends('backend.admin.master')

@section('style')
    <style>
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: #3e8e41;}

        .icon-bar {
            position: fixed;
            top: 40%;
            right: 77%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .icon-bar a {
            display: block;
            text-align: center;
            padding: 10px;
            transition: all 0.3s ease;
            color: white;
            font-size: 20px;
        }

        .icon-bar a:hover {
            background-color: #000;
        }

        .facebook {
            background: #000;
            color: white;
        }

        .twitter {
            background: #fe5d70;
            color: white;
        }

        .google {
            background: greenyellow;
            color: white;
        }

        .linkedin {
            background: #007bb5;
            color: white;
        }

        .youtube {
            background: #bb0000;
            color: white;
        }

        .content {
            margin-left: 75px;
            font-size: 30px;
        }
    </style>
@endsection

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
{{--                        <div class="icon-bar" style="z-index: 9999;">--}}
{{--                            <a href="{{ url('/sale/excel/export') }}" class="btn btn-primary" title="Download Excel">--}}
{{--                                <img src="{{ asset('/backend/assets/excel.png') }}" style="height: 20px; width: 20px;">--}}
{{--                            </a>--}}
{{--                            <a href="{{ url('/sale/csv/export') }}" class="btn btn-dark" title="Download CSV">--}}
{{--                                <img src="{{ asset('/backend/assets/csv.png') }}" style="height: 20px; width: 20px;">--}}
{{--                            </a>--}}
{{--                            <a href="{{ url('/sale/pdf/export') }}" class="btn btn-warning" title="Download PDF">--}}
{{--                                <img src="{{ asset('/backend/assets/pdf.jpg') }}" style="height: 20px; width: 20px;">--}}
{{--                            </a>--}}
{{--                        </div>--}}
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <span style="font-size: 1.25rem; color: black">Today Sales Report</span>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Sales Date</th>
                                                <th>Invoice No</th>
                                                <th>Customer Name</th>
                                                <th>Total Amount</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php($i = 1)
                                            @php($sum = 0)
                                            @foreach($sales as $item)
                                                @foreach($item->saleProduct as $key => $info)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ date('d-m-Y', strtotime($item->sale_date)) }}</td>
                                                        <td>{{ $item->invoice_no }}</td>
                                                        <td>{{ $item->customer->name }}</td>
                                                        <td>{{ $totalPrice = $info->total }}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Action
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a href="{{ url('/today/sale/pdf/'.$item->id) }}" title="Sale Pdf" class="dropdown-item btn btn-sm btn-success">
                                                                        PDF
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $sum = $sum+$totalPrice ?>
                                                @endforeach
                                            @endforeach
                                            </tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Total Price : {{ number_format($sum,2) }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
