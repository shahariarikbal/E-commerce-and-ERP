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
{{--                            <a href="{{ url('/purchase/excel/export') }}" class="btn btn-primary" title="Download Excel">--}}
{{--                                <img src="{{ asset('/backend/assets/excel.png') }}" style="height: 20px; width: 20px;">--}}
{{--                            </a>--}}
{{--                            <a href="{{ url('/purchase/csv/export') }}" class="btn btn-dark" title="Download CSV">--}}
{{--                                <img src="{{ asset('/backend/assets/csv.png') }}" style="height: 20px; width: 20px;">--}}
{{--                            </a>--}}
{{--                            <a href="{{ url('/purchase/pdf/export') }}" class="btn btn-warning" title="Download PDF">--}}
{{--                                <img src="{{ asset('/backend/assets/pdf.jpg') }}" style="height: 20px; width: 20px;">--}}
{{--                            </a>--}}
{{--                        </div>--}}
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <span style="font-size: 1.25rem; color: black">Purchase List</span>
                                    <a href="{{ url('/purchase/create') }}" class="btn btn-success float-right" style="margin-right: 15px;"> Add Purchase</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Date</th>
                                                <th>Received By</th>
                                                <th>Supplier Name</th>
                                                <th>Invoice No</th>
                                                <th>Total Amount</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php($i = 1)
                                            @foreach($purchase as $item)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($item->purchase_date)) }}</td>
                                                    <td>{{ $item->created_by }}</td>
                                                    <td>
                                                        @if(isset($item->supplier->name))
                                                        {{ $item->supplier->name }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->invoice_no }}</td>
                                                    <td>{{ $item->net_total }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a href="{{ url('/purchase/edit/'.$item->id) }}" title="Purchase Edit" class="dropdown-item btn btn-sm btn-success">
                                                                    Edit
                                                                </a>
                                                                <a href="{{ url('/purchase/invoice/'.$item->id) }}" title="Purchase Invoice" class="dropdown-item btn btn-sm btn-info">
                                                                    Invoice
                                                                </a>
                                                                <a href="{{ url('/purchase/delete/'.$item->id) }}" title="Delete Purchase" class="dropdown-item btn btn-sm btn-danger">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
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
