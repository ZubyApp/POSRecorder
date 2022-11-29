<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        <?php
        include "../views/assets/build.css" ?>
    </style>
    <title>Record</title>
</head>

<body>
    <?php include HEADER ?>
    <?php foreach ($records as $record) : ?>
        <div class="grid w-screen place-items-center">
            <p class=" font-bold text-2xl text-pink-500 mt-5">Edit Record</p>
            <a href="<?= $_SERVER['HTTP_REFERER'] ?>">
                <p class="mb-5 text-sm underline">(Go back?)</p>
            </a>
            <!-- second div which contains all the content on this view -->

            <div class="min-w-max">
                <form action="/updateRecord" method="post">
                    <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <span class="text-gray-500 sm:text-sm">N</span>
                        </div>
                        <input type="number" name="amount" id="amount" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold" placeholder="0.00" value="<?= $record['amount'] ?>" required>
                        <div class="absolute inset-y-0 right-0 flex items-center">
                            <label for="currency" class="sr-only">Currency</label>
                            <select id="amount_type" name="amount_type" class="h-full rounded-md border-transparent bg-transparent py-0 pl-2 pr-7 text-pink-500 focus:border-gray-500 focus:ring-gray-500 font-bold sm:text-sm font-bold">
                                <option class="font-semibold" value="<?= $record['amount_type'] ?>"><?= $record['amount_type'] ?></option>
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
                            <input type="number" name="charge" id="charge" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold" placeholder="0.00" value="<?= $record['charge'] ?>">
                            <div class="absolute inset-y-0 right-0 flex items-center">
                                <label for="currency" class="sr-only">Currency</label>
                                <select id="charge_type" name="charge_type" class="h-full rounded-md border-transparent bg-transparent py-0 pl-3 pr-7 text-pink-500 focus:border-gray-500 focus:ring-gray-500 font-bold sm:text-sm font-bold">
                                    <option class="font-semibold" value="<?= $record['charge_type'] ?>"> <?= $record['charge_type'] ?> </option>
                                    <option class="font-semibold" value="CC"> CC </option>
                                    <option class="font-semibold" value="EC"> EC </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="hidden">
                            <input type="text" name="id" id="id" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold" placeholder="" value="<?= $record['id'] ?>">
                            <!-- <input type="text" name="type" id="type" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold" placeholder="" value=""> -->
                        </div>
                        <label for="date" name="date" class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="date" name="date" id="date" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold" placeholder="" value="<?= $record['date'] ?>" required>
                    </div>
            </div>
            <!--record button-->
            <div class="flex justify-center">
                <button type="submit" name="" id="submit" class="text-white bg-pink-500 px-20 py-2 mt-10 rounded-lg hover:bg-pink-400 focus:outline-non focus:ring focus:ring-pink-700 transform transition active:translate-y-0.5 mb-5 justify-center" onclick="wait()">Update</button>
            </div>
            </form>
        <?php endforeach ?>
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