<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
</head>

<body>
    <div class="wrapper-all">
        <div class="sidebar">
            <div class="top">
                <div class="title">
                    <img src="<?= BASEURL; ?>/assets/img/logo-movil.png" alt="logo" />
                    <h2 class="font-bold text-3xl">Zall Store</h2>
                </div>
                <ul>
                    <li class="active">
                        <a href="#"><img src="./assets/img/ico1.png" /><span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= BASEURL; ?>/Product"><img src="./assets/img/ico3.png" /><span>Product</span></a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/InsertDataProduct"><img src="./assets/img/ico7.png" /><span>Add
                                Product</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="account">
                <div class="profile">
                    <img src="./assets/img/profile.jpg" alt="image">
                    <div class="name">
                        <h4>Rizal</h4>
                        <p>Admin</p>
                    </div>
                </div>
                <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                    </svg></span>
            </div>
        </div>



        <div class="main-content">
            <div class="grid grid-cols-3 gap-5">
                <?php foreach ($data["Product"] as $Product): ?>
                    <div class="max-w-sm w-full max-h-max rounded-3xl lg:max-w-full lg:flex">
                        <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover bg-no-repeat rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                            title="Woman holding a mug">
                            <img class="object-cover w-full h-full" src="./assets/<?php echo $Product["image_product"]; ?>"
                                alt="">
                        </div>
                        <div
                            class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            <div class="mb-8">
                                <div class="text-gray-900 font-bold text-xl mb-2"><?= $Product["name_product"] ?></div>

                                <div class="mt-5">
                                    <p class="text-gray-700 text-base"> Harga : Rp. <?= $Product["price"]; ?>
                                    </p>
                                    <p class="text-gray-700 text-base"> Stock : <?= $Product["stock"]; ?>
                                    </p>
                                    <p class="text-gray-700 text-base"> Type : <?= $Product["type_product"]; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach ?>
            </div>
        </div>
    </div>
</body>

</html>