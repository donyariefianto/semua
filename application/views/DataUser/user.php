<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard')?>">Home</a></li>
      <li class="breadcrumb-item">Pages</li>
      <li class="breadcrumb-item active">Blank</li>
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

                <div class="card-body">
                  <h5 class="card-title">Manajemen User <span>| Today</span></h5>
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Barcode</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data_user as $row) : ?> 
                      <tr>
                        <th scope="row"><a href="#"><?= $row->id ?></a></th>
                        <td><?= $row->name ?></td>
                        <td><a href="#" class="text-primary"><?= $row->password ?></a></td>
                        <td>$64</td>
                        <td><span class="badge bg-success"><?= $row->email ?></span></td>
                        <td>
                            <img src="<?= base_url('assets/qr/' . $row->name . '.png') ?>" alt="QRcode-siswa" width="100px">
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalku">
                    Add</button>
                    <a href="User/print" type="button" class="btn btn-success">
                    Print</a>
                </div>
              </div>
            </div><!-- End Recent Sales -->
      </div> 
    </div>         
  </div>
</section>
</main><!-- End #main -->    
<!-- Modal tambah -->
<form action="<?php echo base_url('User/simpan')?>" method="post">
        <div class="modal fade" id="modalku" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New</h4>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                    <label for="nama" class="control-label">Nama:</label>
                    <input type="text" name="nama" class="form-control" id="nama">
                  </div>
                  <div class="form-group">
                    <label for="Jumlah" class="control-label">Jumlah Voucher:</label>
                    <input type="number" name="jumlah" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="Tanggal Expired" class="control-label">Tanggal Expired:</label>
                    <input type="date" name="exprd" class="form-control" >
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </div>
        </div>
    </form>
  <!-- <div class="modal fade" id="modalku">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Header Modal</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          Body Modal
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> -->

  <script>
    $(document).ready(function(){
      $('.tambah').click(function(){
        var aksi = 'Tambah';
        $.ajax({
          url: '<?php echo base_url(); ?>/User/simpan',
          method: 'post',
          data: {aksi:aksi},
          success:function(data){
            $('#myModal').modal("show");
            $('#tampil_modal').html(data);
            document.getElementById("judul").innerHTML='Tambah Data';
          }
        });
      });

            $('.edit').click(function(){

                    var nim = $(this).attr("nim");
                    $.ajax({
                        url: '<?php echo base_url(); ?>/mahasiswa/edit',
                        method: 'post',
                        data: {nim:nim},
                        success:function(data){
                            $('#myModal').modal("show");
                            $('#tampil_modal').html(data);
                            document.getElementById("judul").innerHTML='Edit Data';  
                        }
                    });
                });

                $('.hapus').click(function(){

                    var nim = $(this).attr("nim");
                    $.ajax({
                        url: '<?php echo base_url(); ?>/mahasiswa/hapus',
                        method: 'post',
                        data: {nim:nim},
                        success:function(data){
                            $('#myModal').modal("show");
                            $('#tampil_modal').html(data);
                            document.getElementById("judul").innerHTML='Hapus Data';
                        }
                    });
                    });
            });
        </script>