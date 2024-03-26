<?php

    require_once("php/base.php");
    $basePage = new webBase();

    require_once("php/forms.php");
    $formPage = new FormsController();


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
                            <?php

                                $val = $formPage->getForms();

                                foreach($val as $key => $values)
                                {
                                ?>
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            <?php echo $values["_id"]; ?>
                                        </th>
                                        <td class="px-6 py-4">
                                            <?php echo $values["title"]; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo count($values["questions"]); ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            0 vues
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="forms_actions.php?id=<?php echo $values["_id"]; ?>&action=edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a><br>
                                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Voir</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php
    $basePage->footer("private");

?>