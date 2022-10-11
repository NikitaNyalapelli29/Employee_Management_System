<!-- <!DOCTYPE html> -->

<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	 $sql1 = "SELECT * FROM `employee` where id = '$id'";
	 $result1 = mysqli_query($conn, $sql1);
	 $employeen = mysqli_fetch_array($result1);
	 $empName = ($employeen['firstName']);

	$sql = "SELECT id, firstName, lastName,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
	$sql1 = "SELECT `pname`, `duedate` FROM `project` WHERE eid = $id and status = 'Due'";

	$sql2 = "Select * From employee, employee_leave Where employee.id = $id and employee_leave.id = $id order by employee_leave.token";

	$sql3 = "SELECT * FROM `salary` WHERE id = $id";

//echo "$sql";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
?>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Todo List App in JavaScript </title>
    <link rel="stylesheet" href="eloginwelAddstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Iconscout Link For Icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body>
    <header>
        <nav>
            <h1>Employee Management System</h1>
            <ul id="navli">
                <li><a class="homered" href="eloginwel.php?id=<?php echo $id?>">HOME</a></li>
                <li><a class="homered" href="eloginwelAdd.php?id=<?php echo $id?>">Add Task</a></li>
                <li><a class="homeblack" href="myprofile.php?id=<?php echo $id?>">My Profile</a></li>
                <li><a class="homeblack" href="empproject.php?id=<?php echo $id?>">My Projects</a></li>
                <li><a class="homeblack" href="applyleave.php?id=<?php echo $id?>">Apply Leave</a></li>
                <li><a class="homeblack" href="elogin.html">Log Out</a></li>
            </ul>
        </nav>
    </header>

    <div class="wrapper">
        <div class="task-input">
            <!-- <img src="bars-icon.svg" alt="icon"> -->
            <input type="text" placeholder="Add a new task">
        </div>
        <div class="controls">
            <div class="filters">
                <span class="active" id="all">All</span>
                <span id="pending">Pending</span>
                <span id="completed">Completed</span>
            </div>
            <button class="clear-btn">Clear All</button>
        </div>
        <ul class="task-box"></ul>
    </div>

    <script src="eloginwelAddscript.js"></script>

</body>

</html>