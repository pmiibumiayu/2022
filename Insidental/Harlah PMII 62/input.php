<?php include('layout/header.php');
?>
<div class="row mt-2 pt-2">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="d-grid gap-2">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <form action="<?= baseUrl(); ?>" method="POST">
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <textarea class="form-control"
                                            placeholder="Masukkan Nama-nama sahabat-sahabati yang mengikuti tadarus disini"
                                            id="floatingTextarea2" style="height: 200px" name="pembaca"
                                            required></textarea>
                                        <label for="floatingTextarea2">List Pembaca</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingKey"
                                            placeholder="Masukkan key disini" name="key" required>
                                        <label for="floatingKey">Kunci Akses</label>
                                    </div>
                                </div>
                                <div class="float-start">
                                    <button type="submit" class="btn btn-primary">Gacha</button>
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