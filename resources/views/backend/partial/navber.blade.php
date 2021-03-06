<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

       

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            @if(auth()->user()->type=='Admin')





                <li id="mainNav">
                    <a href="{{ route('dash') }}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>

                </li>


                <li id="brandNav">
                    <a href="{{ route('pos') }}">
                        <i class="fa fa-shopping-cart"></i><span>POS</span>
                    </a>
                </li>

                <li id="brandNav">
                    <a href="{{ route('manage_sale') }}">
                        <i class="fa fa-shopping-cart"></i><span>Manage Sale </span>
                    </a>
                </li>


                <li class="treeview" id="mainNav">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Users</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li id="mainNav"><a href="{{ route('user') }}"><i class="fa fa-circle-o"></i>
                                Add
                                Users</a></li>

                        <li id="mainNav"><a href="{{ route('usermanage') }}"><i
                                    class="fa fa-circle-o"></i>
                                Manage Users</a></li>
                    </ul>
                </li>


                <li class="treeview" id="mainNav">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Customers</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li id="mainNav"><a href="{{ route('customer') }}"><i
                                    class="fa fa-circle-o"></i> Add
                                Customers</a></li>

                        <li id="mainNav"><a href="{{ route('customer_manage') }}"><i
                                    class="fa fa-circle-o"></i> Manage Customers</a></li>
                    </ul>
                </li>



                <li class="treeview" id="mainNav">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Suppliers</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li id="mainNav"><a href="{{ route('supplier') }}"><i
                                    class="fa fa-circle-o"></i>
                                Suppliers User</a></li>

                        <li id="mainNav"><a href="{{ route('supplier_manage') }}"><i
                                    class="fa fa-circle-o"></i> Manage Suppliers</a></li>
                    </ul>
                </li>





                <li id="categoryNav">
                    <a href="{{ route('category') }}">
                        <i class="fa fa-files-o"></i> <span>Category</span>
                    </a>
                </li>


                <li id="categoryNav">
                    <a href="{{ route('stock') }}">
                        <i class="fa fa-files-o"></i> <span>Stocks</span>
                    </a>
                </li>



                <li class="treeview" id="">
                    <a href="#">
                        <i class="fa fa-cube"></i>
                        <span>Products</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li id="addProductNav"><a href="{{ route('product') }}"><i
                                    class="fa fa-circle-o"></i>
                                Add Product</a></li>
                        <li id="manageProductNav"><a href="{{ route('products') }}"><i
                                    class="fa fa-circle-o"></i> Manage Products</a></li>
                    </ul>
                </li>



                <li class="treeview" id="">
                    <a href="#">
                        <i class="fa fa-cube"></i>
                        <span>Purchase</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li id="addPurchaseNav"><a href="{{ route('Purchase') }}"><i
                                    class="fa fa-circle-o"></i> Add Purchase</a></li>
                        <li id="managePurchaseNav"><a href="{{ route('Purchaseadd') }}"><i
                                    class="fa fa-circle-o"></i> Manage Purchase</a></li>
                    </ul>
                </li>


                <li class="treeview" id="mainOrdersNav">
                    <a href="#">
                        <i class="fa fa-dollar"></i>
                        <span>Payments</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>

                    <ul class="treeview-menu">

                        <li id="managepayment"><a href="{{ route('paymanage') }}"><i
                                    class="fa fa-circle-o"></i> Supplier
                                Payment</a></li>

                        <li id="managepayment"><a href="{{ route('paymanage_customer') }}"><i
                                    class="fa fa-circle-o"></i> Customer
                                Payment</a></li>

                    </ul>
                    <ul class="treeview-menu">

                        <li id="managepayment"><a href="{{ route('paymanage') }}"><i
                                    class="fa fa-circle-o"></i> Supplier
                                Payment</a></li>
                    </ul>
                </li>



                <li class="treeview" id="mainOrdersNav">
                    <a href="#">
                        <i class="glyphicon glyphicon-stats"></i>
                        <span>Report</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>

                    <ul class="treeview-menu">

                        <li id="managepayment"><a href="{{ route('report_sale') }}"><i
                                    class="fa fa-circle-o"></i>Sale Report</a></li>

                        <li id="managepayment"><a href="{{ route('report_purchase') }}"><i
                                    class="fa fa-circle-o"></i>Purchase Report</a></li>

                    </ul>

                </li>



                <li>
                    <a href="{{ route('logout') }}"><i class="glyphicon glyphicon-log-out"></i> </i>
                        <span>Logout</span>
                    </a>
                </li>
            @endif



            @if(auth()->user()->type=='manager')




            <li id="brandNav">
                <a href="{{ route('pos') }}">
                    <i class="fa fa-shopping-cart"></i><span>POS</span>
                </a>
            </li>

            <li id="brandNav">
                <a href="{{ route('manage_sale') }}">
                    <i class="fa fa-shopping-cart"></i><span>Manage Sale </span>
                </a>
            </li>





            <li class="treeview" id="mainNav">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Customers</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="mainNav"><a href="{{ route('customer') }}"><i
                                class="fa fa-circle-o"></i> Add
                            Customers</a></li>

                    <li id="mainNav"><a href="{{ route('customer_manage') }}"><i
                                class="fa fa-circle-o"></i> Manage Customers</a></li>
                </ul>
            </li>



            <li class="treeview" id="mainNav">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Suppliers</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="mainNav"><a href="{{ route('supplier') }}"><i
                                class="fa fa-circle-o"></i>
                            Suppliers User</a></li>

                    <li id="mainNav"><a href="{{ route('supplier_manage') }}"><i
                                class="fa fa-circle-o"></i> Manage Suppliers</a></li>
                </ul>
            </li>





            <li id="categoryNav">
                <a href="{{ route('category') }}">
                    <i class="fa fa-files-o"></i> <span>Category</span>
                </a>
            </li>


            <li id="categoryNav">
                <a href="{{ route('stock') }}">
                    <i class="fa fa-files-o"></i> <span>Stocks</span>
                </a>
            </li>



            <li class="treeview" id="">
                <a href="#">
                    <i class="fa fa-cube"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="addProductNav"><a href="{{ route('product') }}"><i
                                class="fa fa-circle-o"></i>
                            Add Product</a></li>
                    <li id="manageProductNav"><a href="{{ route('products') }}"><i
                                class="fa fa-circle-o"></i> Manage Products</a></li>
                </ul>
            </li>



            <li class="treeview" id="">
                <a href="#">
                    <i class="fa fa-cube"></i>
                    <span>Purchase</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="addPurchaseNav"><a href="{{ route('Purchase') }}"><i
                                class="fa fa-circle-o"></i> Add Purchase</a></li>
                    <li id="managePurchaseNav"><a href="{{ route('Purchaseadd') }}"><i
                                class="fa fa-circle-o"></i> Manage Purchase</a></li>
                </ul>
            </li>


            <li class="treeview" id="mainOrdersNav">
                <a href="#">
                    <i class="fa fa-dollar"></i>
                    <span>Payments</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">

                    <li id="managepayment"><a href="{{ route('paymanage') }}"><i
                                class="fa fa-circle-o"></i> Supplier
                            Payment</a></li>

                    <li id="managepayment"><a href="{{ route('paymanage_customer') }}"><i
                                class="fa fa-circle-o"></i> Customer
                            Payment</a></li>

                </ul>
                <ul class="treeview-menu">

                    <li id="managepayment"><a href="{{ route('paymanage') }}"><i
                                class="fa fa-circle-o"></i> Supplier
                            Payment</a></li>
                </ul>
            </li>



            <li class="treeview" id="mainOrdersNav">
                <a href="#">
                    <i class="glyphicon glyphicon-stats"></i>
                    <span>Report</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">

                    <li id="managepayment"><a href="{{ route('report_sale') }}"><i
                                class="fa fa-circle-o"></i>Sale Report</a></li>

                    <li id="managepayment"><a href="{{ route('report_purchase') }}"><i
                                class="fa fa-circle-o"></i>Purchase Report</a></li>

                </ul>

            </li>



            <li>
                <a href="{{ route('logout') }}"><i class="glyphicon glyphicon-log-out"></i> </i>
                    <span>Logout</span>
                </a>
            </li>
        @endif


        @if(auth()->user()->type=='shopboy')




            <li id="brandNav">
                <a href="{{ route('pos') }}">
                    <i class="fa fa-shopping-cart"></i><span>POS</span>
                </a>
            </li>

            <li id="brandNav">
                <a href="{{ route('manage_sale') }}">
                    <i class="fa fa-shopping-cart"></i><span>Manage Sale </span>
                </a>
            </li>


            <li class="treeview" id="mainNav">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Customers</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="mainNav"><a href="{{ route('customer') }}"><i
                                class="fa fa-circle-o"></i> Add
                            Customers</a></li>

                    <li id="mainNav"><a href="{{ route('customer_manage') }}"><i
                                class="fa fa-circle-o"></i> Manage Customers</a></li>
                </ul>
            </li>



            <li class="treeview" id="mainNav">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Suppliers</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="mainNav"><a href="{{ route('supplier') }}"><i
                                class="fa fa-circle-o"></i>
                            Suppliers User</a></li>

                    <li id="mainNav"><a href="{{ route('supplier_manage') }}"><i
                                class="fa fa-circle-o"></i> Manage Suppliers</a></li>
                </ul>
            </li>





            <li id="categoryNav">
                <a href="{{ route('category') }}">
                    <i class="fa fa-files-o"></i> <span>Category</span>
                </a>
            </li>


            <li id="categoryNav">
                <a href="{{ route('stock') }}">
                    <i class="fa fa-files-o"></i> <span>Stocks</span>
                </a>
            </li>



            <li class="treeview" id="">
                <a href="#">
                    <i class="fa fa-cube"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="addProductNav"><a href="{{ route('product') }}"><i
                                class="fa fa-circle-o"></i>
                            Add Product</a></li>
                    <li id="manageProductNav"><a href="{{ route('products') }}"><i
                                class="fa fa-circle-o"></i> Manage Products</a></li>
                </ul>
            </li>



            <li class="treeview" id="">
                <a href="#">
                    <i class="fa fa-cube"></i>
                    <span>Purchase</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="addPurchaseNav"><a href="{{ route('Purchase') }}"><i
                                class="fa fa-circle-o"></i> Add Purchase</a></li>
                    <li id="managePurchaseNav"><a href="{{ route('Purchaseadd') }}"><i
                                class="fa fa-circle-o"></i> Manage Purchase</a></li>
                </ul>
            </li>


            <li class="treeview" id="mainOrdersNav">
                <a href="#">
                    <i class="fa fa-dollar"></i>
                    <span>Payments</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">

                    <li id="managepayment"><a href="{{ route('paymanage') }}"><i
                                class="fa fa-circle-o"></i> Supplier
                            Payment</a></li>

                    <li id="managepayment"><a href="{{ route('paymanage_customer') }}"><i
                                class="fa fa-circle-o"></i> Customer
                            Payment</a></li>

                </ul>
                <ul class="treeview-menu">

                    <li id="managepayment"><a href="{{ route('paymanage') }}"><i
                                class="fa fa-circle-o"></i> Supplier
                            Payment</a></li>
                </ul>
            </li>



            <li class="treeview" id="mainOrdersNav">
                <a href="#">
                    <i class="glyphicon glyphicon-stats"></i>
                    <span>Report</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">

                    <li id="managepayment"><a href="{{ route('report_sale') }}"><i
                                class="fa fa-circle-o"></i>Sale Report</a></li>

                    <li id="managepayment"><a href="{{ route('report_purchase') }}"><i
                                class="fa fa-circle-o"></i>Purchase Report</a></li>

                </ul>

            </li>



            <li>
                <a href="{{ route('logout') }}"><i class="glyphicon glyphicon-log-out"></i> </i>
                    <span>Logout</span>
                </a>
            </li>
        @endif



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<div class="control-sidebar-bg"></div>
</div>
