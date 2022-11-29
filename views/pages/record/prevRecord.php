<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        <?php include "../views/assets/build.css" ?>
    </style>
    <title>Back Date Record</title>
</head>

<body>
    <?php include HEADER ?>
    <div class="grid w-screen place-items-center">
        <p class=" font-bold text-2xl text-pink-500 mt-5">Backdate Record</p>
        <a href="/recordOptions">
            <p class="mb-5 text-sm">(Click for Record Options)</p>
        </a>
        <!-- second div which contains all the content on this view -->
        <div class="min-w-max">
            <form action="/prevRecord" method="post">
                <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                <div class="relative mt-1 rounded-md shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <span class="text-gray-500 sm:text-sm">N</span>
                    </div>
                    <input type="number" name="amount" id="amount" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold" placeholder="0.00" required>
                    <div class="absolute inset-y-0 right-0 flex items-center">
                        <label for="currency" class="sr-only">Currency</label>
                        <select id="amount_type" name="amount_type" class="h-full rounded-md border-transparent bg-transparent py-0 pl-2 pr-7 text-pink-500 focus:border-gray-500 focus:ring-gray-500 font-bold sm:text-sm font-bold">
                            <option class="font-semibold" value="Withdrawal">Withdrawal</option>
                            <option class="font-semibold" value="Transfer">Transfer</option>
                            <option class="font-semibold" value="Airtime">Airtime</option>
                            <option class="font-semibold" value="CableTv">CableTv</option>
                            <option class="font-semibold" value="Electricity">Electricity</option>
                        </select>
                    </div>
                </div>

                <div class="mt-5">
                    <label for="charge" class="block text-sm font-medium text-gray-700">Charge</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <span class="text-gray-500 sm:text-sm">N</span>
                        </div>
                        <input type="number" name="charge" id="charge" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold" placeholder="0.00">
                        <div class="absolute inset-y-0 right-0 flex items-center">
                            <label for="currency" class="sr-only">Currency</label>
                            <select id="charge_type" name="charge_type" class="h-full rounded-md border-transparent bg-transparent py-0 pl-3 pr-7 text-pink-500 focus:border-gray-500 focus:ring-gray-500 font-bold sm:text-sm font-bold">
                                <option class="font-semibold" value="CC"> CC </option>
                                <option class="font-semibold" value="EC"> EC </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <span class="text-gray-500 sm:text-sm"></span>
                        </div>
                        <input type="text" name="date" id="date" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold" placeholder="" value="<?= $date ?>" readonly>
                        <div class="absolute inset-y-0 right-0 flex items-center">
                        </div>
                    </div>
                </div>

                <div class="flex justify-center">
                    <button type="submit" name="submit" id="submit" class="text-white bg-pink-500 px-20 py-2 mt-10 rounded-lg hover:bg-pink-400 focus:outline-non focus:ring focus:ring-pink-700 transform transition active:translate-y-0.5 mb-5 justify-center" onclick="wait()">Record</button>
                </div>
            </form>

        </div>
    </div>

    <!-- copied table start -->
    <div class="overflow-x-auto">
        <div class="min-w-screen min-h-min bg-white flex items-center justify-center font-sans overflow-hidden">
            <div class="max-w-max lg:w-5/6">
                <div class="bg-white shadow-md rounded my-6">
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
                            <?php if (empty($records)) : ?>
                                <tr>
                                    <td>No records found</td>
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
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="/editRecord?id=<?= $record["id"] ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="/confirmDeletion?id=<?= $record["id"], "&date=" . $record["date"] ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-1 px-1 text-center">
                                    <span class="text-xs font-bold"><?= $record['user'] ?></span>
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
<script>
    let buttonText = document.getElementById('submit')

    function wait() {
        buttonText.innerHTML = 'Wait...'
        return buttonText
    }
</script>

</html>