<?php
/**
 * Created by PhpStorm.
 * User: Hollyphat
 * Date: 11/9/2019
 * Time: 8:52 PM
 */

class Donation
{


    /**
     * Donate constructor.
     */
    private $db;
    public function __construct()
    {
        global $database;
        $this->db = $database;
    }

    function pay($amount,$name,$phone,$email){ //function to create payment reference
        $ref = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);

        $save = $this->db->query("INSERT INTO payments SET names = '$name', amount = '$amount', email = '$email', phone ='$phone', ref = '$ref'");
        return $ref;
    }

    function all_donations(){ //Function to load all donations
        $query = $this->db->query("SELECT * FROM payments ORDER BY id DESC");
        $result = $query->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
}