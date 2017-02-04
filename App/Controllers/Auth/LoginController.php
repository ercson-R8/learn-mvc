<?php

namespace App\Controllers\Auth;

use \Core\View;
use App\Models\Auth;

/**
 * LoginController auth controller
 *
 * PHP version 5.4
 */
class LoginController extends \Core\Controller
{

    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        // Make sure an admin user is logged in for example
        // return false;
    }

    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {
        // Make sure an admin user is logged in for example
        //echo "after";
    }



    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        //echo 'User admin index';

        View::renderTemplate('Auth/login.twig.php');
    }


    /**
     * Authenticate check user credentials 
     *
     * @param 	 
     *          
     * @return	void
     */
    public function authenticateAction (){
        
        echo"email: ".($_POST['email']) ;
        echo "password: ". ($_POST['password']);
        if ($_POST['password'] == '1'){
            header("Location: /");
        }else{
            header("Location: /auth/LoginController/index");
        }

    }

}
