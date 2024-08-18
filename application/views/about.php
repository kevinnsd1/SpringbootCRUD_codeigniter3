<?php $this->load->helper('url'); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <?php $this->load->view('_partials/sidebar.php'); ?>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200  rounded-lg dark:border-gray-700">
            <div class="px-2 py-4 text-2xl">
                <h1 class="font-bold">Daftar Lokasi</h1>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nama Lokasi</th>
                            <th scope="col" class="px-6 py-3">Negara</th>
                            <th scope="col" class="px-6 py-3">Provinsi</th>
                            <th scope="col" class="px-6 py-3">Kota</th>
                            <th scope="col" class="px-6 py-3">Dibuat Pada</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_array($lokasi) && !empty($lokasi)): ?>
                            <?php foreach ($lokasi as $item): ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-blue whitespace-nowrap dark:text-white">
                                        <?= htmlspecialchars($item['namaLokasi'], ENT_QUOTES, 'UTF-8'); ?>
                                    </th>
                                    <td class="px-6 py-4"><?= htmlspecialchars($item['negara'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td class="px-6 py-4"><?= htmlspecialchars($item['provinsi'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td class="px-6 py-4"><?= htmlspecialchars($item['kota'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td class="px-6 py-4"><?= date('Y-m-d', strtotime($item['createdAt'])); ?></td>
                                    <td class="px-6 py-4">
                                        <a href="<?php echo base_url('index.php/welcome/edit/' . $item['id']); ?>" class="text-blue-600 hover:underline">Edit</a> |
                                        <a href="<?php echo base_url('index.php/welcome/delete/' . $item['id']); ?>" class="text-red-600 hover:underline" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center">Tidak ada data tersedia.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700">
            <form action="<?php echo base_url('index.php/welcome/create'); ?>" method="POST" class="max-w-md mx-auto">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="namaLokasi" id="floating_namaLokasi"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_namaLokasi"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Location Name
                    </label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="negara" id="floating_negara"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_negara"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Country
                    </label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="provinsi" id="floating_provinsi"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_provinsi"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Province
                    </label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="kota" id="floating_kota"
                        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_kota"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        City
                    </label>
                </div>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Submit
                </button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
