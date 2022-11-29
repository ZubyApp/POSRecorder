<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php include "../views/assets/build.css" ?>
    </style>
    <title>Login</title>
</head>

<body class="">
    <?php $message = "";
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
    } ?>
    <div class="grid w-screen place-items-center mt-10">
        <div class="min-w-min px-8">
            <a href="/"><img class="" src="images/posrlogo.png" alt="logo"></a>
        </div>
        <p class="font-mono">Start recording Your POS transactions</p>
        <!-- second div which contains all the content on this view -->
        <div class="min-w-max rounded-xl p-8 bg-pink-500 mt-5">
            <form action="/login" method="post" class="border-2 border-transparent ">
                <label for="Email" class="block text-sm font-medium text-white">Email</label>
                <div class="relative mt-1 rounded-md shadow-sm">
                    <input type="email" name="email" id="email" class=" peer block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-gray-500 focus:ring-gray-500 sm:text-sm" placeholder="wazobia@example.com">
                    <p class="mt-1 hidden invisible peer-invalid:visible peer-invalid:block text-white text-center text-sm">Please provide a valid email address</p>
                </div>

                <div class="mt-5">
                    <label for="password" class="block text-sm font-medium text-white">Password</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <input type="password" name="password" id="password" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-gray-500 focus:ring-gray-500 sm:text-sm" placeholder="Enter Password">
                    </div>
                </div>
                <div class="mt-3 text-center text-white">
                    <span><?= $message ?></span>
                </div>

                <div class="flex justify-center">
                    <button type="submit" name="submit" id="submit" class="text-pink-500 bg-white px-10 py-2 mt-5 rounded-lg hover:bg-gray-100 focus:outline-non focus:ring focus:ring-gray-700 transform transition active:translate-y-0.5 mb-5 justify-center font-bold" onclick="wait()">Log in</button>
                </div>
                <p class="text-gray-100">Dont have an account? <a href="/register" class="underline">Register</a></p>
            </form>
        </div>
    </div>
</body>
<script>
    let buttonText = document.getElementById('submit')

    function wait() {
        buttonText.innerHTML = 'Wait...'
        return buttonText
    }
</script>

</html>