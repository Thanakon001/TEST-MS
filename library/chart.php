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

            <div class="text-center">
                <h3>
                    <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px"
                        fill="#333">
                        <path
                            d="m105-399-65-47 200-320 120 140 160-260 120 180 135-214 65 47-198 314-119-179-152 247-121-141-145 233Zm475 159q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29ZM784-80 676-188q-21 14-45.5 21t-50.5 7q-75 0-127.5-52.5T400-340q0-75 52.5-127.5T580-520q75 0 127.5 52.5T760-340q0 26-7 50.5T732-244l108 108-56 56Z" />
                    </svg>
                    ข้อมูลสถิติของห้องสมุด
                </h3>
            </div>
            <div class="d-flex align-items-center justify-content-center">

                <div class="container mt-2">
                    <div class="row justify-content-between gap-5">
                        <div class="card text-white bg-primary mb-3 col py-2">
                            <div class="card-header">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960"
                                    width="20px" fill="#FFFFFF">
                                    <path
                                        d="M264-288q47.35 0 92.17 12Q401-264 444-246v-454q-42-22-87-33t-93.22-11q-36.94 0-73.36 6.5T120-716v452q35-13 70.81-18.5Q226.63-288 264-288Zm252 42q43-20 87.83-31 44.82-11 92.17-11 37 0 73.5 4.5T840-264v-452q-35-13-71.19-20.5t-72.89-7.5Q648-744 603-733t-87 33v454Zm-36 102q-49-32-103-52t-113-20q-38 0-76 7.5T115-186q-24 10-45.5-3.53T48-229v-503q0-14 7.5-26T76-776q45-20 92.04-30 47.04-10 95.96-10 56.95 0 111.44 13.5Q429.93-789 480-762q51-26 105.19-40 54.18-14 110.81-14 48.92 0 95.96 10Q839-796 884-776q13 6 21 18t8 26v503q0 25-15.5 40t-32.5 7q-40-18-82.48-26-42.47-8-86.52-8-59 0-113 20t-103 52ZM283-495Z" />
                                </svg>
                                หนังสือทั้งหมด (เล่ม)
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fs-1 text-center p-4">
                                    <?php
                                    require_once 'conn.php';
                                    $sql = "SELECT * FROM tb_book";
                                    $result = $conn->query($sql);
                                    echo $result->num_rows;
                                    ?>
                                </h5>
                            </div>
                        </div>

                        <div class="card text-white bg-secondary mb-3 col py-2">
                            <div class="card-header">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960"
                                    width="20px" fill="#FFFFFF">
                                    <path
                                        d="M312-312h480v-480h-72v312l-96-48-96 48v-312H312v480Zm0 72q-29 0-50.5-21.5T240-312v-480q0-29.7 21.5-50.85Q283-864 312-864h480q29.7 0 50.85 21.15Q864-821.7 864-792v480q0 29-21.15 50.5T792-240H312ZM168-96q-29 0-50.5-21.5T96-168v-552h72v552h552v72H168Zm360-696h192-192Zm-216 0h480-480Z" />
                                </svg>
                                การใช้บริการยืม-คืน (ครั้ง)
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fs-1 text-center p-4">
                                    <?php
                                    $sql = "SELECT * FROM tb_borrow_book";
                                    $result = $conn->query($sql);
                                    echo $result->num_rows;
                                    ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-between gap-5">
                        <div class="card text-white bg-success mb-3 col py-2">
                            <div class="card-header"><svg xmlns="http://www.w3.org/2000/svg" height="20px"
                                    viewBox="0 -960 960 960" width="20px" fill="#FFFFFF">
                                    <path
                                        d="M696.23-384Q656-384 628-411.77q-28-27.78-28-68Q600-520 627.77-548q27.78-28 68-28Q736-576 764-548.23q28 27.78 28 68Q792-440 764.23-412q-27.78 28-68 28ZM528-192v-53q0-11.08 4-20.54 4-9.46 12-16.46 32-27 71-40.5t81-13.5q42 0 81 13.5t71 40.5q8 7 12 16.46t4 20.54v53H528ZM384-480q-60 0-102-42t-42-102q0-60 42-102t102-42q60 0 102 42t42 102q0 60-42 102t-102 42Zm0-144ZM96-192v-92q0-25.78 12.5-47.39T143-366q55-32 116.21-49 61.21-17 124.79-17 52 0 102.5 11.5T585-387q-23 7-43 19t-39 26q-29-8-59-13t-60-5q-54.22 0-106.11 14T179-304q-5 3-8 8.28-3 5.27-3 11.72v20h288v72H96Zm288-72Zm.21-288Q414-552 435-573.21t21-51Q456-654 434.79-675t-51-21Q354-696 333-674.79t-21 51Q312-594 333.21-573t51 21Z" />
                                </svg>
                                สมาชิกทั้งหมด (คน)
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fs-1 text-center p-4">
                                    <?php
                                    $sql = "SELECT * FROM tb_member";
                                    $result = $conn->query($sql);
                                    echo $result->num_rows;
                                    ?>
                                </h5>
                            </div>
                        </div>

                        <div class="card text-white bg-danger mb-3 col py-2">
                            <div class="card-header">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960"
                                    width="20px" fill="#FFFFFF">
                                    <path
                                        d="m399-216-51-51 81-81-81-81 51-51 81 81 81-81 51 51-81 81 81 81-51 51-81-81-81 81ZM216-96q-29.7 0-50.85-21.5Q144-139 144-168v-528q0-29 21.15-50.5T216-768h72v-96h72v96h240v-96h72v96h72q29.7 0 50.85 21.5Q816-725 816-696v528q0 29-21.15 50.5T744-96H216Zm0-72h528v-360H216v360Zm0-432h528v-96H216v96Zm0 0v-96 96Z" />
                                </svg>
                                หนังสือค้าส่งทั้งหมด (เล่ม)
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fs-1 text-center p-4">
                                    <?php
                                    $sql = "SELECT * FROM tb_borrow_book WHERE br_date_rt IS NULL";
                                    $result = $conn->query($sql);
                                    echo $result->num_rows;
                                    ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="d-flex align-items-center justify-content-start">
                <div class="d-flex justify-content-end gap-2 mt-1">
                    <a href="index.php" class="btn btn-danger text-white d-flex gap-2 align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                            fill="#FFFFFF">
                            <path
                                d="M288-192v-72h288q50 0 85-35t35-85q0-50-35-85t-85-35H330l93 93-51 51-180-180 180-180 51 51-93 93h246q80 0 136 56t56 136q0 80-56 136t-136 56H288Z" />
                        </svg>
                        ย้อนกลับ
                    </a>
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>


</html>