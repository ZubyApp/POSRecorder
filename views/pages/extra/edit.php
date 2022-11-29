<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record Extra</title>
</head>

<body>
    <?php include HEADER ?>
    <div class="w-screen text-center mt-10 alert-shadow-lg">
            <p class="leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto font-bold text-2xl text-pink-500">Edit Record Extra</p>
            <?php if (empty($records)) : ?>
                <span class="text-pink-500">No records to edit <a class="underline hover:text-black">return</a></span>
            <?php else : ?>
            <?php foreach ($records as $record) : ?>
            <a href="/extrasReport">
                <p class="mb-5 text-sm underline">(Click to here see entries)</p>
            </a>
        </div>
        <div class="grid w-screen place-items-center">
            <div class="max-w-max mt-5">
                <form action="/updateExtra" method="post" class="">
                    <label for="date" class="block text-sm font-medium text-gray-700 hover:text-pink-500">Date</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <span class="text-gray-500 sm:text-sm"></span>
                        </div>
                        <input type="date" name="date" id="date" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold" placeholder="0.00" required value="<?= $record['date'] ?>">
                    </div>
                    <label for="ewallet" class="block text-sm font-medium text-gray-700 hover:text-pink-500 mt-1">E-Wallet Balance</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <span class="text-gray-500 sm:text-sm">N</span>
                        </div>
                        <input type="number" name="ewallet" id="ewallet" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold" value="<?= $record['ewallet'] ?>" placeholder="0.00" onblur="profitCheck()" required>
                    </div>
                    <div class="mt-1">
                        <label for="bankbal" class="block text-sm font-medium text-gray-700 hover:text-pink-500">Bank Balance</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">N</span>
                            </div>
                            <input type="number" name="bankbal" id="bankbal" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold" value="<?= $record['bankbal'] ?>" placeholder="0.00" onblur="profitCheck()" required>
                        </div>
                    </div>
                    <div class="mt-1">
                        <label for="cashbal" class="block text-sm font-medium text-gray-700 hover:text-pink-500">Cash Balance</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">N</span>
                            </div>
                            <input type="number" name="cashbal" id="cashbal" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold" value="<?= $record['cashbal'] ?>" placeholder="0.00" onblur="profitCheck()" required>
                        </div>
                    </div>

                    <div class="mt-1">
                        <label for="cashbal" class="block text-sm font-medium text-gray-700 hover:text-pink-500">Gross Total</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">N</span>
                            </div>
                            <input type="number" name="gtotal" id="gtotal" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold" value="<?= $record['grosstotal'] ?>" placeholder="0.00" required readonly>
                        </div>
                    </div>

                    <div class="mt-1">
                        <label for="rcaptial" class="block text-sm font-medium text-gray-700 hover:text-pink-500">Runung Capital</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">N</span>
                            </div>
                            <input type="number" name="rcapital" id="rcapital" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold" value="<?= $record['rcapital'] ?>" placeholder="0.00" onblur="profitCheck()" required>
                        </div>
                    </div>
                    <div class="mt-1">
                        <label for="profit" class="block text-sm font-medium text-gray-700 hover:text-pink-500">Profit</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">N</span>
                            </div>
                            <input type="number" name="profit" id="profit" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold" value="<?= $record['profit'] ?>" placeholder="0.00" required readonly>
                        </div>
                    </div>
                    <div class="text-center alert-shadow-lg">
                        <p class="text-pink-500 font-bold mt-5 place-content-center">Bank Your Profit</p>
                    </div>
                    <div class="mt-1">
                        <label for="dprofit" class="block text-sm font-medium text-gray-700 hover:text-pink-500">Deducted Profit</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">N</span>
                            </div>
                            <input type="number" name="dprofit" id="dprofit" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold" placeholder="Enter amount" value="<?= $record['dprofit'] ?>" onblur="nrCapitalCheck()" required>
                        </div>
                    </div>


                    <div class="mt-1">
                        <label for="nrcapital" class="block text-sm font-medium text-gray-700 hover:text-pink-500">New Running Capital</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">N</span>
                            </div>
                            <input type="number" name="nrcapital" id="nrcapital" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold" value="<?= $record['nrcapital'] ?>" placeholder="0.00" required readonly>
                        </div>
                    </div>
                    <div class="hidden">
                        <input type="text" name="id" id="id" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold" placeholder="" value="<?= $record['id'] ?>">
                    </div>
                    <!-- save button -->
                    <div class="flex justify-center">
                        <button type="submit" name="submit" class="text-white bg-pink-500 px-20 py-2 mt-5 rounded-lg hover:bg-pink-400 focus:outline-none focus:ring focus:ring-pink-700 transform transition active:translate-y-0.5 mb-10 justify-center" onclick="checkValues()">Save
                        </button>
                    </div>
                </form>
            <?php endforeach ?>
            <?php endif ?>
            </div>
        </div>
        <?php include FOOTER ?>
</body>

<script>
    let profit = document.getElementById("profit")
    let gTotal = document.getElementById("gtotal")

    function profitCheck() {
        let rCapital = document.getElementById("rcapital").value
        let ewallet = document.getElementById("ewallet").value
        let bankbal = document.getElementById("bankbal").value
        let cashbal = document.getElementById("cashbal").value

        let calProfit = 0
        let totalCapital = 0

        grossTotal = +ewallet + +bankbal + +cashbal

        calProfit = grossTotal - rCapital

        profit.value = calProfit.toFixed(2)
        gTotal.value = grossTotal.toFixed(2)

        return grossTotal
    }

    let nrCapital = document.getElementById("nrcapital")

    function nrCapitalCheck() {

        let dProfit = document.getElementById("dprofit").value

        let calNrCapital = 0

        let tCapital = profitCheck()

        calNrCapital = +tCapital - +dProfit

        nrCapital.value = calNrCapital.toFixed(2)
    }
</script>

</html>