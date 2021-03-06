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
           <form role="form" action="{{route('product_update',$product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
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
                    <label for="description">Upload Product Image</label>
                    <input value="{{$product->product_image}}" type="file" class="form-control" name="product_image">
                </div>


                <div class="form-group">
                  <label for="product_name">Product name</label>
                  <input value="{{$product->product_name}}"  type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" autocomplete="off"/>
                </div>


                <div class="form-group">
                    <label for="price">Sell Price</label>
                    <input value="{{$product->sell_price}}"  type="text" class="form-control" id="price" name="sell_price"
                        placeholder="Enter price" autocomplete="off" />
                </div>






                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea value="{{$product->description}}"  type="text" class="form-control" id="description" name="description" placeholder="Enter
                  description" autocomplete="off">
                  </textarea>
                </div>




                <div class="form-group">
                  <label for="category">Category</label>
                  <select value="{{$product->category}}"  class="form-control select_group" id="category" name="category">
                    @foreach ($products as $add)

                    <option value="{{$add->id}}">{{$add->category_name}}</option>

                    @endforeach

                    </select>
                </div>



                <div class="form-group">
                  <label for="store">Availability</label>
                  <select value="{{$product->availability}}"  class="form-control" id="availability" name="availability">
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

<div>
</div>
@endsection
