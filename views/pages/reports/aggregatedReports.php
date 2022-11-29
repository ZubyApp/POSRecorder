<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggregates</title>
</head>

<body>
    <?php include HEADER ?>
    <div class="grid w-screen place-items-center mt-10">
        <p class=" font-bold text-2xl text-pink-500">Aggregated Monthly Report</p>
        <a href="/aggregates">
            <p class="mb-5 text-sm underline">(Click to clear custom search)</p>
        </a>
    </div>
    <div class="overflow-x-auto overflow-scroll">
        <div class="min-w-fit min-h-min bg-white flex items-center justify-center font-sans">
            <div class="max-w-max lg:w-5/6">
                <!-- Search form -->
                <form action="/searchAggregates" method="get" class="mb-2">
                    <span class="text-pink-500 font-medium">Enter Year</span>
                    <select name="year" id="year" class="h-full w-1/6 rounded-md border py-2 text-pink-500 focus:border-gray-500 focus:ring-gray-500 font-bold sm:text-sm" required>
                        <option value="">_ _ _ _</option>
                        <?php
                        for ($year = \date('Y'); 1990 <= $year; $year--) : ?>
                            <option value="<?= $year; ?>"><?= $year; ?></option>
                        <?php endfor; ?>
                    </select>
                    <div class="inline">
                        <button type="submit" class="text-white bg-pink-500 px-2 py-2 rounded-lg hover:bg-pink-400 focus:outline-non focus:ring focus:ring-pink-700 transform transition active:translate-y-0.5 inline font-bold">Search</button>
                    </div>
                    <?php function relax()
                    {;
                    }
                    if (empty($Year)) : ?>
                        <?php relax() ?> <?php else : ?> <span class="text-pink-500 px-2 font-semibold"><?= $Year ?></span><?php endif ?>
                </form>
                <table class="min-w-max w-full table-auto">
                    <thead class="">
                        <tr class="bg-pink-500 text-white text-sm leading-loose">
                            <th class="py-1 px-1 text-left">Type</th>
                            <th class="py-1 px-1 text-center">January</th>
                            <th class="py-1 px-1 text-center">February</th>
                            <th class="py-1 px-1 text-center">March</th>
                            <th class="py-1 px-1 text-center">April</th>
                            <th class="py-1 px-1 text-center">May</th>
                            <th class="py-1 px-1 text-center">June</th>
                            <th class="py-1 px-1 text-center">July</th>
                            <th class="py-1 px-1 text-center">August</th>
                            <th class="py-1 px-1 text-center">September</th>
                            <th class="py-1 px-1 text-center">October</th>
                            <th class="py-1 px-1 text-center">November</th>
                            <th class="py-1 px-1 text-center">December</th>
                            <th class="py-1 px-1 text-center">Totals</th>
                            <th class="py-1 px-1 text-center">Avrg</th>
                        </tr>
                    </thead>
                    <?php if (empty($Jan)) : ?>
                        <tr>
                            <td>No records</td>
                        </tr>
                    <?php else : ?>
                        <tbody class="text-gray-600 text-sm font-semibold border-2">
                            <!-- Transfer row -->
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-1 px-2 text-left whitespace-nowrap border-r-2">
                                    <div class="flex items-center"><span class="font-medium bg-green-400 text-gray-800 font-bold py-1 px-3 rounded-full text-xs"> Transfers </span></div>
                                </td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jan['transfers'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Feb['transfers'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Mar['transfers'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Apr['transfers'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $May['transfers'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jun['transfers'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jul['transfers'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Aug['transfers'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Sep['transfers'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Oct['transfers'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Nov['transfers'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Dec['transfers'] ?></td>
                                <?php $total = $Jan['transfers'] + $Feb['transfers'] + $Mar['transfers'] + $Apr['transfers'] + $May['transfers'] + $Jun['transfers'] + $Jul['transfers'] + $Aug['transfers'] + $Sep['transfers'] + $Oct['transfers'] + $Nov['transfers'] + $Dec['transfers'];
                                $avg = $total / 12
                                ?>
                                <td class="py-1 px-2 text-center border-r-2"><?= $total ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= floor($avg) ?></td>
                            </tr>
                            <!-- Airtime row -->
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-1 px-2 text-left whitespace-nowrap border-r-2">
                                    <div class="flex items-center"><span class="font-medium bg-blue-400 text-gray-800 font-bold py-1 px-3 rounded-full text-xs"> Airtime </span></div>
                                </td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jan['airtime'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Feb['airtime'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Mar['airtime'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Apr['airtime'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $May['airtime'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jun['airtime'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jul['airtime'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Aug['airtime'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Sep['airtime'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Oct['airtime'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Nov['airtime'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Dec['airtime'] ?></td>
                                <?php $total = $Jan['airtime'] + $Feb['airtime'] + $Mar['airtime'] + $Apr['airtime'] + $May['airtime'] + $Jun['airtime'] + $Jul['airtime'] + $Aug['airtime'] + $Sep['airtime'] + $Oct['airtime'] + $Nov['airtime'] + $Dec['airtime'];
                                $avg = $total / 12
                                ?>
                                <td class="py-1 px-2 text-center border-r-2"><?= $total ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= floor($avg) ?></td>
                            </tr>
                            <!-- Electricity row -->
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-1 px-2 text-left whitespace-nowrap border-r-2">
                                    <div class="flex items-center"><span class="font-medium bg-orange-400 text-gray-800 font-bold py-1 px-3 rounded-full text-xs"> Electricity </span></div>
                                </td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jan['electricity'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Feb['electricity'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Mar['electricity'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Apr['electricity'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $May['electricity'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jun['electricity'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jul['electricity'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Aug['electricity'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Sep['electricity'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Oct['electricity'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Nov['electricity'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Dec['electricity'] ?></td>
                                <?php $total = $Jan['electricity'] + $Feb['electricity'] + $Mar['electricity'] + $Apr['electricity'] + $May['electricity'] + $Jun['electricity'] + $Jul['electricity'] + $Aug['electricity'] + $Sep['electricity'] + $Oct['electricity'] + $Nov['electricity'] + $Dec['electricity'];
                                $avg = $total / 12
                                ?>
                                <td class="py-1 px-2 text-center border-r-2"><?= $total ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= floor($avg) ?></td>
                            </tr>
                            <!-- CableTv row -->
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-1 px-2 text-left whitespace-nowrap border-r-2">
                                    <div class="flex items-center"><span class="font-medium bg-lime-500 text-gray-800 font-bold py-1 px-3 rounded-full text-xs"> CableTv </span></div>
                                </td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jan['cabletv'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Feb['cabletv'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Mar['cabletv'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Apr['cabletv'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $May['cabletv'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jun['cabletv'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jul['cabletv'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Aug['cabletv'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Sep['cabletv'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Oct['cabletv'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Nov['cabletv'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Dec['cabletv'] ?></td>
                                <?php $total = $Jan['cabletv'] + $Feb['cabletv'] + $Mar['cabletv'] + $Apr['cabletv'] + $May['cabletv'] + $Jun['cabletv'] + $Jul['cabletv'] + $Aug['cabletv'] + $Sep['cabletv'] + $Oct['cabletv'] + $Nov['cabletv'] + $Dec['cabletv'];
                                $avg = $total / 12
                                ?>
                                <td class="py-1 px-2 text-center border-r-2"><?= $total ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= floor($avg) ?></td>
                            </tr>
                            <!-- CashCharge row -->
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-1 px-2 text-left whitespace-nowrap border-r-2">
                                    <div class="flex items-center"><span class="font-medium bg-blue-400 text-gray-800 font-bold py-1 px-3 rounded-full text-xs"> CashCharge </span></div>
                                </td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jan['cashcharge'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Feb['cashcharge'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Mar['cashcharge'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Apr['cashcharge'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $May['cashcharge'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jun['cashcharge'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jul['cashcharge'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Aug['cashcharge'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Sep['cashcharge'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Oct['cashcharge'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Nov['cashcharge'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Dec['cashcharge'] ?></td>
                                <?php $total = $Jan['cashcharge'] + $Feb['cashcharge'] + $Mar['cashcharge'] + $Apr['cashcharge'] + $May['cashcharge'] + $Jun['cashcharge'] + $Jul['cashcharge'] + $Aug['cashcharge'] + $Sep['cashcharge'] + $Oct['cashcharge'] + $Nov['cashcharge'] + $Dec['cashcharge'];
                                $avg = $total / 12
                                ?>
                                <td class="py-1 px-2 text-center border-r-2"><?= $total ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= floor($avg) ?></td>
                            </tr>
                            <!-- ElectCharge row -->
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-1 px-2 text-left whitespace-nowrap border-r-2">
                                    <div class="flex items-center"><span class="font-medium bg-yellow-400 text-gray-800 font-bold py-1 px-3 rounded-full text-xs"> ElectCharge </span></div>
                                </td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jan['electcharge'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Feb['electcharge'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Mar['electcharge'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Apr['electcharge'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $May['electcharge'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jun['electcharge'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jul['electcharge'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Aug['electcharge'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Sep['electcharge'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Oct['electcharge'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Nov['electcharge'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Dec['electcharge'] ?></td>
                                <?php $total = $Jan['electcharge'] + $Feb['electcharge'] + $Mar['electcharge'] + $Apr['electcharge'] + $May['electcharge'] + $Jun['electcharge'] + $Jul['electcharge'] + $Aug['electcharge'] + $Sep['electcharge'] + $Oct['electcharge'] + $Nov['electcharge'] + $Dec['electcharge'];
                                $avg = $total / 12
                                ?>
                                <td class="py-1 px-2 text-center border-r-2"><?= $total ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= floor($avg) ?></td>
                            </tr>
                            <!-- Withdrawal row -->
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-1 px-2 text-left whitespace-nowrap border-r-2">
                                    <div class="flex items-center"><span class="font-medium bg-red-400 text-gray-800 font-bold py-1 px-3 rounded-full text-xs"> Withdrawals </span></div>
                                </td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jan['withdrawals'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Feb['withdrawals'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Mar['withdrawals'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Apr['withdrawals'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $May['withdrawals'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jun['withdrawals'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jul['withdrawals'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Aug['withdrawals'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Sep['withdrawals'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Oct['withdrawals'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Nov['withdrawals'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Dec['withdrawals'] ?></td>
                                <?php $total = $Jan['withdrawals'] + $Feb['withdrawals'] + $Mar['withdrawals'] + $Apr['withdrawals'] + $May['withdrawals'] + $Jun['withdrawals'] + $Jul['withdrawals'] + $Aug['withdrawals'] + $Sep['withdrawals'] + $Oct['withdrawals'] + $Nov['withdrawals'] + $Dec['withdrawals'];
                                $avg = $total / 12
                                ?>
                                <td class="py-1 px-2 text-center border-r-2"><?= $total ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= floor($avg) ?></td>
                            </tr>
                            <!-- Difference row -->
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-1 px-2 text-left whitespace-nowrap border-r-2">
                                    <div class="flex items-center"><span class="font-medium bg-gray-100 text-gray-800 font-bold py-1 px-3 rounded-full text-xs"> Difference </span></div>
                                </td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jan['difference'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Feb['difference'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Mar['difference'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Apr['difference'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $May['difference'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jun['difference'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Jul['difference'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Aug['difference'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Sep['difference'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Oct['difference'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Nov['difference'] ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= $Dec['difference'] ?></td>
                                <?php $total = $Jan['difference'] + $Feb['difference'] + $Mar['difference'] + $Apr['difference'] + $May['difference'] + $Jun['difference'] + $Jul['difference'] + $Aug['difference'] + $Sep['difference'] + $Oct['difference'] + $Nov['difference'] + $Dec['difference'];
                                $avg = $total / 12
                                ?>
                                <td class="py-1 px-2 text-center border-r-2"><?= $total ?></td>
                                <td class="py-1 px-2 text-center border-r-2"><?= floor($avg) ?></td>
                            </tr>
                        <?php endif ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include FOOTER ?>
</body>

</html>