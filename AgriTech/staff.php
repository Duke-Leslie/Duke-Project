<?php 
    session_start(); 

    include "./backend/db.php";
    $store_stmt = $db -> query('SELECT * FROM store');
    $staff_stmt = $db -> query('SELECT * FROM staff');
    $order_stmt = $db -> query('SELECT * FROM orders');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriTech | Staff</title>
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./fontawesome-free-6.5.2-web/css/all.css">
    <link rel="icon" href="./images/projectimg3.jpg">
</head>
<body>
    <article class="flex">
        <section id="left" class="grid">
            <div class="grid">
                <img src="./images/coming.jpg" alt="">
                <h2><?php echo $_SESSION['name'] ?></h2>
            </div>
            <nav class="flex">
                <li class="active"><a href="#store"><i class="fa fa-store"></i> Store</a></li>
                <li><a href="#orders"><i class="fa fa-ticket"></i> Orders</a></li>
                <!-- <li><a href="#orders"><i class="fa fa-ticket"></i> Supply</a></li> -->
                <li><a href="#transactions"><i class="fa fa-money-check"></i> Transactions</a></li>
                <li><a href="#settings"><i class="fa fa-cog"></i> Settings</a></li>
            </nav>
        </section>
        <section id="right">
            <header class="flex">
                <h2>AfriTech</h2>
                <div class="search">
                    <i class="fa fa-search"></i>
                    <input type="search" placeholder="Enter Search">
                </div>
            </header>
            <section class="flex">
                <article id="store">
                    <table>
                        <caption>Store Table</caption>
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">id</th>
                                <th scope="col">id</th>
                                <th scope="col">id</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Duke</td>
                                <td>Duke</td>
                                <td>Duke</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Duke</td>
                                <td>Duke</td>
                                <td>Duke</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Duke</td>
                                <td>Duke</td>
                                <td>Duke</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Duke</td>
                                <td>Duke</td>
                                <td>Duke</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                              <th scope="row" colspan="3">Total</th>
                              <td>33</td>
                            </tr>
                          </tfoot>
                    </table>
                </article>
                <article id="orders">
                    <table>
                        <caption>Orders Table</caption>
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">id</th>
                                <th scope="col">id</th>
                                <th scope="col">id</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Duke</td>
                                <td>Duke</td>
                                <td>Duke</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Duke</td>
                                <td>Duke</td>
                                <td>Duke</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Duke</td>
                                <td>Duke</td>
                                <td>Duke</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Duke</td>
                                <td>Duke</td>
                                <td>Duke</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                              <th scope="row" colspan="3">Total</th>
                              <td>33</td>
                            </tr>
                          </tfoot>
                    </table>
                </article>
                <article id="transactions">
                    <table>
                        <caption>Transaction Table</caption>
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">id</th>
                                <th scope="col">id</th>
                                <th scope="col">id</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Duke</td>
                                <td>Duke</td>
                                <td>Duke</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Duke</td>
                                <td>Duke</td>
                                <td>Duke</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Duke</td>
                                <td>Duke</td>
                                <td>Duke</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Duke</td>
                                <td>Duke</td>
                                <td>Duke</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                              <th scope="row" colspan="3">Total</th>
                              <td>33</td>
                            </tr>
                          </tfoot>
                    </table>
                </article>
                <article id="settings">
                    <h1>Settings</h1>
                    <p>Lorem ipsum dolor sit amet.</p>
                </article>
            </section>
        </section>
    </article>
</body>
<script src="./js/admin.js"></script>
</html>