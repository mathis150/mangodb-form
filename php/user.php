<?php

    require_once(__DIR__."/database.php");
    require_once(__DIR__."/env.php");

    class UserController {
        private $db;
        private $mongo;

        private $collection_users;
        private $collection_session;

        public function __construct() {
            $this->db = new DataBaseController();
            
            $this->mongo = $this->db->connect(SERVICE_TYPE);

            $this->collection_users = $this->mongo->selectCollection(DATABASE['appName'], "users");
            $this->collection_session = $this->mongo->selectCollection(DATABASE['appName'], "sessions");
        }
        public function __destruct() {
            unset($this->db);
            unset($this->mongo);
            unset($this->collection_users);
            unset($this->collection_session);
        }

        public function createUser($pseudo, $email, $password) {
            $user = $this->collection_users->findOne(['email' => $email]);

            if($user == null) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $this->collection_users->insertOne(['pseudo'=> $pseudo,'email' => $email, 'password' => $password, 'role' => 'user']);
            }
        }

        public function loginUser($email, $password) {
            $user = $this->collection_users->findOne(['email' => $email]);

            if($user != null) {
                if(password_verify($password, $user['password'])) {
                    $session = $this->db->generateUUID();
                    $this->collection_session->insertOne(['session_token' => $session, 'date' => (time()+2678400), 'user_id' => $user['_id']]);

                    return $session;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function isSessionExist($session, $goto = "", $valid = true) {
            $session = $this->collection_session->findOne(['session_token' => $session]);

            if($session != null) {
                if($session['date'] > time()) {
                    if(!empty($goto) and $valid)
                        header("Location: $goto");
                    else
                        return true;
                }else{
                    if(!empty($goto) and !$valid)
                        header("Location: $goto");
                    else
                        return false;
                }
            }else{
                if(!empty($goto) and !$valid)
                    header("Location: $goto");
                else
                    return false;
            }
        }
    }

?>