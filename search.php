<?php
require "helper.php";
require 'Form.php';

use DWA\Form;

# Initiate session
session_start();

# Instantiate our objects
$form = new Form($_GET);

# Get data from form request
$searchTerm = $form->get('searchTerm');
$quantity = $form->get('quantity');
$unit = $form->get('searchUnit');
$miscellaneous = $form->get('miscellaneous');
$email = $form->get('email');
$location = $form->get('location');

# Validate inputs from user
$errors = $form ->validate([
   'searchTerm' => 'required|alpha',
    'quantity' => 'required|numeric',
    'email' => 'required|email',
    'location' => 'required',
    'searchUnit' => 'required',
]);

# Make sure forms does not have errors before proceeding
if (!$form->hasErrors) {

    # Create an array of the available drugs
    $drugs = array("Gammagard", "Gammunex", "Remicade");
    $drugslen = count($drugs);

# Filter drugs data according to search term
    for ($x = 0; $x < $drugslen; $x++) {
        if ($drugs[$x] != $searchTerm) {
            unset($drugs[$x]);
        }
    }
}

# Convert array into string
$drugs = implode(",", $drugs);

# Store our data in SESSION
$_SESSION['drug'] = $drugs;
$_SESSION['quantity'] = $quantity;
$_SESSION['unit'] = $unit;
$_SESSION['miscellaneous'] = $miscellaneous;
$_SESSION['errors'] = $errors;
$_SESSION['hasErrors'] = $form->hasErrors;
$_SESSION['location'] = $location;
$_SESSION['email'] = $email;
$_SESSION['searchTerm'] = $searchTerm;

# Redirect back to the form index.php
header('Location: index.php');