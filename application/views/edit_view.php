<?php $this->load->helper('url'); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lokasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <?php $this->load->view('_partials/sidebar.php'); ?>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200  rounded-lg dark:border-gray-700">
            <div class="px-2 py-4 text-2xl">
                <h1 class="font-bold">Edit Lokasi</h1>
            </div>
            <div class="relative overflow-x-auto">
                <form action="<?= base_url('index.php/welcome/update'); ?>" method="POST" class="max-w-md mx-auto">
                    <!-- Input hidden untuk ID lokasi -->
                    <input type="hidden" name="id" value="<?= isset($lokasi['id']) ? htmlspecialchars($lokasi['id'], ENT_QUOTES, 'UTF-8') : ''; ?>">

                    <!-- Nama Lokasi -->
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="namaLokasi" id="namaLokasi"
                            class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required value="<?= isset($lokasi['namaLokasi']) ? htmlspecialchars($lokasi['namaLokasi'], ENT_QUOTES, 'UTF-8') : ''; ?>" />
                        <label for="namaLokasi"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Nama Lokasi
                        </label>
                    </div>

                    <!-- Negara -->
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="negara" id="negara"
                            class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required value="<?= isset($lokasi['negara']) ? htmlspecialchars($lokasi['negara'], ENT_QUOTES, 'UTF-8') : ''; ?>" />
                        <label for="negara"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Negara
                        </label>
                    </div>

                    <!-- Provinsi -->
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="provinsi" id="provinsi"
                            class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required value="<?= isset($lokasi['provinsi']) ? htmlspecialchars($lokasi['provinsi'], ENT_QUOTES, 'UTF-8') : ''; ?>" />
                        <label for="provinsi"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Provinsi
                        </label>
                    </div>

                    <!-- Kota -->
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="kota" id="kota"
                            class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required value="<?= isset($lokasi['kota']) ? htmlspecialchars($lokasi['kota'], ENT_QUOTES, 'UTF-8') : ''; ?>" />
                        <label for="kota"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Kota
                        </label>
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
