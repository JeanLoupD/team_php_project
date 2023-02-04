<?php
//function to load required model classes
spl_autoload_register(function ($class_name) {
    $filename = $class_name . '.class.php';
    include_once '../model/' . $filename;
});

session_start();
$database2 = new DB_Manager2();

//Action to logout the user from the admin panel
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('Location: login.php');
}

//Storing all user inside a session to print them inside the table in the index
$_SESSION['all_chefs'] = $database2->get_all_chefs();

//Storing all slider info inside a session to print them inside the table in the index
$_SESSION['all_slider'] = $database2->get_all_slider();

//Storing all menu info inside a session to print them inside the table in the index
$_SESSION['all_menu'] = $database2->get_all_menu();

//Storing all contact info inside a session to print them inside the table in the index
$_SESSION['all_contact'] = $database2->get_all_contact();

//Storing all about info inside a session to print them inside the table in the index
$_SESSION['all_about'] = $database2->get_all_about();

//Storing all footer info inside a session to print them inside the table in the index
$_SESSION['all_footer'] = $database2->get_all_footer();

//Storing all welcome info inside a session to print them inside the table in the index
$_SESSION['all_welcome'] = $database2->get_all_welcome();



//To delete a chef from the admin panel and database
if(isset($_GET['chefDeleteID'])){
    $database2->delete_chef();
}

//To delete a menu from the admin panel and database
if(isset($_GET['menuDeleteID'])){
    $database2->delete_menu();
}

//To delete about info from the admin panel and database
if(isset($_GET['aboutDeleteID'])){
    $database2->delete_about();
}

//To delete a contact info from the admin panel and database
if(isset($_GET['contactDeleteID'])){
    $database2->delete_contact();
}

//To delete a slider info from the admin panel and database
if(isset($_GET['sliderDeleteID'])){
    $database2->delete_slider();
}

//To delete a footer info from the admin panel and database
if (isset($_GET['footerDeleteID'])) {
    $database2->delete_footer();
}

//To delete a welcome info from the admin panel and database
if (isset($_GET['welcomeDeleteID'])) {
    $database2->delete_welcome();
}

//To add a new chef inside the table and the database
if (isset($_POST['new_chef'])) {
    $newChefDb = array("name" 	  		=> $_POST['addChefFirstName'],
        "lastname"		=> $_POST['addChefLastName'],
        "avatar" 		=> basename($_FILES["addChefPic"]["name"]),
        "poste"			=> $_POST['addChefPosition'],
        "description"	=> $_POST['addChefDescription']
    );

    //Getting the avatar
    $target_directory = "../Restaurantly/assets/img/chefs/"; //The file that is being selected
    $target_file = $target_directory . basename($_FILES["addChefPic"]["name"]);
    move_uploaded_file($_FILES["addChefPic"]["tmp_name"], $target_file);

    //Calling the classes
    $chef = new Chef($newChefDb);
    $database2->add_chef($chef);
}


//check if chef is on edit profile page by clicking update button from team.php
if (strpos($_SERVER['REQUEST_URI'], '/editchef.php?updateID') !== false) {
    //Get ID from url
    $id = $_GET['updateID'];

    //get data from ID of chef
    $edit_chef = $database2->chef_info($id);

    //store avatar into session
    $_SESSION['chef_pic'] = $edit_chef['avatar'];

    //store remaining properties of chef into unique sessions
    // to autofill form inputs
    $_SESSION['chefFirstName'] = $edit_chef['name'];
    $_SESSION['chefLastName'] = $edit_chef['lastname'];
    $_SESSION['position'] = $edit_chef['poste'];
    $_SESSION['description'] = $edit_chef['description'];


    // ==================== Edit Chef profile part ===============================
    if (isset($_POST['edit_chef'])) {
        //save all form inputs
        $chef_name = $_POST['chefFirstName'];
        $chef_lastname = $_POST['chefLastName'];
        $chef_position = $_POST['position'];
        $chef_description = $_POST['description'];
        $chef_avatar = basename($_FILES["chefPic"]["name"]);

        if(!empty($chef_avatar)){
            //move uploaded picture to folderr
            $target_directory = "../Restaurantly/assets/img/chefs";
            $target_file = $target_directory . basename($_FILES["chefPic"]["name"]);
            move_uploaded_file($_FILES["chefPic"]["tmp_name"], $target_file);

            //call function to update user
            $database2->update_chef($id, $chef_avatar);

        } else {
            $chef_avatar = $_SESSION['chef_pic'];
            $database2->update_chef($id, $chef_avatar);
        }

    }
    //if user manually entered to go to edit chef profile page
} else if (strpos($_SERVER['REQUEST_URI'], '/editchef.php'))  {
    //user did not click update button.. alert user and redirect them
    echo '<script>alert("Error! You Did Not click Update Button.. Redirecting you")</script>';
    header( "Refresh:0.25; url=https://5296474.herzingmontreal.ca/TeamProject/admin/index.php");
}

/*=============================== End of Chef Part ==================================*/


/*=============================== Edit Menu Part ==================================*/


//To add a new menu item inside the table and the database
if (isset($_POST['new_menu'])) {
    $newMenuDb = array("name" => $_POST['addMenuName'],
        "description"	=> $_POST['addMenuDesc'],
        "price"			=> $_POST['addMenuPrice'],
        "picture" 		=> basename($_FILES["addMenuPic"]["name"]),
        "type"			=> $_POST['addMenuType']
    );

    //Getting the avatar
    $target_directory = "../Restaurantly/assets/img/menu/"; //The file that is being selected
    $target_file = $target_directory . basename($_FILES["addMenuPic"]["name"]);
    move_uploaded_file($_FILES["addMenuPic"]["tmp_name"], $target_file);

    //Calling the classes
    $menu = new Menu($newMenuDb);
    $database2->add_menu($menu);
}



//check if menu dish is on edit profile page by clicking update button from team.php
if (strpos($_SERVER['REQUEST_URI'], '/editmenu.php?updateID') !== false) {
    //Get ID from url
    $id = $_GET['updateID'];

    //get data from ID of menu dish
    $edit_menu = $database2->menu_info($id);

    //store avatar into session
    $_SESSION['menu_pic'] = $edit_menu['picture'];

    //store remaining properties of menu info into unique sessions
    // to autofill form inputs
    $_SESSION['menuName'] = $edit_menu['name'];
    $_SESSION['menuDesc'] = $edit_menu['description'];
    $_SESSION['menuPrice'] = $edit_menu['price'];
    $_SESSION['menuType'] = $edit_menu['type'];


    // ======================= Edit Menu Decription part ===============================
    if (isset($_POST['edit_menu'])) {
        //save all form inputs
        $menu_name = $_POST['menuName'];
        $menu_description = $_POST['menuDesc'];
        $menu_price = $_POST['menuPrice'];
        $menu_avatar = basename($_FILES["menuPic"]["name"]);
        $menu_type = $_POST['menuType'];

        if(!empty($menu_avatar)){
            //move uploaded picture to folderr
            $target_directory = "../Restaurantly/assets/img/menu/";
            $target_file = $target_directory . basename($_FILES["menuPic"]["name"]);
            move_uploaded_file($_FILES["menuPic"]["tmp_name"], $target_file);

            //call function to update user
            $database2->update_menu($id, $menu_avatar);

        } else {
            $menu_avatar = $_SESSION['menu_pic'];
            $database2->update_menu($id, $menu_avatar);
        }

    }
    //if user manually entered to go to edit chef profile page
} else if (strpos($_SERVER['REQUEST_URI'], '/editmenu.php'))  {
    //user did not click update button.. alert user and redirect them
    echo '<script>alert("Error! You Did Not click Update Button.. Redirecting you")</script>';
    header( "Refresh:0.25; url=https://5296474.herzingmontreal.ca/TeamProject/admin/index.php");
}
/*=============================== End of Menu Part ==================================*/


/*=============================== Edit Slider Part ==================================*/

//To add a new slider item inside the table and the database
if (isset($_POST['new_services'])) {
    $newSliderDb = array("title" 	  	=> $_POST['addSliderTitle'],
        "price"			=> $_POST['addSliderPrice'],
        "picture" 		=> basename($_FILES["addSliderPic"]["name"]),
        "text"			=> $_POST['addSliderDesc']
    );

    //Getting the avatar
    $target_directory = "../Restaurantly/assets/img/"; //The file that is being selected
    $target_file = $target_directory . basename($_FILES["addSliderPic"]["name"]);
    move_uploaded_file($_FILES["addSliderPic"]["tmp_name"], $target_file);

    //Calling the classes
    $slider = new Slider($newSliderDb);
    $database2->add_slider($slider);
}


//check if slider info is on edit profile page by clicking update button from team.php
if (strpos($_SERVER['REQUEST_URI'], '/editservices.php?updateID') !== false) {
    //Get ID from url
    $id = $_GET['updateID'];

    //get data from ID of slider
    $edit_slider = $database2->slider_info($id);

    //store avatar into session
    $_SESSION['slider_pic'] = $edit_slider['picture'];

    //store remaining properties of slider info into unique sessions
    // to autofill form inputs
    $_SESSION['sliderName'] = $edit_slider['title'];
    $_SESSION['sliderPrice'] = $edit_slider['price'];
    $_SESSION['sliderDesc'] = $edit_slider['text'];


    // ======================= Edit Slider Decription part ===============================
    if (isset($_POST['edit_services'])) {
        //save all form inputs
        $slider_name = $_POST['sliderName'];
        $slider_price = $_POST['sliderPrice'];
        $slider_avatar = basename($_FILES["sliderPic"]["name"]);
        $slider_description = $_POST['sliderDesc'];

        if(!empty($slider_avatar)){
            //move uploaded picture to folderr
            $target_directory = "../Restaurantly/assets/img/";
            $target_file = $target_directory . basename($_FILES["sliderPic"]["name"]);
            move_uploaded_file($_FILES["sliderPic"]["tmp_name"], $target_file);

            //call function to update slider
            $database2->update_slider($id, $slider_avatar);

        } else {
            $slider_avatar = $_SESSION['slider_pic'];
            $database2->update_slider($id, $slider_avatar);
        }

    }
    //if user manually entered to go to edit chef profile page
} else if (strpos($_SERVER['REQUEST_URI'], '/editservices.php'))  {
    //user did not click update button.. alert user and redirect them
    echo '<script>alert("Error! You Did Not click Update Button.. Redirecting you")</script>';
    header( "Refresh:0.25; url=https://5296474.herzingmontreal.ca/TeamProject/admin/index.php");
}

/*=============================== End of Slider Part ==================================*/

/*=============================== Edit About Part ==================================*/

//To add a new about information inside the table and the database
if (isset($_POST['new_about'])) {
    $newAboutDb = array("title"   => $_POST['newAboutTitle'],
        "subTitle"=> $_POST['newAboutSubTitle'],
        "text" 	  => $_POST['newAboutDesc'],
        "picture" => basename($_FILES["newAboutPic"]["name"])
    );

    //Getting the avatar
    $target_directory = "../Restaurantly/assets/img/"; //The file that is being selected
    $target_file = $target_directory . basename($_FILES["newAboutPic"]["name"]);
    move_uploaded_file($_FILES["newAboutPic"]["tmp_name"], $target_file);

    //Calling the classes
    $about = new About($newAboutDb);
    $database2->add_about($about);
}


//check if slider info is on edit profile page by clicking update button from team.php
if (strpos($_SERVER['REQUEST_URI'], '/editabout.php?updateID') !== false) {
    //Get ID from url
    $id = $_GET['updateID'];

    //get data from ID of slider
    $edit_about = $database2->about_info($id);

    //store avatar into session
    $_SESSION['about_pic'] = $edit_about['picture'];

    //store remaining properties of slider info into unique sessions
    // to autofill form inputs
    $_SESSION['aboutTitle'] = $edit_about['title'];
    $_SESSION['aboutSubTitle'] = $edit_about['subTitle'];
    $_SESSION['aboutDesc'] = $edit_about['text'];


    // ======================= Edit About Decription part ===============================
    if (isset($_POST['edit_about'])) {
        //save all form inputs
        $about_title = $_POST['aboutTitle'];
        $about_SubTitle = $_POST['aboutSubTitle'];
        $about_description = $_POST['aboutDesc'];
        $about_avatar = basename($_FILES["aboutPic"]["name"]);

        if(!empty($about_avatar)){
            //move uploaded picture to folderr
            $target_directory = "../Restaurantly/assets/img/";
            $target_file = $target_directory . basename($_FILES["aboutPic"]["name"]);
            move_uploaded_file($_FILES["aboutPic"]["tmp_name"], $target_file);

            //call function to update slider
            $database2->update_about($id, $about_avatar);

        } else {
            $about_avatar = $_SESSION['about_pic'];
            $database2->update_about($id, $about_avatar);
        }

    }
    //if user manually entered to go to edit chef profile page
} else if (strpos($_SERVER['REQUEST_URI'], '/editabout.php'))  {
    //user did not click update button.. alert user and redirect them
    echo '<script>alert("Error! You Did Not click Update Button.. Redirecting you")</script>';
    header( "Refresh:0.25; url=https://5296474.herzingmontreal.ca/TeamProject/admin/index.php");
}

/*=============================== End of About Part ==================================*/


/*=============================== Edit Contact Part ==================================*/
//To add a new contact information inside the table and the database
if (isset($_POST['new_contact'])) {

    $newContactDb = array("location" 	=> $_POST['addContactLocation'],
        "open"		=> $_POST['addContactOpen'],
        "close"		=> $_POST['addContactClose'],
        "email"		=> $_POST['addContactEmail'],
        "phone"		=> $_POST['addContactPhone']
    );

    //Calling the classes
    $contact = new Contact($newContactDb);
    $database2->add_contact($contact);
}


//check if slider info is on edit profile page by clicking update button from team.php
if (strpos($_SERVER['REQUEST_URI'], '/editcontact.php?updateID') !== false) {
    //Get ID from url
    $id = $_GET['updateID'];

    //get data from ID of slider
    $edit_contact = $database2->contact_info($id);

    //store remaining properties of contact info into unique sessions
    // to autofill form inputs
    $_SESSION['contactLocation'] = $edit_contact['location'];
    $_SESSION['contactOpen'] 	 = $edit_contact['open'];
    $_SESSION['contactClose'] 	 = $edit_contact['close'];
    $_SESSION['contactEmail'] 	 = $edit_contact['email'];
    $_SESSION['contactPhone'] 	 = $edit_contact['phone'];


    // ======================= Edit Contact Decription part ===============================
    if (isset($_POST['edit_contact'])) {
        //save all form inputs
        $contact_location = $_POST['contactLocation'];
        $contact_open = $_POST['contactOpen'];
        $contact_close = $_POST['contactClose'];
        $contact_email = $_POST['contactEmail'];
        $contact_phone = $_POST['contactPhone'];

        //call function to update slider
        $database2->update_contact($id);

    }
    //if user manually entered to go to edit chef profile page
} else if (strpos($_SERVER['REQUEST_URI'], '/editcontact.php'))  {
    //user did not click update button.. alert user and redirect them
    echo '<script>alert("Error! You Did Not click Update Button.. Redirecting you")</script>';
    header( "Refresh:0.25; url=https://5296474.herzingmontreal.ca/TeamProject/admin/index.php");
}

/*=============================== End of Contact Part ==================================*/


/*=============================== Edit Welcome Part ==================================*/
//To add a new contact information inside the table and the database
if (isset($_POST['new_welcome'])) {

    $newWelcomeDb = array("title1" => $_POST['addWelcomeTitle1'],
        "title2" => $_POST['addWelcomeTitle2']
    );

    //Calling the classes
    $welcome = new Welcome($newWelcomeDb);
    $database2->add_welcome($welcome);
}


//check if welcome info is on edit profile page by clicking update button from team.php
if (strpos($_SERVER['REQUEST_URI'], '/editwelcome.php?updateID') !== false) {
    //Get ID from url
    $id = $_GET['updateID'];

    //get data from ID of slider
    $edit_welcome = $database2->welcome_info($id);

    //store remaining properties of welcome info into unique sessions
    // to autofill form inputs
    $_SESSION['welcomeTitle1'] = $edit_welcome['title1'];
    $_SESSION['welcomeTitle2'] = $edit_welcome['title2'];


    // ======================= Edit Welcome Decription part ===============================
    if (isset($_POST['edit_welcome'])) {
        //save all form inputs
        $welcome_title1 = $_POST['welcomeTitle1'];
        $welcome_title2 = $_POST['welcomeTitle2'];

        //call function to update slider
        $database2->update_welcome($id);

    }
    //if user manually entered to go to edit chef profile page
} else if (strpos($_SERVER['REQUEST_URI'], '/editwelcome.php')) {
    //user did not click update button.. alert user and redirect them
    echo '<script>alert("Error! You Did Not click Update Button.. Redirecting you")</script>';
    header("Refresh:0.25; url=https://5296474.herzingmontreal.ca/TeamProject/admin/index.php");
}

/*=============================== End of Welcome Part ==================================*/


/*=============================== Edit Footer Part ==================================*/
//To add a new footer information inside the table and the database
if (isset($_POST['new_footer'])) {

    $newFooterDb = array(
        "picture" =>  basename($_FILES["addFooterPic"]["name"]),
        "title" => $_POST['addFooterTitle'],
        "address" => $_POST['addFooterAddress'],
        "area" => $_POST['addFooterArea'],
        "phone" => $_POST['addFooterPhone'],
        "email" => $_POST['addFooterEmail']
    );

    //Getting the avatar
    $target_directory = "../Restaurantly/assets/img/"; //The file that is being selected
    $target_file = $target_directory . basename($_FILES["addFooterPic"]["name"]);
    move_uploaded_file($_FILES["addFooterPic"]["tmp_name"], $target_file);

    //Calling the classes
    $footer = new Footer($newFooterDb);
    $database2->add_footer($footer);
}


//check if footer info is on edit profile page by clicking update button from team.php
if (strpos($_SERVER['REQUEST_URI'], '/edithome.php?updateID') !== false) {
    //Get ID from url
    $id = $_GET['updateID'];

    //get data from ID of slider
    $edit_footer = $database2->footer_info($id);

    //store remaining properties of footer info into unique sessions
    // to autofill form inputs
    $_SESSION['footerPic'] = $edit_footer['picture'];
    $_SESSION['footerTitle'] = $edit_footer['title'];
    $_SESSION['footerAddress'] = $edit_footer['address'];
    $_SESSION['footerArea'] = $edit_footer['area'];
    $_SESSION['footerPhone'] = $edit_footer['phone'];
    $_SESSION['footerEmail'] = $edit_footer['email'];


    // ======================= Edit Footer Decription part ===============================
    if (isset($_POST['edit_footer'])) {
        //save all form inputs
        $footer_pic = basename($_FILES["footerPic"]["name"]);
        $footer_title = $_POST['footerTitle'];
        $footer_address = $_POST['footerAddress'];
        $footer_area = $_POST['footerArea'];
        $footer_phone = $_POST['footerPhone'];
        $footer_email = $_POST['footerEmail'];

        if(!empty($footer_pic)){
            //move uploaded picture to folder
            $target_directory = "../Restaurantly/assets/img/menu/";
            $target_file = $target_directory . basename($_FILES["footerPic"]["name"]);
            move_uploaded_file($_FILES["footerPic"]["tmp_name"], $target_file);

            //call function to update user
            $database2->update_footer($id, $footer_pic);

        } else {
            $footer_pic = $_SESSION['footerPic'];
            $database2->update_footer($id, $footer_pic);
        }
    }
    //if user manually entered to go to edit chef profile page
} else if (strpos($_SERVER['REQUEST_URI'], '/edithome.php')) {
    //user did not click update button.. alert user and redirect them
    echo '<script>alert("Error! You Did Not click Update Button.. Redirecting you")</script>';
    header("Refresh:0.25; url=https://5296474.herzingmontreal.ca/TeamProject/admin/index.php");
}

/*=============================== End of Footer Part ==================================*/
