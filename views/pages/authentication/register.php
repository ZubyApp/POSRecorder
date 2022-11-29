<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php

        use App\Helpers\ConvertRecords;

        include "../views/assets/build.css" ?>
    </style>
    <title>Register</title>
</head>

<body class="">

    <?php  $errors = ($_SESSION['errors'] ?? []);
        unset($_SESSION['errors']) ?>

        <div class="grid w-screen place-items-center mt-10">
            <div class="min-w-min px-8">
                <a href="/welcome"><img class="" src="images/posrlogo.png" alt="logo"></a>
            </div>
            <p class="font-mono">Please register to begin</p>
            <!-- second div which contains all the content on this view -->
            <div class="min-w-max rounded-xl p-8 bg-white border-2 mt-5">
                <form action="/register" method="post" class="border-transparent ">
                    <label for="username" class="after:content-['*'] after:ml-0.5 after:text-pink-500 block text-sm font-medium text-pink-500">Username</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <input type="text" name="username" id="username" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-gray-500 focus:ring-gray-500 sm:text-sm <?= "invalid:border-pink-500" ?>" placeholder=" Enter Username">
                    </div>
                    <div class="text-pink-500 text-center text-sm">
                        <?php foreach (($errors['username'] ?? []) as $usernamme) : ?>
                            <span><?= ($usernamme ?? '' ) ?></span>
                        <?php endforeach ?>
                    </div>

                    <div class="mt-3">
                        <label for="email" class="after:content-['*'] after:ml-0.5 after:text-pink-500 block text-sm font-medium text-pink-500">Email</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <input type="email" name="email" id="email" class="peer block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-gray-500 focus:ring-gray-500 sm:text-sm invalid:border-pink-500" placeholder=" eg. example@gmail.com">
                            <p class="mt-1 hidden invisible peer-invalid:visible peer-invalid:block text-pink-600 text-sm">Please provide a valid email address</p>
                        </div>
                        <div class="text-pink-500 text-center text-sm">
                            <?php foreach (($errors['email'] ?? []) as $email) : ?>
                                <span><?= ($email . '</br>') ?: '' ?></span>
                            <?php endforeach ?>
                        </div>
                    </div>



                    <div class="mt-3">
                        <label for="password" id="password" class="after:content-['*'] after:ml-0.5 after:text-pink-500 block text-sm font-medium text-pink-500">Password</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <input type="password" name="password" id="password" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-gray-500 focus:ring-gray-500 sm:text-sm invalid:border-pink-500" placeholder=" Enter Password">
                        </div>
                        <div class="text-pink-500 text-center text-sm">
                            <?php foreach (($errors['password'] ?? []) as $password) : ?>
                                <span><?= ($password) ?: '' ?></span>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="conpassL" id="conpassL" class="after:content-['*'] after:ml-0.5 after:text-pink-500 block text-sm font-medium text-pink-500">Confirm Password</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <input type="password" name="conpassword" id="conpassword" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-gray-500 focus:ring-gray-500 sm:text-sm invalid:border-pink-500" placeholder=" Re-enter Password">
                        </div>
                        <div class="text-pink-500 text-center text-sm">
                            <?php foreach (($errors['conpassword'] ?? []) as $conpassword) : ?>
                                <span><?= ($conpassword) ?: '' ?></span>
                            <?php endforeach ?>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="charge" class="block text-sm font-medium text-pink-500">POS Vendor</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <input type="text" name="vendors" id="vendorsIn" class="decoration-none block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-gray-500 focus:ring-gray-500 sm:text-sm text-pink-500" placeholder="Choose" list="vendors">
                            <datalist type="text" id="vendors" class="text-pink-500 bg-white">
                                <option value="Mikro"></option>
                                <option value="Kuda"></option>
                                <option value="Opay"></option>
                                <option value="Kudi"></option>
                                <option value="First Monie"></option>
                                <option value="Money Point"></option>
                            </datalist>
                            <p class=" text-pink-600 text-sm">
                                If vendor is not listed, it will be saved</p>
                        </div>
                    </div>

                    <!-- <div class="mt-3">
                    <label for="posvendor" class="block text-sm font-medium text-pink-500">POS Vendor</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="inset-y-0 right-0 flex items-center">
                            <select id="posvendor" name="posvendor" class="block w-full rounded-md border-gray-400 bg-transparent text-pink-500 focus:border-gray-500 focus:ring-gray-500 font-semibold sm:text-sm">
                                <option class="font-bold" value="">Choose</option>
                                <option class="font-bold" value="Mkro"> Mikro </option>
                                <option class="font-bold" value="Opay"> Opay </option>
                                <option class="font-bold" value="Kuda"> Kuda </option>
                            </select>
                        </div>
                    </div>
                </div> -->
                    <div class="flex justify-center">
                        <button type="submit" name="submit" id="submit" class="text-white bg-pink-500 px-10 py-2 mt-8 rounded-lg hover:bg-pink-400 focus:outline-non focus:ring focus:ring-gray-700 transform transition active:translate-y-0.5 justify-center font-bold" onclick="wait()">Register</button>
                    </div>
                    <p class="text-pink-500">Already have an account? <a href="/login" class="underline">Log in</a></p>
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