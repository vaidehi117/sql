<?php
include('item.php');
$itemID = $_GET['itemID'];
if ((trim($itemID) == '') or (!is_numeric($itemID))) {
   echo "<h2>Sorry, you must enter a valid item ID number</h2>\n";
} else {
   $itemName = $_GET['itemName'];
   $categoryID = $_GET['categoryID'];
   $listPrice = $_GET['listPrice'];
   $item = new Item(
       $itemID,
       $itemName,
       $categoryID,
       $listPrice
   );
   $result = $item->saveItem();
   if ($result)
       echo "<h2>New Item #$itemID successfully added</h2>\n";
   else
       echo "<h2>Sorry, there was a problem adding that item</h2>\n";
}
?>