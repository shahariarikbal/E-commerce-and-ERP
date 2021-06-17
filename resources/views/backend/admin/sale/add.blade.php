@extends('backend.admin.master')

@section('style')

@endsection

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <span style="font-size: 1.25rem; color: black">Add New Sale</span>
                                    <a href="{{ url('sale/index') }}" class="btn float-right custom-btn-color">Manage Sale</a>
                                </div>
                                <form action="{{ url('/sale/product/store') }}" method="POST" name="saleForm" id="saleForm">
                                    @csrf
                                    <div class="card-body">
                                        <div id="cash">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Select Customer</label>
                                                        <select class="form-control select2bs4" name="customer_id" id="customer_id">
                                                            <option disabled selected>Select a Customer</option>
                                                            @foreach($customers as $customer)
                                                                <option value="{{ $customer->id }}" {{ old('customer_id') }}>{{ $customer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span style="color: red"> {{ $errors->has('customer_id') ? $errors->first('customer_id') : ' ' }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Sale Date</label>
                                                        <input type="date" name="sale_date" class="form-control" value="{{ old('sale_date') }}" placeholder="Select Sale Date">
                                                        <span style="color: red"> {{ $errors->has('sale_date') ? $errors->first('sale_date') : ' ' }}</span>
                                                    </div>                                         
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Select payment type</label>
                                                        <select class="form-control payment_type" name="payment_type">
                                                            <option disabled selected>Select a payment type</option>
                                                            <option value="Cash" {{ old('payment_type') }}>Cash</option>
                                                        </select>
                                                        <span style="color: red"> {{ $errors->has('payment_type') ? $errors->first('payment_type') : ' ' }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Select Type</label>
                                                        <select class="form-control" name="type" id="type">
                                                            <option disabled selected>Select Type</option>
                                                            <option value="Invoice" {{ old('type') }}>Invoice</option>
                                                        </select>
                                                        <span style="color: red"> {{ $errors->has('type') ? $errors->first('type') : ' ' }}</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div id="bank">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Account Number</label>
                                                        <input type="number" name="account_number" class="form-control" placeholder="Enter Account number">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Branch Name</label>
                                                        <input type="text" name="branch_name" class="form-control" placeholder="Enter Branch Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Bank Name</label>
                                                        <input type="text" name="bank_name" class="form-control" placeholder="Enter Bank name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Account Name</label>
                                                        <input type="text" name="account_name" class="form-control" placeholder="Enter Account name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>SWIFT Address</label>
                                                        <textarea name="swift_address" class="form-control" placeholder="Enter swift address"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="addNew">
                                            <table class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Product SKU</th>
                                                    <th>Unit Name</th>
                                                    <th>Available Qty</th>
                                                    <th>Qty</th>
                                                    <th>Rate</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                                <tr class="dataRow" data-id="0">
                                                    <td>
                                                        <input type="text" name="product_name[]" id="product_name_0" readonly class="form-control m-input" placeholder="product name" autocomplete="off">
                                                    </td>
                                                    <td>
                                                        <select name="sku[]" id="sku_0" class="form-control select2bs4 skuId" onchange="getDetails(0)">
                                                            <option disabled selected>Select a sku</option>
                                                            @foreach($products as $product)
                                                                <option value="{{ $product->id }}">{{ $product->sku }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="unit[]" id="unit_0" readonly class="form-control m-input" placeholder="Add Unit name" autocomplete="off">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="available_qty[]" readonly id="available_qty_0" class="form-control m-input" value="0" autocomplete="off">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="qty[]" id="qty_0" class="form-control m-input qty" onkeyup=multiplayQty(0) min="1" autocomplete="off" required>
                                                        <input type="hidden" name="total_qty[]" id="totalQty_0" readonly class="form-control m-input qty" autocomplete="off">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="rate[]" id="rate_0" class="form-control m-input curr" placeholder="Add rate" autocomplete="off" onkeyup=multiplayQty(0)>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="total[]" id="total_0" class="form-control m-input total curr" placeholder="Total price" value="0.00" readonly autocomplete="off">
                                                    </td>
                                                    <td>
                                                        <span style="cursor: pointer" id="addmore" class="btn btn-sm btn-success">Add More</span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-md-5">    
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    
                                                                    <label for="">Select Currency</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <select name="currency" id="currency" class="form-control" style="text-transform: uppercase;" onchange="">
                                                                            <option value="usd">USD</option>
                                                                        @foreach (App\Model\Currency::all() as $c)
                                                                            <option value="{{ $c->slug }}" style="text-transform: uppercase;">{{ $c->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2"><strong class="float-right" style="margin-top: 10px;">Tax :</strong></div>
                                                    <div class="col-md-5">
                                                        <input type="number" step="0.01" class="form-control curr" style="margin-top: 10px;" name="tax" id="tax" placeholder="Tax" value="0" onkeyup=multiplayQty(0)>
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <strong class="float-right" style="margin-top: 10px;">VAT :</strong>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="number" step="0.01" class="form-control curr" style="margin-top: 10px;" name="vat" id="vat" placeholder="Vat"  value="0" onkeyup=multiplayQty(0)>
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="row">
                                                    <div class="col-md-7"><strong class="float-right" style="margin-top: 10px;">Shipping Cost :</strong></div>
                                                    <div class="col-md-5">
                                                        <input type="number" step="0.01" class="form-control curr" style="margin-top: 10px;" name="shipping_cost" id="shipping_cost" value="0" placeholder="Shipping Cost" onkeyup=multiplayQty(0)>
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="row">
                                                    <div class="col-md-7"><strong class="float-right" style="margin-top: 10px;">Misc Cost :</strong></div>
                                                    <div class="col-md-5">
                                                        <input type="number" step="0.01" class="form-control curr" style="margin-top: 10px;" name="misc_cost" value="0" id="misc_cost" placeholder="0.00" onkeyup=multiplayQty(0)>
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="row">
                                                    <div class="col-md-7"><strong class="float-right" style="margin-top: 10px;">Grand Total :</strong></div>
                                                    <div class="col-md-5">
                                                        <input type="number" step="0.01" class="form-control curr" style="margin-top: 10px;" name="grand_total" id="grand_total_0" value="0.00" readonly>
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="row">
                                                    <div class="col-md-7"><strong class="float-right" style="margin-top: 10px;">Previous Balance :</strong></div>
                                                    <div class="col-md-5">
                                                        <input type="number" step="0.01" class="form-control curr" style="margin-top: 10px;" name="previous_balance" id="previous_balance" onkeyup=multiplayQty(0) placeholder="Previous Balance"  value="0">
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="row">
                                                    <div class="col-md-7"><strong class="float-right" style="margin-top: 10px;">Net Total :</strong></div>
                                                    <div class="col-md-5">
                                                        <input type="number" step="0.01" class="form-control curr" style="margin-top: 10px;" name="net_total" id="net_total" value="0.00" readonly>
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="row">
                                                    <div class="col-md-7"><strong class="float-right" style="margin-top: 10px;">Paid Amount :</strong></div>
                                                    <div class="col-md-5">
                                                        <input type="number" step="0.01" class="form-control curr" style="margin-top: 10px;" name="paid_amount" id="paid_amount" value="0" placeholder="Paid Amount" onkeyup=multiplayQty(0)>
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="row">
                                                    <div class="col-md-7"><strong class="float-right" style="margin-top: 10px;">Due Amount :</strong></div>
                                                    <div class="col-md-5">
                                                        <input type="number" step="0.01" class="form-control curr" style="margin-top: 10px;" readonly name="due_amount" id="due_amount" value="0.00">
                                                    </div>
                                                </div>
                                                <hr/>
                                            </div>
                                        </div>
                                        <button type="submit" name="btn" class="btn custom-btn-color" style="margin-top: 15px;">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $("#cash").show();
        $("#bank").hide();

        $('.payment_type').change(function () {
            var data = $(this).val();
            //console.log(data)
            if (data === "Cash") {
                $("#cash").show();
                $("#bank").hide();
            }else if (data === "Bank payment"){
                $("#cash").show();
                $("#bank").show();
            }
        });

                {{--$(document).ready(function () {--}}
                {{--    $('#customer_id').change(function () {--}}
                {{--        let customerId = $('#customer_id').val();--}}
                {{--        //console.log(supplierId)--}}
                {{--        $.ajax({--}}
                {{--            url: "{{ url('sale/customer/balance') }}/" + customerId,--}}
                {{--            data:{ },--}}
                {{--            success: function (data) {--}}
                {{--                console.log(data)--}}
                {{--                $('#previous_balance').val(data.balance);--}}
                {{--            }--}}
                {{--        })--}}
                {{--    })--}}
                {{--});--}}


        let totalVat = 0;
        let totalTax = 0;
        let totalShipping = 0;
        function getDetails(key) {
            var id = $('#sku_'+key).val();
            //counter = id;
            //console.log(id)
            $.ajax({
                url: "{{ url('purchase/product') }}/" + id,
                data:{ productName:id },
                success: function (data) {
                    console.log(data)
                    totalVat += Number(data.vat);
                    totalTax += Number(data.tax);
                    totalShipping += Number(data.shipping_cost);
                    //alert(totalVat)
                    $('#product_name_'+key).val(data.name);
                    $('#unit_'+key).val(data.unit);
                    $('#rate_'+key).val(data.sale_price);
                    $('#vat').val(parseFloat(totalVat));
                    $('#tax').val(parseFloat(totalTax));
                    $('#shipping_cost').val(parseFloat(totalShipping));
                    $('#available_qty_'+key).val(data.qty);
                    multiplayQty(0);
                }
            })
        }


        $(document).ready(function () {

            $('#addmore').click(function () {
                addRow();
                multiplayQty(0);
            });
            function addRow() {
                var key = $('.dataRow').length;
                var add = '<tr id="hide" class="dataRow">\n' +
                    '   <td>\n' +
                    '       <input type="text" name="product_name[]" id="product_name_'+key+'" readonly class="form-control m-input" placeholder="ProductTrait name" autocomplete="off">\n' +
                    '    </td>\n' +

                    '   <td>\n' +
                    '       <select name="sku[]" id="sku_'+key+'" data-row-id="'+key+'" class="form-control select2bs4 skuId" onchange="getDetails('+key+')">\n' +
                    '       <option disabled selected>Select a sku</option>\n' +
                        @foreach($products as $product)
                            '<option value="{{ $product->id }}">{{ $product->sku }}</option>\n' +
                        @endforeach
                            '</select>\n' +
                    '    </td>\n' +

                    '    <td>\n' +
                    '       <input type="text" name="unit[]" id="unit_'+key+'" readonly class="form-control m-input" placeholder="Add Unit name" autocomplete="off">\n' +
                    '    </td>\n' +
                    '    <td>\n' +
                    '       <input type="text" name="available_qty[]" id="available_qty_'+key+'" readonly class="form-control m-input" value="0" autocomplete="off">\n' +
                    '    </td>\n' +
                    '    <td>\n' +
                    '       <input type="text" name="qty[]" id="qty_'+key+'" data-row-id="'+key+'" class="form-control m-input qty" onkeyup=multiplayQty('+key+') placeholder="Add qty" autocomplete="off" required>\n' +
                    '       <input type="hidden" name="total_qty[]" id="totalQty_'+key+'" readonly data-row-id="'+key+'" class="form-control m-input qty" onkeyup=multiplayQty('+key+') value="0" autocomplete="off">\n' +
                    '    </td>\n' +
                    '    <td>\n' +
                    '       <input type="text" name="rate[]" id="rate_'+key+'" class="form-control m-input curr" onkeyup=multiplayQty('+key+')  placeholder="Add rate" autocomplete="off">\n' +
                    '    </td>\n' +
                    '    <td>\n' +
                    '       <input type="text" name="total[]" id="total_'+key+'" readonly class="form-control m-input total" placeholder="Total price" readonly value="0.00" autocomplete="off">\n' +
                    '    </td>\n' +
                    '    <td>\n' +
                    '       <span style="cursor: pointer" id="remove" data-row-id="'+key+'" class="btn btn-sm btn-danger">Remove</span>\n' +
                    '     </td>\n' +
                    '     </tr>'
                $('tbody').append(add);
            }
        });

        function multiplayQty(row){
            var qty = $("#qty_" + row).val();
            var rate = $("#rate_" + row).val();
            var availableQty = $("#available_qty_" + row).val()
            $("#totalQty_" + row).val(parseInt(availableQty) - parseInt(qty))
            $("#total_" + row).val(qty * rate);
            console.log(availableQty);
            var tax = $("#tax").val();
            var vat = $("#vat").val();
            var shipCost = $("#shipping_cost").val();
            var miscCost = $("#misc_cost").val();
            var prevBalance = $("#previous_balance").val();
            var duePaid = $("#paid_amount").val();
            var netTotal = $("#net_total").val();
            //console.log(dueAmount)
            var total = 0;
            $(".total").each(function(index, item) {
                total = total + parseInt($(item).val());
            })

            // total_grand = parseInt(tax) + parseInt(vat) + parseInt(shipCost) +  parseInt(miscCost) + (totalTax + totalVat + totalShipping) + total;
            total_grand = parseInt(tax) + parseInt(vat) + parseInt(shipCost) +  parseInt(miscCost) + total;
            total2 = (totalTax + totalVat + totalShipping) + total;

            total_net = total_grand + parseInt( prevBalance );


            dueAmount = (parseInt(total_net) - parseInt(duePaid));


            // $("#grand_total_0").val(parseInt(tax) + parseInt(vat) + parseInt(shipCost) + parseInt(miscCost) + (totalTax + totalVat + totalShipping) + total ? total_grand  : total2);
            $("#grand_total_0").val(total_grand);
            // $("#net_total_0").val((totalTax + totalVat + totalShipping) + total ? parseInt(miscCost) + (totalTax + totalVat + totalShipping) + total + parseInt(prevBalance) : (totalTax + totalVat + totalShipping) + total + parseInt(prevBalance));
            $("#net_total").val(total_net);
            // console.log(totalShipping);
            $("#due_amount").val(parseInt(dueAmount));
        }
        $(document).on('click', '#remove', function () {
            $(this).closest('#hide').remove();
            multiplayQty(0);
        });
    </script>

    <script>


        var previous;

        $("#currency").on('focus', function () {
            // Store the current value on focus and on change
            previous = this.value;
        }).change(function() {
            // Do something with the previous value after the change
            previous_currency = previous;
            current_currency = this.value;

            changeCurrency(previous_currency, current_currency);

            // Make sure the previous value is updated
            previous = this.value;
        });


        function changeCurrency(previous_currency, current_currency){

            console.log('old_currency ' + previous_currency);
            console.log('currency_selected ' + current_currency);

            aed = {{ App\Model\Currency::where('slug', 'aed')->first()->price }};
            sar = {{ App\Model\Currency::where('slug', 'sar')->first()->price }};
            euro = {{ App\Model\Currency::where('slug', 'euro')->first()->price }};

            // usd conversion
            if ( previous_currency == "usd" && current_currency=="aed" ) {
                multiplier = aed;
                console.log(multiplier);
            }

            if ( previous_currency == "usd" && current_currency=="sar" ) {
                multiplier = sar;
            }

            if ( previous_currency == "usd" && current_currency=="euro" ) {
                multiplier = euro;
            }

            // aed conversion
            if ( previous_currency == "aed" && current_currency=="usd" ) {
                multiplier = 1/aed;
            }

            if ( previous_currency == "aed" && current_currency=="sar" ) {
                multiplier = sar/aed;
            }

            if ( previous_currency == "aed" && current_currency=="euro" ) {
                multiplier = euro/aed;
            }

            // sar conversion
            if ( previous_currency == "sar" && current_currency=="usd" ) {
                multiplier = 1/sar;
            }

            if ( previous_currency == "sar" && current_currency=="aed" ) {
                multiplier = aed/sar;
            }

            if ( previous_currency == "sar" && current_currency=="euro" ) {
                multiplier = euro/sar;
            }

            // euro conversion
            if ( previous_currency == "euro" && current_currency=="usd" ) {
                multiplier = 1/euro;
            }

            if ( previous_currency == "euro" && current_currency=="aed" ) {
                multiplier = aed/euro;
            }

            if ( previous_currency == "euro" && current_currency=="sar" ) {
                multiplier = sar/euro;
            }



            for (var i = 0; i < $(".curr").length; i++) {

                convert = Number($(".curr")[i].value) * multiplier;

                $(".curr")[i].value = convert.toFixed(2);
            }
        }


    </script>
@endsection
