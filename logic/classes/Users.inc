<?php

class Users
{
    function Register($username, $password)
    {
        global $db;
        // We will use this SQL query to see whether the user entered by the
        // user is already in use.  A SELECT query is used to retrieve data from the database.
        // :user is a special token, we will substitute a real value in its place when
        // we execute the query.
        $query_users = "
            SELECT
                1
            FROM users
            WHERE
                user = :user
        ";

        // This contains the definitions for any special tokens that we place in
        // our SQL query.  In this case, we are defining a value for the token
        // :user.  It is possible to insert $_POST['user'] directly into
        // your $query string; however doing so is very insecure and opens your
        // code up to SQL injection exploits.  Using tokens prevents this.
        // For more information on SQL injections, see Wikipedia:
        // http://en.wikipedia.org/wiki/SQL_Injection
        $query_params = array(
            ':user' => $_POST['user']
        );

        try
        {
            // These two statements run the query against your database table.
            $stmt = $db->prepare($query_users);
            $stmt->execute($query_params);
            $last_id = $db->last_insert_id();
        }
        catch(PDOException $ex)
        {
            // Note: On a production website, you should not output $ex->getMessage().
            // It may provide an attacker with helpful information about your code.
            die("Failed to run query: " . $ex->getMessage());
        }

        // The fetch() method returns an array representing the "next" row from
        // the selected results, or false if there are no more rows to fetch.
        $row = $stmt->fetch();

        // If a row was returned, then we know a matching user was found in
        // the database already and we should not allow the user to continue.
        if($row)
        {
            die("This user is already in use");
        }

        // An INSERT query is used to add new rows to a database table.
        // Again, we are using special tokens (technically called parameters) to
        // protect against SQL injection attacks.
        $query_users = "
            INSERT INTO users (
                user,
                password,
                salt,
                auth
            ) VALUES (
                :user,
                :password,
                :salt,
                :auth
            )
        ";

        // A salt is randomly generated here to protect again brute force attacks
        // and rainbow table attacks.  The following statement generates a hex
        // representation of an 8 byte salt.  Representing this in hex provides
        // no additional security, but makes it easier for humans to read.
        // For more information:
        // http://en.wikipedia.org/wiki/Salt_%28cryptography%29
        // http://en.wikipedia.org/wiki/Brute-force_attack
        // http://en.wikipedia.org/wiki/Rainbow_table
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));

        // This hashes the password with the salt so that it can be stored securely
        // in your database.  The output of this next statement is a 64 byte hex
        // string representing the 32 byte sha256 hash of the password.  The original
        // password cannot be recovered from the hash.  For more information:
        // http://en.wikipedia.org/wiki/Cryptographic_hash_function
        $password = hash('sha256', $_POST['password'] . $salt);

        // Next we hash the hash value 65536 more times.  The purpose of this is to
        // protect against brute force attacks.  Now an attacker must compute the hash 65537
        // times for each guess they make against a password, whereas if the password
        // were hashed only once the attacker would have been able to make 65537 different
        // guesses in the same amount of time instead of only one.
        for($round = 0; $round < 65536; $round++)
        {
            $password = hash('sha256', $password . $salt);
        }

        // Here we prepare our tokens for insertion into the SQL query.  We do not
        // store the original password; only the hashed version of it.  We do store
        // the salt (in its plaintext form; this is not a security risk).
        $query_params = array(
            ':user' => $_POST['user'],
            ':password' => $password,
            ':salt' => $salt,
            ':auth' => $_POST['category']
        );

        try
        {
            // Execute the query to create the user
            $stmt = $db->prepare($query_users);
            $stmt->execute($query_params);
        }
        catch(PDOException $ex)
        {
            // Note: On a production website, you should not output $ex->getMessage().
            // It may provide an attacker with helpful information about your code.
            die("Failed to run query: " . $ex->getMessage());
        }

        /*$query_email = "
            SELECT
                1
            FROM contact
            WHERE
                email = :email
        ";

        $query_email_params = array(
            ':id' => $last_id,
            ':email' => $_POST['email']
        );

        try
        {
            $stmt = $db->prepare($query_email);
            $stmt->execute($query_email_params);
        }
        catch(PDOException $ex)
        {
            die("Failed to run query: " . $ex->getMessage());
        }

        $row = $stmt->fetch();

        if($row)
        {
            die("This email address is already registered");
        }*/

        // This redirects the user back to the login page after they register
        header("Location: login.php");

        // Calling die or exit after performing a redirect using the header function
        // is critical.  The rest of your PHP script will continue to execute and
        // will be sent to the user if you do not die or exit.
        die("Redirecting to login.php");
    }

    function Login($username, $password)
    {
        global $db;
        $query = "
            SELECT
                id,
                user,
                password,
                salt,
                auth
            FROM users
            WHERE
                user = :user
        ";
        $query_params = array(
            ':user' => $username
        );

        try {
            // Execute the query against the database
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        } catch (PDOException $ex) {
            // Note: On a production website, you should not output $ex->getMessage().
            // It may provide an attacker with helpful information about your code.
            die("Failed to run query: " . $ex->getMessage());
        }

        // This variable tells us whether the user has successfully logged in or not.
        // We initialize it to false, assuming they have not.
        // If we determine that they have entered the right details, then we switch it to true.
        $login_ok = false;

        // Retrieve the user data from the database.  If $row is false, then the username
        // they entered is not registered.
        $row = $stmt->fetch();
        if ($row) {
            // Using the password submitted by the user and the salt stored in the database,
            // we now check to see whether the passwords match by hashing the submitted password
            // and comparing it to the hashed version already stored in the database.
            $check_password = hash('sha256', $password . $row['salt']);
            for ($round = 0; $round < 65536; $round++) {
                $check_password = hash('sha256', $check_password . $row['salt']);
            }

            if ($check_password === $row['password']) {
                // If they do, then we flip this to true
                $login_ok = true;
            }
        }

        // If the user logged in successfully, then we send them to the private members-only page
        // Otherwise, we display a login failed message and show the login form again
        if ($login_ok) {
            // Here I am preparing to store the $row array into the $_SESSION by
            // removing the salt and password values from it.  Although $_SESSION is
            // stored on the server-side, there is no reason to store sensitive values
            // in it unless you have to.  Thus, it is best practice to remove these
            // sensitive values first.
            unset($row['salt']);
            unset($row['password']);

            // This stores the user's data into the session at the index 'user'.
            // We will check this index on the private members-only page to determine whether
            // or not the user is logged in.  We can also use it to retrieve
            // the user's details.
            $_SESSION['user'] = $row;

            // Redirect the user to the private members-only page.
            header("Location: private.php");
            die("Redirecting to: private.php");
        } else {
            // Tell the user they failed
            print("Login Failed.");

            // Show them their username again so all they have to do is enter a new
            // password.  The use of htmlentities prevents XSS attacks.  You should
            // always use htmlentities on user submitted values before displaying them
            // to any users (including the user that submitted them).  For more information:
            // http://en.wikipedia.org/wiki/XSS_attack
            $submitted_user = htmlentities($username, ENT_QUOTES, 'UTF-8');
        }
    }
}

class Gegevens extends Users
{

}