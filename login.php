<?php

    require_once("php/base.php");
    $basePage = new webBase();
    
    require_once("php/user.php");
    $user = new UserController();
    $error = "";

    if(isset($_COOKIE['session']))
        $user->isSessionExist($_COOKIE['session'], "client.php");

    if(isset($_POST['submit'])) {
        if(!empty($_POST['email']) and !empty($_POST['password'])){
            $session = $user->loginUser($_POST['email'], $_POST['password']);
            if($session != false) {
                echo "test";
                setcookie("session", $session, time()+2678400, "/");
                header("Location: client.php");
            }
            else{
                $error = "Mauvais identifiants";
            }
        }
    }

    $basePage->header("Accueil");
    ?>
        <div>
            <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
                    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Connectez-vous à votre compte</h2>
                </div>

                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="#" method="POST">
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Adresse E-Mail</label>
                        <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Mot de passe</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Mot de passe oublié ?</a>
                        </div>
                        </div>
                        <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <?php
                        if(!empty($error)) {
                            echo "<div class='text-red-500 text-sm'>$error</div>";
                        }
                    ?>
                    <div>
                        <button type="submit" name="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Connexion</button>
                    </div>
                    </form>

                    <p class="mt-10 text-center text-sm text-gray-500">
                    Pas encore inscrit ?
                    <a href="register.php" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Inscrivez-vous maintenant !</a>
                    </p>
                </div>
            </div>
            <div class="relative isolate px-6 pt-14 lg:px-8 -z-10">
                <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
                </div>
            </div>
        </div>
    <?php
    $basePage->footer();
    
?>