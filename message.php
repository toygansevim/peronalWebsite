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


$validName = $validEmail = $validMessage = false;


//Check the coming text values for email contact validation
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

    }


}


//If all good
if((($validName == $validEmail) == $validMessage) == 1)
{


}


$email_from = $_POST['messageValue'];
$email_subject = "Hello Toygan";
$email_body = "You have received a new message from $name.\n" . "Message is:\n $message";


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