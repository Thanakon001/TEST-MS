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

        <div class="w-75 h-75 bg-white p-4 rounded shadow-lg overflow-hidden">

            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-center gap-2">
                    <h3>ข้อมูลสถิติของห้องสมุด</h3>
                </div>
            </div>

            <div class="row w-100 h-50 mt-3 d-flex justify-content-center align-items-center gap-3">
                <div class="row w-50 h-50 mt-3 d-flex justify-content-center align-items-center gap-3">
                    <?php
                    $book = "SELECT * FROM tb_book";
                    $bookCount = mysqli_query($conn, $book);
                    $resultBook = mysqli_num_rows($bookCount);

                    $member = "SELECT * FROM tb_member";
                    $memberCount = mysqli_query($conn, $member);
                    $resultMember = mysqli_num_rows($memberCount);

                    $borrow = "SELECT * FROM tb_borrow_book";
                    $borrowCount = mysqli_query($conn, $borrow);
                    $resultBorrow = mysqli_num_rows($borrowCount);

                    $borrowNot = "SELECT * FROM tb_borrow_book WHERE br_date_tr IS NULL";
                    $borrowNotCount = mysqli_query($conn, $borrowNot);
                    $resultBorrowNot = mysqli_num_rows($borrowNotCount);
                    ?>
                    <div class="w-75 rounded shadow-lg bg-success d-flex justify-content-center align-items-center" style="height:170px">
                        <h1 class="text-white text-center"><?= $resultBook ?></h1>
                        <h5 class="text-white text-center">หนังสือทั้งหมด(เล่ม)</h5>
                    </div>
                    <div class="w-75 rounded shadow-lg bg-primary d-flex justify-content-center align-items-center" style="height:170px">
                        <h1 class="text-white text-center"><?= $resultMember ?></h1>
                        <h5 class="text-white text-center">สมาชิกทั้งหมด(คน)</h5>
                    </div>
                </div>

                <div class="row w-50 h-50 mt-3 d-flex justify-content-center align-items-center gap-3">
                    <div class="w-75 rounded shadow-lg bg-warning d-flex justify-content-center align-items-center" style="height:170px">
                        <h1 class="text-white text-center"><?= $resultBorrow ?></h1>
                        <h5 class="text-white text-center">การใช้บริการยืม-คืนหนังสือ (ครั้ง)</h5>
                    </div>
                    <div class="w-75 rounded shadow-lg bg-danger d-flex justify-content-center align-items-center" style="height:170px">
                        <h1 class="text-white text-center"><?= $resultBorrowNot ?></h1>
                        <h5 class="text-white text-center">หนังสือค้างส่ง (เล่ม)</h5>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>