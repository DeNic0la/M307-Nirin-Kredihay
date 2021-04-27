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
    //Include 404 //(404 Page Displaying)
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
    global $DataBaseConfig;

    try {
        $dbInstance = new PDO('mysql:host=127.0.0.1;dbname=' . $DataBaseConfig['name'], $DataBaseConfig['username'], $DataBaseConfig['password'], [
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
        $value = $Superglobal[$field] ?? '';
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
                    elseif ($value !== ''){
                        $value = intval($value);
                    }
                    break;
                case "email":
                    if ($value !== '' && !preg_match("/[^@]+@[^.]+\..+$/i" ,$value)){
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
                    if ($value !== '' && !preg_match("/(\b(0041|0)|\B\+41)(\s?\(0\))?(\s)?[1-9]{2}(\s)?[0-9]{3}(\s)?[0-9]{2}(\s)?[0-9]{2}\b/",$value)){
                        $HasErrors = true;
                        $Errors[$field] = 'Keine Gültige Telefon nummer';
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
