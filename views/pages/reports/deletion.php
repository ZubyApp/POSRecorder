<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Delete</title>
</head>

<body>
    <?php include HEADER ?>

    <div class="grid w-screen place-items-center mt-10">
        <p class=" font-bold text-2xl text-pink-500">Daily Totals & Balance Report</p>
    </div>
    <!-- copied table start -->
    <div class="overflow-x-auto overflow-scroll">
        <div class="min-w-fit min-h-min bg-white flex items-center justify-center font-sans">
            <div class="max-w-max lg:w-5/6">
                <div class="bg-white shadow-md rounded my-6">

                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-pink-500 text-white text-sm leading-normal">
                                <th class="py-1 px-1 text-left">No.</th>
                                <th class="py-1 px-1 text-center">Date</th>
                                <th class="py-1 px-1 text-center">OpBal</th>
                                <th class="py-1 px-1 text-center">Transfers</th>
                                <th class="py-1 px-1 text-center">Airtime</th>
                                <th class="py-1 px-1 text-center">Electricity</th>
                                <th class="py-1 px-1 text-center">CableTv</th>
                                <th class="py-1 px-1 text-center">C-Charges</th>
                                <th class="py-1 px-1 text-center">E-Charges</th>
                                <th class="py-1 px-1 text-center">Withdrawals</th>
                                <th class="py-1 px-1 text-center">ECBal</th>
                                <th class="py-1 px-1 text-center">ACBal</th>
                                <th class="py-1 px-1 text-center">Diff</th>
                                <th class="py-1 px-1 text-center">Erase</th>
                                <th class="py-1 px-1 text-center">User</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-normal border-2">
                            <?php if (empty($savedBals)) : ?>
                                <tr>
                                    <td>No records found</td>
                                </tr>
                            <?php else : $num = 0 ?>
                                <?php foreach ($savedBals as $savedBal) : $num += 1 ?>
                                    <p class="text-pink-500 font-semibold">Are you sure you want to delete this record? <a href="/deleteTotals?id=<?= $savedBal['id'] ?>" class="underline hover:text-black">Yes?</a> or <a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="underline hover:text-black">Go Back?</a></p>
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-1 px-2 text-left whitespace-nowrap border-r-2">
                                            <div class="flex items-center">
                                                <div class="mr-2">
                                                </div>
                                                <span class="font-medium"><?= $num ?></span>
                                            </div>
                                        </td>
                                        <td class="py-1 px-2 text-center border-r-1">
                                            <?= date('d/M/Y', strtotime($savedBal['date'])) ?>
                                        </td>
                                        <td class="bg-gray-100 text-gray-800 font-bold py-1 px-3 rounded-full text-xs text-center border-r-1 text-center border-r-1 text-center border-r-1">
                                            <?= $savedBal['openingbal'] ?>
                                        </td>
                                        <td class="px-1 text-center border-r-1 bg-green-400 text-gray-800 font-bold py- rounded-full text-xs">
                                            <?= $savedBal['transfers'] ?>
                                        </td>
                                        <td class="bg-blue-400 text-gray-800 font-bold py-1 px-1 rounded-full text-xs text-center border-r-1">
                                            <?= $savedBal['airtime'] ?>
                                        </td>
                                        <td class="bg-orange-400 text-gray-800 font-bold py-1 px-3 rounded-full text-xs text-center border-r-1">
                                            <?= $savedBal['electricity'] ?>
                                        </td>
                                        <td class="bg-lime-500 text-gray-800 font-bold py-1 px-3 rounded-full text-xs text-center border-r-1">
                                            <?= $savedBal['cabletv'] ?>
                                        </td>
                                        <td class="bg-blue-400 text-gray-800 font-bold py-1 px-3 rounded-full text-xs text-center border-r-1">
                                            <?= $savedBal['cashcharge'] ?>
                                        </td>
                                        <td class="bg-yellow-400 text-gray-800 font-bold py-1 px-3 rounded-full text-xs text-center border-r-1">
                                            <?= $savedBal['electcharge'] ?>
                                        </td>
                                        <td class="bg-red-400 text-gray-800 font-bold py-1 px-3 rounded-full text-xs text-center border-r-1">
                                            <?= $savedBal['withdrawals'] ?>
                                        </td>
                                        <td class="bg-gray-100 text-gray-800 font-bold py-1 px-3 rounded-full text-xs text-center border-r-1 text-center border-r-1">
                                            <?= $savedBal['exclosingbal'] ?>
                                        </td>
                                        <td class="bg-gray-100 text-gray-800 font-bold py-1 px-3 rounded-full text-xs text-center border-r-1 text-center border-r-1">
                                            <?= $savedBal['actclosingbal'] ?>
                                        </td>
                                        <td class="bg-gray-100 text-gray-800 font-bold py-1 px-3 rounded-full text-xs text-center border-r-1 text-center border-r-1">
                                            <?= $savedBal['difference'] ?>
                                        </td>
                                        <td class="py-1 px-2 text-center">
                                            <div class="flex item-center justify-center">
                                                <!-- <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </div> -->
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <a href="/deleteTotals?id=<?= $savedBal["id"] ?>" id="delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-1 px-2 text-center">
                                            <span class="text-xs font-bold"><?= $savedBal['user'] ?></span>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            <?php endif ?>
                            <!-- End of first table row -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include FOOTER ?>

</body>

</html>