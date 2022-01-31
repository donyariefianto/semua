<form method="post" id="form">
    <!--  -->
    <div class="form-group">
         <label for="nama">Nama Kategori:</label>
        <input type="text" class="form-control" value="<?php echo $hasil->kategori; ?>" name="kategori" placeholder="Masukan kategori" >
    </div>
    <div class="form-group">
         <label for="nama">Harga Ins:</label>
        <input type="text" class="form-control" value="<?php echo $hasil->ins; ?>" name="ins" placeholder="Masukan Ins" >
    </div>
    <div class="form-group">
         <label for="nama">Harga Home:</label>
        <input type="text" class="form-control" value="<?php echo $hasil->home; ?>" name="home" placeholder="Masukan home" >
    </div>
    <div class="form-group">
         <label for="nama">Harga Ormas:</label>
        <input type="text" class="form-control" value="<?php echo $hasil->ormas; ?>" name="ormas" placeholder="Masukan ormas" >
    </div>
    <div class="form-group">
         <label for="nama">Harga Agen:</label>
        <input type="text" class="form-control" value="<?php echo $hasil->agen; ?>" name="agen" placeholder="Masukan agen" >
    </div>
    
    <input type="hidden" name="id_lama" value="<?php echo $hasil->id;?>">
    <button id="tombol_edit" type="button" class="btn btn-warning" data-dismiss="modal" >Edit</button>
</form>

<script type="text/javascript">
        $(document).ready(function(){
            $("#tombol_edit").click(function(){
                var data = $('#form').serialize();
                $.ajax({
                    type	: 'POST',
                    url	: "<?php echo base_url(); ?>/Harga/update",
                    data: data,
                    cache	: false,
                    success	: function(data){
                        window.location = "<?php echo base_url(); ?>/Harga"
                    }
                });
            });
        });
</script> 