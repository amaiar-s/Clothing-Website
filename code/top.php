<?php
$phpSelf = htmlspecialchars($_SERVER['PHP_SELF']);
$pathParts = pathinfo($phpSelf);
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>KAÏOA</title>
        <meta name="author" content="Amaia Rodriguez-Sierra">
        <meta name="description" content= "Kaioa Clothing Store.">
        <link rel="stylesheet" href="css/custom.css?version=<?php print time(); ?>" type="text/css">
        <link rel="stylesheet" href="css/layout-desktop.css?version=<?php print time(); ?>" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="css/layout-tablet.css?version=<?php print time(); ?>"
        rel="stylesheet"  type="text/css">
        <link href="css/layout-phone.css?version=<?php print time(); ?>"
        rel="stylesheet"  type="text/css">

    </head>

<?php
print '<body class="'.$pathParts['filename'].'">';
print '<!-- ############### Body element ############### -->';

include 'database-connect.php';
include 'header.php';
include 'nav.php';
?>