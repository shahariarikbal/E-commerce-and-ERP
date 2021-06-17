@extends('backend.admin.master')

@section('content')

    <style>
        .jstree .jstree-anchor {
            width: 100%;
        }

        .jstree .block1{
            width: 60%;
            display: inline-block;
            text-align: left;
        }

        .jstree .block2{
            width: 10%;
            display: inline-block;
            text-align: center;
        }
        .jstree .block3{
            width: 10%;
            display: inline-block;
            text-align: center;
        }
    </style>

    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="col-lg-12">



                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-4 text-right d-block ml-auto" data-toggle="modal" data-target="#exampleModalCenter">
                              Create new head
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Create new head</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form action="{{ url('admin/chart/account/head-store') }}" method="POST">
                                        @csrf
                                        
                                      <div class="modal-body">

                                        
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" required class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Parent</label>
                                            <select name="head_id" class="form-control" required>
                                                <option value="-1">Root</option>
                                                @foreach (App\Model\Head::all() as $head)
                                                    <option value="{{ $head->id }}">{{ $head->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                      </div>


                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Create</button>
                                      </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                            <div class="card">
                                <div class="card-block">

                                      <!-- 3 setup a container element -->
                                      <div id="jstree">
                                        <!-- in this example the tree is populated from inline HTML -->
                                            <ul>
                                              <li aria-expanded="true" class="jstree-node jstree-last jstree-open">
                                                <strong class="block1">Head Name</strong>
                                                <strong class="block2">Opening-Balance</strong>
                                                <strong class="block2">Balance</strong>
                                                @if (App\Model\Head::count()>0)
                                                    <ul> {{-- @dd(App\Model\Head::count()>0) --}}
                                                        @foreach (App\Model\Head::where('head_id', null)->orderBy('name', 'asc')->get() as $root)

                                                          <li><strong class="block1">{{ $root->name}}</strong>
                                                            <strong class="block2">{{ $root->opening_balance}}</strong>
                                                            <strong class="block2">{{ $root->balance}}</strong>

                                                            @include('backend.admin.account.recursive', ['root' => $root])
                                                          </li>

                                                        @endforeach


                                                        {{-- account recievable  --}}
                                                          <li>
                                                            <strong class="block1">Accounts Receivable</strong>
                                                            <strong class="block2">0</strong>
                                                            <strong class="block2" id="account_recievable">0</strong>

                                                            <ul>
                                                                @php
                                                                    $account_recievable = 0;
                                                                @endphp
                                                                @foreach ($customers as $key => $customer)
                                                                        @php
                                                                            $customer_ar = 0;
                                                                        @endphp
                                                                    @foreach ($customer->sales as $sale)
                                                                        @php
                                                                            $customer_ar += $sale->due_amount;
                                                                        @endphp
                                                                    @endforeach

                                                                    <li onClick="javascript:window.location.href='{{ url('/customer/all/data/'.$customer->id) }}'">
                                                                        <span class="block1">

                                                                            <a href="{{ url('/customer/all/data/'.$customer->id) }}">
                                                                                {{ $customer->name }}
                                                                            </a>
                                                                        </span>
                                                                        <span class="block2">0</span>
                                                                        <span class="block2">{{ $customer_ar }}</span>   
                                                                        
                                                                    </li>

                                                                    @php
                                                                        $account_recievable += $customer_ar; 
                                                                    @endphp
                                                                @endforeach
                                                            </ul>                                                            
                                                          </li>


                                                        {{-- account payble  --}}
                                                          <li>
                                                            <strong class="block1">Accounts Payable</strong>
                                                            <strong class="block2">0</strong>
                                                            <strong class="block2" id="account_payable">0</strong>

                                                            <ul>
                                                                @php
                                                                    $account_payable = 0;
                                                                @endphp
                                                                @foreach ($suppliers as $key => $supplier)
                                                                    <li onClick="javascript:window.location.href='{{ url('/supplier/all/data/'.$supplier->id) }}'">
                                                                        <span class="block1">

                                                                            <a href="{{ url('/supplier/all/data/'.$supplier->id) }}">
                                                                                {{ $supplier->name }}
                                                                            </a>
                                                                        </span>
                                                                        <span class="block2">0</span>
                                                                        <span class="block2">-{{ $supplier->balance - $supplier->daily_paid }}</span>   
                                                                        
                                                                    </li>

                                                                    @php
                                                                        $account_payable += $supplier->balance - $supplier->daily_paid; 
                                                                    @endphp
                                                                @endforeach
                                                            </ul>                                                            
                                                          </li>
                                                    </ul>                                              
                                                @endif
                                              </li>
                                            </ul>
                                      </div>
                                </div>
                                                       
                            </div>

{{--                             <div class="card">
                                <div class="card-header">
                                    <span style="font-size: 1.25rem; color: black">Charts Of Account</span>
                                    <select class="form-control" id="chart">
                                        <option value="assets">Assets</option>
                                        <option value="receivable">Accounts Receivable</option>
                                        <option value="payable">Accounts Payable</option>
                                    </select>
                                </div>
                                <div class="card-block" id="assets">
                                    <div class="card-title">
                                        <h5>Assets</h5>
                                    </div>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Total Assets</td>
                                            <td>{{ number_format($assets, 2) }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="card-block" id="receivable">
                                    <div class="card-title">
                                        <h5>Account Receivable</h5>
                                    </div>
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Balance</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($customers as $key => $customer)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>
                                                            <a href="{{ url('/customer/all/data/'.$customer->id) }}">
                                                                {{ $customer->name }}
                                                            </a>
                                                        </td>
                                                        <td>{{ $customer->net_total - $customer->paid_amount }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-block" id="payable">
                                    <div class="card-title">
                                        <h5>Account Payable</h5>
                                    </div>
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Credit</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($suppliers as $key => $supplier)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>
                                                            <a href="{{ url('/supplier/all/data/'.$supplier->id) }}">
                                                            {{ $supplier->name ? $supplier->name : null }}
                                                            </a>
                                                        </td>
                                                        <td>{{ $supplier->balance - $supplier->daily_paid }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $("#assets").show();
        $("#income").hide();
        $("#expense").hide();
        $("#receivable").hide();
        $("#payable").hide();

        $('#chart').change(function () {
            var data = $(this).val();
            //alert(data)
            //console.log(data)
            if (data === "income") {
                $("#income").show();
                $("#assets").hide();
                $("#expanse").hide();
                $("#receivable").hide();
                $("#payable").hide();
            }else if (data === "expense"){
                $("#expense").show();
                $("#income").hide();
                $("#assets").hide();
                $("#receivable").hide();
                $("#payable").hide();
            }else if (data === "receivable"){
                $("#receivable").show();
                $("#expense").hide();
                $("#income").hide();
                $("#assets").hide();
                $("#payable").hide();
            }else if (data === "payable"){
                $("#payable").show();
                $("#receivable").hide();
                $("#expense").hide();
                $("#income").hide();
                $("#assets").hide();
            }else if (data === "assets") {
                $("#assets").show();
                $("#payable").hide();
                $("#receivable").hide();
                $("#expense").hide();
                $("#income").hide();
            }
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#account_recievable').html('{{$account_recievable}}')
            $('#account_payable').html('-{{$account_payable}}')
        });
    </script>
@endsection
