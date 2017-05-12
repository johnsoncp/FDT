<?php
session_name("FDT");
session_start();

if ($_POST) {
    switch ($_POST["nextPage"]) {
        case 'Login':
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["que"] = [];
            break;
        case 'Logout':
            session_destroy();
            exit();
            break;
        case 'Submit':
            array_push($_SESSION["que"], $_POST["title"] ."  " . $_POST["firstname"] . "  " . $_POST["lastname"] . "  ".  date("H:i"));    
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Firmstep Queuing System
        </title>
    <h1>
        Firmstep Queuing System <?php echo "- logged in as " . $_SESSION['username']; ?>
    </h1>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>
<body>
    <form method="post"
          <div id="main">
            <div id="customer">
                <h2>
                    New Customer
                </h2>
                <input type="radio" name="service" value="0"> Housing<br>
                <input type="radio" name="service" value="1"> Benefits<br>
                <input type="radio" name="service" value="2"> Council Tax<br>
                <input type="radio" name="service" value="3"> Fly-tipping<br>
                <input type="radio" name="service" value="4"> Missed Bin<br>
                <input class="menu_btn" type="submit" value="Citizen" name="nextPage">
                <input class="menu_btn" type="submit" value="Organisation" name="nextPage">
                <input class="menu_btn" type="submit" value="Anonymous" name="nextPage">
                <br>
                <p>
                    Title
                </p>
                <select name="title">
                    <option value="mr">Mr</option>
                    <option value="mrs">Mrs</option>
                    <option value="miss">Miss</option>
                    <option value="dr">Dr</option>
                    <option value="other">Other</option>
                </select>
                <p>
                    First Name
                </p>
                <input name="firstname" required>
                <p>
                    Last Name
                </p>
                <input name="lastname" required>
                <input type="submit" value="Submit" name="nextPage"/>
            </div>
            <div id="queue">
                <h2>
                    Queue
                </h2>
                <p>
                    List of the customers being queued <br><br>
                    # Type Name Service Queued At<br><br>
                    <?php
                    foreach($_SESSION["que"] as $que => $que_value) {
                        echo $que . "  " . $que_value;
                        echo "<br>";
                    }
                    ?>
                </p>                
            </div>
        </div>
    </form>
</body>
</html>

