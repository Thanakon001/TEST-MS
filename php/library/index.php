<?php
require_once 'conn.php';
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

        <div class="w-75 h-75 bg-white p-4 rounded shadow-lg overflow-hidden">

            <div class="row mt-3 text-center">
                <h3>การจัดการข้อมูลยืม-คืนหนังสือ</h3>
            </div>

            <form method="POST" class="row mt-3 d-flex justify-content-center align-items-center">
                <div class="input-group w-75">
                    <input type="text" name="txtSearch" class="form-control">
                    <button class="btn btn-info d-flex justify-content-center align-items-center gap-1 text-white"
                        name="Search">ค้นหา</button>
                </div>
            </form>

            <?php
            if (isset($_POST['Search'])) {
                $txtSearch = $_POST['txtSearch'];
                $sql =
                    "SELECT * FROM tb_borrow_book
                    INNER JOIN tb_member
                    ON tb_member.m_user = tb_borrow_book.m_user
                    INNER JOIN tb_book
                    ON tb_book.b_id = tb_borrow_book.b_id
                    WHERE tb_borrow_book.b_id LIKE '%$txtSearch%' OR tb_book.b_name LIKE '%$txtSearch%' OR tb_member.m_name LIKE '%$txtSearch%'
                    ORDER BY tb_borrow_book.br_date_br DESC";
            } else {
                $sql =
                    "SELECT * FROM tb_borrow_book
                    INNER JOIN tb_member
                    ON tb_member.m_user = tb_borrow_book.m_user
                    INNER JOIN tb_book
                    ON tb_book.b_id = tb_borrow_book.b_id
                    ORDER BY tb_borrow_book.br_date_br DESC";
            }
            ?>

            <div class="row mt-3">
                <div class="input-group w-100 d-flex justify-content-end align-items-center">
                    <a href="borrow_br.php" class="btn btn-success">ยืม-คืนหนังสือ</a>
                    <a href="chart.php" class="btn btn-warning">ข้อมูลสถิติ</a>
                </div>
            </div>

            <div class="row mt-3">
                <div class="table-responsive overflow-auto">
                    <table class="table">
                        <tr>
                            <th>รหัสหนังสือ</th>
                            <th>ชื่อหนังสือ</th>
                            <th>ผู้ยืม-คืน</th>
                            <th>วันที่ยืม</th>
                            <th>วันที่คืน</th>
                            <th>ค่าปรับ</th>
                        </tr>
                        <?php
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?= $data['b_id'] ?></td>
                                    <td><?= $data['b_name'] ?></td>
                                    <td><?= $data['m_name'] ?></td>
                                    <td><?= $data['br_date_br'] ?></td>
                                    <td><?= $data['br_date_tr'] === null ? '0000-00-00' : $data['br_date_tr'] ?></td>
                                    <td><?= $data['br_fine'] ?></td>
                                </tr>
                            <?php }
                        } ?>
                    </table>
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>