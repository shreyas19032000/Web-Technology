<?php
	include('dbconnect.php');
	if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 3;
        $offset = ($pageno-1) * $no_of_records_per_page;
		$total_pages_sql = "SELECT COUNT(*) FROM tbl_products";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM tbl_products LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($res_data))
        {
            echo "<img src=".$row['pimage']." alt=".$row['pimage'].">"."<br>";
            echo $row['pdescript'].'<br>';
            echo $row['pname'].'<br>';
            echo "Brand :".' '.$row['btype'].'<br>';
            echo "Cost :".' '.$row['pcost'].'<br>';
     
        }
        mysqli_close($conn);
?>
