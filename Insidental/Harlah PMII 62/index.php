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
                    if ($key['input'] == $setting['key']['access']) {
                        shuffle($pembaca);
                        foreach ($pembaca as $darus) {
                            array_push(
                                $data['pembaca'],
                                [
                                    'id' => count($data['pembaca']) + 1,
                                    'nama' => $darus,
                                    'done' => false
                                ]
                            );
                        }
                        $datajson = json_encode($data['pembaca']);
                        file_put_contents('pembaca.json', $datajson);
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