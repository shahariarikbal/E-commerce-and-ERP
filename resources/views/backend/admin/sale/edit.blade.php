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
                                    <span style="font-size: 1.25rem; color: black">Update Sales</span>
                                    <a href="{{ url('sale/index') }}" class="btn float-right custom-btn-color">Manage Sale</a>
                                </div>
                                <form action="{{ url('/sale/product/update/'.$saleEdit->id) }}" method="POST" name="saleEditForm" id="saleForm">
                                    @csrf
                                    <div class="card-body">
                                        <div id="cash">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Select Supplier</label>
                                                        <select class="form-control select2bs4" name="customer_id" id="customer_id">
                                                            <option disabled selected>Select a Customer</option>
                                                            @foreach($customers as $customer)
                                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span style="color: red"> {{ $errors->has('customer_id') ? $errors->first('customer_id') : ' ' }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Purchase Date</label>
                                                        <input type="date" name="sale_date" value="{{ $saleEdit->sale_date }}" class="form-control" placeholder="Select Purchase Date">
                                                        <span style="color: red"> {{ $errors->has('sale_date') ? $errors->first('sale_date') : ' ' }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Select payment type</label>
                                                        <select class="form-control payment_type" name="payment_type" id="payment_type">
                                                            <option disabled selected>Select a payment type</option>
                                                            <option value="Cash" {{ (old('payment_type') ?: ($saleEdit->payment_type ?? null)) == "Cash" ? ' selected="selected"' : null }}>Cash</option>
                                                            <option value="Bank payment" {{ (old('payment_type') ?: ($saleEdit->payment_type ?? null)) == "Bank payment" ? ' selected="selected"' : null }}>Bank</option>
                                                        </select>
                                                        <span style="color: red"> {{ $errors->has('payment_type') ? $errors->first('payment_type') : ' ' }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Select Type</label>
                                                        <select class="form-control" name="types" id="types">
                                                            <option disabled selected>Select Type</option>
                                                            <option value="Invoice">Invoice</option>
                                                            <option value="Quotation">Quotation</option>
                                                        </select>
                                                        <span style="color: red"> {{ $errors->has('types') ? $errors->first('types') : ' ' }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="bank">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Account Number</label>
                                                        <input type="number" name="account_number" value="{{ $saleEdit->account_number }}" class="form-control" placeholder="Enter Account number">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Branch Name</label>
                                                        <input type="text" name="branch_name" value="{{ $saleEdit->branch_name }}" class="form-control" placeholder="Enter Branch Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Bank Name</label>
                                                        <input type="text" name="bank_name" value="{{ $saleEdit->bank_name }}" class="form-control" placeholder="Enter Bank name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Account Name</label>
                                                        <input type="text" name="account_name" value="{{ $saleEdit->account_name }}" class="form-control" placeholder="Enter Account name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>SWIFT Address</label>
                                                        <textarea name="swift_address" class="form-control" placeholder="Enter swift address">{{ $saleEdit->swift_address }}</textarea>
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
{{--                                                    <th>--}}
{{--                                                        <span style="cursor: pointer" id="addmore" class="btn btn-sm btn-success">Add More</span>--}}
{{--                                                    </th>--}}
                                                </tr>
                                                @foreach($saleEdit->saleProduct as $key => $saleEditProduct)
                                                    <tr class="dataRow" data-id="0" id="purchaseEdit">
                                                        <td>
                                                            <select name="product_id[]" id="product_name_{{ $key }}" class="form-control select2bs4 productId" onchange="getDetails(0)">
                                                                <option disabled selected>Select a product</option>
                                                                @foreach($products as $product)
                                                                    <option value="{{ $product->id }}" {{ (old('product_id') ?: ($saleEditProduct->product_id ?? null)) == $product->id ? ' selected="selected"' : null }}>{{ $product->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="sku[]" id="sku_{{ $key }}" value="{{ $saleEditProduct->sku }}" readonly class="form-control m-input" placeholder="Add SKU name" autocomplete="off">
                                                        </td>

                                                        <td>
                                                            <input type="text" name="unit[]" id="unit_{{ $key }}" value="{{ $saleEditProduct->unit_name }}" readonly class="form-control m-input" placeholder="Add Unit name" autocomplete="off">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="available_qty[]" value="{{ $saleEditProduct->available_qty }}" id="available_qty_{{ $key }}" onkeyup=multiplayQty({{ $key }}) class="form-control m-input" placeholder="0.00" autocomplete="off">
                                                            <input type="hidden" name="total_qty[]" value="0" id="totalQty_{{ $key }}" class="form-control m-input" placeholder="0.00" autocomplete="off">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="qty[]" value="{{ $saleEditProduct->qty }}" id="qty_{{ $key }}" onkeyup=multiplayQty({{ $key }}) class="form-control m-input" autocomplete="off">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="rate[]" value="{{ $saleEditProduct->rate }}" readonly id="rate_{{ $key }}" class="form-control m-input" placeholder="Add rate" autocomplete="off">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="total[]" value="{{ $saleEditProduct->total }}" id="total_{{ $key }}" class="form-control m-input total" placeholder="Total price" readonly autocomplete="off">
                                                        </td>
{{--                                                        <td>--}}
{{--                                                            <span style="cursor: pointer" id="editRemove" class="btn btn-sm btn-danger remove">Remove</span>--}}
{{--                                                        </td>--}}
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-md-7"><strong class="float-right" style="margin-top: 10px;">Tax :</strong></div>
                                                    <div class="col-md-5">
                                                        <input type="number" readonly class="form-control" value="{{ $saleEdit->tax }}" style="margin-top: 10px;" name="tax" id="tax" placeholder="Tax">
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <strong class="float-right" style="margin-top: 10px;">VAT :</strong>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="number" readonly class="form-control" value="{{ $saleEdit->vat }}" style="margin-top: 10px;" name="vat" id="vat" placeholder="Vat">
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="row">
                                                    <div class="col-md-7"><strong class="float-right" style="margin-top: 10px;">Shipping Cost :</strong></div>
                                                    <div class="col-md-5">
                                                        <input type="number" readonly class="form-control" style="margin-top: 10px;" value="{{ $saleEdit->shipping_cost }}" name="shipping_cost" id="shipping_cost" placeholder="Shipping Cost">
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="row">
                                                    <div class="col-md-7"><strong class="float-right" style="margin-top: 10px;">Misc Cost :</strong></div>
                                                    <div class="col-md-5">
                                                        <input type="number" class="form-control" style="margin-top: 10px;" name="misc_cost" value="{{ $saleEdit->misc_cost }}" id="misc_cost_0" placeholder="0.00" onkeyup=multiplayQty(0)>
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="row">
                                                    <div class="col-md-7"><strong class="float-right" style="margin-top: 10px;">Grand Total :</strong></div>
                                                    <div class="col-md-5">
                                                        <input type="number" class="form-control" style="margin-top: 10px;" name="grand_total" id="grand_total_0" value="{{ $saleEdit->grand_total }}" readonly>
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="row">
                                                    <div class="col-md-7"><strong class="float-right" style="margin-top: 10px;">Previous Balance :</strong></div>
                                                    <div class="col-md-5">
                                                        <input type="number" class="form-control" style="margin-top: 10px;" name="previous_balance" value="{{ $saleEdit->previous_balance }}" id="previous_balance_0" placeholder="Previous Balance">
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="row">
                                                    <div class="col-md-7"><strong class="float-right" style="margin-top: 10px;">Net Total :</strong></div>
                                                    <div class="col-md-5">
                                                        <input type="number" class="form-control" style="margin-top: 10px;" name="net_total" id="net_total_0" value="{{ $saleEdit->net_total }}" readonly disabled="">
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="row">
                                                    <div class="col-md-7"><strong class="float-right" style="margin-top: 10px;">Paid Amount :</strong></div>
                                                    <div class="col-md-5">
                                                        <input type="number" class="form-control" style="margin-top: 10px;" name="paid_amount" value="{{ $saleEdit->paid_amount }}" id="paid_amount_0" placeholder="Paid Amount" onkeyup=multiplayQty(0) readonly="" disabled="">
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="row">
                                                    <div class="col-md-7"><strong class="float-right" style="margin-top: 10px;">Due Amount :</strong></div>
                                                    <div class="col-md-5">
                                                        <input type="number" class="form-control" style="margin-top: 10px;" readonly name="due_amount" id="due_amount_0" value="{{ $saleEdit->due_amount }}" disabled="">
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
        document.forms['saleEditForm'].elements['types'].value="{!! $saleEdit->type !!}";
        document.forms['saleEditForm'].elements['customer_id'].value="{!! $saleEdit->customer_id !!}";
    </script>
    <script>
        var paymentTypeId = $("select#payment_type option").filter(":selected").val();
        //alert(paymentTypeId)
        if (paymentTypeId === "Bank payment") {
            $("#cash").show();
            $("#bank").show();
        }else {
            $("#cash").show();
            $("#bank").hide();
        }

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
        let totalVat = 0;
        let totalTax = 0;
        let totalShipping = 0;
        function getDetails(key) {
            var id = $('#product_name_'+key).val();
            //counter = id;
            //console.log(id)
            $.ajax({
                url: "{{ url('sale/product') }}/" + id,
                data:{ productName:id },
                success: function (data) {
                    console.log(data)
                    totalVat += data.vat;
                    totalTax += data.tax;
                    totalShipping += data.shipping_cost;
                    //alert(totalVat)
                    $('#sku_'+key).val(data.sku);
                    $('#unit_'+key).val(data.unit);
                    $('#rate_'+key).val(data.sale_price);
                    $('#vat').val(totalVat);
                    $('#tax').val(totalTax);
                    $('#shipping_cost').val(totalShipping);
                    $('#available_qty_'+key).val(data.sale_product_count[0].qty);
                }
            })
        }
        function multiplayQty(row){
            var qty = $("#qty_" + row).val();
            var rate = $("#rate_" + row).val();
            var availableQty = $("#available_qty_" + row).val()
            $("#totalQty_" + row).val(parseInt(availableQty) - parseInt(qty))
            $("#total_" + row).val(qty * rate);
            var miscCost = $("#misc_cost_" + row).val();
            var prevBalance = $("#previous_balance_" + row).val();
            var duePaid = $("#paid_amount_" + row).val();
            var netTotal = $("#net_total_" + row).val();
            var dueAmount = (netTotal - duePaid);
            $("#due_amount_0").val(parseInt(dueAmount));
            //console.log(dueAmount)
            var total = 0;
            $(".total").each(function(index, item) {
                total = total + parseInt($(item).val());
            })
            $("#grand_total_0").val(parseInt(miscCost) + (totalTax + totalVat + totalShipping) + total ? parseInt(miscCost) + (totalTax + totalVat + totalShipping) + total : (totalTax + totalVat + totalShipping) + total);
            $("#net_total_0").val((totalTax + totalVat + totalShipping) + total ? parseInt(miscCost) + (totalTax + totalVat + totalShipping) + total + parseInt(prevBalance) : (totalTax + totalVat + totalShipping) + total + parseInt(prevBalance));
        }
        // Append work
        $(document).ready(function () {

            $('#addmore').click(function () {
                addRow();
            });
            function addRow() {
                var key = $('.dataRow').length;
                var add = '<tr id="hide" class="dataRow">\n' +
                    '   <td>\n' +
                    '       <select name="product_name[]" id="product_name_'+key+'" data-row-id="'+key+'" class="form-control select2bs4 productId" onchange="getDetails('+key+')">\n' +
                    '       <option disabled selected>Select a product</option>\n' +
                    @foreach($products as $product)
                        '       <option value="{{ $product->id }}">{{ $product->name }}</option>\n' +
                    @endforeach
                        '       </select>\n' +
                    '    </td>\n' +
                    '   <td>\n' +
                    '       <input type="text" name="sku[]" id="sku_'+key+'" readonly class="form-control m-input" placeholder="Add SKU name" autocomplete="off">\n' +
                    '    </td>\n' +

                    '    <td>\n' +
                    '       <input type="text" name="unit[]" id="unit_'+key+'" readonly class="form-control m-input" placeholder="Add Unit name" autocomplete="off">\n' +
                    '    </td>\n' +
                    '    <td>\n' +
                    '       <input type="text" name="available_qty[]" id="available_qty_'+key+'" readonly class="form-control m-input" placeholder="Add available qty" autocomplete="off">\n' +
                    '    </td>\n' +
                    '    <td>\n' +
                    '       <input type="text" name="qty[]" id="qty_'+key+'" data-row-id="'+key+'" class="form-control m-input qty" onkeyup=multiplayQty('+key+') placeholder="Add qty" autocomplete="off">\n' +
                    '    </td>\n' +
                    '    <td>\n' +
                    '       <input type="text" name="rate[]" id="rate_'+key+'" readonly class="form-control m-input" placeholder="Add rate" autocomplete="off">\n' +
                    '    </td>\n' +
                    '    <td>\n' +
                    '       <input type="text" name="total[]" id="total_'+key+'" readonly class="form-control m-input total" placeholder="Total price" readonly value="0.00" autocomplete="off">\n' +
                    '    </td>\n' +
                    '     </tr>'
                $('tbody').append(add);
            }
        });
        $(document).on('click', '.remove', function () {
            $(this).closest('#hide').remove();
        });
        $(document).on('click', '#editRemove', function () {
            $(this).closest('#saleEdit').remove();
        });
    </script>
@endsection
