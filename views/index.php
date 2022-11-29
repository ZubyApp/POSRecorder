<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    <?php include "../views/assets/build.css" ?>
  </style>
  <title>Home</title>
</head>

<body>

  <section class="text-gray-600 body-font mt-10 mb-10">
    <div class="grid place-items-end px-10">
      <?php if ($_SESSION['username']) : ?>
        <a href="/logout"><button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-pink-500 hover:text-white rounded text-base mt-4 md:mt-0 font-semibold"><span class=""><?= $_SESSION['username'] ?></span>
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg><span class="font-semibold"> Log out</span>
          </button></a>
      <?php else : ?>
        <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-pink-500 hover:text-black rounded text-base mt-4 md:mt-0">Login
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </button>
      <?php endif ?>
    </div>
    <div class="container px-5 mx-auto">
      <div class="grid place-items-center mb-5">
        <a href="/"><img src="/images/posrlogo.png" alt="logo"></a>
      </div>
      <div class="text-center mb-10 alert-shadow-lg">
        <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto"><span class="font-semibold text-pink-500"><?= $_SESSION['username'] ?></span> welcome! This application is designed to help with your Pos Business Records and Reports</p>
      </div>
      <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">

        <div class="p-2 sm:w-1/2 w-full">
          <a href="/recordOptions">
            <div class="bg-gray-100 active:bg-gray-300 hover:bg-white rounded flex p-4 h-full items-center">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-pink-500 w-6 h-6 flex-shrink-0 mr-4 active:text-pink-600 hover:text-gray-500" viewBox="0 0 24 24">
                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                <path d="M22 4L12 14.01l-3-3"></path>
              </svg>
              <span class="title-font font-medium active:text-pink-600 hover:text-pink-500">Record</span>
            </div>
          </a>
        </div>
        <div class="p-2 sm:w-1/2 w-full">
          <a href="/balancingOptions">
            <div class="bg-gray-100 active:bg-gray-300 hover:bg-white rounded flex p-4 h-full items-center">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-pink-500 w-6 h-6 flex-shrink-0 mr-4 active:text-pink-600 hover:text-gray-500" viewBox="0 0 24 24">
                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                <path d="M22 4L12 14.01l-3-3"></path>
              </svg>
              <span class="title-font font-medium active:text-pink-600 hover:text-pink-500">Balancing</span>
            </div>
          </a>
        </div>
        <div class="p-2 sm:w-1/2 w-full">
          <a href="/recordExtra">
            <div class="bg-gray-100 active:bg-gray-300 hover:bg-white rounded flex p-4 h-full items-center">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-pink-500 w-6 h-6 flex-shrink-0 mr-4 active:text-pink-600 hover:text-gray-500" viewBox="0 0 24 24">
                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                <path d="M22 4L12 14.01l-3-3"></path>
              </svg>
              <span class="title-font font-medium active:text-pink-600 hover:text-pink-500">Extra</span>
            </div>
          </a>
        </div>
        <div class="p-2 sm:w-1/2 w-full">
          <a href="/reportOptions">
            <div class="bg-gray-100 active:bg-gray-300 hover:bg-white rounded flex p-4 h-full items-center">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-pink-500 w-6 h-6 flex-shrink-0 mr-4 active:text-pink-600 hover:text-gray-500" viewBox="0 0 24 24">
                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                <path d="M22 4L12 14.01l-3-3"></path>
              </svg>
              <span class="title-font font-medium active:text-pink-600 hover:text-pink-500">Reports</span>
            </div>
          </a>
        </div>

        <!-- <button class="flex mx-auto mt-16 mb-10 text-white bg-pink-500 border-0 py-2 px-8 focus:outline-none hover:bg-pink-600 rounded text-lg active:bg-pink-600 focus:ring focus:ring-pink-700 transform transition active:translate-y-0.5">Learn More...</button> -->
      </div>
  </section>
  <?php include FOOTER ?>
</body>

</html>