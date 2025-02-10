<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-info vh-100">

    <div class="d-flex align-items-center justify-content-center flex-grow-1 w-100 h-100">

        <div class="bg-white w-75 h-75 rounded-1 shadow-lg p-3 py-4 overflow-hidden">

            <!-- หัวข้อ title  -->
            <div class="text-center">
                <h3><svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px"
                        fill="#333">
                        <path
                            d="M560-564v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-600q-38 0-73 9.5T560-564Zm0 220v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-380q-38 0-73 9t-67 27Zm0-110v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-490q-38 0-73 9.5T560-454ZM260-320q47 0 91.5 10.5T440-278v-394q-41-24-87-36t-93-12q-36 0-71.5 7T120-692v396q35-12 69.5-18t70.5-6Zm260 42q44-21 88.5-31.5T700-320q36 0 70.5 6t69.5 18v-396q-33-14-68.5-21t-71.5-7q-47 0-93 12t-87 36v394Zm-40 118q-48-38-104-59t-116-21q-42 0-82.5 11T100-198q-21 11-40.5-1T40-234v-482q0-11 5.5-21T62-752q46-24 96-36t102-12q58 0 113.5 15T480-740q51-30 106.5-45T700-800q52 0 102 12t96 36q11 5 16.5 15t5.5 21v482q0 23-19.5 35t-40.5 1q-37-20-77.5-31T700-240q-60 0-116 21t-104 59ZM280-494Z" />
                    </svg>
                    การจัดการข้อมูลการยืม-คืนหนังสือ
                </h3>
            </div>

            <!-- ตัวค้นหาข้อมูล -->
            <div class="d-flex align-items-center justify-content-center">
                <form method="post" class="d-flex gap-2 col-6 mt-4">
                    <input type="text" class="form-control" name="txt_search">
                    <button type="submit" name="search"
                        class="btn btn-primary text-white d-flex gap-1 align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                            fill="#FFFFFF">
                            <path
                                d="M765-144 526-383q-30 22-65.79 34.5-35.79 12.5-76.18 12.5Q284-336 214-406t-70-170q0-100 70-170t170-70q100 0 170 70t70 170.03q0 40.39-12.5 76.18Q599-464 577-434l239 239-51 51ZM384-408q70 0 119-49t49-119q0-70-49-119t-119-49q-70 0-119 49t-49 119q0 70 49 119t119 49Z" />
                        </svg>
                        ค้นหา
                    </button>
                </form>
            </div>

            <!-- ลิ้งหน้า link pages -->
            <div class="d-flex align-items-center justify-content-end">
                <div class="d-flex justify-content-end gap-2 col-6 mt-4">
                    <a href="br_book.php" class="btn btn-success text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                            fill="#FFFFFF">
                            <path
                                d="M432-192v-72h156l162-216-162-216H168v192H96v-192q0-29.7 21.15-50.85Q138.3-768 168-768h420q16.85 0 31.92 7.5Q635-753 646-739l194 259-194 259q-11 14-26.08 21.5Q604.85-192 588-192H432Zm27-288ZM192-168v-96H96v-72h96v-96h72v96h96v72h-96v96h-72Z" />
                        </svg>
                        ยืม-คืนหนังสือ
                    </a>
                    <a href="chart.php" class="btn btn-warning text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                            fill="#FFFFFF">
                            <path
                                d="m107-384-59-42 192-312 120 144 168-264 120 168 146-222 58 42-202 307-119-166-163 257-119-143-142 231Zm468.77 144Q616-240 644-267.77q28-27.78 28-68Q672-376 644.23-404q-27.78-28-68-28Q536-432 508-404.23q-28 27.78-28 68Q480-296 507.77-268q27.78 28 68 28ZM765-96l-98-98q-19.91 13-43.13 19.5Q600.65-168 576-168q-70 0-119-49t-49-119q0-70 49-119t119-49q70 0 119 49t49 119q0 24.65-6.5 47.87T718-245l98 98-51 51Z" />
                        </svg>
                        ข้อมูลสถิติ
                    </a>
                </div>
            </div>

            <!-- ตาราง index  -->
            <div class="d-flex align-items-center justify-content-center py-3">
                <div class="col-12 table-responsive" style="height: 50vh; overflow-y: auto;">
                    <table class="table table-hover mt-3">
                        <thead class="bg-secondary text-white" style="position: sticky; top: 0; z-index: 2;">
                            <tr>
                                <th>รหัสหนังสือ</th>
                                <th>ชื่อหนังสือ</th>
                                <th>ผู้ยืม-คืน</th>
                                <th>วันที่ยืม</th>
                                <th>วันที่คืน</th>
                                <th>ค่าปรับ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once 'conn.php';

                            if (isset($_POST['search'])) {
                                $txt = $_POST['txt_search'];

                                $sql = "SELECT * FROM tb_borrow_book
                                INNER JOIN tb_member ON tb_member.m_user = tb_borrow_book.m_user
                                INNER JOIN tb_book ON tb_book.b_id = tb_borrow_book.b_id
                                WHERE tb_member.m_name LIKE '%$txt%' OR tb_book.b_name LIKE '%$txt%'
                                ORDER BY tb_borrow_book.br_id DESC";

                            } else {

                                $sql = "SELECT * FROM tb_borrow_book
                                INNER JOIN tb_member ON tb_member.m_user = tb_borrow_book.m_user
                                INNER JOIN tb_book ON tb_book.b_id = tb_borrow_book.b_id
                                ORDER BY tb_borrow_book.br_id DESC";

                            }

                            $result = $conn->query($sql);
                            while ($data = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?= $data['b_id'] ?></td>
                                    <td><?= $data['b_name'] ?></td>
                                    <td><?= $data['m_name'] ?></td>
                                    <td><?= $data['br_date_br'] ?></td>
                                    <td><?= $data['br_date_rt'] ? $data['br_date_rt'] : "00-00-0000" ?></td>
                                    <td><?= $data['br_fine'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>


</html>