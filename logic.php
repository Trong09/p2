<?php
session_start();

# Set variable into empty string
$hasErrors = false;
$quantity = '';
$miscellaneous ='';
$mailError = '';
$unit = '';
$drug = '';
$location = '';

# Determine if variable is set and is not NULL
if (isset($_SESSION['drug'])) {
    $drug = $_SESSION['drug'];
}

if (isset($_SESSION['quantity'])) {
    $quantity = $_SESSION['quantity'];
}

if (isset($_SESSION['unit'])) {
    $unit = $_SESSION['unit'];
}

if (isset($_SESSION['miscellaneous'])) {
    $miscellaneous = $_SESSION['miscellaneous'];
}

if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
}

if (isset($_SESSION['hasErrors'])) {
    $hasErrors = $_SESSION['hasErrors'];
}

if (isset($_SESSION['location'])) {
    $location = $_SESSION['location'];
}

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}

if (isset($_SESSION['searchTerm'])) {
    $searchTerm = $_SESSION['searchTerm'];
}





