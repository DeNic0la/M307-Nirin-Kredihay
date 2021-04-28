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
    <link rel="stylesheet" href="./public/css/home">
    <title>Übersicht</title>
</head>
<body>
<div class="wrapper ">

    <?php include './app/Views/nav.view.php'; ?>

    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header card-chart card-header-warning card-header-width">
                                <div class="ct-chart" id="dailySalesChart">
                                    <i class="fa fa-flag fa-lg"" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Laufende kredite</h4>
                                <p class="card-category"><span class="text-warning"><i class="fa fa-long-arrow-up"></i> 55 </span> Laufende Kredite</p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">access_time</i> updated 4 minutes ago
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header card-chart card-header-success">
                                <div class="ct-chart" id="completedTasksChart">
                                    <i class="fa fa-backward fa-lg" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Abgeschlossene Kredite</h4>
                                <p class="card-category"><span class="text-success"><i class="fa fa-stop"></i> 55 </span> Abgeschlossene Kredite</p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">access_time</i> updated 2 minutes ago
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>