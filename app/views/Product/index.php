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
                        <a href="<?= BASEURL; ?>/dashboard"><img src="./assets/img/ico1.png" /><span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="#"><img src="./assets/img/ico3.png" /><span>Product</span></a>
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
            <h2>Halo.. [] 👋🏼</h2>
            <div class="box">
                <h3>Daftar Product</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Stock</th>
                            <th>Type</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php foreach ($data["Product"] as $Product): ?>
                        <tr>
                            <td><?= $Product['id']; ?></td>
                            <td><?= $Product['name_product']; ?></td>
                            <td><?= $Product['price']; ?></td>
                            <td><?= $Product['stock']; ?></td>
                            <td><?= $Product['type_product']; ?></td>
                            <td>
                                <div class="aksi-btn">
                                    <button class="edit-btn btn-color"
                                        onclick="openModal(<?= $Product['id']; ?>)">Edit</button>
                                    <a class="remove-btn" href="<?= BASEURL; ?>/Product/hapusProduct/<?= $Product['id']; ?>"
                                        onclick="return confirmDelete();">Hapus</a>
                                </div>
                            </td>

                        </tr>
                    <?php endforeach ?>
                </table>
            </div>

            <div id="crud-modal" tabindex="-1" aria-hidden="true"
                class="hidden flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Edit Product
                            </h3>
                            <button type="button" onclick=closeModal();
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="crud-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form method="post" action="<?= BASEURL; ?>/Product/editProduct" enctype="multipart/form-data"
                            class="p-4 md:p-5">
                            <input type="hidden" name="id" id="id">
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="name_product"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                    <input type="text" name="name_product" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Nama Product" required="">
                                </div>
                                <div class="col-span-2 ">
                                    <label for="price"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                                    <input type="number" name="price" id="price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Harga" required="">
                                </div>
                                <div class="col-span-2 ">
                                    <label for="stock"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                                    <input type="number" name="stock" id="stock"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Stock" required="">
                                </div>
                                <div class="col-span-2 ">
                                    <label for="type_product"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                                    <input type="text" name="type_product" id="type_product"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type" required="">
                                </div>
                                <!-- <div id="imagePreview"
                                    class="relative w-10/12 bg-center bg-contain bg-no-repeat border-dotted h-32 rounded-lg border-2 border-blue-700 bg-gray-100 flex justify-center items-center">
                                    <div class="absolute">
                                        <div class="flex flex-col items-center"> <i
                                                class="fa fa-folder-open fa-3x text-blue-700"></i> <span id="foto_nama"
                                                class="block text-gray-400 font-normal">Attach your files here</span>
                                        </div>
                                    </div> <input type="file" name="product_image" accept="image/*"
                                        class="h-full w-full opacity-0" id="imageInput">
                                </div> -->
                            </div>
                            <button type="submit"
                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

<script>
    function openModal(productId) {
        var modal = document.getElementById("crud-modal");
        modal.classList.remove("hidden");
        const idProduct = document.getElementById('id');
        idProduct.value = productId; // Set nilai input tersembunyi
        console.log(idProduct.value)
    }

    function closeModal() {
        var modal = document.getElementById("crud-modal");
        // modal.classList.remove("block");
        modal.classList.add("hidden");
    }

    function confirmDelete() {
        return confirm("Apakah Anda yakin ingin menghapus data ini?");
    }

</script>

</html>