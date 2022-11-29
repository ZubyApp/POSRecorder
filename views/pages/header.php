<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    <?php
    include "../views/assets/build.css" ?>
  </style>
</head>

<body>
  <header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <nav class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto font-bold">
        <a href="/" class="mr-5 hover:text-pink-500">Home</a>
        <a href="/recordOptions" class="mr-5 hover:text-pink-500">Record</a>
        <a href="/balancingOptions" class="mr-5 hover:text-pink-500">Balancing</a>
        <a href="recordExtra" class="mr-5 hover:text-pink-500">Extra</a>
        <a href="/reportOptions" class="hover:text-pink-500">Reports</a>
      </nav>
      <a href="/" class="flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0">

        <img class="ml-3 text-xl" id="logo" src="/images/posrlogo.png" alt="logo"></a>
      <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
        <?php if ($_SESSION['username']) : ?>
          <a href="/logout"><button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-pink-400 hover:text-white rounded text-base mt-4 md:mt-0 font-semibold"><span class=""><?= $_SESSION['username'] ?></span>
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg> <span class="font-semibold"> Log out</span>
            </button></a>
        <?php else : ?>
          <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-pink-500 hover:text-black rounded text-base mt-4 md:mt-0">Login
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </button>
        <?php endif ?>
      </div>
    </div>
  </header>
</body>

</html>