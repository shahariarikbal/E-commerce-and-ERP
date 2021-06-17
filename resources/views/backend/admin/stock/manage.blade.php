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
{{--                            <a href="#" class="btn btn-primary" title="Download Excel" data-toggle="modal" data-target="#modalExcel">--}}
{{--                                <img src="{{ asset('/backend/assets/excel.png') }}" style="height: 20px; width: 20px;">--}}
{{--                            </a>--}}
{{--                            <a href="#" class="btn btn-dark" title="Download CSV" data-toggle="modal" data-target="#modalCsv">--}}
{{--                                <img src="{{ asset('/backend/assets/csv.png') }}" style="height: 20px; width: 20px;">--}}
{{--                            </a>--}}
{{--                            <a href="#" class="btn btn-warning" title="Download PDF" data-toggle="modal" data-target="#modalPdf">--}}
{{--                                <img src="{{ asset('/backend/assets/pdf.jpg') }}" style="height: 20px; width: 20px;">--}}
{{--                            </a>--}}
{{--                        </div>--}}
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <span style="font-size: 1.25rem; color: black">Stock List</span>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Product Name</th>
                                                <th>Product Model</th>
                                                <th>Sales Price</th>
                                                <th>Purchase Price</th>
                                                <th>In Qty</th>
                                                <th>Out Qty</th>
                                                <th>Net Stock</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php($sum = 0)
                                            @foreach($stockes as $key => $stocke)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>
                                                        @if($stocke->products)
                                                            {{ isset($stocke->products) ? $stocke->products->name : null }}
                                                        @else
                                                            {{ isset($stocke->accessories) ? $stocke->accessories->name : null }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($stocke->products)
                                                            {{ isset($stocke->products) ? $stocke->products->product_model : null }}
                                                        @else
                                                            {{ isset($stocke->accessories) ? $stocke->accessories->model : null }}
                                                        @endif
                                                    </td>
                                                    <td>{{ isset($stocke->sales_price) ? number_format($stocke->sales_price, 2) : 0 }}</td>
                                                    <td>{{ isset($stocke->purchase_price) ? number_format($stocke->purchase_price, 2) : 0 }}</td>
                                                    <td>{{ isset($stocke->in_qty) ? $stocke->in_qty : 0 }}</td>
                                                    <td>{{ isset($stocke->out_qty) ? $stocke->out_qty : 0 }}</td>
                                                    <td>{{ $grandTotal = $stocke->in_qty - $stocke->out_qty }}</td>
                                                </tr>
                                                <?php $sum = $sum+$grandTotal; ?>
                                            @endforeach
                                            </tbody>
                                            <thead class="table table-dark">
                                            <tr style="width: 90px;">
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col">Total Net Stock</th>
                                                <th scope="col"> {{ $sum }}</th>
                                            </tr>
                                            </thead>
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
    <!-- Modal -->
    <div id="modalExcel" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Excel Download</h4>
                </div>
                <div class="modal-body">
                    <h6>Need to Know how to Formatted and Serialize Data in Excel.</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!--CSV Modal-->
    <div id="modalCsv" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">CSV Download</h4>
                </div>
                <div class="modal-body">
                    <h6>Need to Know how to Formatted and Serialize Data in CSV.</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!--PDF Modal-->
    <div id="modalPdf" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">PDF Download</h4>
                </div>
                <div class="modal-body">
                    <h6>Need to Know how to Formatted and Serialize Data in PDF.</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
@endsection
