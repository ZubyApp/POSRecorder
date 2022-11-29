<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        <?php include "../views/assets/build.css" ?>
    </style>
    <title>Confirm Delete</title>
</head>
<?php include HEADER ?>
<div class="overflow-x-auto mt-20">
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
                            <!-- <th class="py-1 px-2 text-center">Change</th> -->
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-normal">
                        <?php if (empty($records)) : ?>
                            <tr>
                                <td>No records found</td>
                            </tr>
                        <?php else : $num = 0 ?>
                            <?php foreach ($records as $record) : $num += 1 ?>
                                <p class="text-pink-500 font-semibold">Are you sure you want to delete this record? <a href="/deleteRecord?id=<?= $record['id'] ?>" class="underline hover:text-black">Yes?</a> or <a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="underline hover:text-black">Go Back?</a></p>
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
</body>