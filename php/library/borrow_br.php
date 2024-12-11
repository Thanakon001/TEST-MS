<?php
require_once 'conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .bg-pink {
            background-color: pink;
        }

        .bg-white {
            background-color: white;
        }

        .table-responsive {
            max-height: 370px;
        }

        .table-responsive::-webkit-scrollbar {
            display: none;
        }
    </style>

</head>

<body class="bg-pink">

    <div class="container vh-100 d-flex justify-content-center align-items-center">

        <div class="w-50 h-75 bg-white p-4 rounded shadow-lg overflow-hidden">

            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-center gap-2">
                    <a href="borrow_br.php" class="btn btn-success">ยืมหนังสือ</a>
                    <a href="borrow_rt.php" class="btn btn-warning">คืนหนังสือ</a>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-center gap-2">
                    <h3>ยืมหนังสือ</h3>
                </div>
            </div>

            <?php
            if (isset($_POST['sub_user'])) {
                $m_user = $_POST['m_user'];
                $sql = "SELECT * FROM tb_member WHERE m_user = '$m_user'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $data = mysqli_fetch_assoc($result);
                    $_SESSION['br_m_user'] = $data['m_user'];
                    $_SESSION['br_m_name'] = $data['m_name'];
                } else {
                    $_SESSION['br_m_user'] = "";
                    $_SESSION['br_m_name'] = "";
                    echo "<script>alert('ไม่พบข้อมูลสมาชิกหรือหนังสือ')</script>";
                }
            }
            ?>

            <div class="row mt-3 d-flex justify-content-center align-items-center">
                <form method="POST" class="col-9 d-flex justify-content-end align-items-center gap-2">
                    <label for="">ผู้ที่ต้องการยืม :</label>
                    <input type="text" name="m_user" class="form-control w-50">
                    <button name="sub_user" class="btn btn-info text-white">ตกลง</button>
                </form>
            </div>


            <?php
            if (isset($_POST['sub_book'])) {
                $b_id = $_POST['b_id'];
                $sql = "SELECT * FROM tb_book WHERE b_id = '$b_id'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $data = mysqli_fetch_assoc($result);
                    $_SESSION['br_b_id'] = $data['b_id'];
                    $_SESSION['br_b_name'] = $data['b_name'];
                } else {
                    $_SESSION['br_b_id'] = "";
                    $_SESSION['br_b_name'] = "";
                    echo "<script>alert('ไม่พบข้อมูลสมาชิกหรือหนังสือ')</script>";
                }
            }
            ?>
            <div class="row mt-3 d-flex justify-content-center align-items-center">
                <form method="POST" class="col-9 d-flex justify-content-end align-items-center gap-2">
                    <label for="">รหัสหนังสือ :</label>
                    <input type="text" name="b_id" class="form-control w-50">
                    <button name="sub_book" class="btn btn-info text-white">ตกลง</button>
                </form>
            </div>

            <?php
            if (isset($_POST['sub_borrow'])) {
                $b_id = $_SESSION['br_b_id'];
                $m_user = $_SESSION['br_m_user'];
                $dates = new DateTime();
                $br_date_br = $dates->format('y-m-d');

                $sql = "INSERT INTO tb_borrow_book(br_date_br, br_date_tr, m_user, b_id, br_fine)
                    VALUES('$br_date_br',NULL,'$m_user','$b_id',0)";

                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('ทำรายการสำเร็จ'); window.location.href = 'index.php';</script>";
                    $_SESSION['br_m_user'] = "";
                    $_SESSION['br_m_name'] = "";
                    $_SESSION['br_b_id'] = "";
                    $_SESSION['br_b_name'] = "";
                } else {
                    echo "<script>alert('ไม่สามารถบันทึกข้อมูล')</script>";
                }
            }
            ?>
            <div class="row d-flex justify-content-center align-items-center mt-5">
                <form method="POST" class="col-10">
                    <table class="table table-dark">
                        <tr>
                            <td>ชื่อ-สกุลผู้ยืม</td>
                            <td>
                                <?php if (isset($_SESSION['br_m_name'])) { ?>
                                    <input type="text" class="form-control" value="<?= $_SESSION['br_m_name'] ?>" disabled>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>รหัสหนังสือ</td>
                            <td>
                                <?php if (isset($_SESSION['br_b_id'])) { ?>
                                    <input type="text" class="form-control" value="<?= $_SESSION['br_b_id'] ?>" disabled>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>ชื่อหนังสือ</td>
                            <td>
                                <?php if (isset($_SESSION['br_b_name'])) { ?>
                                    <input type="text" class="form-control" value="<?= $_SESSION['br_b_name'] ?>" disabled>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-success" name="sub_borrow">ยืมหนังสือ</button>
                                <a class="btn btn-danger" href="index.php">ยกเลิก</a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>