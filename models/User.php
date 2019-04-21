<?php
   /**
    * Defines a User Model object
    * Directly references the db table defined below
    */
    class User extends Model
    {
        const TABLE = 'us01_users';

        public function __construct($where = "")
        {
            parent::__construct(self::TABLE, $where);
        }//end constructor

        /**
         * Returns an object containing only the 
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
    }//end userModel
?>