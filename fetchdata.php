
<?php
include("database.php");
$db=$conn;

// define the table name and column for fetch_data function
$tableName="weather";
$columns=['weather_date','temperature','pressure','humidity','wind_speed','id'];

// call fetch_data function to retrieve data from database
$fetchData = fetch_data($db, $tableName,$columns);

// function to fetch data from database
function fetch_data($db,$tableName,$columns){
 if(empty($db)){
    $msg="Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
    $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
    $msg="Table Name is empty";
 }else{
    $columnName = implode(", ", $columns);
   
    $query = "SELECT ".$columnName." FROM $tableName ORDER BY id limit 7";

    // execute query on the database
    $result = $db->query($query);
    if($result== true){
        if ($result->num_rows > 0) {
            $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
            $msg= $row;
        } else {
            $msg="No Data Found";
        }
    }else{
        $msg= mysqli_error($db);
    }
 }
 
 return $msg;
}
?>