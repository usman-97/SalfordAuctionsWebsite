<?php
require_once ('Models/User.php');
require_once ('Models/UpdateViews.php');

$view = new stdClass();
$view->pageTitle = 'Salford Cars';
$update = new UpdateViews();

// session_start();
require_once ('logout.php');
// require_once ('login.php');

unset($_SESSION['viewItem']);
unset($_SESSION['searchMode']);
unset($_SESSION['item']);

if (isset($_POST['SuperCar']))
{
    $_SESSION['item'] = 'super car';
    header("location: auctionItem.php");
}

if (isset($_POST['Artifacts']))
{
    $_SESSION['item'] = 'artifact';
    header("location: auctionItem.php");
}

if (isset($_POST['Jewelry']))
{
    $_SESSION['item'] = 'jewelry';
    header("location: auctionItem.php");
}

if (isset($_POST['Paintings']))
{
    $_SESSION['item'] = 'painting';
    header("location: auctionItem.php");
}

if (isset($_POST['Watches']))
{
    $_SESSION['item'] = 'watch';
    header("location: auctionItem.php");
}

require_once('Views/index.phtml');