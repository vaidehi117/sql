<?php
// include('item.php');
if (isset($_SESSION['login'])) {
  $itemID = $_POST['itemID'];
  if ((trim($itemID) == '') or (!is_numeric($itemID))) {
      echo "<h2>Sorry, you must enter a valid item ID number</h2>\n";
   } else if (Item::findItem($itemID)) {
       echo "<h2>Sorry, An item with the ID #$itemID already exists</h2>\n";
  } else {
      $itemName = $_POST['itemName'];
      $categoryID = $_POST['categoryID'];
      $listPrice = $_POST['listPrice'];
      $item = new Item($itemID, $itemName, $categoryID, $listPrice);
      $result = $item->saveItem();
       if ($result)
           echo "<h2>New Item #$itemID successfully added</h2>\n";
       else
           echo "<h2>Sorry, there was a problem adding that item</h2>\n";
   }
} else {
   echo "<h2>Please login first</h2>\n";
}
?>