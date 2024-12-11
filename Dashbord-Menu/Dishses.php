<?php

include_once 'Classes/UserClasses/clsUser.php';
session_start();

if (!isset($_SESSION['currUser']))
{
  header("location:./Authentication.php");  
}

$currUser = $_SESSION['currUser'];

// Check if user has Permission on this page:
if (!$currUser->CheckAccessPermission(Permissions::DishesMenu))
{
    header("location:Home.php");
}

include_once '.\Classes\MenuClasses\clsMenu.php';
$Menu = clsMenu::ListMenu();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
    /* Style of Button Handle Staut  */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropbtn {
        width: 100px;
        /* border-radius: 30%; */
        border-radius: 10%;

        width: 150px;
        height: 50px;

    }

    .dropdown:hover .dropbtn {

        border-radius: 0%;
        background-color: rgb(156, 85, 85);
        color: white;
    }
    </style>
</head>

<body>

    <input type="checkbox" id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-header mt-5">
            <h3 class="brand">
                <span class="ti-unlink"></span>
                <span>Admin-Menu</span>
            </h3>
            <label for="sidebar-toggle" class="ti-menu-alt"></label>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="Home.php">
                        <span class="ti-home"></span>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="ti-calendar"></span>
                        <span><a href="Reservations.php">Reservations</a></span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="ti-agenda"></span>
                        <span><a href="Orders.php">Orders</a></span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="ti-clipboard"></span>
                        <span><a href="Dishses.php">Dishes Menu</a></span>
                    </a>
                </li>

                <li>
                    <a href="">
                        <span class="ti-user"></span>
                        <span><a href="Users.php">Users</a></span>
                    </a>
                </li>

                <li>
                    <a href="">
                        <span class="ti-comment"></span>
                        <span><a href="Comments.php">Comments</a></span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="ti-email"></span>
                        <span><a href="Contact.php">Contact</a></span>
                    </a>
                </li>

                <li>
                    <a href="">
                        <span class="ti-time"></span>
                        <span><a href="OpClose.php">Ouverture/Fermeture</a></span>
                    </a>
                </li>
                <li>
                    <a href="Logout.php">
                        <span class="ti-power-off"></span>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">

        <header>
            <h1 style="padding-left: 30%;">Welcome <?=$currUser->getLastName() . ' ' . $currUser->getFirstName()?></h1>
        </header>


        <div class="container" style="margin-top:100px">
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Picture</th>
                                <th>Price</th>
                                <th>Modify Item</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php

foreach($Menu as $M){
    ?>
                            <tr>
                                <td><?=$M['name']?></td>
                                <td><?=$M['description']?></td>
                                <td><img src="<?=$M['picturePath']?>" alt=""></td>
                                <td><?=$M['price']?></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="dropbtn">Handle Status</button>
                                        <div class="dropdown-content">
                                            <a
                                                href="./Classes/ReservationClasses/clsModifyReservation.php?status=pending&id=<?= $r['reservation_id'] ?>&email=<?= $r['email'] ?>&lname=<?= $r['last_name'] ?>">Modify
                                                Item</a>
                                            <a
                                                href="./Classes/ReservationClasses/clsModifyReservation.php?status=confirmed&id=<?= $r['reservation_id'] ?>&email=<?= $r['email'] ?>&lname=<?= $r['last_name'] ?>">Delete
                                                Item
                                            </a>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <?php
}
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</body>

</html>