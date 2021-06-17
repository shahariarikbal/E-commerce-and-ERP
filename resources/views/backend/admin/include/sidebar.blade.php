<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div style="height: 100px;">
            <img src="{{ asset('/backend/') }}/files/assets/images/avatar-4.jpg" class="" style="margin-left: 85px;border-radius: 55px;margin-top: 20px;height: 50px;" alt="User-Profile-Image"><br/>
            <span style="margin-left: 72px;color: white;">Super Admin</span>
        </div>
        <hr/>
        <ul class="pcoded-item pcoded-left-item">


            <li class="pcoded-hasmenu">
                <a href="{{ url('/admin/dashboard') }}">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
            </li>

            @php
                $user = App\Model\Admin::find(Session::get('id'));
            @endphp

            @if ($user->users == 1 )
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                    <span class="pcoded-mtext">Users</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ url('admin/user/create') }}">
                            <span class="pcoded-mtext">Add User</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ url('admin/user/manage') }}">
                            <span class="pcoded-mtext">Manage User</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ url('admin/user/permission') }}">
                            <span class="pcoded-mtext">Manage Permissions</span>
                        </a>
                    </li>

                </ul>
            </li>
            @endif

            @if ($user->customer == 1 )
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                    <span class="pcoded-mtext">Customer</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ route('customers.create') }}">
                            <span class="pcoded-mtext">Add Customer</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ route('customers.index') }}">
                            <span class="pcoded-mtext">Manage Customer</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ url('/customer/money-receipts') }}">
                            <span class="pcoded-mtext">Money Receipt List</span>
                        </a>
                    </li>

                    <li class=" ">
                        <a href="{{ url('/customer/orders') }}">
                            <span class="pcoded-mtext">Manage Orders</span>
                        </a>
                    </li>

                </ul>
            </li>
             @endif

            @if ($user->currency == 1 )
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>

                    <span class="pcoded-mtext">Currency</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ url('/admin/currency/index') }}">
                            <span class="pcoded-mtext">Manage currency</span>
                        </a>
                    </li>
                </ul>
            </li>
             @endif

            @if ($user->supplier == 1 )
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>

                    <span class="pcoded-mtext">Supplier</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ route('suppliers.create') }}">
                            <span class="pcoded-mtext">Add Supplier</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ route('suppliers.index') }}">
                            <span class="pcoded-mtext">Manage Supplier</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ url('/supplier/money-receipts') }}">
                            <span class="pcoded-mtext">Money Receipt List</span>
                        </a>
                    </li>
                </ul>
            </li>
             @endif

            @if ($user->users == 1 )
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                    <span class="pcoded-mtext">Product Management</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ route('categories.index') }}">
                            <span class="pcoded-mtext">Manage Category</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ url('web/index') }}">
                            <span class="pcoded-mtext">Category with Logo</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ route('subcategories.index') }}">
                            <span class="pcoded-mtext">Manage Subcategory</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ url('products/condition') }}">
                            <span class="pcoded-mtext">Manage Condition</span>
                        </a>
                    </li>
                    <!--<li class=" ">-->
                    <!--    <a href="{{ route('brands.index') }}">-->
                    <!--        <span class="pcoded-mtext">Manage Brand</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <li class=" ">
                        <a href="{{ route('units.index') }}">
                            <span class="pcoded-mtext">Manage Unit</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ url('web/country/list') }}">
                            <span class="pcoded-mtext">Add Tag</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ url('products/create') }}">
                            <span class="pcoded-mtext">Add Product</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ url('products/index') }}">
                            <span class="pcoded-mtext">Manage Product</span>
                        </a>
                    </li>
                    <!--<li class=" ">-->
                    <!--    <a href="{{ url('accessories/index') }}">-->
                    <!--        <span class="pcoded-mtext">Manage Accessories</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <li class=" ">
                        <a href="{{ url('web/bulk/products') }}">
                            <span class="pcoded-mtext">Bulk Products</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ url('web/manufacture') }}">
                            <span class="pcoded-mtext">Manufacturers</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ url('web/brands') }}">
                            <span class="pcoded-mtext">Manage Brand</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ url('web/downloads') }}">
                            <span class="pcoded-mtext">Downloads</span>
                        </a>
                    </li>
                </ul>
            </li>
             @endif

            @if ($user->purchase == 1 )
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>
                    <span class="pcoded-mtext">Purchase Management</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ url('/purchase/create') }}">
                            <span class="pcoded-mtext">Add Purchase</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ url('/purchase/index') }}">
                            <span class="pcoded-mtext">Manage Purchase</span>
                        </a>
                    </li>
                </ul>
            </li>
             @endif

            @if ($user->sale == 1 )
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>
                    <span class="pcoded-mtext">Sale Management</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ url('/sale/create') }}">
                            <span class="pcoded-mtext">Add Sale</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ url('/sale/index') }}">
                            <span class="pcoded-mtext">Manage Sale</span>
                        </a>
                    </li>
                </ul>
            </li>
             @endif

            @if ($user->stock == 1 )
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-bar-chart"></i></span>
                    <span class="pcoded-mtext">Stock Management</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ url('/stock/index') }}">
                            <span class="pcoded-mtext">Manage Stock</span>
                        </a>
                    </li>
                </ul>
            </li>
             @endif

            @if ($user->report == 1 )
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-bar-chart"></i></span>
                    <span class="pcoded-mtext">Report Management</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{ url('/today/sales/report') }}">
                            <span class="pcoded-mtext">Today Sales Report</span>
                        </a>
                    </li>
                </ul>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{ url('/today/purchase/report') }}">
                            <span class="pcoded-mtext">Today Purchase Report</span>
                        </a>
                    </li>
                </ul>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{ url('/today/customer/receipt') }}">
                            <span class="pcoded-mtext">Today Customer Receipt</span>
                        </a>
                    </li>
                </ul>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{ url('/due/sales/report') }}">
                            <span class="pcoded-mtext">Due Sales Report</span>
                        </a>
                    </li>
                </ul>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{ url('/due/purchase/report') }}">
                            <span class="pcoded-mtext">Due Purchase Report</span>
                        </a>
                    </li>
                </ul>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{ url('/profit/report') }}">
                            <span class="pcoded-mtext">Profit Report</span>
                        </a>
                    </li>
                </ul>
            </li>
             @endif

            @if ($user->account == 1 )
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-bar-chart"></i></span>
                    <span class="pcoded-mtext">Account's Management</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ url('/chart/account') }}">
                            <span class="pcoded-mtext">Chart of Account</span>
                        </a>
                    </li>
                </ul>
            </li>
             @endif

            @if ($user->website == 1 )
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                    <span class="pcoded-mtext">Website</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ url('web/about') }}">
                            <span class="pcoded-mtext">About</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ url('web/banner/images') }}">
                            <span class="pcoded-mtext">Banner Images</span>
                        </a>
                    </li>


                    <li class=" ">
                        <a href="{{ url('web/video') }}">
                            <span class="pcoded-mtext">Video</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ url('web/contact') }}">
                            <span class="pcoded-mtext">Contact</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ url('web/team/index') }}">
                            <span class="pcoded-mtext">Professional Team</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ url('web/testimonial/index') }}">
                            <span class="pcoded-mtext">Testimonial</span>
                        </a>
                    </li>
                </ul>
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class=" ">--}}
{{--                        <a href="{{ url('web/products') }}">--}}
{{--                            <span class="pcoded-mtext">Products</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </li>
             @endif
        </ul>
    </div>
</nav>
