@extends('version-1.fontend.master')

@section('content')
    <div class="site__body">
        <div class="block-header block-header--has-breadcrumb block-header--has-title">
            <div class="container">
                <div class="block-header__body">
                    <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb__list">
                            <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>

                            <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first">
                                <a href="{{ url('/') }}" class="breadcrumb__item-link">Home</a>
                            </li>

                            <li class="breadcrumb__item breadcrumb__item--parent">
                                <a href="{{ url('/show-cart-products') }}" class="breadcrumb__item-link">Cart</a>
                            </li>

                            <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                                <span class="breadcrumb__item-link">Payment Information</span>
                            </li>

                            <li class="breadcrumb__title-safe-area" role="presentation"></li>
                        </ol>
                    </nav>

                    <h1 class="block-header__title">Select Payment Methods</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="col-12 mb-3">
                @if(Session::get('id'))
                <div class="alert alert-lg alert-primary text-center">
                    Dear {{ $shippingCustomer->first_name. ' ' .$shippingCustomer->last_name }} You have to give us payment method
                </div>
                @else
                    <div class="alert alert-lg alert-primary text-center">
                        No user found Click to <a href="{{ url('/') }}" class="btn btn-sm btn-danger">Back</a>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block" style="margin-top: 62px;">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block" style="margin-top: 62px;">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('/payment/methods/submit') }}" method="POST">
                                @csrf
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Pay to later</th>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_type" value="Cash" id="cashOnDelivery" checked>
                                                <label class="form-check-label" for="cashOnDelivery">
                                                    Pay later <img src="{{ asset('/fontend/') }}/cash.jpg" style="height: 30px; width: 50px;">
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Paypal Payment</th>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_type" value="Paypal" id="bankPayment">
                                                <label class="form-check-label" for="bankPayment">
                                                    Paypal <img src="{{ asset('/fontend/') }}/paypal.png" style="height: 30px; width: 50px;">
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Card Payment</th>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_type" value="Card" id="card">
                                                <label class="form-check-label" for="card">
                                                    Card <img src="{{ asset('/fontend/') }}/master.png" style="height: 30px; width: 100px;">
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <input type="hidden" name="email" value="{{ Session::get('email') }}">
                                <div class="row">
                                    <div class="col-md-5"></div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                    </div>
                                    <div class="col-md-5"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <div class="block-space block-space--layout--before-footer"></div>
    </div>
@endsection
