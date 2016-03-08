<?php

require("../../logic/common.php");

class register
{
    function checks()
    {
        global $db;
        // This if statement checks to determine whether the registration form has been submitted
        // If it has, then the registration code is run, otherwise the form is displayed
        if (!empty($_POST)) {
            // Ensure that the user has entered a non-empty username
            if (empty($_POST['user'])) {
                // Note that die() is generally a terrible way of handling user errors
                // like this.  It is much better to display the error with the form
                // and allow the user to correct their mistake.  However, that is an
                // exercise for you to implement yourself.
                die("Please enter a username.");
            }

            // Ensure that the user has entered a non-empty password
            if (empty($_POST['password'])) {
                die("Please enter a password.");
            }

            // Make sure the user entered a valid E-Mail address
            // filter_var is a useful PHP function for validating form input, see:
            // http://us.php.net/manual/en/function.filter-var.php
            // http://us.php.net/manual/en/filter.filters.php
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                die("Invalid E-Mail Address");
            }

            // We will use this SQL query to see whether the username entered by the
            // user is already in use.  A SELECT query is used to retrieve data from the database.
            // :username is a special token, we will substitute a real value in its place when
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
            // :username.  It is possible to insert $_POST['username'] directly into
            // your $query string; however doing so is very insecure and opens your
            // code up to SQL injection exploits.  Using tokens prevents this.
            // For more information on SQL injections, see Wikipedia:
            // http://en.wikipedia.org/wiki/SQL_Injection
            $query_users_params = array(
                ':user' => $_POST['user']
            );

            try {
                // These two statements run the query against your database table.
                $stmt = $db->prepare($query_users);
                $result = $stmt->execute($query_users_params);
            } catch (PDOException $ex) {
                // Note: On a production website, you should not output $ex->getMessage().
                // It may provide an attacker with helpful information about your code.
                die("Failed to run query: " . $ex->getMessage());
            }

            // The fetch() method returns an array representing the "next" row from
            // the selected results, or false if there are no more rows to fetch.
            $row = $stmt->fetch();

            // If a row was returned, then we know a matching username was found in
            // the database already and we should not allow the user to continue.
            if ($row) {
                die("This username is already in use");
            }

            // Now we perform the same type of check for the email address, in order
            // to ensure that it is unique.
            $query_users = "
            SELECT
                1
            FROM contact
            WHERE
                email = :email
        ";

            $query_users_params = array(
                ':email' => $_POST['email']
            );

            try {
                $stmt = $db->prepare($query_users);
                $result = $stmt->execute($query_users_params);
            } catch (PDOException $ex) {
                die("Failed to run query: " . $ex->getMessage());
            }

            $row = $stmt->fetch();

            if ($row) {
                die("This email address is already registered");
            }
        }
    }

    function naw($username, $password, $email, $salt)
    {

    }

    function user($id, $username, $password, $email, $salt)
    {

    }

    function category($id, $category)
    {

    }
}