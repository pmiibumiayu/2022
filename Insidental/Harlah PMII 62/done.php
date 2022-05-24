<?php
include('layout/header.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';
$daruser = $data['pembaca'][$id - 1];
$key = isset($_POST['key']) ? $_POST['key'] : '';
$galat = false;
if (isset($_POST['key'])) {
    if ($key == $data['pairkey'][$id - 1]) {
        $galat = false;
        $data['pembaca'][$id - 1]['done'] = true;
        $datajson = json_encode($data['pembaca']);
        file_put_contents('pembaca.json', $datajson);
        echo "<script>window.location = '" . baseUrl() . "'</script>";
    } else {
        $galat = true;
    }
}
?>
<div class="row mt-2 pt-2">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="d-grid gap-2">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <?php if ($galat) { ?>
                            <div class="text-center">
                                <div class="alert alert-danger" role="alert">
                                    Kunci Akses yang anda masukkan tidak valid !
                                </div>
                            </div>
                            <?php }
                            if (!isset($_GET['id'])) { ?>
                            <div class="text-center">
                                <a href="<?= baseUrl(); ?>" class="btn btn-primary" tabindex="-1"
                                    role="button">Kembali</a>
                            </div>
                            <?php } else { ?>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingKey"
                                            placeholder="Masukkan key disini" name="key" required>
                                        <label for="floatingKey">Kunci Akses</label>
                                    </div>
                                </div>
                                <div class="float-start">
                                    <button type="submit" class="btn btn-primary">Selesai</button>
                                </div>
                                <div class="float-end">
                                    <a href="<?= baseUrl(); ?>" class="btn btn-primary" tabindex="-1"
                                        role="button">Kembali</a>
                                </div>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('layout/footer.php'); ?>