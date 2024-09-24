<?php
error_log("\$_GET " . print_r($_GET, true));
include("category.php");
$categoryID = $_GET['categoryID'];
$category = Category::findCategory($categoryID);
$result = $category->removeCategory();
if ($result)
   echo "<h2>Category $categoryID removed</h2>\n";
else
   echo "<h2>Sorry, problem removing category $categoryID</h2>\n";
?>
