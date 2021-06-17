@extends('backend.admin.master')

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <span style="font-size: 1.25rem; color: black">Cash Book</span>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Date</th>
                                                <th>Cash In</th>
                                                <th>Cash Out</th>
                                                <th>Balance</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php($cashInSum = 0)
                                            @php($cashOutSum = 0)
                                                @foreach($cash as $key => $data)
                                                    @foreach($data as $info)
                                                    <tr>
                                                        <td>#</td>
                                                        <td>{{ date('d-m-y', strtotime($info->sale_date)) }}</td>
                                                        <td>{{ $totalCashIn = $info->cash_in }}</td>
                                                        <td>{{ $totalCashOut = $info->cash_out }}</td>
                                                        <td>{{ $info->cash_in - $info->cash_out }}</td>
                                                    </tr>
                                                    <?php $cashInSum = $cashInSum+$totalCashIn; ?>
                                                    <?php $cashOutSum = $cashOutSum+$totalCashOut; ?>
                                                    @endforeach
                                                @endforeach
                                            </tbody>
                                            <thead class="table table-dark">
                                            <tr style="width: 90px;">
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col"> Cash In : {{ $cashInSum }}</th>
                                                <th scope="col"> Cash out : {{ $cashOutSum }}</th>
                                                <th scope="col"> Balance : {{ $cashInSum - $cashOutSum }}</th>
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
@endsection
