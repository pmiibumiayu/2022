<?php
$input = isset($_POST['pembaca']) ? $_POST['pembaca'] : "";
$pembaca = explode("\n", str_replace("\r", "", $input));
$jsonString = file_get_contents('pembaca.json');
$data = json_decode($jsonString, true);
// var_dump($data);
// var_dump($pembaca);

//I dont check for empty() incase your app allows a 0 as ID.
// var_dump($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <title>PMII Bumiayu</title>
    <style>
    .kartu {
        margin-top: 10px;
    }

    .d-grid {
        align-items: left;
    }
    </style>
</head>

<body class="bg-primary">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col">
                <div class="card bg-warning text-center">
                    <div class="card-body">
                        <h4 class="shadow-lg">
                            Pembagian Juz Khataman Al Qur'an PMII Bumiayu
                        </h4>
                        <h6>dalam rangka memperingati Harlah PMII ke 62 Tahun</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2 pt-2">
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <?php
                        if (strlen($input) == 0) {
                            echo "<a href='index.php' class='btn btn-warning' tabindex='-1' role='button'>Tidak ada input, kembali</a>";
                        } else {
                            shuffle($pembaca);
                            foreach ($pembaca as $darus) {
                                array_push($data, $darus);
                            }
                            $datajson = json_encode($data);
                            file_put_contents('pembaca.json', $datajson);
                            echo "<a href='index.php' class='btn btn-warning' tabindex='-1' role='button'>Kembali</a>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2 pt-2 mb-3">
            <?php
            $juz = 1;
            foreach ($data as $daruser) { ?>
            <div class="col-md-3 kartu">
                <div class="card">
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <div class="card shadow-lg bg-warning">
                                <div class="card-body">
                                    <span class="badge bg-danger">Juz <?= $juz; ?></span> <?= $daruser; ?>
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