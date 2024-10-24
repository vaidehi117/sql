<?php
if (!isset($_REQUEST['categoryID']) or (!is_numeric($_REQUEST['categoryID']))) {
?>
   <h2>You did not select a valid categoryID to view.</h2>
   <a href="index.php?content=listcategories">List Categories</a>
<?php
} else {
   $categoryID = $_REQUEST['categoryID'];
   $category = Category::findCategory($categoryID);
   if ($category) {
       echo $category;
       echo "<br><br>\n";
   } else {
       echo "<h2>Sorry, category $categoryID not found</h2>\n";
   }
}
?>
