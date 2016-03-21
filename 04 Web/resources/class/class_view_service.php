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
include_once CLASS_PATH . 'class_card.php';

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

        <div class="servicedetails">
            <div class="image">
                <?php
                echo '<img src="' . $this->myservice->image . '" />';
                ?>
            </div>
            <div class="servicename">
                <h1>
                    <?php
                    echo $this->myservice->name;
                    ?>
                </h1>
            </div>
            <div class="description tile">
                <?php
                echo $this->myservice->description;
                ?>
            </div>
            <div class="dateadded tile">
                <?php
                echo 'Date added: ' . date('d M y', strtotime($this->myservice->dateadded));
                ?>
            </div>
            <div class="responsibilities tile">
                <?php
                echo 'Responsibilities: ' . $this->myservice->responsibilities;
                ?>
            </div>
            <div class="restrictions tile">
                <?php
                echo 'Restrictions: ' . $this->myservice->restrictions;
                ?>
            </div>
            <div class="related tile">
                <div class="cards">
                    
                <?php
                echo 'Related Services: ';

                // check if this is a top level node or a child
                if ($this->myservice->parent != '') {
                    $myParent = new Service();
                    $myParent->load($this->myservice->parent);
                    //echo '<p>Parent: <a href="javascript:loadservice(' . $myParent->id . ')">' . $myParent->name;
                    echo '<p>Parent: ';
                    $mycard = new card;
                    $mycard->load($myParent->id);
                    $mycard->show();
                    echo '</p>';
                }
                ?>
                <form action="servicedetails.php" method="POST" name="serviceform">
                    <input type="hidden" name="serviceid" />
                </form>
                <p>
                    <?php
                    $children = $this->myservice->getChildren();

                    $first = TRUE;
                    while ($childrow = $children->fetch(PDO::FETCH_ASSOC)) {
                        if ($first == TRUE) {
                            $first = FALSE;
                        } else {
                            echo " | ";
                        }
                        $mycard = new Card;
                        $mycard->load($childrow['id']);
                        $mycard->show();
//                        echo '<a href="javascript:loadservice(' . $childrow['id'] . ')">';
//                        echo $childrow['name'];
//                        echo '</a>';
                    }
                    ?></p>
                </div>
            </div>
            
        </div>

        <?php
    }

}
