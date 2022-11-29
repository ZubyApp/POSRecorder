<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Record Options</title>
</head>

<body>
  <?php include HEADER ?>
  <section class="mb-10">
    <div class="w-screen text-center mt-10 alert-shadow-lg">

    </div>
    <div class="grid w-screen place-items-center mt-10">
      <p class=" font-bold text-2xl text-pink-500">Record Daily Transactions</p>
      <div class="min-w-max">
        <label for="amount" class="block text-md font-medium text-gray-700 mt-10">Today</label>
        <div class="flex justify-center">
          <a href="/record"><button type="button" id="submit" class="text-white bg-pink-500 px-20 py-2 mt-2 rounded-lg hover:bg-pink-400 focus:outline-non focus:ring focus:ring-pink-700 transform transition active:translate-y-0.5 mb-5 justify-center" onclick="wait()">Record</button></a>
        </div>

        <form action="/prevRecord" method="get">
          <label for="amount" class="block text-md font-medium text-gray-700">Previous date</label>
          <div class="relative mt-1 rounded-md shadow-sm">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
              <span class="text-gray-500 sm:text-sm"></span>
            </div>
            <input type="date" name="date" id="date" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="" required>
          </div>
          <div class="flex justify-center">
            <button type="submit" name="" id="submit1" class="text-white bg-pink-500 px-20 py-2 mt-2 rounded-lg hover:bg-pink-400 focus:outline-non focus:ring focus:ring-pink-700 transform transition active:translate-y-0.5 mb-5 justify-center mb-20" onclick="wait1()">Record</button>
          </div>
        </form>
      </div>
    </div>
  </section>
  <?php include FOOTER ?>
</body>
<script>
  let buttonText = document.getElementById('submit')
  let buttonText1 = document.getElementById('submit1')

  function wait() {
    buttonText.innerHTML = 'Wait...'
    return buttonText
  }

  function wait1() {
    buttonText1.innerHTML = 'Wait...'
    return buttonText
  }
</script>

</html>