<?php

date_default_timezone_set('America/Sao_Paulo');

$date = date('Y-m-d_h-i-s');

$filename = "database_{$date}.csv";

$export_data = unserialize($_POST['export_data']);

$file = fopen($filename,"w");

fputcsv($file, array(
  'id_provider',
  'feat_type',
  'geo_type',
  'geo_coords_lat',
  'geo_coords_lng',
  'prop_address',
  'prop_city',
  'prop_country',
  'prop_neighborhood',
  'prop_number',
  'prop_postcode',
  'prop_state',
  'prop_street',
  'prop_available',
  'prop_category',
  'prop_name',
  'prop_cell_phone',
  'prop_cpf',
  'prop_email'
));

foreach ($export_data as $line){
  fputcsv($file,$line);
}

fclose($file); 

header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=".$filename);
header("Content-Type: application/csv; "); 

readfile($filename);

unlink($filename);

exit();
