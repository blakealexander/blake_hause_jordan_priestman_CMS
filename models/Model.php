<?php
    /**
     * The basic DB sql instance
     */
    class ORM extends \DB\SQL
    {
        const DB_DNS = "mysql:host=localhost;dbname=db_sportchek";//change host and db name to appropriate ip/dbname
        const DB_USER = "root";//username for mysql instance
        const DB_PASS = 'root';//mysql password

        function __construct()
        {
            return parent::__construct(
                self::DB_DNS,
                self::DB_USER,
                self::DB_PASS
            );//end db connection
        }//end constructor
    }//end ORM

    /**
     * Model.php
     * Defines a basic database ORM model
     * Using F3's DB/SQL mapper
     */
     class Model extends \DB\SQL\Mapper
     {
        public static function now(){
            return date('Y-m-d H:i:s');
        }//end CURRENT_TIMESTAMP

        public function __construct($tbl_name = "", $where = "")
        {
            if($tbl_name == "" || $tbl_name == null)
                throw new Exception("Cannot create Model without table name");

            parent::__construct(new ORM(), $tbl_name);

            if($where != "")
                $this->load($where);
        }//end constructor

        /**
         * always Returns a single object containing only the
         * The member variables of the table referenced
         * and the data if anything is loaded
         */
        public function getObject(){
            $obj = [];
            $fields = $this->fields();

            foreach($fields as $field){
                $obj[$field] = $this->$field;

            }//end foreach

            return (object)$obj;
        }//end getObject

        /**
         * return an array of db objects
         * E.G
         * 
         * [
         *      php::dbObj{
         *         field => value1
         *      },
         *      
         *      php::dbObj{
         *          field => value2
         *      }
         * ]
         */
        public function getObjectList(){
            $obj = [];
            $fields = $this->fields();

            while(!$this->dry()){
                $innerObj = [];

                foreach($fields as $field){
                    $innerObj[$field] = $this->$field;
                }//end foreach

                $obj[] = (object)$innerObj;

                $this->next();
            }//end while
            $this->first();

            return $obj;
        }//end getObjectList
    }//end Model
?>