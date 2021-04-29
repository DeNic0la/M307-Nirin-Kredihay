<?php
class Loan
{
    private static string $tableName = 'loans';//Need to know wich table to Connect to
    protected CreditPackage $creditPackage;
    /**
     * @var array|string[]
     */
    protected array $readOnly = ['id','startdate'];// This Values cannot be written
    protected PDO $pdo;
    protected $_data = array(
        'id' => '',
        'prename' => '',
        'lastname' => '',
        'email' => '',
        'phone' => '',
        'rate' => '',
        'paidback' => '',
        'startdate' => '',
        'creditPackageId' => ''
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
            switch($name) {
                case 'paidback':
                    $this->_data['paidback'] = is_bool($value) ? $value : $this->_data['paidback'];
                    break;
                case 'rate':
                    $this->_data['rate'] = is_int($value) ? $value : $this->_data['rate'];
                    break;
                case 'creditPackageId':
                    $this->_data['creditPackageId'] = is_int($value) ? $value : $this->_data['creditPackageId'];
                    break;
                default:
                    $this->_data[$name] = $value;
                    break;
            }
        }
    }


    public function __construct(string $prename, string $lastname, string $email, int $rate, int $creditPackageId )
    {
        $this->pdo = db();
        $this->prename = $prename;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->rate = $rate;
        $this->paidback = false;
        $this->creditPackageId = $creditPackageId;
    }

    public static function getAll(){
        $statement = db()->prepare('SELECT * FROM '.Loan::$tableName.' WHERE paidback = false'); // Join on Package
        $statement->execute();
        $results = $statement->fetchAll();
        if ( ! $results) {
            return null;
        }

        $CreditPackages = CreditPackage::getAll();
        $ToReturn = array();
        foreach($results as $result){
            array_push($ToReturn,Loan::makeSelfFromResult($result, $CreditPackages[$result['fk_creditpackages_id']]));
        }
        return $ToReturn;

    }

    public function getPackage(){ // This Returns the Package to wich this Model has a Relation with, since the Id is nor Very Informing
        if (isset($this->creditPackage)){
            return $this->creditPackage;
        }
        return CreditPackage::getById($this->creditPackageId ?? 0);
    }

    public static function getById(int $id): ?self
    {
        $statement = db()->prepare('SELECT * FROM '.Loan::$tableName.' WHERE id = :id LIMIT 1');
        $statement->bindParam(':id', $id);
        $statement->execute();

        $result = $statement->fetch();
        if ( ! $result) {
            return null;
        }
        return Loan::makeSelfFromResult($result, CreditPackage::getById($result['fk_creditpackages_id']) );
    }

    private static function makeSelfFromResult(array $result, CreditPackage $package):self{
        $ToReturn = new self($result['prename'], $result['lastname'], $result['email'], $result['rate'], $result['fk_creditpackages_id']);
        $ToReturn->_data['id'] = $result['id'];
        $ToReturn->_data['phone'] = $result['phone'];
        $ToReturn->_data['startdate'] = $result['startdate'];
        $ToReturn->creditPackage = $package;
        return $ToReturn;
    }

    public function save(){
        $Connection = $this->pdo;
        $statement = $Connection->prepare('INSERT INTO '.Loan::$tableName.
            ' (prename, lastname, email, phone, rate, fk_creditpackages_id, paidback) 
            VALUES (:prename, :lastname, :email, :phone, :rate, :fk_creditpackages_id, :paidback)');
        $statement->bindParam(':prename',$this->_data['prename']);
        $statement->bindParam(':lastname',$this->_data['lastname']);
        $statement->bindParam(':email',$this->_data['email']);
        $statement->bindParam(':phone',$this->_data['phone']);
        $statement->bindParam(':rate',$this->_data['rate']);
        $statement->bindParam(':fk_creditpackages_id',$this->_data['creditPackageId']);
        $paidbackState = boolval( $this->_data['paidback']);
        $statement->bindParam(':paidback', $paidbackState );
        $statement->execute();
        $this->_data['id'] = $Connection->lastInsertId();
    }
}