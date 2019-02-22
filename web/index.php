<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="jquery-3.3.1.min.js"></script>
    <script src="myscript.js"></script>
    <link rel="stylesheet" type="text/css" href="file-upload.css" />
    <script src="file-upload.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.file-upload').file_upload();
        });
    </script>


    <title>Smart Business Analyst</title>
</head>

<body class="container-fluid">
    <section>
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

    </section>

    <!--Introduction-->
    <section class="intro">
        <div class="row">
            <div class="col">
                <p>
                    This is a Business Analyst Application. It is created to calculate the profit of your business. <br>
                    <a href="template.csv" download="sales.csv">
                        <i class="material-icons">cloud_download</i> Download
                    </a> the template CSV file and add the monthly sales and the cost of goods sold to the file. <br>
                </p>
            </div>

        </div>

    </section>

    <!--Form-->
    <section>
        <form action="display.php" method="post" enctype="multipart/form-data" class="main-form" >
            <!--Business Information-->
            <h3>Business Information</h3>
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="material-icons">
                            business
                        </i>
                    </span>
                </div>
                <input type="text" class="form-control" placeholder="Company name" name="name">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="material-icons">
                            place
                        </i>
                    </span>
                </div>
                <input type="text" class="form-control" placeholder="Branch" name="branch">
            </div>

            <!--Business Type-->
            <div class="dropdown show">
                <select name="business-type" id="business-type" class="btn btn-info dropdown-toggle">
                    <option value="Company">Company</option>
                    <option value="Partnership">Partnership</option>
                    <option value="Corporation">Corporation</option>
                    <option value="SME">SME</option>
                </select>
            </div>

            <!--Opex-->
            <hr>
            <h3>Operating Expense</h3>
            <div class="row">
                <!--Salary-->
                <div class="col">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="material-icons">
                                    money
                                </i>&nbsp;Salary
                            </span>
                        </div>
                        <input type="number" class="form-control" placeholder="Total salary paid" name="salary" min=0
                            value="0">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                Baht/Month
                            </span>
                        </div>
                    </div>
                </div>

                <!--Rental-->
                <div class="col">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="material-icons">
                                    location_city
                                </i>&nbsp;Rental
                            </span>
                        </div>
                        <input type="number" class="form-control" placeholder="Rental Fee" name="rental" min=0
                            value="0">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                Baht/Month
                            </span>
                        </div>
                    </div>
                </div>

                <!--Logistic Cost-->
                <div class="col">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="material-icons">
                                    local_shipping
                                </i>&nbsp;Logistic
                            </span>
                        </div>
                        <input type="number" class="form-control" placeholder="Logistic Cost" name="logistic" min=0
                            value="0">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                Baht/Month
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <!--Marketing-->
                <div class="col">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="material-icons">
                                    group_add
                                </i>&nbsp;Marketing
                            </span>
                        </div>
                        <input type="number" class="form-control" placeholder="Marketing Cost" name="marketing" min=0
                            value="0">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                Baht/Month
                            </span>
                        </div>
                    </div>
                </div>

                <!--Maintenance-->
                <div class="col">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="material-icons">
                                    build
                                </i>&nbsp;Maintenance
                            </span>
                        </div>
                        <input type="number" class="form-control" placeholder="Tools maintenance cost this year"
                            name="maintenance" min=0 value="0">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                Baht/Year
                            </span>
                        </div>
                    </div>
                </div>

                <!--Other-->
                <div class="col">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="material-icons">
                                    attach_money
                                </i>&nbsp;Other Cost/Fee
                            </span>
                        </div>
                        <input type="number" class="form-control" placeholder="Other Cost" name="other" min=0 value="0">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                Baht/Year
                            </span>
                        </div>
                    </div>
                </div>

            </div>

            <!--Sales Data Selector-->
            <hr>
            <h3>Sales Data</h3>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <label class="file-upload btn btn-primary" for="fileToUpload">
                            Add Monthly Sales Data.. <input id="fileToUpload" name="fileToUpload" type="file">
                        </label>
                    </div>
                </div>
            </div>
            <!--Submit Button-->
            <input type="submit" value="Submit" class="btn btn-success">

        </form>
    </section>




</body>

</html>