<?php 
    // Print Error 
    function field_error($field, $error){
        if (array_key_exists($field, $error)) {
            echo '<font color=red>' . $error[$field]. '</font>';
        }
    }  

    // Register New User 
    function register($data) {
        $register = false;

        // check if user exist 
        if(file_exists("database/" .$data['email'] .".txt")){
            return $register;
        }

        // Hash Passowrd 
        $password = password_hash($data['pass'], PASSWORD_BCRYPT);
        $data['pass'] = $password;

        // Do Regiser
        $database = fopen("database/" .$data['email'] .".txt", 'w') or die ('Unable to open file');
        $strdata = implode(",", $data);
        fwrite($database, $strdata);
        fclose($database);

        $register = true;
        return $register;
    }

    // Log In User
    function doLogin($user) {
        $login = false;

        // check if user exist 
        if(!file_exists("database/" .$user['email'] .".txt")){
            return $login;
        }

        // Get Data
        $database = fopen("database/" .$user['email'] .".txt", 'r') or die ('Unable to open file');
        $data = fgets($database);

        $data = explode(",", $data);
        $userData = [
            'fname' => $data[0],
            'lname' => $data[1],
            'email' => $data[2],
            'phone' => $data[3]

        ];
        // var_dump($userData);
        // check if password is correct
        $password_check = password_verify($user['pass'], $data[4]);
        if(!$password_check) {
            return $login;
        }
        $login = true;

        return $userData;
    }

    function reset_password($email) {
        $reset_password = false;

         // check if user exist 
         if(!file_exists("database/" . $email .".txt")){
            return $reset_password;
        }

        // Get Data and insert reset password token
        $database = fopen("database/" .$email .".txt", 'r') or die ('Unable to open file');
        $data = fgets($database);
        $userData = explode(",", $data);
    
        // Generate new Password and insert 
        $newPassword = rand(100000, 999999);
        $userData[4] = password_hash($newPassword, PASSWORD_BCRYPT);
        $strdata = implode(",", $userData);
        $updateDatabase = fopen("database/" .$email .".txt", 'w') or die ('Unable to open file');
        fwrite($updateDatabase, $strdata);
        fclose($database);

        return $newPassword;
    }