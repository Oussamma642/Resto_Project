<?php

session_start();

if (!isset($_SESSION['currUser']))
{
    header("location:../Authentication.php");
}



include_once 'C:\xampp\desktop\htdocs\Resto_Project\Dashbord-Menu\Classes\ReservationClasses\LstReservation.php';


$reservations = getReservationList();

/* Show the message of the modification on a reservation within alert JS function */
function afficherMessage()
{
    session_start();  // Start the session
    // Check if a message is set in the session
    if (isset($_SESSION['Message'])) {
        // Retrieve the message from the session
        $message = $_SESSION['Message'];
    
        // Display the message in a JavaScript alert
        echo "<script type='text/javascript'>alert('$message');</script>";
    
        // Clear the message after displaying it so it doesn't show again on refresh
        unset($_SESSION['Message']);
    }    
}
afficherMessage();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="../css/style.css">

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

            <div class="social-icons">
                <span class="ti-bell"></span>
                <span class="ti-comment"></span>
                <div></div>
            </div>
        </header>

        <main>

            <h2 class="dash-title">Overview</h2>

            <div class="dash-cards">
                <div class="card-single">
                    <div class="card-body">
                        <span class="ti-briefcase"></span>
                        <div>
                            <h5>Account Balance</h5>
                            <h4>$30,659.45</h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="">View all</a>
                    </div>
                </div>

                <div class="card-single">
                    <div class="card-body">
                        <span class="ti-reload"></span>
                        <div>
                            <h5>Pending</h5>
                            <h4>$19,500.45</h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="">View all</a>
                    </div>
                </div>

                <div class="card-single">
                    <div class="card-body">
                        <span class="ti-check-box"></span>
                        <div>
                            <h5>Processed</h5>
                            <h4>$20,659</h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="">View all</a>
                    </div>
                </div>
            </div>



            <!-- <h1 class="dash-title">Reservations Field</h1> -->

            <section class="recent">
                <div class="activity-grid">
                    <div class="activity-card">
                        <h3>Reservation List</h3>

                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Reservation Date</th>
                                        <th>Time</th>
                                        <th>Guests Number</th>
                                        <th>Status</th>
                                        <th>Handle Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                foreach($reservations as $r)
                                {
                                    ?>
                                    <tr>
                                        <td><?=$r['first_name']?></td>
                                        <td><?=$r['last_name']?></td>
                                        <td><?=$r['reservation_date']?></td>
                                        <td><?=$r['time_slot']?></td>
                                        <td><?=$r['number_of_guests']?></td>
                                        <td><?=$r['status']?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="dropbtn"><?=$r['status']?></button>
                                                <div class="dropdown-content">
                                                    <a
                                                        href="./Classes/ReservationClasses/AcceptReservation.php?id=<?=$r['reservation_id']?>">Accept</a>
                                                    <a
                                                        href="./Classes/ReservationClasses/CancelReservation.php?id=<?=$r['reservation_id']?>">Cancel</a>
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

                    <div class="summary">
                        <div class="summary-card">
                            <div class="summary-single">
                                <span class="ti-id-badge"></span>
                                <div>
                                    <h5>196</h5>
                                    <small>Number of staff</small>
                                </div>
                            </div>
                            <div class="summary-single">
                                <span class="ti-calendar"></span>
                                <div>
                                    <h5>16</h5>
                                    <small>Number of leave</small>
                                </div>
                            </div>
                            <div class="summary-single">
                                <span class="ti-face-smile"></span>
                                <div>
                                    <h5>12</h5>
                                    <small>Profile update request</small>
                                </div>
                            </div>
                        </div>

                        <div class="bday-card">
                            <div class="bday-flex">
                                <div class="bday-img"></div>
                                <div class="bday-info">
                                    <h5>Dwayne F. Sanders</h5>
                                    <small>Birthday Today</small>
                                </div>
                            </div>

                            <div class="text-center">
                                <button>
                                    <span class="ti-gift"></span>
                                    Wish him
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>
    </div>
</body>

</html>