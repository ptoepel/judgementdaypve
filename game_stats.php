<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {
   border-collapse: collapse;
   border-spacing: 0;
   width: 100%;
   border: 1px solid #ddd;
}

th, td {
   text-align: left;
   padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>

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
<?php require('./single.php'); ?>
</head>
<body>

<h1>
The Game Statistics
</h1>
<?php echo topKills();?>

</body>
</html>
