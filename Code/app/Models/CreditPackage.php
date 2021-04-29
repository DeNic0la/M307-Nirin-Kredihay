<?php
class CreditPackage
{
    private static string $tableName = 'creditpackages';//Need to know wich table to Connect to
    protected PDO $pdo;
    protected static array $StagedPackages = array();
    protected $_data = array(
        'id' => '',
        'name' => '',
    );

    public function __get($name) {
        if (isset($this->_data[$name])) {
            return $this->_data[$name];
        } else {
            return null;
        }
    }



    private function __construct( int $id, string $name)
    {
        $this->pdo = db();
        $this->name = $name;
        $this->id = $id;
    }

    public static function getAll(){
        $statement = db()->prepare('SELECT * FROM '.CreditPackage::$tableName);
        $statement->execute();
        $results = $statement->fetchAll();
        if ( ! $results) {
            return null;
        }
        $ToReturn = array();
        foreach($results as $result){
            $ToReturn[$result['id']] = new self($result['id'], $result['name']);
        }
        return $ToReturn;

    }

    public static function getById(int $id): ?self  {

        $statement = db()->prepare('SELECT * FROM '.CreditPackage::$tableName.' WHERE id = :id LIMIT 1');
        $statement->bindParam(':id', $id);
        $statement->execute();

        $result = $statement->fetch();
        if ( ! $result) {
            return null;
        }
        return new self($result['id'], $result['name']);
    }
}