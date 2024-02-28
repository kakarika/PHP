<?php

class FormValidator
{
    private $data;
    private $errors = [];
    private $name;
    private $email;
    private $website;
    private $comment;
    private $gender;
    private $password;

    public function __construct($postData)
    {
        $this->data = $postData;
    }

    function testInput($inputData)
    {
        $inputData = trim($inputData);
        $inputData = stripslashes($inputData);
        $inputData = htmlspecialchars($inputData);
        return $inputData;
    }

    public function validate()
    {

        $name = $this->testInput($this->data["name"]);
        if (empty($name)) {
            $this->errors["name"] = "*Name is required";
        } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $this->errors["name"] = "*Only letters and white space allowed";
        } else {
            $this->name = $name;
        }

        $email = $this->testInput($this->data["email"]);
        if (empty($email)) {
            $this->errors["email"] = "*Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors["email"] = "*Invalid email format";
        } else {
            $this->email = $email;
        }

        $comment = $this->testInput($this->data["comment"]);
        if (empty($comment)) {
            $this->errors["comment"] = "";
        } else {
            $this->comment = $comment;
        }

        $gender = isset($this->data["gender"]) ? $this->testInput($this->data["gender"]) : "";
        if (empty($gender)) {
            $this->errors["gender"] = "*Gender is required";
        } else {
            $this->gender = $gender;
        }

        $website = $this->testInput($this->data["website"]);
        if (!empty($website) && (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website))) {
            $this->errors["website"] = "*Invalid URL format";
        } else {
            $this->website = $website;
        }

        $password = $this->testInput($this->data["password"]);
        if (empty($password)) {
            $this->errors["password"] = "*Password is required";
        } elseif ((preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password) === 0)) {
            $this->errors["password"] = "*Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit";
        } else {
            $this->password = $password;
        }
        $confirmPassword = $this->testInput($this->data["confirmPassword"]);
        if (empty($confirmPassword)) {
            $this->errors["confirmPassword"] = "*Confirm password is required";
        } else {
            if ($_POST["confirmPassword"] !== $_POST["password"]) {
                $this->errors["confirmPassword"] = "*Password doesn't match";
            }
        }

        return empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getWebsite()
    {
        return $this->website;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
