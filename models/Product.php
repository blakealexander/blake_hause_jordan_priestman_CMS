<?php
   /**
    * Defines a Product Model object
    * Directly references the db table defined below
    */
    class Product extends Model
    {
        const TABLE = 'pr01_products';

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