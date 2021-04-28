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
    <title>Document</title>
</head>
<body>
    <div class="wrapper ">
        <?php include './app/Views/nav.view.php'; ?>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <form action="">
                        <div class="form-group">
                            <label for="prename">Vorname</label>
                            <input type="text" class="form-control" id="prename" name="prename" placeholder="Max" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Muster" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                        </div>
                        <div class="form-group">
                            <label for="tel">Telefonnummer</label>
                            <input type="tel" class="form-control" id="tel" name="tel" placeholder="+41 xx xxx xx xx">
                        </div>
                        <div class="form-group">
                            <label for="rate">Anzahl Raten</label>
                            <input type="Number" class="form-control" id="rate" name="rate" placeholder="Number of Rates" required>
                        </div>
                        <div class="form-group">
                            <label for="package">Example select</label>
                            <select class="form-control selectpicker" data-style="btn btn-link" id="package" name="package" required>
                                <option>Test 1</option>
                                <option>Test 2</option>
                                <option>Test 3</option>
                                <option>Test 4</option>
                                <option>Test5</option>
                            </select>
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
