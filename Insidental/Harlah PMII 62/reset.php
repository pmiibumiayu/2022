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
</div>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>