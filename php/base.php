<?php

    class webBase {

        public function header($title = "") {
        ?>
            <html>
                <head>
                    <title><?php echo $title; ?> - Your forms</title>
                    <script src="https://cdn.tailwindcss.com"></script>
                </head>
                <body>
        <?php
        }

        private function navBarPage($page) {
            $currentPage = explode("/", $_SERVER['PHP_SELF']);
            $currentPage = end($currentPage);
            if ($currentPage == $page) {
                return "bg-gray-900 text-white";
            } else {
                return "text-gray-300 hover:bg-gray-700 hover:text-white";
            }
        }

        public function navBar($type="public") {
            switch($type) {
                case "public":
                    ?>
                        <nav class="bg-gray-800">
                            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                                <div class="relative flex h-16 items-center justify-between">
                                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                                        <!-- Mobile menu button-->
                                        <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false" id="mobile-control">
                                            <span class="absolute -inset-0.5"></span>
                                            <span class="sr-only">Open main menu</span>
                                            <!--
                                                Icon when menu is closed.
            
                                                Menu open: "hidden", Menu closed: "block"
                                            -->
                                            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                            </svg>
                                            <!--
                                                Icon when menu is open.
            
                                                Menu open: "block", Menu closed: "hidden"
                                            -->
                                            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                                        <div class="flex flex-shrink-0 items-center">
                                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                                        </div>
                                        <div class="hidden sm:ml-6 sm:block">
                                            <div class="flex space-x-4">
                                                <a href="#" class="<?php echo $this->navBarPage("index.php"); ?> block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Accueil</a>
                                                <a href="#" class="<?php echo $this->navBarPage("team.php"); ?> block rounded-md px-3 py-2 text-base font-medium">Notre équipe</a>
                                                <a href="#" class="<?php echo $this->navBarPage("projects.php"); ?> block rounded-md px-3 py-2 text-base font-medium">Nos projets</a>
                                                <a href="#" class="<?php echo $this->navBarPage("pricing.php"); ?> block rounded-md px-3 py-2 text-base font-medium">Nos prix</a>
                                                <a href="#" class="<?php echo $this->navBarPage("conctact.php"); ?> block rounded-md px-3 py-2 text-base font-medium">Nos contacter</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                                        <div class="relative ml-3">
                                            <a href="login.php" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Connexion</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Mobile menu, show/hide based on menu state. -->
                            <div class="hidden sm:hidden" id="mobile-menu">
                                <div class="space-y-1 px-2 pb-3 pt-2">
                                    <a href="#" class="<?php echo $this->navBarPage("index.php"); ?> block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Accueil</a>
                                    <a href="#" class="<?php echo $this->navBarPage("team.php"); ?> block rounded-md px-3 py-2 text-base font-medium">Notre équipe</a>
                                    <a href="#" class="<?php echo $this->navBarPage("projects.php"); ?> block rounded-md px-3 py-2 text-base font-medium">Nos projets</a>
                                    <a href="#" class="<?php echo $this->navBarPage("pricing.php"); ?> block rounded-md px-3 py-2 text-base font-medium">Nos prix</a>
                                    <a href="#" class="<?php echo $this->navBarPage("conctact.php"); ?> block rounded-md px-3 py-2 text-base font-medium">Nos contacter</a>
                                    <a href="login.php" class="block rounded-md px-3 py-2 text-base font-medium text-white font-semibold rounded-md bg-indigo-600 text-center">Connexion</a>
                                </div>
                            </div>
                        </nav>
                    <?php
                    break;
                case "private":
                    ?>
                        <button data-drawer-target="cta-button-sidebar" data-drawer-toggle="cta-button-sidebar" aria-controls="cta-button-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                            <span class="sr-only">Open sidebar</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                            </svg>
                        </button>
            
                        <aside id="cta-button-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
                            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
                                <ul class="space-y-2 font-medium">
                                    <li>
                                        <a href="client.php" class="<?php echo $this->navBarPage("client.php"); ?> flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                            <!--<svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                                <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                                                <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                                            </svg>-->
                                            <span class="ms-3">Accueil</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                            <span class="flex-1 ms-3 whitespace-nowrap">Groupes</span>
                                            <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                            <span class="flex-1 ms-3 whitespace-nowrap">Notifications</span>
                                            <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="forms.php" class="<?php echo $this->navBarPage("forms.php"); ?> flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                            <span class="flex-1 ms-3 whitespace-nowrap">Vos formulaires</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                            <span class="flex-1 ms-3 whitespace-nowrap">Statistiques</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                                    <li>
                                        <a href="#" class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                                            <span class="ms-3">Devenir Pro</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                                            <span class="ms-3">Documentation</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                                            <span class="ms-3">Support</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                            <span class="flex-1 ms-3 whitespace-nowrap">Groupes</span>
                                            <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Activer la bêta</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                            <span class="flex-1 ms-3 whitespace-nowrap">Activer la bêta</span>
                                            <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>
                                        </a>
                                    </li>
                                </ul>
                                <div id="dropdown-cta" class="p-4 mt-6 rounded-lg bg-blue-50 dark:bg-blue-900" role="alert">
                                    <div class="flex items-center mb-3">
                                        <span class="bg-orange-100 text-orange-800 text-sm font-semibold me-2 px-2.5 py-0.5 rounded dark:bg-orange-200 dark:text-orange-900">Bêta</span>
                                    </div>
                                    <p class="mb-3 text-sm text-blue-800 dark:text-blue-400">
                                        Vous êtes en mode bêta, tout ce que vous verrez avec<br>l'icon <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Bêta</span> est en cours de test !<br><br>
                                        Si vous rencontrez un bug, dite le nous !
                                    </p>
                                    <a class="text-sm text-blue-800 underline font-medium hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300" href="#">Rapport un bug</a>
                                </div>
                            </div>
                        </aside>
                    <?php
                    break;
            }
        }

        public function footer($type = "public") {
        ?>
                </body>
                <footer <?php if($type == "private"){ echo "class='p-4 sm:ml-64'"; } ?>>
                    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
                        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-400 lg:my-8" />
                        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© <?php echo date("Y", time());?> <a href="./index.php" class="hover:underline">YourForms™</a>. Tout droits réservés.</span>
                    </div>
                </footer>
                <script src="./js/menus.js"></script>
            </html>
        <?php
        }
    }

?>