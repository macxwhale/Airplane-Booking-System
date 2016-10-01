<?php 
ob_start();
function redirect_to( $location = NULL ) {
  if ( $location != NULL ) {
    header( "Location: {$location}", false );
    exit;
  }
}
function ucname($string) {
    $string = ucwords(strtolower($string));
    foreach (array('-', '\'') as $delimiter) {
      if (strpos($string, $delimiter)!==false) {
        $string = implode($delimiter, array_map('ucfirst', explode($delimiter, $string)));
      }
    }
    return $string;
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = ucname($data);
  return $data;
}
function check_spaces($string){
  $new = str_replace("", "&nbsp;", $string);
  return empty($new);
}
function insert_city(){
  global $conn, $city_name;
  try {
    $sql = "INSERT INTO cities (city_name, status, created_on) VALUES ('$city_name', 1, NOW())";
    if($conn->exec($sql)){
      $_SESSION["message"] = "New record created successfully";
    } else {
      $_SESSION["message"] = "New record creation failed";
    }
  }
  catch(PDOException $e) {
    if($e->getMessage()){
      $_SESSION["error"] = "Duplicate Entry";
    }
  } 
}
function insert_airpane_type(){
  global $conn, $name;
  try {
    $sql = "INSERT INTO airplane_types (airplane_name, status, created_on) VALUES ('$name', 1, NOW())";
    if($conn->exec($sql)){
      $_SESSION["message"] = "New record created successfully";
    } else {
      $_SESSION["message"] = "New record creation failed";
    }
  }
  catch(PDOException $e) {
    if($e->getMessage()){
      $_SESSION["error"] = "Duplicate Entry";
    }
  } 
}
function insert_route(){
  global $conn, $title, $dep, $arr, $city_id, $dep_id, $arr_id;
  $dep_id = $city_id;
  $city = find_city_by_name($arr);
  foreach ($city as $key => $value) {
    $arr_id = $value["city_id"];
  }
  try {
    $sql  = "INSERT INTO routes (title, dep, arr, status, created_on, city_id, dep_id, arr_id";
    $sql .= ") VALUES ( ";
    $sql .= "'$title', '$dep', '$arr', 1, NOW(), $city_id, $dep_id, $arr_id)";
    if($conn->exec($sql)){
      $_SESSION["message"] = "New record created successfully";
    } else {
      $_SESSION["message"] = "New record creation failed";
    }
  }
  catch(PDOException $e) {
    if($e->getMessage()){
      $_SESSION["error"] = "Duplicate Entry" . $sql .$e->getMessage();
    }
  } 
} 
function insert_return_route(){
  global $conn, $title, $dep, $arr, $city_id, $dep_id, $arr_id;
  $title = $arr."-".$dep;
  $arr_city = find_city_by_name($arr);
  foreach ($arr_city as $key => $value) {
    $city_id = $value["city_id"];
    $dep_id =  $value["city_id"];
    
  }
  $dep_city = find_city_by_name($dep);
  foreach ($dep_city as $key => $value) {
    $arr_id =  $value["city_id"];
  }
  try {
    $sql  = "INSERT INTO routes (title, dep, arr, status, created_on, city_id, dep_id, arr_id";
    $sql .= ") VALUES ( ";
    $sql .= "'$title', '$arr', '$dep', 1, NOW(), $city_id, $dep_id, $arr_id)";
    if($conn->exec($sql)){
      $_SESSION["message"] = "New record created successfully";
    } else {
      $_SESSION["message"] = "New record creation failed";
    }
  }
  catch(PDOException $e) {
    if($e->getMessage()){
      $_SESSION["error"] = "Duplicate Entry";
    }
  } 
}
function find_all_cities(){
  global $conn, $stmt;
  try {
    $stmt = $conn->prepare("SELECT * FROM cities");
    $stmt->execute();
    if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
      return $result;
    } else {
      return null;
    }
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
function find_all_airplane_types(){
  global $conn, $stmt;
  try {
    $stmt = $conn->prepare("SELECT * FROM airplane_types");
    $stmt->execute();
    if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
      return $result;
    } else {
      return null;
    }
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
function find_all_routes(){
  global $conn, $stmt;
  try {
    $stmt = $conn->prepare("SELECT * FROM routes");
    $stmt->execute();
    if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
      return $result;
    } else {
      return null;
    }
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
function find_city_by_id($city_id){
  global $conn, $stmt, $result;
  try {
    $stmt = $conn->prepare("SELECT * FROM cities WHERE city_id = '$city_id' LIMIT 1");
    $stmt->execute();
    if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
      return $result;
    } else {
      return null;
    }
  } 
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
function find_airplane_type_by_id($airplane_id){
  global $conn, $stmt, $result;
  try {
    $stmt = $conn->prepare("SELECT * FROM airplane_types WHERE airplane_id = $airplane_id LIMIT 1");
    $stmt->execute();
    if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
      return $result;
    } else {
      return null;
    }
  } 
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
function find_route_by_id($route_id){
  global $conn, $stmt, $result;
  try {
    $stmt = $conn->prepare("SELECT * FROM routes WHERE route_id = $route_id LIMIT 1");
    $stmt->execute();
    if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
      return $result;
    } else {
      return null;
    }
  } 
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
function find_active_cities(){
  global $conn, $stmt, $result;
  try {
    $stmt = $conn->prepare("SELECT * FROM cities WHERE status = 1");
    $stmt->execute();
    if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
      return $result;
    } else {
      return null;
    }
  } 
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
function find_active_routes(){
  global $conn, $stmt, $result;
  try {
    $stmt = $conn->prepare("SELECT * FROM routes WHERE status = 1");
    $stmt->execute();
    if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
      return $result;
    } else {
      return null;
    }
  } 
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
function find_city_by_name($city_name){
  global $conn, $stmt;
  try {
    $stmt = $conn->prepare("SELECT * FROM cities WHERE city_name = '$city_name' LIMIT 1");
    $stmt->execute();
    if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
      return $result;
    } else {
      return null;
    }
  } 
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
function find_airplane_type_by_name($airplane_type_name){
  global $conn, $stmt;
  try {
    $stmt = $conn->prepare("SELECT * FROM airplane_types WHERE airplane_name = '$airplane_type_name' LIMIT 1");
    $stmt->execute();
    if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
      return $result;
    } else {
      return null;
    }
  } 
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
function find_route_by_name($title){
  global $conn, $stmt;
  try {
    $stmt = $conn->prepare("SELECT * FROM routes WHERE title = '$title' LIMIT 1");
    $stmt->execute();
    if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
      return $result;
    } else {
      return null;
    }
  } 
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
function update_city_name($city_id){
  global $conn, $city_name, $status;
  try {
    $sql = "UPDATE cities SET ";
    $sql .= "city_name = '$city_name' ";
    $sql .= "WHERE city_id = $city_id LIMIT 1";
     
    $stmt = $conn->prepare($sql);
    if($stmt->execute()){
      if($stmt->rowCount() == 1) { 
        $_SESSION["message"] = $stmt->rowCount() . " Record updated successfully";
      }  
    } else {
      $_SESSION["message"] = "New record update failed";
    }
  }
  catch(PDOException $e) {
    if($e->getMessage()){
      $_SESSION["error"] = "Duplicate Entry";
    }
  } 
}
function update_airplane_type_name($airplane_id){
  global $conn, $name, $status;
  try {
    $sql = "UPDATE airplane_types SET ";
    $sql .= "airplane_name = '$name', ";
    $sql .= "status = $status ";
    $sql .= "WHERE airplane_id = $airplane_id LIMIT 1";
     
    $stmt = $conn->prepare($sql);
    if($stmt->execute()){
      if($stmt->rowCount() == 1) { 
        $_SESSION["message"] = $stmt->rowCount() . " Record updated successfully";
      }  
    } else {
      $_SESSION["message"] = "New record update failed";
    }
  }
  catch(PDOException $e) {
    if($e->getMessage()){
      $_SESSION["error"] = $e->getMessage() . $sql . "Duplicate Entry";
    }
  } 
}
function update_city_status($city_id){
  global $conn, $city_name, $status;
  try {
    $sql = "UPDATE cities SET ";
    $sql .= "status = $status ";
    $sql .= "WHERE city_id = $city_id LIMIT 1";
     
    $stmt = $conn->prepare($sql);
    if($stmt->execute()){
      if($stmt->rowCount() == 1) { 
        $_SESSION["message"] = $stmt->rowCount() . " Record updated successfully";
      }  
    } else {
      $_SESSION["message"] = "New record update failed";
    }
  }
  catch(PDOException $e) {
    if($e->getMessage()){
      $_SESSION["error"] = "Duplicate Entry";
    }
  } 
}
function update_route($route_id){
  global $conn, $title, $dep, $arr, $status;
  try {
    $sql = "UPDATE routes SET ";
    $sql .= "title = '$title', ";
    $sql .= "dep = '$dep', ";
    $sql .= "arr = '$arr', ";
    $sql .= "status = $status ";
    $sql .= "WHERE route_id = $route_id LIMIT 1";
     
    $stmt = $conn->prepare($sql);
    if($stmt->execute()){
      if($stmt->rowCount() == 1) { 
        $_SESSION["message"] = $stmt->rowCount() . " Record updated successfully";
      }  
    } else {
      $_SESSION["message"] = "New record update failed";
    }
  }
  catch(PDOException $e) {
    if($e->getMessage()){
      $_SESSION["error"] = "Duplicate Entry";
    }
  } 
}
function delete_city($city_id){
  global $conn;
  try {
    $sql = "DELETE FROM cities WHERE city_id = $city_id LIMIT 1";   
    $stmt = $conn->prepare($sql);
    if($stmt->execute()){
      if($stmt->rowCount() == 1) { 
        $_SESSION["message"] = $stmt->rowCount() . " Record deleted successfully";
        redirect_to("../../cities.php");
      }  
    } else {
      $_SESSION["message"] = "Record deletetion failed";
    }
  }
  catch(PDOException $e) {
    if($e->getMessage()) {
      $_SESSION["error"] = "You cannot delete <a href=\"#\" data-toggle=\"modal\" data-target=\"#myModal\">Cities</a> with Routes";
    }
  } 
}
function delete_route($route_id){
  global $conn;
  try {
    $sql = "DELETE FROM routes WHERE route_id = $route_id LIMIT 1";   
    $stmt = $conn->prepare($sql);
    if($stmt->execute()){
      if($stmt->rowCount() == 1) { 
        $_SESSION["message"] = $stmt->rowCount() . " Record deleted successfully";
        redirect_to("../../routes.php");
      }  
    } else {
      $_SESSION["message"] = "Record deletetion failed";
    }
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  } 
}
function delete_airplane_types($airplane_id){
  global $conn;
  try {
    $sql = "DELETE FROM airplane_types WHERE airplane_id = $airplane_id LIMIT 1";   
    $stmt = $conn->prepare($sql);
    if($stmt->execute()){
      if($stmt->rowCount() == 1) { 
        $_SESSION["message"] = $stmt->rowCount() . " Record deleted successfully";
        redirect_to("../../airplane_types.php");
      }  
    } else {
      $_SESSION["message"] = "Record deletetion failed";
    }
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  } 
}
function update_route_status($city_id){
  global $conn, $title, $dep, $arr, $status;
  try {
    $sql = "UPDATE routes SET ";
    $sql .= "status = $status ";
    $sql .= "WHERE city_id = $city_id";
     
    $stmt = $conn->prepare($sql);
    if($stmt->execute()){
      //$_SESSION["message"] = $stmt->rowCount() . " Record updated successfully";
    } else {
      $_SESSION["message"] = "New record update failed";
    }
  }
  catch(PDOException $e) {
    if($e->getMessage()){
      $_SESSION["error"] = "Duplicate Entry";
    }
  } 
}
function find_routes_for_cities_by_id($city_id){
  global $conn, $stmt, $result;
  try {
    $stmt = $conn->prepare("SELECT * FROM routes WHERE city_id = $city_id");
    $stmt->execute();
    if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
      return $result;
    } else {
      return null;
    }
  } 
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
?>
