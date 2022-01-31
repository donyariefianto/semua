<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Voucer</title>
</head>
<style>
#example2 {
  padding: 1px;
  background: url('assets/qr/vcr2.jpg');
  background-repeat: no-repeat;
  background-size: 1856px 584px;
}
/* 2756x984 */
</style>
<body>
    <?php foreach ($data_user as $row) : ?> 
        <div id="example2">
        <img src="<?= base_url('assets/qr/' . $row->qrcode . '.png') ?>" style="width:115px;height:105px;padding-top:20px;padding-left:25px">
        <h4 style="padding-left:40px"><?= $row->qrcode ?></h4>
        <h1></h1>
        </div><br>
    <?php endforeach; ?>
</body>
</html>