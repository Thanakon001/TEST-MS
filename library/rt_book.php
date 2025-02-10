<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="sweetalert2.js"></script>

    <script>
        const Alert = (text, icon) => Swal.fire({
            text,
            icon,
            confirmButtonText: "ตกลง",
            draggable: true
        }).then(result => {
            if (result.isConfirmed) {
                window.location = 'rt_book.php'
            }
        });
    </script>
</head>

<body class="bg-info">

    <div class="d-flex align-items-center justify-content-center flex-grow-1 vh-100 vw-100">

        <div class="bg-white w-50 rounded-1 shadow-lg p-3 py-3 overflow-hidden" style="height: 70%;">

            <div class="container py-5">

                <div class="d-flex justify-content-center gap-2">
                    <a href="br_book.php" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                            fill="#FFFFFF">
                            <path
                                d="m684-145-58-42 60-82-97-31 23-69 96 32v-102h72v102l96-32 23 69-97 31 60 82-58 42-60-82-60 82Zm-468 1q-29 0-50.5-21.5T144-216v-528q0-29.7 21.5-50.85Q187-816 216-816h528q29.7 0 50.85 21.04Q816-773.92 816-744.37V-542q-17-5-35.5-7.5T744-552v-192H216v312h168q0 41 30 69.5t71 26.5q-3 17.7-4 35.85-1 18.15 0 36.15-50 1-90.5-25.5T327.67-360H216v144h274q5 20 13.5 37.5T523-144H216Zm0-72h274-274Zm72-396h384v-72H288v72Zm0 120h288q19-17 44-30t52-20v-22H288v72Z" />
                        </svg>
                        ยืมหนังสือ</a>
                    <a href="rt_book.php" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                            fill="#FFFFFF">
                            <path
                                d="M216-216v-528 444-85 169Zm0 72q-29.7 0-50.85-21.15Q144-186.3 144-216v-528q0-29.7 21.15-50.85Q186.3-816 216-816h528q29.7 0 50.85 21.15Q816-773.7 816-744v312h-72v-312H216v528h264v72H216Zm475 48L556-232l51-51 84 85 170-170 51 51L691-96ZM323.79-444q15.21 0 25.71-10.29t10.5-25.5q0-15.21-10.29-25.71t-25.5-10.5q-15.21 0-25.71 10.29t-10.5 25.5q0 15.21 10.29 25.71t25.5 10.5Zm0-156q15.21 0 25.71-10.29t10.5-25.5q0-15.21-10.29-25.71t-25.5-10.5q-15.21 0-25.71 10.29t-10.5 25.5q0 15.21 10.29 25.71t25.5 10.5ZM432-444h240v-72H432v72Zm0-156h240v-72H432v72Z" />
                        </svg>
                        คืนหนังสือ
                    </a>
                </div>

                <div class="text-center py-3">
                    <h4 class="fs-4">ยืมหนังสือ</h4>
                </div>

                <div class="d-flex flex-column align-items-center gap-2">

                    <form action="" method="post" class="col-11 d-flex align-items-center justify-content-center gap-2">
                        <span class="col-3 text-end">รหัสหนังสือที่ต้องการคืน : </span>
                        <input type="text" name="b_id" class="form-control w-25" placeholder="กรอกรหัสหนังสือ">
                        <input type="submit" name="sub_book" class="btn btn-info text-white" value="ตกลง">
                    </form>

                    <?php
                    require_once 'conn.php';
                    session_start();
                    $_SESSION['borrow'] ? $_SESSION['borrow'] : [];

                    if (isset($_POST['sub_book'])) {
                        $txt = $_POST['b_id'];

                        if (empty($_POST['b_id'])) {
                            echo "<script>Alert('กรุณากรอกรหัสหนังสือ','error')</script>";
                            return;
                        }

                        $sql = "SELECT * FROM tb_borrow_book
                        INNER JOIN tb_book ON tb_book.b_id = tb_borrow_book.b_id
                        INNER JOIN tb_member ON tb_member.m_user = tb_borrow_book.m_user
                        WHERE tb_borrow_book.b_id = '$txt' AND tb_borrow_book.br_date_rt IS NULL
                        LIMIT 1
                        ";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $data = $result->fetch_assoc();
                            $_SESSION['borrow']['br_id'] = $data['br_id'];
                            $_SESSION['borrow']['b_id'] = $data['b_id'];
                            $_SESSION['borrow']['b_name'] = $data['b_name'];
                            $_SESSION['borrow']['m_name'] = $data['m_name'];
                            $_SESSION['borrow']['br_date_br'] = $data['br_date_br'];
                        } else {
                            $_SESSION['borrow'] = [];
                            echo "<script>Alert('ไม่พบรายการที่ค้นหา','error')</script>";
                        }
                    }
                    ?>
                </div>

                <form method="post" class="d-flex flex-column align-items-center gap-2 py-4">
                    <table class="table table-dark w-75">
                        <tr>
                            <td class="table-active text-end" style="width:40%">รหัสหนังสือ : </td>
                            <td><?= $_SESSION['borrow'] ? $_SESSION['borrow']['b_id'] : '' ?></td>
                        </tr>
                        <tr>
                            <td class="table-active text-end" style="width:40%">ชื่อหนังสือ : </td>
                            <td><?= $_SESSION['borrow'] ? $_SESSION['borrow']['b_name'] : '' ?></td>
                        </tr>
                        <tr>
                            <td class="table-active text-end" style="width:40%">ชื่อ-นามสกุลผู้ยืม : </td>
                            <td><?= $_SESSION['borrow'] ? $_SESSION['borrow']['m_name'] : '' ?></td>
                        </tr>
                        <tr>
                            <td class="table-active text-end" style="width:40%">วันที่ยีมหนังสือ : </td>
                            <td><?= $_SESSION['borrow'] ? $_SESSION['borrow']['br_date_br'] : '' ?></td>
                        </tr>
                        <tr>
                            <td class="table-active text-end" style="width:40%">ค่าปรับ : </td>
                            <td>
                                <input type="text" name="br_fine" value="0" class="form-control form-control-sm"
                                    placeholder="กรอกค่าปรับ">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="table-active text-center">
                                <button type="submit" name="sub_borrow" class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960"
                                        width="20px" fill="#FFFFFF">
                                        <path
                                            d="m437-402 221-221-55-54-166 166-81-81-55 54 136 136ZM48-144v-72h864v72H48Zm120-120q-29.7 0-50.85-21.15Q96-306.3 96-336v-408q0-29.7 21.15-50.85Q138.3-816 168-816h624q29.7 0 50.85 21.15Q864-773.7 864-744v408q0 29.7-21.15 50.85Q821.7-264 792-264H168Zm0-72h624v-408H168v408Zm0 0v-408 408Z" />
                                    </svg>
                                    บันทึก</button>
                                <a href="index.php" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960"
                                        width="20px" fill="#FFFFFF">
                                        <path
                                            d="M288-192v-72h288q50 0 85-35t35-85q0-50-35-85t-85-35H330l93 93-51 51-180-180 180-180 51 51-93 93h246q80 0 136 56t56 136q0 80-56 136t-136 56H288Z" />
                                    </svg>
                                    ยกเลิก
                                </a>
                            </td>
                        </tr>
                    </table>
                </form>
                <?php
                if (isset($_POST['sub_borrow'])) {
                    $br_fine = $_POST['br_fine'];
                    $br_id = $_SESSION['borrow']['br_id'];
                    $date = new DateTime();
                    $br_date_rt = $date->format('y-m-d');

                    $sql = "UPDATE tb_borrow_book SET br_date_rt = '$br_date_rt', br_fine = $br_fine  WHERE br_id = '$br_id'";
                    if ($conn->query($sql) == TRUE) {
                        $_SESSION['borrow'] = [];
                        echo "<script>Alert('ทำรายการสำเร็จ','success')</script>";
                    }
                }

                ?>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>


</html>