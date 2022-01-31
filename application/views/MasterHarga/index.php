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
                <div id="tampil">
                    <!-- Data tampil disini -->
                </div>
                <a data-toggle="modal" data-target="#tambah-data" class="btn btn-success ">Tambah Item</a>
                
              </div>
            </div>
      </div> 
    </div>         
  </div>
</section>
</main>
<!-- End #main -->   
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
     <div class="modal-dialog ">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="">
              <div class="form-group">
                <div class="card mb-3">
                  <div class="card-body">
                    <form method="post" id="form">
                        <div class="form-group">
                          <label for="kategori" class="control-label">Nama Kategori :</label>
                          <input type="text" name="kategori" class="form-control" id="nama">
                        </div>
                        <div class="form-group"> 
                          <label for="ins" class="control-label">Harga Ins:</label>
                          <input type="number" name="ins" class="form-control" >
                        </div>
                        <div class="form-group">
                          <label for="home" class="control-label">Harga Home:</label>
                          <input type="number" name="home" class="form-control" >
                        </div>
                        <div class="form-group">
                          <label for="ormas" class="control-label">Harga Ormas:</label>
                          <input type="number" name="ormas" class="form-control" >
                        </div>
                        <div class="form-group">
                          <label for="agen" class="control-label">Harga Agen:</label>
                          <input type="number" name="agen" class="form-control" >
                        </div>
                        <button id="tombol_tambah" type="button" class="btn btn-primary" data-dismiss="modal" >Tambah</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
     </div>
</div>



<script type="text/javascript">
  $(document).ready(function(){
    $("#tombol_tambah").click(function(){
      var data = $('#form').serialize();
      $.ajax({
        type	: 'POST',
        url	: "<?php echo base_url('Harga/simpan'); ?>",
        data: data,
        cache	: false,
        success	: function(data){
          $('#tampil').load("<?php echo base_url('Harga/tampil'); ?>");
        }
      });
    });
  });
</script> 
<script type="text/javascript">
$(document).ready(function() {
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url(); ?>/Harga/tampil",
        cache: false, 
        success: function(data) {
            $("#tampil").load("<?php echo base_url('Harga/tampil'); ?>");
        }
    });

});
</script>
  <script>
    $(document).ready(function(){
      $('.tambah').click(function(){
        var aksi = 'Tambah';
        $.ajax({
          url: '<?php echo base_url(); ?>/Harga/simpan',
          method: 'post',
          data: {aksi:aksi},
          success:function(data){
            $('#myModal').modal("show");
            $('#tampil_modal').html(data);
            document.getElementById("judul").innerHTML='Tambah Data';
          }
        });
      });
    });
  </script>