<?php

    require_once(__DIR__."/database.php");
    require_once(__DIR__."/env.php");
    require("composer/vendor/autoload.php");

    class FormsController {
        private $db;
        private $mongo;
        private $collection_sessions;
        private $collection_forms;

        public function __construct() {
            $this->db = new DataBaseController();
            
            $this->mongo = $this->db->connect(SERVICE_TYPE);

            $this->collection_sessions = $this->mongo->selectCollection(DATABASE['appName'], "sessions");
            $this->collection_forms = $this->mongo->selectCollection(DATABASE['appName'], "forms");
        }
        public function __destruct() {
            unset($this->db);
            unset($this->mongo);
            unset($this->collection_users);
            unset($this->collection_session);
            unset($this->collection_forms);
        }

        public function getForms() {
            $user = $this->collection_sessions->findOne(['session_token' => $_COOKIE['session']]);
            $forms = $this->collection_forms->find(['user' => $user['user_id']]);

            return $forms;
        }
        public function getFormByID($id) {
            $forms = $this->collection_forms->findOne(['uuid' => $id]);

            return $forms;
        }

        public function createForms($title, $presentation, $questions, $session, $description="") {
            $user = $this->collection_sessions->findOne(['session_token' => $session]);
            $name = "";

            if(!empty($presentation)) {
                $name = $this->db->generateUUID().".".strtolower(substr(strrchr($presentation['name'], '.'), 1));
                $chemin = "./imgs/".$name;
                
                move_uploaded_file($presentation['tmp_name'], $chemin);
            }

            $this->collection_forms->insertOne([
                'uuid' => $this->db->generateUUID(),
                'title' => $title,
                'description' => $description,
                'presentation' => $name,
                'questions' => $questions,
                'user' => $user['user_id']
            ]);

            header('Location: forms.php');
        }
        public function updateForms($uuid, $title, $presentation, $questions, $description="") {
            $name = "";

            if(is_array($presentation)) {
                $name = $this->db->generateUUID().".".strtolower(substr(strrchr($presentation['name'], '.'), 1));
                $chemin = "./imgs/".$name;
                
                move_uploaded_file($presentation['tmp_name'], $chemin);
            }
            else {
                $name = $presentation;
            }

            $this->collection_forms->updateOne(
                [ 'uuid' => $uuid ],
                [ '$set' => [
                    'title' => $title,
                    'description' => $description,
                    'presentation' => $name,
                    'questions' => $questions,
                ]
            ]);

            header('Location: forms.php');
        }

    }
?>