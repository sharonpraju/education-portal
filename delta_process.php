<?php
//Database processing in this common file

function fetchData($page, $section, $element)
{
  $conn = OpenCon();
  $sql = "SELECT data FROM page_contents where page=? AND section=? AND element=? "; // SQL with parameters
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("sss", $page, $section, $element);
  $stmt->execute();
  $result = $stmt->get_result(); // get the mysqli result
  $data = $result->fetch_assoc(); // fetch data
  foreach ($data as &$value) {
    return $value;
    }
    CloseCon($conn);
}

?>