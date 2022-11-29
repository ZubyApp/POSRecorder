<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="/dist/output.css" rel="stylesheet" />
    <title>Amount Reports</title>
</head>

<body>
    <?php include HEADER ?>
    <div class="grid w-screen place-items-center mt-10">
        <p class=" font-bold text-2xl text-pink-500">Amount Reports</p>
        <!-- first searcch form -->
        <!-- <div class="mt-10 font-medium place-items-center">
            <span class="mt-10 place-content-start">Search for <span class="text-pink-500 font-semibold">Records</span> by amount type</span>
            <form action="/records" method="post" class="mb-2">
                <div class="inline">
                    <button type="submit" class="text-white bg-pink-500 px-2 py-2 rounded-lg hover:bg-pink-400 focus:outline-non focus:ring focus:ring-pink-700 transform transition active:translate-y-0.5 inline font-bold">Search</button>
                </div>
                
                <select id="type" name="type" class="h-full w-1/5 rounded-md border py-2 text-pink-500 focus:border-gray-500 focus:ring-gray-500 font-bold sm:text-sm">
                    <option value="">Select Option</option>
                    <option value="Withdrawal">Withdrawal</option>
                    <option value="Transfer">Transfer</option>
                    <option value="Airtime">Airtime</option>
                    <option value="CableTv">CableTv</option>
                    <option value="Electricity">Electricity</option>
                </select>
                <span class="text-pink-500 font-medium">from</span>
                <input type="date" name="backdate" id="backdate" class=" w-1/4 rounded-md border-gray-300 pl-5 pr-5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm inline" placeholder="dd/mm/yyyy" required>
                <span class="text-pink-500 font-medium">to</span>
                <input type="date" name="backdate" id="backdate" class=" w-1/4 rounded-md border-gray-300 pl-5 pr-5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm inline" placeholder="dd/mm/yyyy" required>
            </form>
        </div> -->
        <!-- end of first search form -->
        <!-- second searcch form -->
        <!-- <div class="mt-10 font-medium">
            <span class="mt-10 place-content-start">Search for <span class="text-pink-500 font-semibold">Records</span> by charge type</span>
            <form action="/records" method="post" class="mb-2">
                <div class="inline">
                    <button type="submit" class="text-white bg-pink-500 px-2 py-2 rounded-lg hover:bg-pink-400 focus:outline-non focus:ring focus:ring-pink-700 transform transition active:translate-y-0.5 inline font-bold">Search</button>
                </div>
                <select id="type" name="type" class="h-full w-1/5 rounded-md border py-2 text-pink-500 focus:border-gray-500 focus:ring-gray-500 font-bold sm:text-sm">
                    <option value="">Select Option</option>
                    <option value="CC">CC</option>
                    <option value="EC">EC</option>
                </select>
                <span class="text-pink-500 font-medium">from</span>
                <input type="date" name="backdate" id="backdate" class=" w-1/4 rounded-md border-gray-300 pl-5 pr-5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm inline" placeholder="dd/mm/yyyy" required>
                <span class="text-pink-500 font-medium">to</span>
                <input type="date" name="backdate" id="backdate" class=" w-1/4 rounded-md border-gray-300 pl-5 pr-5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm inline" placeholder="dd/mm/yyyy" required>
            </form>
        </div> -->
        <!-- end of second search form -->
        <!-- third search form -->

        <!-- end of third search form -->
    </div>

    <!-- copied table start -->
    <div class="overflow-x-auto">
        <div class="min-w-screen min-h-min bg-white flex items-center justify-center font-sans overflow-hidden">
            <div class="max-w-max lg:w-5/6">
                <div class="bg-white shadow-md rounded my-6">
                    <div class="mt-10 font-medium">
                        <span class="mt-10 place-content-start">Search for <span class="text-pink-500 font-semibold">Records</span> by amount</span>
                        <form action="/amountsSearch" method="post" class="mb-2">
                            <select id="range" name="range" class="h-full w-1/5 rounded-md border py-2 text-pink-500 focus:border-gray-500 focus:ring-gray-500 font-bold sm:text-sm" required>
                                <option value="">Select Option</option>
                                <option value=">=,1,<,10000"> 0-10000 </option>
                                <option value=">=,10000,<,30000"> 10000-20000 </option>
                                <option value=">=,30000,<,40000"> 30000-40000 </option>
                                <option value=">=,40000,<,50000"> 40000-50000 </option>
                                <option value=">=,50000,<,100000"> 50000-100000 </option>
                                <option value=">=,100000,<,1000000"> > 100000 </option>
                                <option value=">=,0,<,1000000"> All </option>
                            </select>
                            <span class="text-pink-500 font-medium">from</span>
                            <input type="date" name="from" id="from" class=" w-1/4 rounded-md border-gray-300 pl-5 pr-5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm inline" placeholder="dd/mm/yyyy" required>
                            <span class="text-pink-500 font-medium">to</span>
                            <input type="date" name="to" id="to" class=" w-1/4 rounded-md border-gray-300 pl-5 pr-5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm inline" placeholder="dd/mm/yyyy" required>
                            <div class="inline">
                                <button type="submit" class="text-white bg-pink-500 px-2 py-2 rounded-lg hover:bg-pink-400 focus:outline-non focus:ring focus:ring-pink-700 transform transition active:translate-y-0.5 inline font-bold">Search</button>
                            </div>
                        </form>
                    </div>
                    <?php $message = "";
                    if (isset($_GET["message"])) {
                        $message = $_GET["message"];
                    } ?>
                    <span class="text-pink-500"><?= $message ?></span>
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-pink-500 text-white text-sm leading-normal">
                                <th class="py-1 px-2 text-left">No.</th>
                                <th class="py-1 px-2 text-center">Date</th>
                                <th class="py-1 px-2 text-center">Amount</th>
                                <th class="py-1 px-2 text-center">Type</th>
                                <th class="py-1 px-2 text-center">Charge</th>
                                <th class="py-1 px-2 text-center">Type</th>
                                <th class="py-1 px-2 text-center">Change</th>
                                <th class="py-1 px-2 text-center">User</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-normal">
                            <?php if (empty($records) && empty($_SESSION['message'])) : ?>
                                <tr>
                                    <td>No records found</td>
                                </tr>
                            <?php elseif (empty($records) && !empty($_SESSION['message'])) : $dMessage = $_SESSION['message'];
                                unset($_SESSION['message']) ?>
                                <tr>
                                    <td><?= $dMessage ?></td>
                                </tr>
                            <?php else : $num = 0 ?>
                                <?php foreach ($records as $record) : $num += 1 ?>
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-1 px-2 text-left whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="mr-2">
                                                </div>
                                                <span class="font-medium"><?= $num ?></span>
                                            </div>
                                        </td>
                                        <td class="py-1 px-2 text-center">
                                            <?= date('d/M/Y', strtotime($record['date'])) ?>
                                        </td>
                                        <td class="py-1 px-2 text-center">
                                            <?= $record['amount'] ?>
                                        </td>
                                        <td class="py-1 px-2 text-center">
                                            <?php if ($record['amount_type'] === 'Transfer') : ?>
                                                <span class="bg-green-400 text-gray-800 font-bold py-1 px-3 rounded-full text-xs"><?= $record['amount_type'] ?></span>
                                            <?php elseif ($record['amount_type'] === 'Airtime') : ?>
                                                <span class="bg-blue-400 text-gray-800 font-bold py-1 px-3 rounded-full text-xs"><?= $record['amount_type'] ?></span>
                                            <?php elseif ($record['amount_type'] === 'CableTv') : ?>
                                                <span class="bg-lime-500 text-gray-800 font-bold py-1 px-3 rounded-full text-xs"><?= $record['amount_type'] ?></span>
                                            <?php elseif ($record['amount_type'] === 'Electricity') : ?>
                                                <span class="bg-orange-400 text-gray-800 font-bold py-1 px-3 rounded-full text-xs">Electricity</span>
                                            <?php else : ?>
                                                <span class="bg-red-400 text-gray-800 font-bold py-1 px-3 rounded-full text-xs"><?= $record['amount_type'] ?></span>
                                        </td>
                                    <?php endif ?>
                                    <td class="py-1 px-2 text-center">
                                        <span class="text-xs"><?= $record['charge'] ?></span>
                                    </td>
                                    <td class="py-1 px-2 text-center">
                                        <?php if ($record['charge_type'] === 'EC') : ?>
                                            <span class="bg-yellow-400 text-gray-800 font-bold py-1 px-3 rounded-full text-xs"><?= $record['charge_type'] ?></span>
                                        <?php else : ?>
                                            <span class="bg-blue-400 text-gray-800 font-bold py-1 px-3 rounded-full text-xs"><?= $record['charge_type'] ?></span>
                                    </td>
                                <?php endif ?>
                                <td class="py-1 px-2 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-pink-500 hover:scale-110">
                                            <a href="/editRecord?id=<?= $record["id"] ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-pink-500 hover:scale-110">
                                            <a href="/confirmDeletion?id=<?= $record["id"] ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-1 px-2 text-center">
                                    <span class="text-xs"><?= $record['user'] ?></span>
                                </td>
                                    </tr>
                                <?php endforeach ?>
                            <?php endif ?>
                            <!-- End of first table row -->
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-1 px-2 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                        </div>
                                        <span class="font-medium"></span>
                                    </div>
                                </td>
                                <td class="py-1 px-2 text-center">

                                </td>
                                <td class="py-1 px-2 text-center">

                                </td>
                                <td class="py-1 px-2 text-center">
                                    <span class="text-gray-800 font-bold py-1 px-3 rounded-full text-xs">Total</span>
                                </td>
                                <td class="py-1 px-2 text-center">
                                    <?php if (!empty($chargeTotal)) : ?>
                                        <span class="text-xs"><?= $chargeTotal ?></span>
                                    <?php endif ?>
                                </td>
                                <td class="py-1 px-2 text-center">
                                    <span class=" text-gray-800 font-bold py-1 px-3 rounded-full text-xs"></span>
                                </td>
                                <td class="py-1 px-2 text-center">
                                </td>
                            </tr>
                            <!-- End of second table row -->

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include FOOTER ?>
</body>

</html>