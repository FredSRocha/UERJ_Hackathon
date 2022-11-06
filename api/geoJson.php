<?php
# https://stackoverflow.com/questions/31885031/formatting-json-to-geojson-via-php
include "config.php";

$date = date('d-m-Y h:i:s a', time());

$neighborhood = isset($_GET['neighborhood'])?$_GET['neighborhood']:"";

if($neighborhood) {
  $sql = "SELECT * FROM `provider` WHERE `prop_city` = 'Rio de Janeiro' ORDER BY `prop_neighborhood` = '{$neighborhood}' DESC";
} else {
  $sql = "SELECT * FROM `provider`";
}

$result = $mysqli->query($sql);

$data = array();

if($result) {
  while ($row = mysqli_fetch_assoc($result))
  {
    $data[] = $row;
  }
}

$jsonData =json_encode($data);
$original_data = json_decode($jsonData, true);
$features = array();
foreach($original_data as $key => $value) {
    $features[] = array(
        "type" => $value["feat_type"],
        "geometry" => array(
          "type" => $value["geo_type"], 
          "coordinates" => array(
              $value["geo_coords_lng"],
              $value["geo_coords_lat"]
          ),
      ),
        "properties" => array(
            "id" => $value["id_provider"],
            "addr" => array(
              "city" => $value["prop_city"],
              "country" => $value["prop_country"],
              "neighborhood" => $value["prop_neighborhood"],
              "number" => $value["prop_number"],
              "postcode" => $value["prop_postcode"],
              "state" => $value["prop_state"],
              "street" => $value["prop_street"]
            ),
            "address" => $value["prop_address"],
            "available" => $value["prop_available"],
            "category" => $value["prop_category"],
            "name" => $value["prop_name"],
            "phone" => $value["prop_cell_phone"],
            "cpf" => $value["prop_cpf"],
            "email" => $value["prop_email"],
            "datetime" => $value["added_datetime"]
        )
    );
}

$new_data = array(
    "copyright" => "(c) 2022 Rio para Todos",
    "type" => "FeatureCollection",
    "timestamp" => "{$date}",
    "features" => $features,
);

echo json_encode($new_data)

?>