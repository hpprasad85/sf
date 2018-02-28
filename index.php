<?php
/*************************************************************
    File : index.php
    Used for : Here calcualte the exact api, where to go
    Created By : Mindfiresolutions Pvt Ltd.
    Creation Date : 04-09-2012
    Modification Date : 06-09-2012
**************************************************************/

/*Start session*/
session_start();

/*Include common files*/
include_once 'includes/init.php';

/* Module name */
$api = (isset($_GET['api']) && ($ob_utility->isNotBlank($_GET['api'])) ? $_GET['api'] : '');

/* Module specific page */
$api_page =  (isset($_GET['p']) && ($ob_utility->isNotBlank($_GET['p'])) ? $_GET['p'].'.php' : 'home.php');

if ($api == '')
{
    $api = 'users';
}

if ($api_page == '')
{
    $api_page = 'error.php';
}

/*Calculate exact path*/
$file_path = 'api/' . $api . '/' . $api_page;

/* Check if file exists or set the default */
if (!file_exists($file_path))
{
    $api = 'users';
    $api_page = 'error.php';
    
    $file_path = 'api/' . $api . '/' . $api_page;
}

//including the required file
include_once $file_path;

?>