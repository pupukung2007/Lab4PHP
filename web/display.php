<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style2.css">
    <script src="jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="myscript.js"></script>
    <title>Smart Business Analyst</title>
</head>

<body class="container-fluid">
    <header>
        <h2>
            <button class="home-btn">
                <a href="index.html">
                    <i class="material-icons">
                        home
                    </i>
                </a>
            </button>
            Smart Business Analyst
        </h2>
    </header>
    <?php 
            //Set Default Value and Variables
            $name=$_POST["name"];
            $branch=$_POST["branch"];
            if(empty($branch)){
                $branch = "-";
            }
            $type=$_POST["business-type"];
            if(empty($_POST["salary"])){
                $salary = 0;
            }
            else{
                $salary = $_POST["salary"];
            }

            if(empty($_POST["rental"])){
                $rental = 0;
            }
            else{
                $rental = $_POST["rental"];
            }

            if(empty($_POST["logistic"])){
                $logistic = 0;
            }
            else{
                $logistic = $_POST["logistic"];
            }

            if(empty($_POST["marketing"])){
                $marketing = 0;
            }
            else{
                $marketing = $_POST["marketing"];
            }

            if(empty($_POST["maintenance"])){
                $maintenance = 0;
            }
            else{
                $maintenance = $_POST["maintenance"];
            }

            if(empty($_POST["other"])){
                $other = 0;
            }
            else{
                $other = $_POST["other"];
            }
            $net_profit = 0;
    ?>
    <?php
        //Upload File
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if ($fileType != "csv") {
            $uploadOk = 0;
        }else{
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        }    
    ?>
    <section class="analyze">
        <div class="row">
            <div class="col">
                <h2>
                    <?php 
                        if ($uploadOk != 1 || empty($name)){
                            echo "Please fill in the Business Name and Upload the Monthly Sale CSV File before continuing";
                        }
                        else{
                            echo "<i class='material-icons'>
                            account_balance
                            </i>&nbsp;" . $type." Name : " .$name . "<br>". 
                            "<i class='material-icons'>
                            place
                            </i>&nbsp;" ."Branch : " . $branch. "<br>" ;
                            $opex =  ($salary*12)+($rental*12)+($logistic*12)+($marketing*12)+$maintenance+$other;
                            $handle = fopen("$target_file" , "r");
                            $month=0;
                            //Remove Table Head
                            fgetcsv($handle, 1000, ",");
                            //Calculate Each Month Profit
                            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                                if(!is_numeric($data[1])){
                                    $data[1] = 0;
                                }
                                if(!is_numeric($data[2])){
                                    $data[2] = 0;
                                }
                                $profit[$month] = $data[1]-$data[2];
                                $month++;
                            }
                            /*for ($i=0;$i<12;$i++){
                                echo "Profit Month ". $i . " = " .$profit[$i]. "<br>";
                            }*/
                            //Calculate Total Profit
                            $trading_profit=array_sum($profit);
                            echo "<i class='material-icons'>
                            attach_money
                            </i>&nbsp;" ."This Year Trading Profit : " . $trading_profit . "<br>";
                            echo "<i class='material-icons'>
                            money_off
                            </i>&nbsp;"."This Year Total Operating Expense : " . $opex . "<br>";
                            $net_profit = $trading_profit-$opex;
                        }
                    ?>
                </h2>
            </div>
        </div>
    </section>
    <section class="result">
        <div class='row bad-news'>
            <div class='col'>
                <h2>
                <?php
                if ($net_profit<=0 && $uploadOk == 1 && !empty($name)){
                    echo "<i class='material-icons'>
                    sentiment_very_dissatisfied
                    </i> <br>"."Bad News! You don't have any Net Profit this year,"."<br>".
                    "Try reduce your Operating Expenses or increase Trading Profit next year.";
                }
                ?>
                </h2>
                
            </div>
        </div>
        <div class='row good-news'>
            <div class='col'>
                <h2>
                <?php
                if ($net_profit>0 && $uploadOk == 1 && !empty($name)){
                    echo "<i class='material-icons'>
                    sentiment_satisfied_alt
                    </i> <br>". "Good News! This year Net Profit : " . $net_profit . " Baht. <br>".
                    "Keep up the Good work next year!". "<br>";
                }
                ?>
                </h2>
                
            </div>
        </div>
    </section>


    <a href="index.html" class="btn btn-danger">Back</a>
</body>

</html>