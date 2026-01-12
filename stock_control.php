<?php

include_once("stock.php");
include_once("functions.php");

?>

<DOCTYPE html>
<html>
    <head>
        <title>Forever Sweets</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        
        <?php include 'header.php'; ?>

        <h1>Stock Control</h1>

        <!-- Dessert Menu Table -->
        <table>
            <tr class="table-pink">
                <th class="width-40">Dessert Item</th>
                <th class="width-15">Stock</th>
                <th class="width-15">Re-Order</th>
                <th class="width-15">Total Value</th>
                <th class="width-15">Tax Due</th>
            </tr>
            

            <?php
                $categories = [
                    'Ice Cream Menu' =>                 ['items' => $icecream, 'class' => 'table-cyan'],
                    'Cake Menu' =>                      ['items' => $cake, 'class' => 'table-green'],
                    'Chocolate Menu' =>                 ['items' => $chocolate, 'class' => 'table-blue'],
                    'Various Sweets and Pies Menu' =>   ['items' => $others, 'class' => 'table-purple'],
                ];

                foreach ($categories as $section_name => $data) {
                    # Section Header (Ice Cream Menu, Cake Menu, etc.)
                    echo    "<tr class=\"{$data['class']} menu-section\">
                            <td colspan=\"5\"><strong>$section_name</strong></td></tr>";

                    # Dessert Items
                    foreach ($data['items'] as $item) {
 						
						# Calling get_reorder_message
						$quantity = $item['quantity'];
						$price = $item['price'];
						$tax_rate = 20;  // This is the global tax rate 
					
						$reorder_message = get_reorder_message($quantity);
						$total_value =  number_format(get_total_value($price, $quantity), 1);
						$tax_due = number_format(get_tax_due($price, $quantity, $tax_rate), 1);


                        echo "<tr class=\"{$data['class']}\">";
                        echo "<td>" . $item['name'] . "</td>";
                        echo "<td>" . $item['quantity'] . "</td>";
						echo "<td>" . $reorder_message . "</td>";
						echo "<td>" . $total_value . "</td>";
						echo "<td>" . $tax_due . "</td>";
                        echo "</tr>";
                    }
                }
            ?>
            
        </table>


        <?php include 'footer.php'; ?>

    </body>
</html>