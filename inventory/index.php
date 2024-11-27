<?php
session_start();
include("category.php");
include("item.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Inventory Helper</title>
    <link rel="stylesheet" type="text/css" href="ih_styles.css">
    <link rel="icon" type="image/png" href="images/logo.png">
    <script language="javascript" type="text/javascript">
        function getRealTime() {
            // retrieve the DOM objects to place the content
            var domcategories = document.getElementById("categorycount");
            var domitems = document.getElementById("itemcount");
            var domlistpricetotal = document.getElementById("listpricetotal");
            //send the GET request to retrieve the data
            var request = new XMLHttpRequest();
            request.open("GET", "realtime.php", true);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    //parse the XML document to get each data element
                    var xmldoc = request.responseXML;
                    var xmlcategories = xmldoc.getElementsByTagName("categories")[0];
                    var categories = xmlcategories.childNodes[0].nodeValue;
                    var xmlitems = xmldoc.getElementsByTagName("items")[0];
                    var items = xmlitems.childNodes[0].nodeValue;
                    var xmllistpricetotal = xmldoc.getElementsByTagName("listpricetotal")[0];
                    var listpricetotal = xmllistpricetotal.childNodes[0].nodeValue;
                    domcategories.innerHTML = categories;
                    domitems.innerHTML = items;
                    domlistpricetotal.innerHTML = listpricetotal;
                }
            };
            request.send();
        }
    </script>

</head>

<body>
    <header>
        <?php include("header.inc.php"); ?>
    </header>
    <section style="height: 425px;">
        <nav style="float: left; height: 100%;">
            <?php include("nav.inc.php"); ?>
        </nav>
        <main>
            <?php
            if (isset($_REQUEST['content'])) {
                include($_REQUEST['content'] . ".inc.php");
            } else {
                include("main.inc.php");
            }
            ?>
        </main>
        <aside>
           <?php include("aside.inc.php"); ?>
           <script language="javascript" type="text/javascript" )>
               getRealTime();
               setInterval(getRealTime, 5000);
           </script>
       </aside>
    </section>
    <footer>
        <?php include("footer.inc.php"); ?>
    </footer>
</body>

</html>