<?php
include("item.php");
$itemID = $_GET['itemID'];
$item = Item::findItem($itemID);
$item->itemID = $_GET['itemID'];
$item->itemName = $_GET['itemName'];
$item->categoryID = $_GET['categoryID'];
$item->listPrice = $_GET['listPrice'];
$result = $item->updateItem();
if ($result) {
   echo "<h2>Item $itemID updated</h2>\n";
} else {
   echo "<h2>Problem updating item $itemID</h2>\n";
}
?>
