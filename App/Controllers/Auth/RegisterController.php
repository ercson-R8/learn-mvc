<?php

namespace App\Controllers\Auth;

use \Core\View;
use App\Models\Auth;

/**
 * RegisterController auth controller
 *
 * PHP version 5.4
 */
class RegisterController extends \Core\Controller
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
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        //echo 'User admin index';
        
        View::renderTemplate('Auth/register.twig.html');
    }

    /**
     * registerAction method 
     *
     * @param 	
     * @return  void	 
     */
    public function registerAction (){
        
        $message = '';
        $email = ($_POST['email']);

        // use the Auth Model openConn() to get PDO object 
        $conn = Auth::openConn(); 

        if( Auth::isEmailRegistered($email) > 0){
            $user_exist = true;
            $message = 'E-mail entered already registered.';

        }else{ // register the new user
            $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

            if(!empty($_POST['email']) && !empty($_POST['password'])){

                // Enter the new user in the database
                $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
                $stmt = $conn->prepare($sql);

                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashedPassword);

                if( $stmt->execute() ){
                    $message = 'Successfully created new user';
                }else{
                    $message = 'Sorry there must have been an issue creating your account';
                }   
            }
        }
        
        echo "$message";


    }


}
