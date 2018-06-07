<?php
/**
 * Created by PhpStorm.
 * User: toygan
 * Date: 6/4/18
 * Time: 10:30 PM
 *
 *
 *
 * This file is for the contacts messages
 */


$validName = false;
$validEmail = false;
$validMessage = false;


//Check the coming text values for email contact validation
if($_POST['name'] || $_POST['email'] || $_POST['message'])
{
    if($_POST['name'])
    {
        if(validateName($_POST['nameValue'])) //good value
        {
            echo "<span class='text-success'><i class=\"fa fa-check text-success \" aria-hidden=\"true\"></i></span>";
            $validName = true;

        } else
        {
            echo "<span><p>Please enter a name</p></span>";
        }
    }
    if($_POST['email'])
    {
        if(validateEmail($_POST['emailValue']))
        {
            echo "<span class='text-success'><i class=\"fa fa-check text-success \" aria-hidden=\"true\"></i></span>";

            $validEmail = true;
        } else
        {
            echo "<span><p>Please enter a valid email</p></span>";

        }
    }
    if($_POST['message'])
    {


        if(validate($_POST['messageValue']))
        {
            echo "<span class='text-success'><i class=\"fa fa-check text-success \" aria-hidden=\"true\"></i></span>";
            $validMessage = true;

        } else
        {
            echo "<span><p>Please enter a message</p></span>";
            $validMessage = false;

        }


    }
}


if($_POST['submitButton'])
{
    //If all good
    //    if($validEmail == true && $validName == true && $validMessage == true)
    //    {
    $toME = "toygansevim@hotmail.com";

    $email_from = $_POST['email'];
    $email_subject = "Hello Toygan";
    $email_body = "You have received a new message from " . $_POST['name'] . "\n" . "Message is:\n" . $_POST['message'];

    $headers = "From: $email_from \r\n";
//    echo $toME, $email_subject, $email_body, $headers;

    mail($toME, $email_subject, $email_body, $headers);

    //to, subject, body, headers

    //        echo $toME;
    //    print_r($toME);
    //    , $email_subject, $email_body, $headers);
    //    }
}


//validate the message
/**
 * Validate name and message
 * @param $value string
 * @return bool return
 */
function validate($value)
{


    if(isset($value) && !empty($value))
    {
        return true;
    }


}//validate the Name
/**
 * Validate name
 * @param $value string name
 * @return bool return
 */
function validateName($value)
{


    if(isset($value) && !empty($value))
    {
        if(ctype_alpha($value) && !ctype_digit($value))
        {
            return true;
        }
    }


}

/**
 * validate email
 * @param $value
 */
function validateEmail($value)
{


    if(preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", $value))
    {
        //Email address is invalid.
        return true;
    }
}