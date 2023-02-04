<?php
class DB_Manager2
{
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

    /*============================  CHEFS PART  ==================================*/
    //Function to add a new chef inside the database
    public function add_chef($chef)
    {
        $query = $this->db->prepare("INSERT INTO chef VALUES (DEFAULT, :name, :lastname, :avatar, :poste, :description);");
        $result = $query->execute(array(
            "name" => $chef->getName(),
            "lastname" => $chef->getLastname(),
            "avatar" => $chef->getAvatar(),
            "poste" => $chef->getPoste(),
            "description" => $chef->getDescription()
        ));

        if ($result) {
            header("location: team.php?addSuccess");
        }

    }


    //Function to get all the chefs from the database
    public function get_all_chefs()
    {
        $query = $this->db->query("SELECT * FROM chef");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    //Function to select all informations of a chef based on his id
    public function chef_info($id)
    {
        $query = $this->db->query("SELECT * FROM chef WHERE id = $id;");
        $chefInfo = $query->fetch(PDO::FETCH_ASSOC);

        return $chefInfo;
    }

    //Function to delete a chef from the admin/moderator table and the database
    public function delete_chef()
    {
        //query to update database
        $query = $this->db->prepare("DELETE FROM chef WHERE id = ?;");
        $result = $query->execute(array($_GET['chefDeleteID']));

        if ($result) {
            header("location: team.php?deleteSuccess");
        }
    }

    //Function to update the chefs
    public function update_chef($id, $avatar)
    {

        //query to update database
        $query = $this->db->prepare("UPDATE chef SET id= :id, name = :name, lastname = :lastname, avatar = :avatar, poste = :poste, description = :description WHERE id = $id;");

        //check if the $avatar is not in session['chef_pic]'
        if ($_SESSION['chef_pic'] != $avatar) {

            //if it isn't user uploaded a new picture
            $result = $query->execute(array(
                "id" => $_GET['updateID'],
                "name" => $_POST['chefFirstName'],
                "lastname" => $_POST['chefLastName'],
                "avatar" => basename($_FILES["chefPic"]["name"]),
                "poste" => $_POST['position'],
                "description" => $_POST['description']
            ));
        } else {
            //user did not upload picture
            $result = $query->execute(array(
                "id" => $_GET['updateID'],
                "name" => $_POST['chefFirstName'],
                "lastname" => $_POST['chefLastName'],
                "avatar" => $_SESSION['chef_pic'],
                "poste" => $_POST['position'],
                "description" => $_POST['description']
            ));
        }
        //redirect user with success msg
        if ($result) {
            header("location: team.php?updateSuccess");
        }
    }

    /*========================  END CHEFS PART  ==============================*/


    /*========================  SLIDER - SERVICES PART  ==============================*/
    //Function to add a new slider information inside the database
    public function add_slider($slider)
    {
        $query = $this->db->prepare("INSERT INTO slider VALUES (DEFAULT, :title, :price, :picture, :text);");
        $result = $query->execute(array(
            "title" => $slider->getTitle(),
            "price" => $slider->getPrice(),
            "picture" => $slider->getPicture(),
            "text" => $slider->getText()
        ));

        if ($result) {
            header("location: services.php?addSuccess");
        }

    }

    //Function to select data from the slider table and save into a variable as an array
    public function get_slider()
    {
        $query = $this->db->query("SELECT * FROM slider");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        $sliderObj = new Slider($array);

        return $array;
    }

    //Function to get all the sliders information from the database
    public function get_all_slider()
    {
        $query = $this->db->query("SELECT * FROM slider");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    //Function to select all informations of a slider based on his id
    public function slider_info($id)
    {
        $query = $this->db->query("SELECT * FROM slider WHERE id = $id;");
        $sliderInfo = $query->fetch(PDO::FETCH_ASSOC);

        return $sliderInfo;
    }

    //Function to delete a slider from the slider table and the database
    public function delete_slider()
    {
        //query to update database
        $query = $this->db->prepare("DELETE FROM slider WHERE id = ?;");
        $result = $query->execute(array($_GET['sliderDeleteID']));

        if ($result) {
            header("location: team.php?deleteSuccess");
        }
    }


    //Function to update slider
    public function update_slider($id, $avatar)
    {

        //query to update database
        $query = $this->db->prepare("UPDATE slider SET id = :id, title = :title, price = :price,picture = :picture, text = :text WHERE id = $id;");

        //check if the $avatar is not in session['chef_pic]'
        if ($_SESSION['slider_pic'] != $avatar) {

            //if it isn't user uploaded a new picture
            $result = $query->execute(array(
                "id" => $_GET['updateID'],
                "title" => $_POST['sliderName'],
                "price" => $_POST['sliderPrice'],
                "picture" => basename($_FILES["sliderPic"]["name"]),
                "text" => $_POST['sliderDesc']
            ));
        } else {
            //user did not upload picture
            $result = $query->execute(array(
                "id" => $_GET['updateID'],
                "title" => $_POST['sliderName'],
                "price" => $_POST['sliderPrice'],
                "picture" => $_SESSION['slider_pic'],
                "text" => $_POST['sliderDesc']
            ));
        }
        //redirect user with success msg
        if ($result) {
            header("location: services.php?updateSuccess");
        }
    }


    /*========================  END SLIDER - SERVICES PART  ==========================*/


    /*================================  MENU PART  ===================================*/
    //Function to add a new menu item information inside the database
    public function add_menu($menu)
    {
        $query = $this->db->prepare("INSERT INTO menu VALUES (DEFAULT, :name, :description, :price, :picture, :type);");
        $result = $query->execute(array(
            "name" => $menu->getName(),
            "description" => $menu->getDescription(),
            "price" => $menu->getPrice(),
            "picture" => $menu->getPicture(),
            "type" => $menu->getType()
        ));

        if ($result) {
            header("location: portfolio.php?addSuccess");
        }

    }

    //Function to get all the menu information from the database
    public function get_all_menu()
    {
        $query = $this->db->query("SELECT * FROM menu");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    //Function to select all informations of a menu based on his id
    public function menu_info($id)
    {
        $query = $this->db->query("SELECT * FROM menu WHERE id = $id;");
        $menuInfo = $query->fetch(PDO::FETCH_ASSOC);

        return $menuInfo;
    }

    //Function to delete a menu from the menu table and the database
    public function delete_menu()
    {
        //query to update database
        $query = $this->db->prepare("DELETE FROM menu WHERE id = ?;");
        $result = $query->execute(array($_GET['menuDeleteID']));

        if ($result) {
            header("location: services.php?deleteSuccess");
        }
    }

    //Function to update the menu
    public function update_menu($id, $avatar)
    {

        //query to update database
        $query = $this->db->prepare("UPDATE menu SET id = :id, name = :name, description = :description, price = :price, picture = :picture, type = :type WHERE id = $id;");

        //check if the $avatar is not in session['menu_pic]'
        if ($_SESSION['menu_pic'] != $avatar) {

            //if it isn't user uploaded a new picture
            $result = $query->execute(array(
                "id" => $_GET['updateID'],
                "name" => $_POST['menuName'],
                "description" => $_POST['menuDesc'],
                "price" => $_POST['menuPrice'],
                "picture" => basename($_FILES["menuPic"]["name"]),
                "type" => $_POST['menuType']
            ));
        } else {
            //user did not upload picture
            $result = $query->execute(array(
                "id" => $_GET['updateID'],
                "name" => $_POST['menuName'],
                "description" => $_POST['menuDesc'],
                "price" => $_POST['menuPrice'],
                "picture" => $_SESSION['menu_pic'],
                "type" => $_POST['menuType']
            ));
        }
        //redirect user with success msg
        if ($result) {
            header("location: portfolio.php?updateSuccess");
        }
    }


    /*=============================== END MENU PART  =================================*/

    // Function to group menu by type
    public function get_group_type()
    {
        $query = $this->db->query("SELECT * FROM menu GROUP BY type;");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    /*==============================  CONTACT PART  ==================================*/
    //Function to add a new contact information inside the database
    public function add_contact($contact)
    {
        $query = $this->db->prepare("INSERT INTO contact VALUES (DEFAULT, :location, :open, :close, :email, :phone);");
        $result = $query->execute(array(
            "location" => $contact->getLocation(),
            "open" => $contact->getOpen(),
            "close" => $contact->getClose(),
            "email" => $contact->getEmail(),
            "phone" => $contact->getPhone()
        ));

        if ($result) {
            header("location: contact.php?addSuccess");
        }

    }

    //Function to select data from the contact table and save into a variable as an array
    public function get_contact()
    {
        $query = $this->db->query("SELECT * FROM contact");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        $contactObj = new Contact($array);

        return $array;
    }

    //Function to get all the contact information from the database
    public function get_all_contact()
    {
        $query = $this->db->query("SELECT * FROM contact");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    //Function to select all informations of a contact based on his id
    public function contact_info($id)
    {
        $query = $this->db->query("SELECT * FROM contact WHERE id = $id;");
        $contactInfo = $query->fetch(PDO::FETCH_ASSOC);

        return $contactInfo;
    }

    //Function to delete a contact from the menu table and the database
    public function delete_contact()
    {
        //query to update database
        $query = $this->db->prepare("DELETE FROM contact WHERE id = ?;");
        $result = $query->execute(array($_GET['contactDeleteID']));

        if ($result) {
            header("location: contact.php?deleteSuccess");
        }
    }

    //Function to update the contact
    public function update_contact($id)
    {

        //query to update database
        $query = $this->db->prepare("UPDATE contact SET id = :id, location = :location, open = :open, close = :close, email = :email, phone = :phone WHERE id = $id;");

        $result = $query->execute(array(
            "id" => $_GET['updateID'],
            "location" => $_POST['contactLocation'],
            "open" => $_POST['contactOpen'],
            "close" => $_POST['contactClose'],
            "email" => $_POST['contactEmail'],
            "phone" => $_POST['contactPhone']
        ));

        //redirect user with success msg
        if ($result) {
            header("location: contact.php?updateSuccess");
        }

    }


    /*============================  END CONTACT PART  =================================*/


    /*================================  ABOUT PART  ===================================*/

    //Function to add a new about information inside the database
    public function add_about($about)
    {
        $query = $this->db->prepare("INSERT INTO about VALUES (DEFAULT, :title, :subTitle, :text, :picture);");
        $result = $query->execute(array(
            "title" => $about->getTitle(),
            "subTitle" => $about->getSubTitle(),
            "text" => $about->getText(),
            "picture" => $about->getPicture()
        ));

        if ($result) {
            header("location: about.php?addSuccess");
        }

    }

    public function get_about()
    {
        $query = $this->db->query("SELECT * FROM about");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        $aboutObj = new About($array);

        return $array;
    }

    //Function to get all the about information from the database
    public function get_all_about()
    {
        $query = $this->db->query("SELECT * FROM about");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    //Function to select all about informations based on his id
    public function about_info($id)
    {
        $query = $this->db->query("SELECT * FROM about WHERE id = $id;");
        $aboutInfo = $query->fetch(PDO::FETCH_ASSOC);

        return $aboutInfo;
    }

//Function to update the about
    public function update_about($id, $avatar)
    {

        //query to update database
        $query = $this->db->prepare("UPDATE about SET id = :id, title = :title, subTitle = :subTitle, text = :text, picture = :picture WHERE id = $id;");

        //check if the $avatar is not in session['chef_pic]'
        if ($_SESSION['about_pic'] != $avatar) {

            //if it isn't user uploaded a new picture
            $result = $query->execute(array(
                "id" => $_GET['updateID'],
                "title" => $_POST['aboutTitle'],
                "subTitle" => $_POST['aboutSubTitle'],
                "text" => $_POST['aboutDesc'],
                "picture" => basename($_FILES["aboutPic"]["name"])
            ));
        } else {
            //user did not upload picture
            $result = $query->execute(array(
                "id" => $_GET['updateID'],
                "title" => $_POST['aboutTitle'],
                "subTitle" => $_POST['aboutSubTitle'],
                "text" => $_POST['aboutDesc'],
                "picture" => $_SESSION['about_pic']
            ));
        }
        //redirect user with success msg
        if ($result) {
            header("location: about.php?updateSuccess");
        }
    }

    //Function to delete an about information from the menu table and the database
    public function delete_about()
    {
        //query to update database
        $query = $this->db->prepare("DELETE FROM about WHERE id = ?;");
        $result = $query->execute(array($_GET['aboutDeleteID']));

        if ($result) {
            header("location: about.php?deleteSuccess");
        }
    }

    /*================================  END ABOUT PART  ================================*/


    /*==================================  WELCOME PART  =================================*/

    //Function to add a new footer information inside the database
    public function add_welcome($welcome)
    {
        $query = $this->db->prepare("INSERT INTO welcome VALUES (DEFAULT, :title1, :title2);");
        $result = $query->execute(array(
            "title1"    => $welcome->getTitle1(),
            "title2"    => $welcome->getTitle2()
        ));

        if ($result) {
            header("location: home.php?addSuccess");
        }

    }

    public function get_welcome() {
        $query = $this->db->query("SELECT * FROM welcome");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        $welcomeObj = new Footer($array);

        return $array;
    }

    //Function to get all the footer information from the database
    public function get_all_welcome()
    {
        $query = $this->db->query("SELECT * FROM welcome");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    //Function to select all footer informations based on his id
    public function welcome_info($id)
    {
        $query = $this->db->query("SELECT * FROM welcome WHERE id = $id;");
        $welcomeInfo = $query->fetch(PDO::FETCH_ASSOC);

        return $welcomeInfo;
    }

    //Function to update the footer info
    public function update_welcome($id){

        //query to update database
        $query = $this->db->prepare("UPDATE welcome SET id = :id, title1 = :title1, title2 = :title2 WHERE id = $id;");

        $result = $query->execute(array(
            "id"      => $_GET['updateID'],
            "title1"  => $_POST['welcomeTitle1'],
            "title2"  => $_POST["welcomeTitle2"]
        ));


        //redirect user with success msg
        if ($result) {
            header("location: home.php?updateWelcomeSuccess");
        }
    }

    //Function to delete an about information from the menu table and the database
    public function delete_welcome()
    {
        //query to update database
        $query = $this->db->prepare("DELETE FROM welcome WHERE id = ?;");
        $result = $query->execute(array($_GET['welcomeDeleteID']));

        if ($result) {
            header("location: home.php?deleteSuccess");
        }
    }

    /*================================  END WELCOME PART  ================================*/



    /*==================================  FOOTER PART  =================================*/


    //Function to add a new footer information inside the database
    public function add_footer($footer)
    {
        $query = $this->db->prepare("INSERT INTO footer VALUES (DEFAULT, :picture, :title, :address, :area, :phone, :email);");
        $result = $query->execute(array(
            "picture" => $footer->getPicture(),
            "title"     => $footer->getTitle(),
            "address"   => $footer->getAddress(),
            "area"      => $footer->getArea(),
            "phone"     => $footer->getPhone(),
            "email"     => $footer->getEmail()
        ));

        if ($result) {
            header("location: home.php?addSuccess");
        }

    }

    public function get_footer() {
        $query = $this->db->query("SELECT * FROM footer");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        $footerObj = new Footer($array);

        return $array;
    }

    //Function to get all the footer information from the database
    public function get_all_footer()
    {
        $query = $this->db->query("SELECT * FROM footer");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    //Function to select all footer informations based on his id
    public function footer_info($id)
    {
        $query = $this->db->query("SELECT * FROM footer WHERE id = $id;");
        $footerInfo = $query->fetch(PDO::FETCH_ASSOC);

        return $footerInfo;
    }

    //Function to update the footer info
    public function update_footer($id,$footer_pic){

        //query to update database
        $query = $this->db->prepare("UPDATE footer SET id = :id, picture = :picture, title = :title, address = :address, area = :area, phone = :phone, email = :email WHERE id = $id;");

        if($_SESSION['footerPic'] != $footer_pic) {
            $result = $query->execute(array(
                "id" => $_GET['updateID'],
                "picture" => $_POST['footerPic'],
                "title" => $_POST['footerTitle'],
                "address" => $_POST["footerAddress"],
                "area" => $_POST['footerArea'],
                "phone" => $_POST['footerPhone'],
                "email" => $_POST['footerEmail']
            ));
        } else {
            $result = $query->execute(array(
                "id" => $_GET['updateID'],
                "picture" => $_POST['footerPic'],
                "title" => $_POST['footerTitle'],
                "address" => $_POST["footerAddress"],
                "area" => $_POST['footerArea'],
                "phone" => $_POST['footerPhone'],
                "email" => $_POST['footerEmail']
            ));
        }
        //redirect user with success msg
        if ($result) {
            header("location: home.php?updateSuccess");
        }
    }

    //Function to delete an about information from the menu table and the database
    public function delete_footer()
    {
        //query to update database
        $query = $this->db->prepare("DELETE FROM footer WHERE id = ?;");
        $result = $query->execute(array($_GET['footerDeleteID']));

        if ($result) {
            header("location: home.php?deleteSuccess");
        }
    }


    /*================================  END FOOTER PART  ================================*/
}

