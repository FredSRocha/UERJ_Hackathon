<?php  include "config.php"; ?>
<!doctype html>
<html>
    <head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Rio para Todos - DataScience</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/modern-normalize/1.1.0/modern-normalize.min.css">
        <link href="style.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="container">
            
            <form method='post' action='download.php'>
            <input type='submit' value='Exportar .CSV' name='Export'>
         
            <table style='border-collapse:collapse;'>
                <tr>
                    <th>id_provider</th>
                    <th>feat_type</th>
                    <th>geo_type</th>
                    <th>geo_coords_lat</th>
                    <th>geo_coords_lng</th>
                    <th>prop_address</th>
                    <th>prop_city</th>
                    <th>prop_country</th>
                    <th>prop_neighborhood</th>
                    <th>prop_number</th>
                    <th>prop_postcode</th>
                    <th>prop_state</th>
                    <th>prop_street</th>
                    <th>prop_available</th>
                    <th>prop_category</th>
                    <th>prop_name</th>
                    <th>prop_cell_phone</th>
                    <th>prop_cpf</th>
                    <th>prop_email</th>
                </tr>
            <?php 
            $query = "SELECT * FROM `provider` ORDER BY `id_provider` ASC";
            $result = mysqli_query($con,$query);
            $user_arr = array();
            while($row = mysqli_fetch_array($result)){
                $id_provider = $row['id_provider'];
                $feat_type = $row['feat_type'];
                $geo_type = $row['geo_type'];
                $geo_coords_lat = $row['geo_coords_lat'];
                $geo_coords_lng = $row['geo_coords_lng'];
                $prop_address = $row['prop_address'];
                $prop_city = $row['prop_city'];
                $prop_country = $row['prop_country'];
                $prop_neighborhood = $row['prop_neighborhood'];
                $prop_number = $row['prop_number'];
                $prop_postcode = $row['prop_postcode'];
                $prop_state = $row['prop_state'];
                $prop_street = $row['prop_street'];
                $prop_available = $row['prop_available'];
                $prop_category = $row['prop_category'];
                $prop_name = $row['prop_name'];
                $prop_cell_phone = $row['prop_cell_phone'];
                $prop_cpf = $row['prop_cpf'];
                $prop_email = $row['prop_email'];
                
                $user_arr[] = array($id_provider,$feat_type,$geo_type,$geo_coords_lat,$geo_coords_lng,$prop_address,$prop_city,$prop_country,$prop_neighborhood,$prop_number,$prop_postcode,$prop_state,$prop_street,$prop_available,$prop_category,$prop_name,$prop_cell_phone,$prop_cpf,$prop_email);
            ?>
                <tr>
                    <td data-th="id_provider"><?php echo $id_provider; ?></td>
                    <td data-th="feat_type"><?php echo $feat_type; ?></td>
                    <td data-th="geo_type"><?php echo $geo_type; ?></td>
                    <td data-th="geo_coords_lat"><?php echo $geo_coords_lat; ?></td>
                    <td data-th="geo_coords_lng"><?php echo $geo_coords_lng; ?></td>
                    <td data-th="prop_address"><?php echo $prop_address; ?></td>
                    <td data-th="prop_city"><?php echo $prop_city; ?></td>
                    <td data-th="prop_country"><?php echo $prop_country; ?></td>
                    <td data-th="prop_neighborhood"><?php echo $prop_neighborhood; ?></td>
                    <td data-th="prop_number"><?php echo $prop_number; ?></td>
                    <td data-th="prop_postcode"><?php echo $prop_postcode; ?></td>
                    <td data-th="prop_state"><?php echo $prop_state; ?></td>
                    <td data-th="prop_street"><?php echo $prop_street; ?></td>
                    <td data-th="prop_available"><?php echo $prop_available; ?></td>
                    <td data-th="prop_category"><?php echo $prop_category; ?></td>
                    <td data-th="prop_name"><?php echo $prop_name; ?></td>
                    <td data-th="prop_cell_phone"><?php echo $prop_cell_phone; ?></td>
                    <td data-th="prop_cpf"><?php echo $prop_cpf; ?></td>
                    <td data-th="prop_email"><?php echo $prop_email; ?></td>
                </tr>
            <?php
            }
            ?>
            </table>
            <?php 
            $serialize_user_arr = serialize($user_arr);
            ?>
            <textarea name='export_data' style='display: none;'><?php echo $serialize_user_arr; ?></textarea>
            </form>
        </div>
        <footer>
            <p>
                &copy; 2022 Rio para Todos
            </p>
        </footer>
    </body>
</html>

