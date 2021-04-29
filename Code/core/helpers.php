<?php
/**
 * Nutze diese Funktion um einfach eine Ausgabe
 * mit htmlspecialchars() zu erstellen.
 */
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
}

function abort(int $code){
    http_response_code($code);
    require 'app/Views/404.view.php';
    die();
}

/**
 * Nutze diese Funktion um auf einen POST-Wert
 * zuzugreifen.
 */
function post(string $key, $default = '')
{
    return $_POST[$key] ?? $default;
}

/**
 * Stellt eine Verbindung zur Datenbank her und gibt die
 * Datenbankverbindung als PDO zurück.
 */
$dbInstance = null;
function db(): PDO
{
    global $dbInstance;

    if ($dbInstance) {
        return $dbInstance;
    }

    require 'Config/dbInfo.php'; // Get The DB Variables from This File

    try {
        $dbInstance = new PDO('mysql:host=localhost;dbname=' . $DataBaseConfig['name'], $DataBaseConfig['username'], $DataBaseConfig['password'], [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ]);
        return $dbInstance;
    } catch (PDOException $e) {
        die('Keine Verbindung zur Datenbank möglich: ' . $e->getMessage());
    }
}

function validateRequest(array $Superglobal,array $fields):array{
    $Validated = [];
    $Errors = [];
    $FormularFields = [];
    $HasErrors = false;
    foreach ($fields as $field=>$rules){
        $validationRules = explode("|",$rules);
        $value = trim($Superglobal[$field] ?? '');
        $FormularFields[$field] = $value;
        foreach ($validationRules as $rule){
            $ruleArray = explode(":",$rule);
            switch($ruleArray[0]){
                case "required":
                    if ($value === ''){
                        $HasErrors = true;
                        $Errors[$field] = 'Dieses Feld ist Erforderlich';
                        continue 3;
                    }
                    break;
                case "integer":
                    if ($value !== '' && !ctype_digit($value)){
                        $HasErrors = true;
                        $Errors[$field] = 'Bitte Geben sie eine Gültige Zahl ein';
                        continue 3;
                    }
                    if (isset($ruleArray[1])){//Min
                        if ($value < $ruleArray[1]){
                            $HasErrors = true;
                            $Errors[$field] = 'Die eingegebene Zahl ist zu klein';
                            continue 3;
                        }
                    }
                    if (isset($ruleArray[2])){//Max
                        if ($value > $ruleArray[2]){
                            $HasErrors = true;
                            $Errors[$field] = 'Die eingegebene Zahl ist zu gross';
                            continue 3;
                        }
                    }
                    elseif ($value !== ''){
                        $value = intval($value);
                    }
                    break;
                case "email":
                    if ($value !== '' && !preg_match("/[^@]+@[^.]/i" ,$value)){
                        $HasErrors = true;
                        $Errors[$field] = 'Geben sie eine Gültige E-Mail adresse ein';
                        continue 3;
                    }
                    break;
                case "regex":
                    if ($value !== '' && !preg_match($ruleArray[1],$value)){
                        $HasErrors = true;
                        $Errors[$field] = 'Dieses Feld ist Ungültig';
                        continue 3;
                    }
                    break;
                case "phone":
                    if ($value !== '' && !preg_match("/[0-9+() -]*/",$value)){
                        $HasErrors = true;
                        $Errors[$field] = 'Keine Gültige Telefon nummer';
                        continue 3;
                    }
                    break;
                case "NoNumber":
                    if ($value !== '' && preg_match("/\d/i" ,$value)){
                        $HasErrors = true;
                        $Errors[$field] = 'Hier sind keine Nummern erlaubt';
                        continue 3;
                    }
                    break;

            }
        }
        $Validated[$field] = $value;
    }
    return array(
        'hasErrors' => $HasErrors,
        'Validated' => $Validated,
        'Errors' => $Errors,
        'Fields' => $FormularFields,
    );
}
