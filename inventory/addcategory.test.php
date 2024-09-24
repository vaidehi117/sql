<?php
include("category.php");
$categoryID = $_GET['categoryID'];
if ((trim($categoryID) == '') or (!is_numeric($categoryID))) {
  echo "<h2>Sorry, you must enter a valid category ID number</h2>\n";
} else {
  $categoryCode = $_GET['categoryCode'];
  $categoryName = $_GET['categoryName'];
  $category = new Category($categoryID, $categoryCode, $categoryName);
  $result = $category->saveCategory();
  if ($result) {
      echo "<h2>New Category #$categoryID successfully added</h2>\n";
      echo "<h2>$category</h2>\n";
  } else {
      echo "<h2>Sorry, there was a problem adding that category</h2>\n";
  }
}
?>
