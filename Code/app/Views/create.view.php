<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <link href="./public/css/material-dashboard.css?v=2.1.2" rel="stylesheet"/>
    <link rel="stylesheet" href="./public/css/home">

    <title>Create</title>

</head>
<body>
    <div class="wrapper ">
        <?php include './app/Views/nav.view.php'; ?>
        <div class="main-panel">
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:">Create</a>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <form action="/add" method="POST" >
                        <div class="form-group">
                            <label for="prename">Vorname</label>
                            <input value="<?= $OldValues['prename'] ?? ''?>" type="text" class="form-control" id="prename" name="prename" placeholder="Max">
                            <div><?= $Errors['prename'] ?? ''?></div>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Name</label>
                            <input value="<?= $OldValues['lastname'] ?? ''?>" type="text" class="form-control" id="lastname" name="lastname" placeholder="Muster">
                            <div><?= $Errors['lastname'] ?? ''?></div>
                        </div>
                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input value="<?= $OldValues['email'] ?? ''?>" type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                            <div><?= $Errors['email'] ?? ''?></div>
                        </div>
                        <div class="form-group">
                            <label for="tel">Telefonnummer</label>
                            <input value="<?= $OldValues['tel'] ?? ''?>" type="text" class="form-control" id="tel" name="tel" placeholder="+41 xx xxx xx xx">
                            <div><?= $Errors['tel'] ?? ''?></div>
                        </div>
                        <div class="form-group">
                            <label for="rate">Anzahl Raten</label>
                            <input value="<?= $OldValues['rate'] ?? ''?>" type="Number" class="form-control" id="rate" name="rate" placeholder="Number of Rates">
                            <div><?= $Errors['rate'] ?? ''?></div>
                        </div>
                        <div class="form-group">
                            <label for="package">Packet</label>
                            <select class="form-control selectpicker" data-style="btn btn-link" id="package" name="package">
                                <option hidden>Wählen sie Aus</option>
                                <?php
                                    foreach ($CreditPackages as $CreditPackage){
                                        ?>
                                <option <?= isset($OldValues['package'])&&$OldValues['package']===$CreditPackage->id ? 'selected':'' ?> value="<?= $CreditPackage->id; ?>"><?= $CreditPackage->name; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            <div><?= $Errors['package'] ?? ''?></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Erstellen</button>
                        <a href="./" class="btn btn-danger">Abbrechen</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
