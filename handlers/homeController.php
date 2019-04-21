<?php
    /**
     * controls back end logic to how this route should be rendered
     */
    class homeController{

        public function home($f3){
            //load all products where dateDeleted is set to null
            //creates and runs the following query in the background
            //SELECT * FROM pr01_products WHERE dateDeleted IS NULL;
            $products = new Product([
                "dateDeleted IS NULL"
            ]);//end load product

            print_r($products->getObjectList());

            echo Template::instance()->render('/templates/global/header.php');
            echo Template::instance()->render('/templates/homeController/home.php');
            echo Template::instance()->render('/templates/global/footer.php');
        }//end home functions
    }//end homeController
?>