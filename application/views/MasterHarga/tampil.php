<div class="card-body">
    <h5 class="card-title">Manajemen Harga <span>| Today</span></h5>
    <table class="table table-borderless datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Ins</th>
                <th scope="col">Home</th>
                <th scope="col">Ormas</th>
                <th scope="col">Agen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hasil as $row) : ?> 
            <tr>
                <th scope="row"><a href="#"><?= $row->id ?></a></th>
                <td><?= $row->kategori ?></td>
                <td><a href="#" class="text-primary"><?= $row->ins ?></a></td>
                <td><a href="#" class="text-primary"><?= $row->home ?></a></td>
                <td><a href="#" class="text-primary"><?= $row->ormas ?></a></td>
                <td><span class="badge bg-success"><?= $row->agen ?></span></td>
                <td> <button type="button" id="<?php echo $row->id; ?>" class="edit btn btn-warning">Edit</button></td>
                <td><button type="button" id="<?php echo $row->id; ?>" class="hapus btn btn-danger">Hapus</button></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalku">Add</button> -->
    <!-- <a href="User/print" type="button" class="btn btn-success">Print</a>
    <button type="button" class="tambah btn btn-primary" data-toggle="modal" data-target="#myModal">
       Tambah
        </button> -->
</div>

<!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="judul"></h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div id="tampil_modal">
                        <!-- Data akan di tampilkan disini-->
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function(){
        $('.edit').click(function(){
            var id = $(this).attr("id");
            console.log(id);
            $.ajax({
                url: '<?php echo base_url(); ?>/Harga/edit',
                method: 'post',
                data: {id:id},
                success:function(data){
                    $('#myModal').modal("show");
                    $('#tampil_modal').html(data);
                    document.getElementById("judul").innerHTML='Edit Data';
                }
            });
        });
        
        $('.hapus').click(function(){
            var id = $(this).attr("id");
            console.log(id);
            $.ajax({
                url: '<?php echo base_url(); ?>/Harga/hapus/'+id,
                method: 'post',
                success	: function(data){
                    $('#tampil').load("<?php echo base_url(); ?>/Harga/tampil/");
                    }
            });
        });
    });
</script>