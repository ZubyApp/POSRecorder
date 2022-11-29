<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="/dist/output.css">
    <title>Extra Records</title>
</head>

<body>
    <?php include HEADER ?>
    <div class="grid w-screen place-items-center mt-10">
        <p class=" font-bold text-2xl text-pink-500">Extras Reports</p>
    </div>
    <div class="overflow-x-auto overflow-scroll">
        <div class="min-w-fit min-h-min bg-white flex items-center justify-center font-sans">
            <div class="max-w-max lg:w-5/6">
                <div class="bg-white shadow-md rounded my-6">

                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-pink-500 text-white text-sm leading-normal">
                                <th class="py-1 px-1 text-left">No.</th>
                                <th class="py-1 px-1 text-center">Date</th>
                                <th class="py-1 px-1 text-center">E-Wallet</th>
                                <th class="py-1 px-1 text-center">BankBal</th>
                                <th class="py-1 px-1 text-center">CashBal</th>
                                <th class="py-1 px-1 text-center">GrossTotal</th>
                                <th class="py-1 px-1 text-center">R-Capital</th>
                                <th class="py-1 px-1 text-center">Profit</th>
                                <th class="py-1 px-1 text-center">Banked Profit</th>
                                <th class="py-1 px-1 text-center">NR-Capital</th>
                                <th class="py-1 px-1 text-center">Change</th>
                                <th class="py-1 px-1 text-center">User</th>
                            </tr>
                        </thead>
                        <?php if (empty($extra)) : ?>
                            <tr>
                                No records found
                            </tr>
                        <?php else :  $num = 1 ?>
                            <?php foreach ($extra as $records) : ?>
                                <tbody class="text-gray-600 text-sm font-normal">
                                    <p class="text-pink-500 font-semibold">Are you sure you want to delete this record? <a href="/deleteTotals?id=<?= $records['id'] ?>" class="underline hover:text-black">Yes?</a> or <a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="underline hover:text-black">Go Back?</a></p>
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-1 px-2 text-left whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="mr-2">
                                                </div>
                                                <span class=""><?= $num++ ?></span>
                                            </div>
                                        </td>
                                        <td class="py-1 px-2 text-center">
                                            <?= date('d/M/Y', strtotime($records['date'])) ?>
                                        </td>
                                        <td class="py-1 px-2 text-center"><?= $records['ewallet'] ?></td>
                                        <td class="py-1 px-2 text-center"><?= $records['bankbal'] ?></td>
                                        <td class="py-1 px-2 text-center"><?= $records['cashbal'] ?></td>
                                        <td class="py-1 px-2 text-center"><?= $records['grosstotal'] ?></td>
                                        <td class="py-1 px-2 text-center"><?= $records['rcapital'] ?></td>
                                        <td class="py-1 px-2 text-center"><?= $records['profit'] ?></td>
                                        <td class="py-1 px-2 text-center"><?= $records['dprofit'] ?></td>
                                        <td class="py-1 px-2 text-center"><?= $records['nrcapital'] ?></td>
                                        <td class="py-1 px-2 text-center">
                                            <div class="flex item-center justify-center">
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <a href="/editExtra?id=<?= $records["id"] ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <a href="/deleteExtra?id=<?= $records["id"] ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-1 px-1 text-center">
                                            <span class="text-xs font-bold"><?= $records['user'] ?></span>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            <?php endif ?>
                                </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include FOOTER ?>
</body>

</html>