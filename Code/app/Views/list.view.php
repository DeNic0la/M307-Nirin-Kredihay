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
                        <form action="state" method="POST">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>E-Mail</th>
                                <th>Telefon</th>
                                <th>Raten</th>
                                <th>Packet</th>
                                <th>Ablaufdatum</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Bearbeiten</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($loans !== null){
                            foreach($loans as $loan) : ?>
                            <tr>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" id="state <?= $loan->id ?>" name="state <?= $loan->id ?>" value="<?= $loan->id ?>">
                                            <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                        </label>
                                    </div>
                                </td>
                                <td><?= htmlspecialchars($loan->prename) ," ",   htmlspecialchars($loan->lastname)?></td>
                                <td><?= htmlspecialchars($loan->email) ?></td>
                                <td><?= $loan->phone ? htmlspecialchars($loan->phone):'-' ?></td>
                                <td><?= htmlspecialchars($loan->rate), " Raten" ?></td>
                                <td><?= htmlspecialchars($loan->getPackage()->name )?? "" ?></td>
                                <td><?= htmlspecialchars($loan->getExpirationDate()) ?></td>
                                <td class="text-center">
                                    <i class="material-icons"><?= $this->getStatus($loan) ?></i>
                                </td>
                                <td class="td-actions text-center">
                                        <a href="edit?id=<?=$loan->id ?>" rel="tooltip" class="btn btn-primary">
                                            <i class="material-icons">edit</i>
                                        </a>
                                </td>
                            </tr>
                            <?php endforeach;
                            }
                            ?>
                            </tbody>
                        </table>
                            <button type="submit" class="btn btn-primary">Ausgewählte als bezahlt markieren</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
