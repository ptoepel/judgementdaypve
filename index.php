<html>
<head>
<title>Miscreated Damage Logs</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/theme.css">
<script>
function myFunction() {
 // Declare variables
 var input, filter, table, tr, td, i;
 input = document.getElementById("searchValue");
 filter = input.value.toUpperCase();
 table = document.getElementById("myTable");
 tr = table.getElementsByTagName("tr");

 // Loop through all table rows, and hide those who don't match the search query
 for (i = 0; i < tr.length; i++) {
   td = tr[i].getElementsByTagName("td")[0];
   if (td) {
     if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
       tr[i].style.display = "";
     } else {
       tr[i].style.display = "none";
     }
   }
 }
}
</script>

</head>
<body>

<h1>
  Miscreated Damage Logs
</h1>
<a href="./raw.php" >Raw Data</a>
<a href="./game_stats.php">Most Kills</a>

</body>
</html>
