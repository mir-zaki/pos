@extends('backend.master')
@section('content')







<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Products</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Products</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>



        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Add Product</h3>
          </div>
          <!-- /.box-header -->
           <form name="myForm" role="form" action="{{route('productadded')}}" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
            @csrf
              <div class="box-body">


                {{-- <div class="form-group">

                  <label for="product_image">Image</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="product_image" name="product_image" type="file">
                      </div>
                  </div>
                </div> --}}

               

                <div class="form-group">
                  <label for="product_name">Product name</label>
                  <input required="" type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" autocomplete="off"/>
                </div>


                <div class="form-group">
                    <label for="price">Sell Price</label>
                    <input required="" type="text" class="form-control" id="sale_price" name="sale_price"
                        placeholder="Enter price" autocomplete="off" />
                </div>






                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea  type="text" class="form-control" id="description" name="description" placeholder="Enter
                  description" autocomplete="off">
                  </textarea>
                </div>




                <div class="form-group">
                  <label for="category">Category</label>
                  <select class="form-control select_group" id="category" name="category" required="">
                    @foreach ($product as $add)

                    <option value="{{$add->id}}">{{$add->category_name}}</option>

                    @endforeach

                    </select>
                </div>



                <div class="form-group">
                  <label for="store">Availability</label>
                  <select class="form-control" id="availability" name="availability" required="">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                  </select>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="" class="btn btn-warning">Back</a>
              </div>
            </form>
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

<script type="text/javascript">
  $(document).ready(function() {
    $(".select_group").select2();
    $("#description").wysihtml5();

    $("#mainProductNav").addClass('active');
    $("#addProductNav").addClass('active');

    var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' +
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="glyphicon glyphicon-tag"></i>' +
        '</button>';
    $("#product_image").fileinput({
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });

  });
</script>

<script>
    function validateForm() {
      let x = document.forms["myForm"]["product_image"]["product_name"]["sale_price"]["description"]["category"]["availability"].value;
      if (x == "") {
        alert("Name must be filled out");
        return false;
      }
    }
    </script>

<div>
</div>
@endsection
