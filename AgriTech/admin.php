<?php 
    session_start(); 

    include "./backend/db.php";
    $staff_stmt = $db -> query('SELECT * FROM staff');
    $store_stmt = $db -> query('SELECT * FROM store');
    $client_stmt = $db -> query('SELECT * FROM clients');
    $order_stmt = $db -> query('SELECT * FROM orders');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriTech | Admin</title>
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./fontawesome-free-6.5.2-web/css/all.css">
    <link rel="icon" href="./images/projectimg3.jpg">
</head>
<body>
    <article class="flex">
        <section id="left" class="grid">
            <div class="grid">
                <img src="./images/coming.jpg" alt="">
                <h2>Admin</h2>
            </div>
            <nav class="flex">
                <li class="active"><a href="#staff"><i class="fa fa-users"></i> Staff</a></li>
                <li><a href="#orders"><i class="fa fa-ticket"></i> Orders</a></li>
                <li><a href="#inventory"><i class="fa fa-store"></i> Inventory</a></li>
                <li><a href="#customers"><i class="fa fa-user"></i> Customers</a></li>
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
                <article id="staff">
                    <table>
                        <caption>Staff Table</caption>
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row =  $staff_stmt -> fetch(PDO::FETCH_ASSOC)){ $num = 0; $num++;?>
                            <tr>
                                <th scope="row"> <?php echo $row['staff_id'] ?> </th>
                                <td> <?php echo $row['staff_name'] ?> </td>
                                <td> <?php echo $row['staff_email'] ?> </td>
                                <td> <?php echo $row['staff_pwd'] ?> </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                              <th scope="row" colspan="3">Total</th>
                              <td><?php echo $num ?></td>
                            </tr>
                          </tfoot>
                    </table>
                </article>
                <article id="orders">
                   <table>
                        <caption>Orders Table</caption>
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Quantity</th>
                                <th scope="col">Client Name</th>
                                <th scope="col">Order Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row =  $order_stmt -> fetch(PDO::FETCH_ASSOC)){ $num = 0; $num++;?>
                            <tr>
                                <th scope="row"> <?php echo $row['orders_id'] ?> </th>
                                <td> <?php echo $row['pdt_name'] ?> </td>
                                <td> <?php echo $row['pdt_qty'] ?> </td>
                                <td> <?php echo $row['client_name'] ?> </td>
                                <td> <?php echo $row['order_date'] ?> </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                              <th scope="row" colspan="4">Total</th>
                              <td><?php echo $num ?></td>
                            </tr>
                          </tfoot>
                    </table>
                </article>
                <article id="inventory">
                    <table>
                        <caption>Inventory Table</caption>
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Date Added</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row =  $store_stmt -> fetch(PDO::FETCH_ASSOC)){ $num = 0; $num++; ?>
                            <tr>
                                <th scope="row"> <?php echo $row['pdt_id'] ?> </th>
                                <td> <?php echo $row['pdt_name'] ?> </td>
                                <td> <?php echo $row['pdt_price'] ?> </td>
                                <td> <?php echo $row['date_added'] ?> </td>
                            </tr>
                            <?php } ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                              <th scope="row" colspan="3">Total</th>
                              <td><?php echo $num ?></td>
                            </tr>
                          </tfoot>
                    </table>
                </article>
                <article id="customers">
                <table>
                        <caption>Customer Table</caption>
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row =  $client_stmt -> fetch(PDO::FETCH_ASSOC)){ $num = 0; $num++; ?>
                            <tr>
                                <th scope="row"> <?php echo $row['client_id'] ?> </th>
                                <td> <?php echo $row['client_name'] ?> </td>
                                <td> <?php echo $row['client_email'] ?> </td>
                                <td> <?php echo $row['client_pwd'] ?> </td>
                            </tr>
                            <?php } ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                              <th scope="row" colspan="3">Total</th>
                              <td><?php echo $num ?></td>
                            </tr>
                          </tfoot>
                    </table>
                </article>
                <article id="settings">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero iste corporis ullam sint optio et ipsa iure sed quam recusandae.</p>
                </article>
            </section>
</body>
<script src="./js/admin.js"></script>
</html>