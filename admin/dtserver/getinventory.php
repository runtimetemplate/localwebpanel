<?php
// Database connection info
$dbDetails = array(
    'host' => 'gator3218.hostgator.com',
    'user' => 'johnpale_testuse',
    'pass' => 'password2019',
    'db'   => 'johnpale_postest'
);
// DB table to use
$table = 'admin_pos_inventory_org';
// Table's primary key
$primaryKey = 'inventory_id';
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database. 
// The `dt` parameter represents the DataTables column identifier.
// 
$columns = array(
    array( 
            'db' => 'product_ingredients',
            'dt' => 0
        ),
    array( 'db' => 'stock_primary', 'dt' => 1 ),
    array( 'db' => 'stock_secondary', 'dt' => 2 ),
    array( 'db' => 'critical_limit', 'dt' => 3 ),
    array( 'db' => 'date_modified', 'dt' => 4 ),
    array( 
        'db' => 'stock_status', 
        'dt' => 5,
        'formatter' => function( $d, $row ) { 
            if ($d == '1') {
                return 'Active';
            } else {
                return 'Deactivated';
            }
        }
         ),
    array( 
        'db' => 'inventory_id',
        'dt' => 6 , 
        'formatter' => function( $d, $row ) {
        return ('<div class="btn-group"><button type="button" class="btn btn-info bg-gr" id='.$d.' onclick="editinventory(this.id)"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-danger" id='.$d.' onclick="deleteinventory(this.id)"><i class="fas fa-trash-alt"></i></button></div>');
        })
);
// Include SQL query processing class
require('../../resources/ssp.class.php');
// Output data as json format
echo json_encode(
    //SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
    SSP::complex ( $_GET, $dbDetails, $table, $primaryKey, $columns, $whereResult=null, $whereAll=' stock_status = 1')
);

?>
