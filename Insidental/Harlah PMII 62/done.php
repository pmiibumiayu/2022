<?php
include 'key.php';
$jsonString = file_get_contents('pembaca.json');
$data = json_decode($jsonString, true);
$id = isset($_GET['id']) ? $_GET['id'] : '';
$daruser = $data[$id - 1];
$key = isset($_POST['key']) ? $_POST['key'] : '';

if (isset($_POST['key'])) {
    if ($key == $pairkey[$id - 1]) {
        $data[$id - 1]['done'] = true;
        $datajson = json_encode($data);
        file_put_contents('pembaca.json', $datajson);
        echo "<script>window.location = 'index.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <title>PMII Bumiayu</title>
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
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <?php
                                    if (!isset($_GET['id'])) { ?>
                                        <div class="text-center">
                                            <a href="index.php" class="btn btn-primary" tabindex="-1" role="button">Kembali</a>
                                        </div>
                                    <?php } else { ?>
                                        <form action="" method="POST">
                                            <div class="mb-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingKey" placeholder="Masukkan key disini" name="key">
                                                    <label for="floatingKey">Kunci Akses</label>
                                                </div>
                                            </div>
                                            <div class="float-start">
                                                <button type="submit" class="btn btn-primary">Selesai</button>
                                            </div>
                                            <div class="float-end">
                                                <a href="index.php" class="btn btn-primary" tabindex="-1" role="button">Kembali</a>
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
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>