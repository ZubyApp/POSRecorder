<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reports</title>
</head>

<body>
  <?php include HEADER ?>
  <section class="text-gray-600 body-font mt-10 mb-10">
    <div class="container px-5 mx-auto">
      <div class="grid place-items-center mb-5">
        <p class=" font-bold text-2xl text-gray-500">Reports Options</p>
      </div>

      <div class="flex flex-wrap lg:w-3/5 sm:mx-auto sm:mb-2 -mx-2 justify-center font-bold">
        <div class="p-2 sm:w-1/2 w-1/2">
          <a href="/recordsReport">
            <div class="bg-pink-500 hover: hover:bg-gray-100 text-white hover:text-pink-500 active:bg-gray-200 rounded flex p-4 h-full items-center">
              <span class="title-font">Transaction Records</span>
            </div>
          </a>
        </div>

        <div class="p-2 sm:w-1/2 w-1/2">
          <a href="/dailybalance">
            <div class="bg-pink-500 hover: hover:bg-gray-100 text-white hover:text-pink-500 active:bg-gray-200 rounded flex p-4 h-full items-center">
              <span class="title-font">Transaction Totals</span>
            </div>
          </a>
        </div>

        <div class="p-2 sm:w-1/2 w-1/2">
          <a href="/aggregates">
            <div class="bg-pink-500 hover: hover:bg-gray-100 text-white hover:text-pink-500 active:bg-gray-200 rounded flex p-4 h-full items-center">
              <span class="title-font">Transaction Aggregates</span>
            </div>
          </a>
        </div>

        <div class="p-2 sm:w-1/2 w-1/2">
          <a href="/extrasReport">
            <div class="bg-pink-500 hover: hover:bg-gray-100 text-white hover:text-pink-500 active:bg-gray-200 rounded flex p-4 h-full items-center">
              <span class="title-font">Extra Reports</span>
            </div>
          </a>
        </div>

        <div class="p-2 sm:w-1/2 w-1/2 mb-10">
          <a href="/amountsSearch">
            <div class="bg-pink-500 hover: hover:bg-gray-100 text-white hover:text-pink-500 active:bg-gray-200 rounded flex p-4 h-full items-center">
              <span class="title-font">Amount Reports</span>
            </div>
          </a>
        </div>

        <div class="p-2 sm:w-1/2 w-1/2 mb-10">
          <a href="/usersSearch">
            <div class="bg-pink-500 hover: hover:bg-gray-100 text-white hover:text-pink-500 active:bg-gray-200 rounded flex p-4 h-full items-center">
              <span class="title-font">User Reports</span>
            </div>
          </a>
        </div>
      </div>
  </section>
  <?php include FOOTER ?>
</body>

</html>