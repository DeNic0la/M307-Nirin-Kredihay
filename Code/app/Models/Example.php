<?php
class Example
{
    private static string $tableName = 'Example';//Need to know wich table to Connect to
    /**
     * @var array|string[]
     */
    protected static array $readOnly = ['id'];// This Values cannot be written
    protected PDO $pdo;
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
    /**
     * @throws Exception
     */
    public function __set($name, $value) {
        if (in_array($name,$this->readOnly)) {
            throw new Exception("not allowed : $name");
        } else {
            $this->_data[$name] = $value;
        }
    }


    public function __construct(string $name)
    {
        $this->pdo = db();
        $this->name = $name;
    }

    public static function getById(int $id): ?self
    {
        $statement = db()->prepare('SELECT * FROM '.Example::$tableName.' WHERE id = :id LIMIT 1');
        $statement->bindParam(':id', $id);
        $statement->execute();

        $result = $statement->fetch();
        if ( ! $result) {
            return null;
        }

        return new self($result['name']);
    }

    public function save(){
        $Connection = db();
        $statement = $Connection->prepare('INSERT INTO '.Example::$tableName.' (name) VALUES (:name)');
        $statement->bindParam(':name',$this->name);
        $statement->execute();
        $this->_data['id'] = $Connection->lastInsertId();
    }
}