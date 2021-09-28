@extends('backend.master')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        Sale</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Purchase</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div id="messages"></div>



            <br /> <br />




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
                                            <i class="fa fa-printer"></i>Print
                                        </button>


                                        </div>

                                    </div>

                                </form>



                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <br>
            <br>






          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Products</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="manageTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Invoice No</th>
                  <th>Date</th>
                  <th>Customer</th>
                  <th>Total Price</th>
                  <th>Sale By</th>
                  <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach($salemanage as $sa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>inv{{$sa->id}}m</td>
                        <td>{{$sa->sale_date}}</td>
                        <td>{{$sa->Customer->customer_name}}</td>
                        <td>{{$sa->total_price}}</td>
                        <td>{{$sa->User->username}}</td>





                        <td class="">
                            <a href="{{route('sale_list',$sa->id)}}"><i class="material-icons">view_list</i></a>


                        </td>




                    </tr>
                    @endforeach()
            </tbody>

              </table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->


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


@endsection
