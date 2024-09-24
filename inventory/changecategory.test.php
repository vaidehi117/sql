<?php
include("category.php");
$categoryID = $_GET['categoryID'];
$category = Category::findCategory($categoryID);
$category->categoryID = $_GET['categoryID'];
$category->categoryCode = $_GET['categoryCode'];
$category->categoryName = $_GET['categoryName'];
$result = $category->updateCategory();
if ($result) {
   echo "<h2>Category $categoryID updated</h2>\n";
} else {
   echo "<h2>Problem updating category $categoryID</h2>\n";
}
?>
