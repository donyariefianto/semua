<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CDN Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- CDN Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/07323268fb.js"></script>
</head>

<body>
    <div class="container">
        <h3 align=center>Live Table With Ajax</h3>
        <br />
        <div class="table-responsive">
            <br />
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>nim</th>
                        <th>NAMA</th>
                        <th>TAHUN LULUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {

        // load semua data
        function load_data() {
            $.ajax({
                url: "<?= base_url(); ?>/livetable/load_data",
                dataType: "JSON",
                success: function(data) {
                    // buat kolom inputan
                    var html = '<tr>';
                    html += '<td id="nim" contenteditable placeholder="Masukkan nim"></td>';
                    html += '<td id="nama" contenteditable placeholder="Masukkan Nama"></td>';
                    html += '<td id="jurusan" contenteditable placeholder="Masukkan Tahun Lulus"></td>';
                    html += '<td><button type="button" name="btn_add" id="btn_add" class="btn btn-sm btn-primary"><span class="fa fa-plus"></span> Tambah</td></tr>';
                    //data dalam bentuk json di looping disini
                    for (var count = 0; count < data.length; count++) {
                        html += '<tr>';
                        html += '<td class="table_data" data-row_id="' +
                            data[count].id + '" data-column_name="nim" contenteditable>' + data[count].nim +
                            '</td>';
                        html += '<td class="table_data" data-row_id="' +
                            data[count].id + '" data-column_name="nama" contenteditable>' + data[count].nama +
                            '</td>';
                        html += '<td class="table_data" data-row_id="' +
                            data[count].id + '" data-column_name="jurusan" contenteditable>' + data[count].jurusan +
                            '</td>';
                        html += '<td><button type="button" name="delete_btn" id="' + data[count].id + '" class="btn btn-sm btn-danger btn_delete"><span class="fa fa-trash"></span></button></td></tr>';
                    }
                    // hasil looping masukan kesini
                    $('tbody').html(html);
                }
            });
        }
        load_data(); // panggil fungsi load data

        // simpan data
        $(document).on('click', '#btn_add', function() {
            var nim = $('#nim').text(); // ambil text dr id nim
            var nama = $('#nama').text(); // ambil text dr id nama
            var jurusan = $('#jurusan').text(); // ambil text dr id jurusan

            // cek jika inputan kosong
            if (nim == '') {
                alert('masukkan nim');
                return false;
            }
            if (nama == '') {
                alert('masukkan nama');
                return false;
            }

            // jika inputan ada isinya kirim request dengan ajax
            $.ajax({
                url: '<?= base_url(); ?>livetable/insert_data',
                method: 'POST',
                // data yg dikirim (name : value)
                data: {
                    nim: nim,
                    nama: nama,
                    jurusan
                },
                // callback jika data berhasil disimpan
                success: function(data) {
                    //panggil fungsi
                    alert('data berhasil ditambah');
                    load_data();
                }
            });

        });

        // update data
        $(document).on('blur', '.table_data', function() {
            var id = $(this).data('row_id'); // ambil nilai attribut data row_id dari class table_data
            var table_column = $(this).data('column_name'); // ambil nilai attribut data column_name dari class table_data
            var value = $(this).text(); // ambil value text dari class table_data

            $.ajax({
                url: '<?= base_url(); ?>livetable/update_data',
                method: 'POST',
                // data yg dikirim ke server untuk update data (name:value)
                data: {
                    id: id,
                    table_column: table_column,
                    value: value
                },
                success: function(data) {
                    load_data(); // panggil fungsi load data jika berhasil update
                }
            });
        });

        // delete data
        $(document).on('click', '.btn_delete', function() {
            var id = $(this).attr('id'); // ambil nilai dr attribut id

            if (confirm("apakah kamu yakin hapus data ini?")) {
                $.ajax({
                    url: "<?= base_url(); ?>livetable/delete_data",
                    method: 'POST',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        load_data();
                    }
                });
            }
        });
    });
</script>