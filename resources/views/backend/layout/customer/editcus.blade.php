@extends('backend.master')
@section('content')





<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Customers</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Customers</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

                      <div></div>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add Customers</h3>
            </div>
            <form role="form" action="{{route('customer_update',$customers->id)}}" method="post">
              @csrf
              @method('put')

              <div class="box-body">




                <div class="form-group">
                  <label for="username">Name</label>
                  <input value="{{$customers->name}}"  type="text" class="form-control" id="name" name="name" placeholder="Type Customer Name" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input value="{{$customers->email}}" type="email" class="form-control"  id="email" name="email" placeholder="Email" autocomplete="off">
                </div>



                <div class="form-group">
                  <label for="fname">Address</label>
                  <input value="{{$customers->address}}" type="text" class="form-control"  id="address" name="address" placeholder="Address" autocomplete="off">
                </div>


                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input value="{{$customers->phone}}" type="text" class="form-control"  id="phone" name="phone" placeholder="Phone" autocomplete="off">
                </div>



              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="" class="btn btn-warning">Back</a>
              </div>
            </form>
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

<script type="text/javascript">
  $(document).ready(function() {
    $("#groups").select2();

    $("#mainUserNav").addClass('active');
    $("#createUserNav").addClass('active');

  });
</script>



  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>


@endsection
