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
    <title>Edit</title>
</head>
<body>

<div class="wrapper ">

    <?php include './app/Views/nav.view.php'; ?>

    <div class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:">Bearbeiten</a>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header card-chart card-header-warning card-header-width">
                        <div class="ct-chart" id="dailySalesChart">
                            <a class="fa fa-pencil fa-lg" aria-hidden="true"></a>
                        </div>
                    </div>
                    <div class="card-body list-block">
                        <form action="update" method="POST" id="createForm">
                            <input type="hidden" name="id" value="<?= $loan->id?>" >
                            <div class="form-group">
                                <label for="prename">Vorname</label>
                                <input value="<?= $OldValues['prename'] ?? htmlspecialchars($loan->prename) ?>" type="text" class="form-control" id="prename" name="prename" placeholder="Max">
                                <div class="text-danger" id="error-prename"><?= $Errors['prename'] ?? ''?></div>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Name</label>
                                <input value="<?= htmlspecialchars($OldValues['lastname'] ?? $loan->lastname) ?>" type="text" class="form-control" id="lastname" name="lastname" placeholder="Muster">
                                <div class="text-danger" id="error-lastname"><?= $Errors['lastname'] ?? ''?></div>
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input value="<?= htmlspecialchars($OldValues['email'] ?? $loan->email) ?>" type="text" class="form-control" id="email" name="email" placeholder="name@example.com">
                                <div class="text-danger" id="error-email"><?= $Errors['email'] ?? ''?></div>
                            </div>
                            <div class="form-group">
                                <label for="tel">Telefonnummer</label>
                                <input value="<?= htmlspecialchars($loan->phone) ?>" type="text" class="form-control" id="tel" name="tel" placeholder="+41 xx xxx xx xx">
                                <div class="text-danger" id="error-tel"><?= $Errors['tel'] ?? ''?></div>
                            </div>
                            <div class="form-group">
                                <label for="package">Packet</label>
                                <select class="form-control selectpicker" data-style="btn btn-link" id="package" name="package">
                                    <option value="<?= $loan->getPackage()->id ?>" hidden><?= htmlspecialchars($loan->getPackage()->name) ?></option>
                                    <?php
                                    foreach ($CreditPackages as $CreditPackage){
                                        ?>
                                        <option value="<?= $CreditPackage->id ?>"><?= $CreditPackage->name; ?> </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="checked" name="state" id="state">
                                        Zur??ckbezahlt
                                        <span class="form-check-sign">
                                          <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="text-danger" id="error-package"><?= $Errors['package'] ?? ''?></div>
                            </div>

                            <button type="submit" class="btn btn-primary">Speichern</button>

                            <a href="./list" class="btn btn-danger">Abbrechen</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>