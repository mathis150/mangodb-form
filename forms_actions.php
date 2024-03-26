<?php

    require_once("php/base.php");
    $basePage = new webBase();
    
    require_once("php/user.php");
    $user = new UserController();
    
    require_once("php/forms.php");
    $forms = new FormsController();

    $valueForm = array(
        "title" => "",
        "description" => "",
        "presentation" => "",
        "questions" => array("title" => array(""), "type" => array(""))
    );

    if(isset($_COOKIE['session']))
        $user->isSessionExist($_COOKIE['session'], "index.php", false);
    
    if(!empty($_GET['action']) and $_GET['action'] == "edit")
    {
        $form = $forms->getFormByID($_GET['id']);
        $valueForm = array(
            "title" => $form['title'],
            "description" => $form['description'],
            "presentation" => $form['presentation'],
            "questions" => $form['questions']
        );
    }

    if(isset($_POST['submit'])) {
        if(empty($_GET['action']) or $_GET['action'] == "create")
        {
            if(!empty($_POST['title'])){
                $forms->createForms($_POST['title'], $_FILES['file-upload'], $_POST['questions'], $_COOKIE['session'], (!empty($_POST['about']) ? $_POST['about'] : ""));
            }
        }
        elseif($_GET['action'] == "edit")
        {
            if(!empty($_POST['title'])){
                $forms->updateForms($_GET['id'], $_POST['title'], (!empty($_FILES['file-upload']) ? $_FILES['file-upload'] : $valueForm['presentation']), $_POST['questions'], (!empty($_POST['about']) ? $_POST['about'] : ""));
            }
        }
    }

    if(isset($_POST['cancel'])){
        header("Location: forms.php");
    }

    $basePage->header("Accueil");
    $basePage->navBar("private");
    ?>
        <?php
            if(!isset($_GET['action'])){
                echo "<h2 class='p-4 sm:ml-64 text-2xl text-center'>Création de votre formulaire</h2>";
            }elseif($_GET['action'] == "edit"){
                echo "<h2 class='p-4 sm:ml-64 text-2xl text-center'>Modification de votre formulaire</h2>";
            }
        ?>
        <div class="p-4 sm:ml-64">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                <form method="POST" action="#" enctype="multipart/form-data">
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="mt-10" style="width: 80%; margin-left: 10%;">
                                <div class="w-full">
                                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Titre du formulaire</label>
                                    <div class="mt-2">
                                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input type="text" name="title" id="title" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value="<?php echo $valueForm['title']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-full mt-5">
                                    <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                    <div class="mt-2">
                                        <textarea id="about" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?php echo $valueForm['description']; ?></textarea>
                                    </div>
                                </div>

                                <div class="col-span-full mt-5">
                                <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Photo de couverture</label>
                                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                    <div class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                        <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    foreach($valueForm['questions']['title'] as $key => $val) {
                    ?>
                        <div class="rounded-md shadow-md mb-10" id="f<?php echo $key; ?>">
                            <div class="bg-indigo-500 h-2 rounded-md"></div>
                            <div class="p-4">
                                Question n°<?php echo $key; ?>
                                <div class="mt-2 flex">
                                    <div class="flex flex-1 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <input type="text" name="questions[title][<?php echo $key; ?>]" id="<?php echo $key; ?>" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value="<?php echo $val; ?>">
                                    </div>
                                    <div class="flex flex-1 ml-5 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <select name="questions[type][<?php echo $key; ?>]" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                            <option value="text"
                                                <?php
                                                if($valueForm['questions']['type'][$key] == "text")
                                                    echo "selected";
                                                ?>
                                            >Texte</option>
                                            <option value="textarea"
                                                <?php
                                                if($valueForm['questions']['type'][$key] == "textarea")
                                                    echo "selected";
                                                ?>
                                            >Zone de texte</option>
                                            <option value="number"
                                                <?php
                                                if($valueForm['questions']['type'][$key] == "number")
                                                    echo "selected";
                                                ?>
                                            >Nombre</option>
                                            <option value="date"
                                                <?php
                                                if($valueForm['questions']['type'][$key] == "date")
                                                    echo "selected";
                                                ?>
                                            >Date</option>
                                            <option value="time"
                                                <?php
                                                if($valueForm['questions']['type'][$key] == "time")
                                                    echo "selected";
                                                ?>
                                            >Heure</option>
                                            <option value="email"
                                                <?php
                                                if($valueForm['questions']['type'][$key] == "email")
                                                    echo "selected";
                                                ?>
                                            >Email</option>
                                            <option value="tel"
                                                <?php
                                                if($valueForm['questions']['type'][$key] == "tel")
                                                    echo "selected";
                                                ?>
                                            >Téléphone</option>
                                        </select>
                                    </div>
                                    <div class="flex flex-1 ml-5 justify-end">
                                        <button type="button" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" onclick="addLine()">Ajouter une ligne</button>

                                        <?php
                                        if($key == 1) {
                                        ?>
                                            <button type="button" class="rounded-md bg-red-200  ml-2 px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" disabled>Supprimer la ligne</button>
                                        <?php
                                        }else {
                                        ?>
                                            <button type="button" class="rounded-md bg-red-600  ml-2 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" onclick="deleteLine(<?php echo $key; ?>)">Supprimer la ligne</button>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="submit" name="cancel" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                        <button type="submit" name="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            let total = <?php echo count($valueForm['questions']['title']); ?>;
            function addLine(){
                total++;
                let newDiv = document.createElement("div");
                newDiv.classList.add("rounded-md", "shadow-md", "mb-10");
                newDiv.id = "f" + total;
                newDiv.innerHTML = `
                    <div class="bg-indigo-500 h-2 rounded-md"></div>
                    <div class="p-4">
                        Question n°${total}
                        <div class="mt-2 flex">
                            <div class="flex flex-1 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="questions[title][`+ total +`]" id="`+ total +`" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            </div>
                            <div class="flex flex-1 ml-5 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <select name="questions[type][`+ total +`]" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                    <option value="text" selected>Texte</option>
                                    <option value="textarea">Zone de texte</option>
                                    <option value="number">Nombre</option>
                                    <option value="date">Date</option>
                                    <option value="time">Heure</option>
                                    <option value="email">Email</option>
                                    <option value="tel">Téléphone</option>
                                </select>
                            </div>
                            <div class="flex flex-1 ml-5 justify-end">
                                <button type="button" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" onclick="addLine()">Ajouter une ligne</button>

                                <button type="button" class="rounded-md bg-red-600  ml-2 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" onclick="deleteLine(`+ total +`)">Supprimer la ligne</button>
                            </div>
                        </div>
                    </div>
                `;
                document.getElementById("f" + (total - 1)).insertAdjacentElement("afterend", newDiv);
            }

            function deleteLine(id){
                for(let i = id; i < total; i++){
                    document.getElementById(i).value = document.getElementById(i + 1).value;
                }
                document.getElementById("f" + total).remove();
                total--;
            }
        </script>
    <?php
    $basePage->footer("private");

?>