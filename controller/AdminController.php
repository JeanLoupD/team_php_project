<?php


//function to load required model classes
spl_autoload_register(function ($class_name) {
    $filename = $class_name . '.class.php';
    include_once '../model/' . $filename;
});

session_start();
$database = new DB_Manager();

//Action to register a new admin/moderator to the admin panel
if (isset($_POST['create_account'])) {

    //Holding password and confirm password in variables
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    //Comparing password to see if they match
    if ($password != $confirmPassword) {
        echo("<script LANGUAGE='JavaScript'>
                        window.alert('PASSWORD DOESNT MATCH!');
                        window.location.href='https://5296474.herzingmontreal.ca/TeamProject/admin/register.php';
                   </script>");
    }

    //Function to see if the name already exists inside the database
    $newUser = $_POST['username'];
    $verifyName = $database->verify_name($newUser);

    //Function to see if the email already exists inside the database
    $newEmail = $_POST['email'];
    $verifyEmail = $database->verify_email($newEmail);

    //If the name and email doesn't exist in the database process with the new user creation
    if (!$verifyName && !$verifyEmail) {

        //Holding the users entries inside an array
        $newUserDb = array("name" => $_POST['firstname'],
            "lastname" => $_POST['lastname'],
            "username" => $_POST['username'],
            "avatar" => basename($_FILES["avatar"]["name"]),
            "email" => $_POST['email'],
            "password" => $_POST['password']
        );

        //Getting the avatar
        $target_directory = "image/"; //The file that is being selected
        $target_file = $target_directory . basename($_FILES["avatar"]["name"]);
        move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);

        //Calling the classes
        $users = new Users($newUserDb);
        $database->add_users($users);

        echo("<script LANGUAGE='JavaScript'>
                        window.alert('Character sucessfully created!');
                        window.location.href='https://5296474.herzingmontreal.ca/TeamProject/admin/register.php';
                   </script>");

    }

    //Changing the user level if the checkbox is checked
    if (isset($_POST['admin'])) {
        $username = $_POST['username'];
        $adminLevel = $database->admin_level($username);
    }

}

//Action to login the user inside the admin panel
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login = $database->login_user($email, $password);
}

//Action to logout the user from the admin panel
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('Location: login.php');
}

//Storing all user inside a session to print them inside the table in the index
$_SESSION['all_users'] = $database->get_all_users();


//To delete a user from the admin panel and database
if (isset($_GET['action']) && $_GET['action'] == "delete") {
    $delete_user = $database->delete_user();
}

//check if user is on edit profile page by clicking update button from index.php
if (strpos($_SERVER['REQUEST_URI'], '/editUser.php?updateID') !== false) {
    //Get ID from url
    $id = $_GET['updateID'];

    //get data from ID of user
    $edit_user = $database->user_info($id);

    //store avatar into session
    $_SESSION['pic'] = $edit_user['avatar'];

    //store id into variable
    $userId = $edit_user['id'];

    //store id of current session of loggedin user
    $loginUserId = $_SESSION['loggedInUser']['id'];

    if ($userId == $loginUserId) {
        header('location: ./profil.php');
    }

    //store remaining properties of user into unique sessions
    // to autofill form inputs
    $_SESSION['firstName'] = $edit_user['name'];
    $_SESSION['lastName'] = $edit_user['lastname'];
    $_SESSION['username'] = $edit_user['username'];
    $_SESSION['email'] = $edit_user['email'];
    $_SESSION['password'] = $edit_user['password'];
    $_SESSION['level'] = $edit_user['level'];


    // ==================== Edit profile part ===============================
    if (isset($_POST['edit'])) {
        //save all form inputs
        $name = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['Pwd'];
        $avatar = basename($_FILES["userPic"]["name"]);

        if (!empty($avatar)) {
            //move uploaded picture to folderr
            $target_directory = "./image/";
            $target_file = $target_directory . basename($_FILES["userPic"]["name"]);
            move_uploaded_file($_FILES["userPic"]["tmp_name"], $target_file);

            //call function to update user
            $database->update_user($id, $avatar);
        } else {
            $avatar = $_SESSION['pic'];
            $database->update_user($id, $avatar);
        }
    }
} //if user manually entered to go to edit profile page
    else if (strpos($_SERVER['REQUEST_URI'], '/editUser.php')) {
    //user did not click update button.. alert user and redirect them
    echo '<script>alert("Error! You Did Not click Update Button.. Redirecting you")</script>';
    header("Refresh:0.25; url=https://5296474.herzingmontreal.ca/TeamProject/admin/index.php");
}

//function To Edit Profile of the Logged in User
function editProfile()
{
    $database = new DB_Manager();

    //get id from logged-In user
    $id = $_SESSION['loggedInUser']['id'];

    //get data from ID of user
    $editUser = $database->user_info($id);


    //Store Each property into sessions
    $_SESSION['userFirstName'] = $editUser['name'];
    $_SESSION['userLastName'] = $editUser['lastname'];
    $_SESSION['userName'] = $editUser['username'];
    $_SESSION['userAvatar'] = $editUser['avatar'];
    $_SESSION['userEmail'] = $editUser['email'];
    $_SESSION['userPassword'] = $editUser['password'];

    if (isset($_POST['saveProfile'])) {
        $name = $_POST['userFirstname'];
        $lastName = $_POST['userLastname'];
        $username = $_POST['userName'];
        $email = $_POST['userEmail'];
        $avatar = basename($_FILES["userPic"]["name"]);
        $Pwd = $_POST['userPwd'];

        $confirmPass = $_POST['confirmPwd'];

        if (!empty($avatar)) {
            //move uploaded picture to folder
            $target_directory = "./image/";
            $target_file = $target_directory . basename($_FILES["userPic"]["name"]);
            move_uploaded_file($_FILES["userPic"]["tmp_name"], $target_file);

        } else {
            $avatar = $_SESSION['userAvatar'];
        }

        if ($Pwd != $confirmPass) {
            header('location: ./profil?PwdDontMatch');
        } else {
            //call function to update user
            $database->update_Profile($id, $avatar);
        }

    }


}
