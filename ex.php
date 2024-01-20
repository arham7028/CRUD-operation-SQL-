<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="ex.css">
</head>
<body>
    <table  id="dt-vertical-scroll" class="table" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Number</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <td>Syed Arham</td>
                <td>arham21@gmail.com</td>
                <td>7028566601</td>
            </tr>
            <tr>
                <th>2</th>
                <td>Vedant</td>
                <td>vedant34@gmail.com</td>
                <td>7028594720</td>
            </tr>
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
    //   $(document).ready( function () {
    //   $('#myTable').DataTable();
    //   } );
    $(document).ready(function () {
  $('#dt-vertical-scroll').dataTable({
    "paging": false,
    "fnInitComplete": function () {
      var myCustomScrollbar = document.querySelector('#dt-vertical-scroll_wrapper .dataTables_scrollBody');
      var ps = new PerfectScrollbar(myCustomScrollbar);
    },
    "scrollY": 450,
  });
});
    </script>
</body>
</html>