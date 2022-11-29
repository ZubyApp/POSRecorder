<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balancing</title>
</head>

<body>
    <?php include HEADER;
    $message = "";
    if (isset($_SESSION["message"])) {
        $message = $_SESSION["message"];
        unset($_SESSION['message']);
    } ?>
    <div class="w-screen text-center mt-10 alert-shadow-lg">
        <p class="leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto font-bold text-2xl text-pink-500">Balance Your Cash Daily</p>
        <a href="/balancingOptions">
            <p class="mb-5 text-sm underline font-normal">(Click here <span class="font-bold">Balancing Options</span>)</p>
        </a>
        <span class="text-pink-500 font-bold"><?php echo $message; ?></span>
    </div>
    <div class="grid w-screen place-items-center">
        <?php if (empty($withdrawals['withdrawals']) & empty($transfers['transfers']) & empty($airtimes['airtime']) & empty($electricity['electricity']) & empty($cabletv['cabletv']) & empty($cashcharge['cashcharge']) & empty($electcharge['electcharge'])) : ?>
            <h2>No transactions today</h2>
        <?php else : ?>
            <div class="max-w-max mt-5">
                <form action="/savebalance" method="post">
                    <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <span class="text-gray-500 sm:text-sm"></span>
                        </div>
                        <input type="text" name="date" id="date" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold" value="<?= $date ?>" readonly>
                    </div>

                    <label for="openingbal" class="block text-sm font-medium text-gray-700 hover:text-pink-500">Opening Bal</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <span class="text-gray-500 sm:text-sm">N</span>
                        </div>
                        <input type="number" name="openingbal" id="openingbal" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold" required value="" placeholder="Enter Opening Balance" onblur="check()">
                    </div>
                    <div class="mt-1">
                        <label for="withdrawals" class="block text-sm font-medium text-pink-500">Withdrawals</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">N</span>
                            </div>
                            <input type="number" name="withdrawals" id="withdrawals" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold text-pink-500" value="<?= $withdrawals['withdrawals'] ?>" readonly>
                        </div>
                    </div>
                    <div class="mt-1">
                        <label for="transfers" class="block text-sm font-medium text-pink-500">Transfers</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">N</span>
                            </div>
                            <input type="number" name="transfers" id="transfers" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold text-pink-500" value="<?= $transfers['transfers'] ?>" readonly>
                        </div>
                    </div>
                    <div class="mt-1">
                        <label for="airtime" class="block text-sm font-medium text-pink-500">Airtime</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">N</span>
                            </div>
                            <input type="text" name="airtime" id="airtime" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold text-pink-500" value="<?= $airtimes['airtime'] ?>" readonly>
                        </div>
                    </div>
                    <div class="mt-1">
                        <label for="cabletv" class="block text-sm font-medium text-pink-500">Electricity</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">N</span>
                            </div>
                            <input type="text" name="electricity" id="electricity" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold text-pink-500" value="<?= $electricity['electricity'] ?>" readonly>
                        </div>
                    </div>
                    <div class="mt-1">
                        <label for="cabletv" class="block text-sm font-medium text-pink-500">CableTv</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">N</span>
                            </div>
                            <input type="text" name="cabletv" id="cabletv" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold text-pink-500" value="<?= $cabletv['cabletv'] ?>" readonly>
                        </div>
                    </div>
                    <div class="mt-1">
                        <label for="cashcharge" class="block text-sm font-medium text-pink-500">Cash Charge</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">N</span>
                            </div>
                            <input type="text" name="cashcharge" id="cashcharge" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold text-pink-500" value="<?= $cashcharge['cashcharge'] ?>" readonly>
                        </div>
                    </div>
                    <div class="mt-1" hidden>
                        <label for="electcharge" class="block text-sm font-medium text-pink-500">Electronic Charge</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">N</span>
                            </div>
                            <input type="text" name="electcharge" id="electcharge" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold text-pink-500" value="<?= $electcharge['electcharge'] ?>" readonly>
                        </div>
                    </div>
                    <div class="mt-1">
                        <label for="exclosingbal" class="block text-sm font-medium text-pink-500">Expected Closing Bal</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">N</span>
                            </div>
                            <input type="text" name="exclosingbal" id="exclosingbal" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest text-pink-500 font-semibold" value="" readonly>
                        </div>
                    </div>
                    <!-- check button -->
                    <div class="flex justify-center">
                        <span class="text-pink-500 text-md mt-5 mb-3 font-bold">Enter Your Actual Closing Balance</span>
                    </div>

                    <div class="mt-1">
                        <label for="actclosingbal" class="block text-sm font-medium text-gray-700 hover:text-pink-500">Actual Closing Bal</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">N</span>
                            </div>
                            <input type="number" name="actclosingbal" id="actclosingbal" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest font-semibold" required placeholder="Enter Closing Balance" value="" onblur="actCheck()">
                        </div>
                    </div>
                    <div class="mt-1">
                        <label for="difference" class="block text-sm font-medium text-gray-700 hover:text-pink-500">Difference</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">N</span>
                            </div>
                            <input type="text" name="difference" id="difference" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm tracking-widest text-pink-500 font-semibold" value="" readonly>
                        </div>
                    </div>
                    <!-- save button -->
                    <div class="flex justify-center">
                        <button type="submit" name="submit" id="submit" class="text-white bg-pink-500 px-20 py-2 mt-5 rounded-lg hover:bg-pink-400 focus:outline-none focus:ring focus:ring-pink-700 transform transition active:translate-y-0.5 mb-10 justify-center" onclick="wait()">Save
                        </button>
                    </div>
                </form>
            </div>
        <?php endif ?>
    </div>
    <?php include FOOTER ?>
</body>
<script>
    let withdrawals = document.getElementById("withdrawals").value
    let transfers = document.getElementById("transfers").value
    let airtime = document.getElementById("airtime").value
    let electricity = document.getElementById("electricity").value
    let cableTv = document.getElementById("cabletv").value
    let cashCharge = document.getElementById("cashcharge").value

    let exClosingBal = document.getElementById("exclosingbal")

    function check() {
        let openingBal = document.getElementById("openingbal").value

        let calExClosingBal = 0

        calExClosingBal = +openingBal - +withdrawals + +transfers + +airtime + +electricity + +cableTv + +cashCharge

        exClosingBal.value = calExClosingBal

        return calExClosingBal
    }

    let difference = document.getElementById("difference")

    function actCheck() {

        let closingBal = document.getElementById("actclosingbal").value

        let calDifference = 0

        let calExClosingBal = check()

        calDifference = +closingBal - +calExClosingBal

        difference.value = calDifference
    }

    let buttonText = document.getElementById('submit')

    function wait() {
        buttonText.innerHTML = 'Wait...'
        return buttonText
    }
</script>

</html>