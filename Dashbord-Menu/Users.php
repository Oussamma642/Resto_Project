<?php
    
    include_once 'Classes/UserClasses/clsUser.php';
    session_start();
    $currUser = $_SESSION['currUser'];
    $LstUsers = clsUser::ListUsers();
    
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <input type="checkbox" id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="brand">
                <span class="ti-unlink"></span>
                <span>easywire</span>
            </h3>
            <label for="sidebar-toggle" class="ti-menu-alt"></label>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="./Home.html">
                        <span class="ti-home"></span>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="ti-face-smile"></span>
                        <span><a href="Reservations.php">Reservations</a></span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="ti-agenda"></span>
                        <span><a href="Dashbord-Menu/Orders.php">Orders</a></span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="ti-clipboard"></span>
                        <span><a href="Dashbord-Menu/Avis.html">Menu Plats</a></span>
                    </a>
                </li>

                <li>
                    <a href="">
                        <span class="ti-time"></span>
                        <span><a href="Dashbord-Menu/MenuPlats.html">Users</a></span>
                    </a>
                </li>

                <li>
                    <a href="">
                        <span class="ti-clipboard"></span>
                        <span><a href="Dashbord-Menu/Avis.html">Avis</a></span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="ti-book"></span>
                        <span><a href="Dashbord-Menu/Contact.html">Contact</a></span>
                    </a>
                </li>

                <li>
                    <a href="">
                        <span class="ti-folder"></span>
                        <span><a href="Dashbord-Menu/OuvertureFermeture.html">Ouverture/Fermeture</a></span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="ti-settings"></span>
                        <span>Account</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <div class="main-content">

        <header>
            <h1 style="padding-left: 30%;">Welcome <?=$currUser->getLastName() . ' ' . $currUser->getFirstName()?></h1>
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


            <section class="recent">
                <div class="activity-grid">
                    <div class="activity-card">
                        <h3>Recent activity</h3>

                        <div class="table-responsive">
                            <table>
                                <thead>


                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Phone Number</th>
                                        <th>Handle Permissions</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <!-- user_id INT AUTO_INCREMENT PRIMARY KEY,
                                    first_name VARCHAR(100) NOT NULL,
                                    last_name VARCHAR(100) NOT NULL,
                                    email VARCHAR(150) NOT NULL UNIQUE,
                                    password VARCHAR(255) NOT NULL,
                                    role ENUM('admin', 'client') NOT NULL,
                                    phone_number VARCHAR(20), -->


                                    <?php
    foreach($LstUsers as $usr )
    {
        ?>
                                    <tr>
                                        <td><?=$usr['first_name']?></td>
                                        <td><?=$usr['last_name']?></td>
                                        <td><?=$usr['email']?></td>
                                        <td><?=$usr['password']?></td>
                                        <td><?=$usr['phone_number']?></td>
                                        <td>Coming soon</td>
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