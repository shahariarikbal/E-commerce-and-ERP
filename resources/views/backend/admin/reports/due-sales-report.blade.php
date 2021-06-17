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
                                    <span style="font-size: 1.25rem; color: black">Due Sales Report</span>
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
                                                <th>Paid Amount</th>
                                                <th>Due Amount</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($salesDueReport as $key => $salesReport)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ date('Y/m/d', strtotime($salesReport->created_at)) }}</td>
                                                        <td>{{ $salesReport->invoice_no }}</td>
                                                        <td>{{ isset($salesReport->customer->name) ? $salesReport->customer->name : '' }}</td>
                                                        <td>{{ $netTotal = number_format($salesReport->net_total,2) }}</td>
                                                        <td>{{ $paidAmount = number_format($salesReport->paid_amount,2) }}</td>
                                                        <td>{{ number_format($salesReport->due_amount,2) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
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
