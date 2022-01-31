<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard')?>">Home</a></li>
      <li class="breadcrumb-item">Pages</li>
      <li class="breadcrumb-item active">Harga</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">
    <div class="col-lg-auto">
      <div class="row">
          <!-- Recent Sales -->
          <div class="col-12">
              <div class="card recent-sales">
            
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
                <div>
                    <!-- Data tampil disini -->
                    <div class="card-body">
                        <h5 class="card-title">Manajemen Transaksi <span>| Today</span></h5>
                    <table class="table table-borderless datatable" id="mydata">
                        <thead>
                            <tr>
                                <th>Transaksi Code</th>
                                <th>Transaksi Name</th>
                                <th>Price</th>
                                <th style="text-align: right;">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                            
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div>
                
              </div>
            </div><!-- End Recent Sales -->
      </div> 
    </div>         
  </div>
</section>
</main><!-- End #main -->    
        <!-- MODAL ADD -->
            <form>
            <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Product Code</label>
                            <div class="col-md-10">
                              <input type="text" name="product_code" id="product_code" class="form-control" placeholder="Product Code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Product Name</label>
                            <div class="col-md-10">
                              <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Product Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Price</label>
                            <div class="col-md-10">
                              <input type="text" name="price" id="price" class="form-control" placeholder="Price">
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL ADD-->

<script type="text/javascript">
    $(document).ready(function(){
        show_Transaksi(); //call function show all Transaksi
         
        $('#mydata').dataTable();
          
        //function show all Transaksi
        function show_Transaksi(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('Transaksi/Transaksi_data')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].Transaksi_code+'</td>'+
                                '<td>'+data[i].Transaksi_name+'</td>'+
                                '<td>'+data[i].price+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-Transaksi_code="'+data[i].Transaksi_code+'" data-Transaksi_name="'+data[i].Transaksi_name+'" data-price="'+data[i].price+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-Transaksi_code="'+data[i].Transaksi_code+'">Delete</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }
 
        //Save Transaksi
        $('#btn_save').on('click',function(){
            var Transaksi_code = $('#Transaksi_code').val();
            var Transaksi_name = $('#Transaksi_name').val();
            var price        = $('#price').val();
            console.log(price);
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Transaksi/save')?>",
                dataType : "JSON",
                data : {Transaksi_code:Transaksi_code , Transaksi_name:Transaksi_name, price:price},
                success: function(data){
                    $('[name="Transaksi_code"]').val("");
                    $('[name="Transaksi_name"]').val("");
                    $('[name="price"]').val("");
                    $('#Modal_Add').modal('hide');
                    show_Transaksi();
                }
            });
            return false;
        });
 
        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            var Transaksi_code = $(this).data('Transaksi_code');
            var Transaksi_name = $(this).data('Transaksi_name');
            var price        = $(this).data('price');
             
            $('#Modal_Edit').modal('show');
            $('[name="Transaksi_code_edit"]').val(Transaksi_code);
            $('[name="Transaksi_name_edit"]').val(Transaksi_name);
            $('[name="price_edit"]').val(price);
        });
 
        //update record to database
         $('#btn_update').on('click',function(){
            var Transaksi_code = $('#Transaksi_code_edit').val();
            var Transaksi_name = $('#Transaksi_name_edit').val();
            var price        = $('#price_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Transaksi/update')?>",
                dataType : "JSON",
                data : {Transaksi_code:Transaksi_code , Transaksi_name:Transaksi_name, price:price},
                success: function(data){
                    $('[name="Transaksi_code_edit"]').val("");
                    $('[name="Transaksi_name_edit"]').val("");
                    $('[name="price_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_Transaksi();
                }
            });
            return false;
        });
 
        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var Transaksi_code = $(this).data('Transaksi_code');
             
            $('#Modal_Delete').modal('show');
            $('[name="Transaksi_code_delete"]').val(Transaksi_code);
        });
 
        //delete record to database
         $('#btn_delete').on('click',function(){
            var Transaksi_code = $('#Transaksi_code_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Transaksi/delete')?>",
                dataType : "JSON",
                data : {Transaksi_code:Transaksi_code},
                success: function(data){
                    $('[name="Transaksi_code_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    show_Transaksi();
                }
            });
            return false;
        });
 
    });
 
</script>