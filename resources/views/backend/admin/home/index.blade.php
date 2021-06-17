@extends('backend.admin.master')

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card bg-c-pink">
                                            <div class="card-header"><span style="font-size: 1.25rem; color: white">Total Customer</span></div>
                                            <div class="card-body"><strong style="color: white; font-size: 20px;">{{ $customers }}</strong></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card bg-c-green">
                                            <div class="card-header"><span style="font-size: 1.25rem; color: white">Total Product</span></div>
                                            <div class="card-body"><strong style="color: white; font-size: 20px;">{{ $suppliers }}</strong></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card bg-c-orenge">
                                            <div class="card-header"><span style="font-size: 1.25rem; color: white">Total Suppliers</span></div>

                                            <div class="card-body"><strong style="color: white; font-size: 20px;"></strong></div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card bg-c-blue">
                                            <div class="card-header"><span style="font-size: 1.25rem; color: white">Total Sale</span></div>
                                            <div class="card-body"><strong style="color: white; font-size: 20px;">200</strong></div>
                                        </div>
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
