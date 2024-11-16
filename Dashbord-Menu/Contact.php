<?php

include_once 'Classes/UserClasses/clsUser.php';
include_once 'Classes/ContactsClasses/clsListContacts.php';

session_start();

if (!isset($_SESSION['currUser']))
{
  header("location:./Authentication.php");  
}

$currUser = $_SESSION['currUser'];

// Check if user has Permission on this page:
if (!$currUser->CheckAccessPermission(Permissions::Contact))
{
    header("location:Home.php");
}

$LstContact = clsListContacts::ListContacts();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- <link rel="stylesheet" href="../css/bootstrap.css"> -->
</head>

<body>

    <input type="checkbox" id="sidebar-toggle">

    <div class="sidebar">
        <div class="sidebar-header">
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
                        <span><a href="OpClose.php">Opening/Closing Time</a></span>
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
            <div class="search-wrapper">
                <span class="ti-search"></span>
                <input type="search" placeholder="Search">
            </div>
        </header>

        <main>



            <section class="recent">
                <div class="activity-grid">
                    <div class="activity-card">
                        <h3>Contacts</h3>

                        <div class="table-responsive">
                            <table style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nom Complet</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th>Objet</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
    foreach($LstContact as $l)
    {
        ?>
                                    <tr>
                                        <td><?=$l['fullName']?></td>
                                        <td><?=$l['email']?></td>
                                        <td><?=$l['created_at']?></td>
                                        <td><?=$l['subject']?></td>
                                        <td><?=$l['status']?></td>
                                        <td>
                                            <button style="width: 100%" type="button" class="btn btn-danger"
                                                data-toggle="modal" data-target="#modifyModal"
                                                onclick="populateForm(<?= htmlspecialchars(json_encode($usr)) ?>)">
                                                Modify
                                            </button>
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
            </section>

        </main>

    </div>

    <script>
    function populateForm(user) {
        document.getElementById('id').value = user.user_id;
        document.getElementById('firstName').value = user.first_name;
        document.getElementById('lastName').value = user.last_name;
        document.getElementById('email').value = user.email;
        document.getElementById('password').value = user.password;
        document.getElementById('phoneNumber').value = user.phone_number;
        // Further logic to populate permissions if needed
    }
    </script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>