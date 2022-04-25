<?php
include('layout/header.php');

$input = isset($_POST['pembaca']) ? $_POST['pembaca'] : "";
$key = [
    'input' => isset($_POST['key']) ? $_POST['key'] : ""
];
$pembaca = explode("\n", str_replace("\r", "", $input));
?>

<div class="row mt-2 pt-2">
    <div class="col">
        <div class="card text-center">
            <div class="card-body">
                <?php
                if (strlen($input) == 0) {
                    echo "<a href='" . baseUrl() . "input.php' class='btn btn-warning' tabindex='-1' role='button'>Input Data</a>";
                } else {
                    if (addPembaca($pembaca, false, true, $key['input'])) {
                        echo "<a href='" . baseUrl() . "input.php' class='btn btn-warning' tabindex='-1' role='button'>Kembali</a>";
                    } else {
                        echo "Kunci Akses tidak valid<br><a href='" . baseUrl() . "input.php' class='btn btn-warning mt-2' tabindex='-1' role='button'>Kembali</a>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2 pt-2 mb-3">
    <?php
    $juz = 1;
    foreach ($data['pembaca'] as $daruser) { ?>
    <div class="col-md-3 kartu">
        <div class="card">
            <div class="card-body">
                <div class="d-grid gap-2">
                    <div class="card shadow-lg bg-warning">
                        <div class="card-body">
                            <span class="badge bg-<?= $daruser['done'] ? 'success' : 'danger'; ?>">Juz
                                <?= $juz; ?></span> <?= $daruser['nama']; ?>
                            <div class="float-end">
                                <?= $daruser['done'] ? '<span class="btn badge rounded-pill bg-success">&#10004</span>' : '<a class="btn badge rounded-pill bg-danger" href="' . baseUrl() . 'done.php?id=' . $daruser['id'] . '" role="button">&#10004</a>'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if ($juz == 29) {
            $juz = 1;
        } else {

            $juz++;
        }
    } ?>
</div>
<div class="row mb-3">
    <div class="col kartu">
        <div class="card">
            <div class="card-body text-center">
                <a href='<?= baseUrl(); ?>reset.php' class='btn btn-warning' tabindex='-1' role='button'>Reset</a>
                <?php if (count($data['pembaca']) > 0) {
                    echo "<a href='' class='btn btn-warning' tabindex='-1' role='button'>Lihat Kunci Akses</a>";
                } ?>
            </div>
        </div>
    </div>
</div>

<?php
include('layout/footer.php'); ?>