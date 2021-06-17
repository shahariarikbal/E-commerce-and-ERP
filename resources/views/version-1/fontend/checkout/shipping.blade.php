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
                                <span class="breadcrumb__item-link">Shipping Information</span>
                            </li>

                            <li class="breadcrumb__title-safe-area" role="presentation"></li>
                        </ol>
                    </nav>

                    <h1 class="block-header__title">Shipping Information</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="col-12 mb-3">
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
            <form action="{{ url('/shipping/submit') }}" method="post">
                @csrf
            <div class="row">
                <div class="col-md-8">
                        <div class="checkout block">
                            <div class="container container--max--xl">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card mb-lg-0">
                                            <div class="card-body card-body--padding--2">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="checkout-last-name">Name</label>
                                                        <input type="text" class="form-control" value="{{ $customer->name }}" id="checkout-last-name" name="name" placeholder="Last Name">
                                                        <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="checkout-street-address">Address</label>
                                                    <textarea class="form-control" name="address" rows="5">{{ $customer->address_one }}</textarea>
                                                    <span style="color: red"> {{ $errors->has('address') ? $errors->first('address') : ' ' }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <label for="checkout-street-address">Street Address</label>
                                                    <textarea class="form-control" name="street_address" rows="5">{{ $customer->address_two }}</textarea>
                                                    <span style="color: red"> {{ $errors->has('street_address') ? $errors->first('street_address') : ' ' }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <label for="checkout-address">Apartment, suite, unit etc. <span class="text-muted">(Optional)</span></label>
                                                    <input type="text" class="form-control" name="apartment" value="{{ $customer->apartment }}" id="checkout-address">
                                                </div>

                                                <div class="form-group">
                                                    <label for="checkout-city">Town / City</label>
                                                    <input type="text" class="form-control" name="city" value="{{ $customer->city_one }}" id="checkout-city">
                                                    <span style="color: red"> {{ $errors->has('city') ? $errors->first('city') : ' ' }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <label for="checkout-state">State</label>
                                                    <input type="text" class="form-control" name="state" value="{{ $customer->state }}" id="checkout-state">
                                                    <span style="color: red"> {{ $errors->has('state') ? $errors->first('state') : ' ' }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <label for="checkout-country">Country <small style="color: red"> Must be selected a country</small></label>
                                                    <select id="country" name="country" class="form-control form-control-select2" required>
                                                        <option selected disabled>select country</option>
                                                        <option value="5" id="af">Afghanistan</option>
                                                        <option value="10" id="ar">Argentina</option>
                                                        <option value="14" id="au">Australia</option>
                                                        <option value="12" id="az">Azerbaijan</option>
                                                        <option value="7" id="bh">Bahrain</option>
                                                        <option value="13" id="bd">Bangladesh</option>
                                                        <option value="8" id="bh">Bhutan</option>
                                                        <option value="9" id="br">Brazil</option>
                                                        <option value="15" id="ca">Canada</option>
                                                        <option value="9.2" id="ch">China</option>
                                                        <option value="10.5" id="dn">Denmark</option>
                                                        <option value="6.5" id="fi">Finland</option>
                                                        <option value="5.4" id="fr">France</option>
                                                        <option value="9.8" id="ge">Germany</option>
                                                        <option value="5" id="hq">Hong Kong</option>
                                                        <option value="3" id="in">India</option>
                                                        <option value="5" id="ind">Indonesia</option>
                                                        <option value="6.3" id="irn">Iran, Islamic Republic of</option>
                                                        <option value="7.1" id="irq">Iraq</option>
                                                        <option value="6" id="ir">Ireland</option>
                                                        <option value="8.2" id="is">Israel</option>
                                                        <option value="9" id="it">Italy</option>
                                                        <option value="8.1" id="jp">Japan</option>
                                                        <option value="10" id="ma">Malaysia</option>
                                                        <option value="3.1" id="np">Nepal</option>
                                                        <option value="5.2" id="ne">Netherlands</option>
                                                        <option value="6.6" id="nz">New Zealand</option>
                                                        <option value="3.4" id="ni">Nigeria</option>
                                                        <option value="4.4" id="no">Norway</option>
                                                        <option value="4.4" id="om">Oman</option>
                                                        <option value="2.3" id="pk">Pakistan</option>
                                                        <option value="8.2" id="ph">Philippines</option>
                                                        <option value="7.7" id="po">Portugal</option>
                                                        <option value="4.2" id="qa">Qatar</option>
                                                        <option value="6.3" id="sf">South Africa</option>
                                                        <option value="8.5" id="sp">Spain</option>
                                                        <option value="4.4" id="sl">Sri Lanka</option>
                                                        <option value="5.5" id="sd">Sweden</option>
                                                        <option value="6.3" id="sw">Switzerland</option>
                                                        <option value="1" id="uae">United Arab Emirates</option>
                                                        <option value="4.6" id="uk">United Kingdom</option>
                                                        <option value="6.5" id="us">United States</option>
                                                        <option value="4.2" id="zw">Zimbabwe</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="checkout-postcode">Postcode / ZIP</label>
                                                    <input type="text" class="form-control" name="zip" value="{{ $customer->zip }}" id="checkout-postcode">
                                                    <span style="color: red"> {{ $errors->has('zip') ? $errors->first('zip') : ' ' }}</span>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="checkout-email">Email address</label>
                                                        <input type="email" class="form-control" name="email" value="{{ $customer->email_one }}" id="checkout-email" placeholder="Email address">
                                                        <span style="color: red"> {{ $errors->has('email') ? $errors->first('email') : ' ' }}</span>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="checkout-phone">Phone</label>
                                                        <input type="text" class="form-control" name="phone" value="{{ $customer->mobile_no_one }}" id="checkout-phone" placeholder="Phone">
                                                        <span style="color: red"> {{ $errors->has('phone') ? $errors->first('phone') : ' ' }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-divider"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-md-4">
                    {{-- @dd(Session::has('product_type') && Session::has('product_type')=="Software") --}}
                    @if (Session::has('product_type') && Session::has('product_type')=="Software")

                    @elseif (Session::has('product_type') && Session::has('product_type')=="Free Shipping")
                    
                    @else


                        <div class="card">
                            <div class="card-body">
                                <lable>Shipping Company</lable><br/>
                                <div class="form-check form-check-inline mt-3">
                                    <input class="form-check-input" type="radio" name="shipping_mood" id="dhl" value="dhl">
                                    <label class="form-check-label" for="dhl">
                                        <img src="{{ asset('/fontend/') }}/dhl.jpg" style="height: 50px; width: 80px;">
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="shipping_mood" id="fedex" value="fedex">
                                    <label class="form-check-label" for="fedex">
                                        <img src="{{ asset('/fontend/') }}/fedex.png" style="height: 50px; width: 80px;">
                                    </label>
                                </div>
                                <br/>
                                <br/>
                                <div id="shippingDhl">
                                    <lable>Shipping Charge</lable>
                                    <input type="text" id="shippingChargeDhl" name="shipping_value" readonly class="form-control mt-3" value="">
                                    <lable>Total Price</lable>
                                    <input type="text" id="totaldhl" readonly name="total_dhl" class="form-control mt-3" value="{{ Session::get('totalAmount') }}">
                                    <br/>
                                    <lable>Total Product Price Including Shipping Charge</lable>
                                    <input type="text" id="dhlShippingTotal" name="shipping_total" readonly class="form-control mt-3" value="{{ Session::get('totalAmount') }}">
                                </div>
                                <div id="shippingFedex">
                                    <lable>Shipping Charge</lable>
                                    <input type="text" id="shippingChargeFedex" name="shipping_value" readonly class="form-control mt-3" value="">
                                    <lable>Total Price</lable>
                                    <input type="text" id="totalfedx" readonly class="form-control mt-3" value="{{ Session::get('totalAmount') }}">
                                    <br/>
                                    <lable>Total Product Price Including Shipping Charge</lable>
                                    <input type="text" id="fedxShippingTotal" name="shipping_total" readonly class="form-control mt-3" value="{{ Session::get('totalAmount') }}">
                                </div>
                                <br/>
                                <div id="totalAmountShow">
                                    <lable>Total Price</lable>
                                    <input type="text" id="total" readonly class="form-control mt-3" value="{{ Session::get('totalAmount') }}">
                                </div>
                            </div>
                        </div>


                    @endif
                    <a href="#"><button type="submit" class="btn btn-primary btn-xl btn-block">Proceed to Payment</button></a>

                    <a href="https://wa.me/+971569763008" type="phone"><button type="button" style="margin-top: 10px;background-color: #25D366 !important;" class="btn btn-xl btn-block">Order by Whatsapp</button></a>
                </div>
            </div>
            </form>
        </div>
        <div class="block-space block-space--layout--before-footer"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        // function shippingCharge() {
        //    var charge = $("#charge").val();
        //    var total = $("#total").val();
        //     var grandAmount = (parseFloat(charge) + parseFloat(total));
        //     $("#totalPrice").val(parseInt(grandAmount));
        // }

        $('#shippingDhl').hide()
        $('#shippingFedex').hide()
        $('#totalAmountShow').show()

        let dhlCharge = 40;
        let fedexCharge = 41;
        let data = 0;
        let d = $('#totaldhl').val()
        let f = $('#totalfedx').val()

        $(document).ready(function() {
            $("#country").change(function (){
                data = $(this).val();
                console.log(data)
                var dhlCharges = (parseFloat(dhlCharge / 100 * d) + parseFloat(data)).toFixed(2);
                var dhkProductCharge = (parseFloat($('#totaldhl').val())).toFixed(2);

                var fedxCharges = (parseFloat(fedexCharge / 100 * d) + parseFloat(data)).toFixed(2);
                var fedxProductCharge = (parseFloat($('#totalfedx').val())).toFixed(2);

                if ($('#dhl').is(':checked')){
                    $('#shippingChargeDhl').val((parseFloat(dhlCharges)).toFixed(2))
                    $("#dhlShippingTotal").val((parseFloat(dhlCharges) + parseFloat(dhkProductCharge)).toFixed(2))
                }
                if ($('#fedex').is(':checked')){
                    $('#shippingChargeFedex').val((parseFloat(fedxCharges)).toFixed(2))
                    $("#fedxShippingTotal").val((parseFloat(fedxCharges) + parseFloat(fedxProductCharge)).toFixed(2))
                }
            })

            $('input:radio[name=shipping_mood]').change(function() {
                if (this.value == 'dhl') {
                    $('#shippingDhl').show()
                    $('#shippingFedex').hide()
                    $('#totalAmountShow').hide()

                    //console.log(parseInt(dhlCharge / 100 * d) + parseInt(data))

                    $("#shippingChargeDhl").val((parseFloat(dhlCharge / 100 * d) + parseFloat(data)).toFixed(2))

                    var shippingdhl = $('#shippingChargeDhl').val()
                    let totalDhl = $('#totaldhl').val()

                    $("#dhlShippingTotal").val((parseFloat(shippingdhl) + parseFloat(totalDhl)).toFixed(2))

                }
                else if (this.value == 'fedex') {
                    $('#shippingDhl').hide()
                    $('#totalAmountShow').hide()
                    $('#shippingFedex').show()

                    $("#shippingChargeFedex").val((parseFloat(fedexCharge / 100 * f) + parseFloat(data)).toFixed(2))

                    var shippingfedex = $('#shippingChargeFedex').val()
                    let totalFedx = $('#totalfedx').val()

                    $("#fedxShippingTotal").val((parseFloat(shippingfedex) + parseFloat(totalFedx)).toFixed(2))
                }
            });
        });

    </script>
@endsection
