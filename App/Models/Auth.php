<?php

namespace App\Models;

use PDO;

/**
 * Auth model
 *
 * PHP version 5.4
 */
class Auth extends \Core\Model
{

    /**
     * Get all the posts as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
    
        // try {
        //     //$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        //     $db = static::getDB();

        //     $stmt = $db->query('SELECT id, title, content FROM posts ORDER BY created_at');
        //     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //     return $results;
            
        // } catch (PDOException $e) {
        //     echo $e->getMessage();
        // }
    }

    /**
     * openConn Connect to the database 
     *
     * @param 	
     * @return 	 $conn
     */
    public static function openConn(){
        
        try {
            $db = static::getDB();
            return $db;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * isUserRegistered method 
     *
     * @param 	string  email the email to check
     * @return  int     result 1 if already registered otherwise 0
     */
    public static function isEmailRegistered ($email){
        try {
            //$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $db = static::getDB();

            $query = "SELECT email FROM users WHERE email = ?";

            $stmt = $db->prepare($query);

            $stmt->execute([$email]);
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $result;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;
    }


}
