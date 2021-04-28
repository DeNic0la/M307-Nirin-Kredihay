<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="./public/css/material-dashboard.css?v=2.1.2" rel="stylesheet"/>
    <link rel="stylesheet" href="./public/css/list.css">
    <title>List</title>
</head>
<body>
<div class="wrapper ">
    <?php include './app/Views/nav.view.php'; ?>
    <div class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:">List</a>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header card-chart card-header-warning card-header-width">
                        <div class="ct-chart" id="dailySalesChart">
                            <a class="fa fa-list-ul fa-lg" aria-hidden="true"></a>
                        </div>
                    </div>
                    <div class="card-body list-block">
                        <ul class="list"">
                            <li class="item">
                                <h4>Max Mustermann</h4>
                                <h4>erin.bachmann@gmx.ch</h4>
                                <h4>+41 76 761 03 99</h4>
                                <h4>1 Rate</h4>
                                <h4>Kredit Plus: 5k</h4>
                                <button type="button" class="btn btn-primary edit">Editieren</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
