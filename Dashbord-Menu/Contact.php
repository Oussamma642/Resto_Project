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
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>

    <input type="checkbox" id="sidebar-toggle">

    <div class="sidebar">
        <div class="sidebar-header mt-3">
            <h5 class="brand">
                <span class="ti-unlink"></span>
                <span>Admin-Menu</span>
            </h5>
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
            <div class="search-wrapper mt-2">
                <span class="ti-search"></span>
                <input type="search" placeholder="Search">
            </div>
        </header>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table striped" style="margin-top:100px">
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
                                    <button style="width: 100%" type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#MessageContent"
                                        onclick="populateForm(<?= htmlspecialchars(json_encode($l)) ?>)">
                                        Show Message
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

        <div class="modal fade" id="MessageContent" tabindex="-1" aria-labelledby="MessageContent" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="MessageContent">The deatils of the contact</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="MessageContent" method="post">

                            <!-- User ID -->
                            <div class="form-group">
                                <label for="firstName"><b>User ID:</b></label>
                                <input type="text" readonly class="form-control" id="id" name="id">
                            </div>
                            <!-- User Full Name -->
                            <div class="form-group">
                                <label for="firstName"><b>User FullName:</b></label>
                                <input type="text" readonly class="form-control" id="fullname" name="fullname">
                            </div>

                            <!-- User Emil -->
                            <div class="form-group">
                                <label for="firstName"><b>User Email:</b></label>
                                <input type="text" readonly class="form-control" id="email" name="email">
                            </div>

                            <!-- Mssage box -->

                            <div class="form-group">
                                <label for=""><b>The Message:</b></label>
                                <div id='messageBox' class="message-box p-3 border rounded bg-light mb-4"
                                    style="white-space: pre-wrap; word-wrap: break-word;">
                                    This is the received message.
                                </div>
                            </div>

                            <!-- Reponse -->

                            <div class="form-group">
                                <label for="tArea" class="form-label">Your
                                    Message</label>
                                <textarea class="form-control" name='reponse' id="tArea" rows="4"
                                    placeholder="Write your message here...">
                                </textarea>

                            </div>
                    </div>

                    <!-- Submit -->
                    <button type="submit" name="modifyUserBtn" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
    function populateForm(l) {
        document.getElementById('id').value = l.user_id;
        document.getElementById('fullname').value = l.fullName;
        document.getElementById('email').value = l.email;
        document.getElementById('messageBox').innerHTML = l.message;
        // Further logic to populate permissions if needed
    }
    </script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>