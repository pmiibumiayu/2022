<?php
include('layout/header.php');
$input = [
    'key' => isset($_POST['key']) ? $_POST['key'] : '',
    'judul' => isset($_POST['judul']) ? $_POST['judul'] : '',
    'subjudul' => isset($_POST['subjudul']) ? $_POST['subjudul'] : '',
    'isreset' => isset($_POST['isreset']) ? true : false,
];
$galat = false;
if (isset($_POST['key'])) {
    if ($input['key'] == $setting['key']['access']) {
        $galat = false;
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
                            <form method="POST">
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingJudul"
                                            placeholder="Masukkan key disini" name="judul"
                                            value="<?= $setting['interface']['judul']; ?>" required>
                                        <label for="floatingJudul">Judul</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingSubJudul"
                                            placeholder="Masukkan key disini" name="subjudul"
                                            value="<?= $setting['interface']['subjudul']; ?>" required>
                                        <label for="floatingSubJudul">Sub Judul</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingKey"
                                            placeholder="Masukkan key disini" name="key" required>
                                        <label for="floatingKey">Kunci Akses</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        name="isreset">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Reset Data
                                    </label>
                                </div>
                                <div class="float-start">
                                    <button type="submit" class="btn btn-primary">Reset</button>
                                </div>
                                <div class="float-end">
                                    <a href="<?= baseUrl(); ?>" class="btn btn-primary" tabindex="-1"
                                        role="button">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('layout/footer.php'); ?>