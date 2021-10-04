@extends('backend.master')
@section('content')

@php
    $total=0;
@endphp

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        REPORT</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">REPORT</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div id="messages"></div>
          <br>
          <br>




          <div class="card">
            <div class="container pt-lg-3 pb-lg-5">
                <div class="forms-top">
                    <div class="form-right">
                        <div class="form-inner-cont">
                            <h3 class="title-small"></h3>
                            <form action="#" method="get">
                                <div class="row book-form">
                                    <div class="form-input col-md-3 col-sm-6 mt-3">
                                        <label>Select Date</label>
                                        <input  type="date" name="from_date" placeholder="Date"
                                            required="">
                                    </div>
                                    <div class="bottom-btn col-md-4 col-sm-6 mt-3">
                                        <button type="submit"
                                            class="btn btn-style btn-primary w-100 px-2">Search
                            </button>



                                    <button class="btn btn-primary" onclick="printDiv('printableArea')">
                                        <i class="fa fa-print"></i> Print
                                    </button>


                                    </div>

                                </div>

                            </form>



                        </div>
                    </div>
                </div>
            </div>
        </div>




            <br /> <br />


            <div id="printableArea">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Purchase Report</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="manageTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Date</th>
                  <th>Challan No</th>
                  <th>Supplier</th>
                  <th>Total Price</th>
                  <th>Received By</th>
                  {{-- <th>category</th> --}}
                  </tr>
                </thead>
                <tbody>

                    @foreach($purchasemanage as $purc)
                    @php

                    $total=$purc->total_price+ $total
                @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$purc->purchase_date}}</td>
                        <td>{{$purc->challan_no}}</td>
                        <td>{{$purc->supplier->supplier_name}}</td>
                        <td>{{$purc->total_price}}</td>
                        <td>{{$purc->User->username}}</td>




                    </tr>
                    @endforeach()
            </tbody>

              </table>
              <td>TOTAL- {{$total}} TK</td>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->

      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- remove brand modal -->


        </form>


      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->





    <div class="control-sidebar-bg"></div>
  </div>

  <script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

</script>


@endsection
