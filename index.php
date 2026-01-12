<?php

include_once ("stock.php");


    # Bundle Offers Computation
    $discount_rate = 0.10; # 10% Discount

    $icecream_total = array_sum(array_column($icecream, 'price'));
    $cake_total = array_sum(array_column($cake, 'price'));
    $chocolate_total = array_sum(array_column($chocolate, 'price'));
    $others_total = array_sum(array_column($others, 'price'));

	# Bundle Offers with Discount	
    $bundles = [ 
        ['name' => 'All Ice Cream',         'price' => ($icecream_total * (1 - $discount_rate))],
        ['name' => 'All Cakes',             'price' => ($cake_total * (1 - $discount_rate))],
        ['name' => 'All Chocolates',        'price' => ($chocolate_total * (1 - $discount_rate))],
        ['name' => 'All Various Sweets',    'price' => ($others_total * (1 - $discount_rate))]
    ];

    # Variables for Built-In Functions

    $stringDesertsTitle = 'Desserts Menu Extra Ultra Omega Deluxe Limited Edition';

    $stringHolidayH2 = 'Holiday Special Deals !!!';
    $stringHolidayH3_1 = 'Starting December 1 - December 25';
    $stringHolidayH3_2 = 'Every PHP 300 worth of items comes with a free brownie!';

    $stringTableHeader1 = 'eeeDessert Item';
    $stringTableHeader2 = 'Price (PHP)///';
    $stringTableHeader3 = '?Stock???';

    $stringTableHeader4 = 'Available';
    $stringBundleOffersHeader = 'Bundles Offers (10% discount on these bundles!)';

?>

<DOCTYPE html>
<html>
    <head>
        <title>Forever Sweets</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        
        <?php include 'header.php'; ?>

        <h1><?= $stringDesertsTitle ?></h1>

        <!-- Dessert Menu Table -->
        <table>
            <tr class="table-pink">
                <th class="width-55"><?= ltrim($stringTableHeader1, 'e') ?></th> <!-- ltrim() -->
                <th class="width-15"><?= rtrim($stringTableHeader2, '/') ?></th> <!-- rtrim() -->
                <th class="width-15"><?= trim($stringTableHeader3, '?') ?></th> <!-- trim() -->
                <th class="width-15"><?= str_replace('Available', 'Availability', $stringTableHeader4) ?></th> <!-- str_replace() -->
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
                            <td colspan=\"4\"><strong>$section_name</strong></td></tr>";

                    # Dessert Items
                    foreach ($data['items'] as $item) {
                        
                        # if else to know the availability of the dessert item
                        if ($item['quantity'] > 0) {
                            $availability = 'Available';
                        } else {
                            $availability = 'Out of Stock'; 
                        }

                        echo "<tr class=\"{$data['class']}\">";
                        echo "<td>" . $item['name'] . "</td>";
                        echo "<td>" . number_format($item['price'], 1) . "</td>";
                        echo "<td>" . $item['quantity'] . "</td>";
                        echo "<td>" . $availability . "</td>";
                        echo "</tr>";
                    }
                }
            ?>
            
            <tr class="table-yellow menu-section">
                <td colspan="4"><b><?= str_ireplace('Bundles', 'Package', $stringBundleOffersHeader) ?></b></td> <!-- str_ireplace() -->
            </tr>
            
            <?php foreach ($bundles as $bundle) { # Separate foreach loop because it doesnt have a quantity and availabiliy ?>
                <tr class="table-yellow">
                    <td><?= $bundle['name']; ?></td>
                    <td><?php echo $bundle['price']; ?></td>
                    <td colspan="2">- - -</td>
                </tr>
            <?php } ?>
        </table>

        <div id="special-offers">
            <h2><?= strtoupper($stringHolidayH2) ?></h2> <!-- strtoupper() -->
            <h3><span><?= strtolower($stringHolidayH3_1) ?></span></h3> <!-- strtolower() -->
            <h3><span><?= ucwords($stringHolidayH3_2) ?></span></h3> <!-- ucwords() -->
        </div>
        
        <div id="details-container">
            <div id="details">
                <div class="text-align-center">
                    <h2>------- Extra Details -------</h2>
                </div>
                <h2>Character Count of Title: <?= strlen($stringTitle) ?></h2> <!-- strlen() -->
                <h2>Word Count of Deserts Menu Title: <?= str_word_count($stringDesertsTitle) ?></h2> <!-- str_word_count() -->
                
                <div class="text-align-center">
                    <h2>------- Working With Numbers -------</h2>
                </div>
                <h2>Rounding: 12345.6789 &rarr; <?= round(12345.6789, 2) ?> </h2> <!-- round() -->
                <h2>Ceiling: 12345.99 &rarr; <?= ceil(12345.99) ?></h2> <!-- ceil() -->
                <h2>Floor: 12345.99 &rarr; <?= floor(12345.99) ?></h2> <!-- floor() -->
                <h2>MT Random: 1-100 &rarr; <?= mt_rand(1, 100) ?></h2> <!-- mt_rand() -->
                <h2>Random: 1-100 &rarr; <?= rand(1, 100) ?></h2> <!-- rand() -->
                <h2>Power: 2^10 &rarr; <?= pow(2, 10) ?></h2> <!-- pow() -->
                <h2>Squareroot : &Sqrt;10000 &rarr; <?= sqrt(10000) ?></h2> <!-- sqrt() -->

                <div class="text-align-center">
                    <h2>------- Working With Arrays -------</h2>
                </div>
                <h2>Count: Icecream Array &rarr; <?= count($icecream) ?></h2> <!-- count() -->
                <h2>Array Random: Icecream Array &rarr; <?= array_rand($icecream) ?></h2> <!-- array_rand() -->

            </div>
        </div>
        

        <?php include 'footer.php'; ?>

    </body>
</html>