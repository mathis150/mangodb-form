<?php

    require_once("php/base.php");
    $basePage = new webBase();


    $basePage->header("Accueil");
    $basePage->navBar("private");
    ?>
        <h2 class="p-4 sm:ml-64 text-2xl text-center">Vos formulaires</h2>
        <div class="p-4 sm:ml-64">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div class="flex items-center justify-center h-24 rounded bg-white border-2 border-gray-200">
                        <div class="text-center">
                            <h6 class="text-3xl font-bold text-deep-purple-accent-400">29/30</h6>
                            <p>Formulaires créé (<span class="text-green-600 font-bold">+8%</span>)</p>
                            <cite>Devenez <a href="client_pricing.php"><u>Pro</u></a> et n'ayez plus de limite !</cite>
                        </div>
                    </div>
                    <div class="flex items-center justify-center h-24 rounded bg-white border-2 border-gray-200">
                        <div class="text-center">
                            <h6 class="text-3xl font-bold text-deep-purple-accent-400">144K</h6>
                            <p>Réponses (<span class="text-red-600 font-bold">-8%</span>)</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center h-24 rounded bg-white border-2 border-gray-200">
                        <div class="text-center">
                            <h6 class="text-3xl font-bold text-deep-purple-accent-400">144K</h6>
                            <p>Vues totaux (<span class="text-gray-600 font-bold">+0.003%</span>)</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mb-4">
                    <a href="forms_actions.php" class="rounded-md bg-green-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-500">Créer un formulaire</a>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Titre
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nb. Questions
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Réponses
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    e73-20240223-124818
                                </th>
                                <td class="px-6 py-4">
                                    Titre de formulaire vraiment vraiment très cool
                                </td>
                                <td class="px-6 py-4">
                                    38
                                </td>
                                <td class="px-6 py-4">
                                    1911568 vues
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a><br>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Voir</a>
                                </td>
                            </tr>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    e73-20240223-124818
                                </th>
                                <td class="px-6 py-4">
                                    Titre de formulaire vraiment vraiment très cool
                                </td>
                                <td class="px-6 py-4">
                                    38
                                </td>
                                <td class="px-6 py-4">
                                    1911568 vues
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a><br>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Voir</a>
                                </td>
                            </tr>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    e73-20240223-124818
                                </th>
                                <td class="px-6 py-4">
                                    Titre de formulaire vraiment vraiment très cool
                                </td>
                                <td class="px-6 py-4">
                                    38
                                </td>
                                <td class="px-6 py-4">
                                    1911568 vues
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a><br>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Voir</a>
                                </td>
                            </tr>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    e73-20240223-124818
                                </th>
                                <td class="px-6 py-4">
                                    Titre de formulaire vraiment vraiment très cool
                                </td>
                                <td class="px-6 py-4">
                                    38
                                </td>
                                <td class="px-6 py-4">
                                    1911568 vues
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a><br>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Voir</a>
                                </td>
                            </tr>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    e73-20240223-124818
                                </th>
                                <td class="px-6 py-4">
                                    Titre de formulaire vraiment vraiment très cool
                                </td>
                                <td class="px-6 py-4">
                                    38
                                </td>
                                <td class="px-6 py-4">
                                    1911568 vues
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a><br>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Voir</a>
                                </td>
                            </tr>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    e73-20240223-124818
                                </th>
                                <td class="px-6 py-4">
                                    Titre de formulaire vraiment vraiment très cool
                                </td>
                                <td class="px-6 py-4">
                                    38
                                </td>
                                <td class="px-6 py-4">
                                    1911568 vues
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a><br>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Voir</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
                    <div class="flex flex-1 justify-between sm:hidden">
                        <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                        <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
                    </div>
                    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                        <div>
                        <p class="text-sm text-gray-700">
                            Showing
                            <span class="font-medium">1</span>
                            to
                            <span class="font-medium">10</span>
                            of
                            <span class="font-medium">97</span>
                            results
                        </p>
                        </div>
                        <div>
                        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                            <a href="#" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                            </svg>
                            </a>
                            <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
                            <a href="#" aria-current="page" class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">1</a>
                            <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">2</a>
                            <a href="#" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">3</a>
                            <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span>
                            <a href="#" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">8</a>
                            <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">9</a>
                            <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">10</a>
                            <a href="#" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                            </svg>
                            </a>
                        </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    $basePage->footer("private");

?>