<?php 
    session_start(); 

    include "./backend/db.php";
    $store_stmt = $db -> query('SELECT * FROM store');
    $client_stmt = $db -> query('SELECT * FROM clients');
    $order_stmt = $db -> query('SELECT * FROM orders');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriTech | Customer</title>
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./fontawesome-free-6.5.2-web/css/all.css">
    <link rel="icon" href="./images/projectimg3.jpg">
    <script src="./js/jquery-3.7.1.min.js"></script>
</head>
<body>
    <!-- Beginning of Frame holding Left and Right Section --> 
    <article class="flex">
        <!-- Beginning of Left Section --> 
        <section id="left" class="grid">
            <div class="grid">
                <img src="./images/coming.jpg" alt="">
                <h2><?php echo $_SESSION['name'] ?></h2>
            </div>
            <nav class="flex">
                <li class="active"><a href="#store"><i class="fa fa-store"></i> Store</a></li>
                <li><a href="#orders"><i class="fa fa-ticket"></i> Buy/Order</a></li>
                <li><a href="#transactions"><i class="fa fa-money-check"></i> Transactions</a></li>
                <li><a href="#settings"><i class="fa fa-cog"></i> Settings</a></li>
            </nav>
        </section>
        <!-- End of Left Section --> 

        <!-- Beginning of Right Section --> 
        <section id="right">
            <!-- Right Section Header -->
            <header class="flex">
                <h2>AfriTech</h2>
                <div class="search">
                    <i class="fa fa-search"></i>
                    <input type="search" placeholder="Enter Search">
                </div>
                <section class="flex">
                    <!-- <button>Add to Cart</button> -->
                    <a href="./backend/logout.php"><button name="logout" id="logout">Logout</button></a>
                </section>
            </header>
            <!-- Sub-Sections Frame -->
            <section class="flex">
                <!-- Store Section -->
                <article id="store">
                    <table>
                        <caption>Store Table</caption>
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row =  $store_stmt -> fetch(PDO::FETCH_ASSOC)):?>
                            <tr>
                                <th scope="row"> <?php echo $row['pdt_id'] ?> </th>
                                <td> <?php echo $row['pdt_name'] ?> </td>
                                <td> <?php echo $row['pdt_price'] ?> </td>
                                <td> <?php echo $row['date_added'] ?> </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                              <th scope="row" colspan="3">Total</th>
                              <td><?php $num = 0; $num++;  echo $num ?></td>
                            </tr>
                          </tfoot>
                    </table>
                </article>
                <!-- Orders Section -->
                <article id="orders">
                    <table>
                        <caption>Buy/Order</caption>
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Quantity</th>
                                <!-- <th scope="col">Client Name</th> -->
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Cocoa</td>
                                <td><input type="number" min="0" placeholder="Qty"></td>
                                <td><button>Add</button></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Banana</td>
                                <td><input type="number" min="0" placeholder="Qty"></td>
                                <td><button>Add</button></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Coffee</td>
                                <td><input type="number" min="0" placeholder="Qty"></td>
                                <td><button>Add</button></td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Palm Nuts</td>
                                <td><input type="number" min="0" placeholder="Qty"></td>
                                <td><button>Add</button></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                              <th scope="row" colspan="4">Order Now!!</th>
                            </tr>
                          </tfoot>
                    </table>
                </article>
                <!-- Transactions Section -->
                <article id="transactions">
                    <table>
                        <caption>Transactions Table</caption>
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Quantity</th>
                                <th scope="col">Client Name</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                            $self_order = $db -> prepare('SELECT * FROM orders WHERE client_name = ?');
                            $self_order -> execute(params: [$_SESSION['name']]);
                            $rows = $self_order -> fetchAll();
                            foreach($rows as $row):?>
                            <tr>
                                <th scope="row"> <?php echo $row['orders_id'] ?> </th>
                                <td> <?php echo $row['pdt_name'] ?> </td>
                                <td> <?php echo $row['pdt_qty'] ?> </td>
                                <td> <?php echo $row['client_name'] ?> </td>
                                <td> <?php echo $row['order_date'] ?> </td>
                                <td><button>Delete</button></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                              <th scope="row" colspan="5">Total</th>
                              <td><?php $num = 0; $num++;  echo $num ?></td>
                            </tr>
                          </tfoot>
                    </table>
                </article>
                <!-- Settings Section -->
                <article id="settings">
                    <h1>Settings</h1>
                    <p>Lorem ipsum dolor sit amet.</p>
                </article>
            </section>
        </section>
        <!-- End of Right Section --> 
    </article>
    <!-- End of Frame holding Left and Right Section --> 
     <script>
        // Adding AJAX for the button
        $("#orders button").click(function(){
                // Get the new value entered by the user
                var pdtName = $(this).siblings("td:first-child").val();
                var pdtQty = $(this).siblings("td:nth-child(2)").val();
                var clientName = $("#left h2").val();

                // AJAX request to send the new value to the PHP script
                $.ajax({
                    url: "./backend/add.php",  // The PHP script that will handle the update
                    type: "POST",
                    data: {
                        pdt_name: pdtName,
                        pdt_qty: pdtQty,
                        client_name: clientName,
                    },
                    success: function(response){$("#orders").html(response);},
                    error: function(jqXHR, textStatus, errorThrown){
                        $("#store").html("Error: " + textStatus + ": " + errorThrown);
                    }
                });
            });
     </script>
    <script src="./js/admin.js"></script>
</body>
</html>