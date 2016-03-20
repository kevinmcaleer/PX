<?php
/**
 * class_view_service.php
 * 
 * Service Viewer Class
 * 
 * Provides database access to services.
 *
 * @author Kevin McAleer kevin.mcaleer@advicefactory.co.uk
 * @copyright (c) 2016, Advice Factory Ltd
 * @link http://www.servicepoint.online
 * @since Version 1.0
 * @filesource
 *
 */
// -----------------------------------------------------------------------------

include '../resources/config.php';
include_once CLASS_PATH . 'class_service.php';

class class_view_service {

//    public $id;
//    public $name;
//    public $description;
//    public $responsibilities;
//    public $restrictions;
//    public $parent;
//    public $image;
//    public $dateadded;

    public $myservice; // stores the actual service

    public function load($sid) {
        $this->myservice = new Service();
        $this->myservice->load($sid);
    }

    public function show() {
        ?>
        <div class="message">
            <div class="servicedetails">
                <div class="image">
                <?php             
                echo '<img src="' . $this->myservice->image . '" />';
                ?>
                </div>
                <div class="servicename">
                    <?php
                    echo $this->myservice->name;
                    ?>
                </div>
                <div class="description">
                    <?php
                    echo $this->myservice->description;
                    ?>
                </div>
                <div class="date added:">
                    <?php
                    echo 'Date added: ' . date('d M y', strtotime($this->myservice->dateadded));
                    ?>
                </div>
                <div class="related">
                
                </div>
                <div class="responsibilities">
                    <?php
                    echo 'Responsibilities: ' . $this->myservice->responsibilities ;
                    ?>
                </div>
            </div>
        </div>
        <?php
    }

}
