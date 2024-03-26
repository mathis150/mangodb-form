<?php

    require_once("php/base.php");
    $basePage = new webBase();
    
    require_once("php/user.php");
    $user = new UserController();
    
    require_once("php/forms.php");
    $formPage = new FormsController();

    $db = new DataBaseController();
    $dbLogged = $db->connect(SERVICE_TYPE);

    $access = $dbLogged->selectCollection(DATABASE['appName'], "answers");

    if(isset($_COOKIE['session']))
        $user->isSessionExist($_COOKIE['session'], "index.php", false);

    if(!empty($_GET['id']))
    {
        $val = $formPage->getFormByID($_GET['id']);
    }
    else
    {
        header("Location: index.php");
    }

    if(isset($_POST['submit']))
    {
        $access->insertOne([
            'form_id' => $val['uuid'],
            'answers' => $_POST['questions']
        ]);
        
        header("Location: index.php");
    }

    $basePage->header("Accueil");
    ?>
        <div class="rounded-md shadow-md m-10">
            <div class="bg-indigo-500 h-2 rounded-md"></div>
            <img src="imgs/<?php echo $val['presentation']; ?>" style="width: 100%; height: 400px; object-fit: cover;">
        </div>
        <div class="rounded-md shadow-md m-10">
            <div class="bg-indigo-500 h-2 rounded-md"></div>
            <div class="p-4">
                <h1><?php echo $val['title']; ?></h1>
                <p><?php echo $val['description']; ?></p>
            </div>
        </div>
        <form action="#" method="POST">
            <?php
            foreach($val['questions']['title'] as $key => $values)
            {
            ?>
                <div class="rounded-md shadow-md m-10">
                    <div class="bg-indigo-500 h-2 rounded-md"></div>
                    <div class="p-4">
                        <?php echo $values;
                        if($val['questions']['type'][$key] == "textarea"){
                            echo '<textarea name="questions['.$key.']" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6 ring-1 ring-inset ring-gray-300"></textarea>';
                        }
                        else
                        {
                            echo '<div class="mt-2 flex"><input type="'.$val['questions']['type'][$key].'" name="questions['.$key.']" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6 ring-1 ring-inset ring-gray-300"></div>';
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
            ?>

            <div class="mt-6 flex items-center justify-end gap-x-6 mr-6">
                <button type="submit" name="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Envoyer</button>
            </div>
        </form>
    <?php

?>