<?php

class DB_Manager{
    private $db;

    //Connection to the database
    public function __construct()
    {
        $host = "localhost:3306";
        $user = "h5296474";
        $pass = "HerzingScript2022";
        $dbname = "h5296474_admin";

        //try to connect to the database using the provided credentials
        //if the connection works, it will keep the persistence, else it will throw an error
        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

            //To see if there is any Mysql errors
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (Exception $e) {
            die("Database Connection Error: " . $e->getMessage());
        }
    }

    //Function to add a new character inside the database
    public function add_users($users)
    {
        $query = $this->db->prepare("INSERT INTO users VALUES 
									   (DEFAULT, :name, :lastname, :username, :avatar, :email, :password, DEFAULT);");
        $query->execute(array(
            "name" => $users->getName(),
            "lastname" => $users->getLastname(),
            "username" => $users->getUsername(),
            "avatar" => $users->getAvatar(),
            "email" => $users->getEmail(),
            "password" => $users->getPassword()
        ));

    }

    //Function to verify if the name already exists inside the database
    public function verify_name($username)
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE username = :username;");
        $query->execute(array("username" => $_POST['username']));
        //Look if the name already exists inside the database
        if ($tableRow = $query->fetch()) {
            //if name exists
            $nameExist = true;
            $result = true;
            header("location: ./register.php?error=nameAlreadyExist");
            exit();
        } else {
            $nameExist = false;
        }

    }

    //Function to verify if the email already exists inside the database
    public function verify_email($email)
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE email = :email;");
        $query->execute(array("email" => $_POST['email']));
        //Look if the email already exists inside the database
        if ($tableRow = $query->fetch()) {
            //if email exists
            $emailExist = true;
            $result = true;
            header("location: ./register.php?error=emailAlreadyExist");
            exit();
        } else {
            $emailExist = false;
        }

    }

    //Function to set the user level to 1 if he is an administrator
    public function admin_level($username)
    {
        $query = $this->db->prepare("UPDATE users SET level = 1 WHERE username = :username;");
        $query->execute(array("username" => $_POST['username']));
    }

    //Function to log in the user inside the administration panel
    public function login_user($email, $password)
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE email = :email and password = :password;");
        $query->execute(array("email" => $_POST['email'],
            "password" => $_POST['password']));

        $result = $query->fetch();

        if ($result) {
            $_SESSION['loggedInUser'] = $result;
            echo("<script LANGUAGE='JavaScript'>
                        window.alert('Login Successful');
                        window.location.href='https://5296474.herzingmontreal.ca/TeamProject/admin/index.php';
                   </script>");
        } else {
            echo("<script LANGUAGE='JavaScript'>
                        window.alert('Wrong email or password.\\nPlease try again.');
                        window.location.href='https://5296474.herzingmontreal.ca/TeamProject/admin/login.php';
                   </script>");
        }
    }

    //Function to get all the characters from the database
    public function get_all_users()
    {
        $query = $this->db->query("SELECT * FROM users");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    //Function to update user
    public function update_user($id, $avatar){

        //query to update database
        unset($_POST['level']);
        $query = $this->db->prepare("UPDATE users SET id= :id, name=:name,lastname=:lastname,username=:username, 
avatar = :avatar, email=:email,password=:password WHERE id = $id;");

        //check if the $avatar is not in session['pic]'
        if($_SESSION['pic'] != $avatar) {

            //if it isn't user uploaded a new picture
            $result = $query->execute(array(
                "id" => $_GET['updateID'],
                "name" => $_POST['firstName'],
                "lastname" => $_POST['lastName'],
                "username" => $_POST['username'],
                "avatar" => basename($_FILES["userPic"]["name"]),
                "email" => $_POST['email'],
                "password" => $_POST['Pwd'],
            ));
        } else {
            //user did not upload picture
            $result = $query->execute(array(
                "id" => $_GET['updateID'],
                "name" => $_POST['firstName'],
                "lastname" => $_POST['lastName'],
                "username" => $_POST['username'],
                "avatar" => $_SESSION['pic'],
                "email" => $_POST['email'],
                "password" => $_POST['Pwd'],
            ));
        }
        //redirect user with success msg
        if ($result) {
            header("location: index.php?updateSuccess");
        }
    }

    public function update_Profile($id,$avatar){
        //query to update database
        unset($_POST['level']);
        $query = $this->db->prepare("UPDATE users SET id= :id, name=:name,lastname=:lastname,username=:username, 
avatar = :avatar, email=:email,password=:password WHERE id = $id;");

        //check if the $avatar is not in session['pic]'
        if($_SESSION['pic'] != $avatar) {

            //if it isn't user uploaded a new picture
            $result = $query->execute(array(
                "id" => $_SESSION['loggedInUser']['id'],
                "name" => $_POST['userFirstname'],
                "lastname" => $_POST['userLastname'],
                "username" => $_POST['userName'],
                "avatar" => basename($_FILES["userPic"]["name"]),
                "email" => $_POST['userEmail'],
                "password" => $_POST['userPwd'],
            ));
        } else {
            //user did not upload picture
            $result = $query->execute(array(
                "id" => $_SESSION['loggedInUser']['id'],
                "name" => $_POST['userFirstname'],
                "lastname" => $_POST['userLastname'],
                "username" => $_POST['userName'],
                "avatar" => $_SESSION['pic'],
                "email" => $_POST['userEmail'],
                "password" => $_POST['userPwd'],
            ));
        }
        //redirect user with success msg
        if ($result) {
            header("location: profil.php?updateSuccess");
        }
    }


    //Function to delete a user from the admin/moderator table and the database
    public function delete_user()
    {
        //query to update database
        $query = $this->db->prepare("DELETE FROM users WHERE id = ?;");
        $result = $query->execute(array($_GET['id']));

        if ($result) {
            header("location: index.php?deleteSuccess");
        }
    }

    //Function to select all informations of a user based on his id
    public function user_info($id)
    {
        $query = $this->db->query("SELECT * FROM users WHERE id = $id;");
        $userInfo = $query->fetch(PDO::FETCH_ASSOC);

        return $userInfo;
    }
}
