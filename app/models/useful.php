<?php 
//Use namespaces
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;
use Phalcon\Mvc\Model\Validator\Uniqueness as UniquenessValidator;



//Validate some fields
public function validation() {
        $this->validate(new EmailValidator(array(
            'field' => 'mail'
        )));
        $this->validate(new UniquenessValidator(array(
            'field' => 'mail',
            'message' => 'Sorry, The email was registered by another user'
        )));        
        if ($this->validationHasFailed() == true) {
            return false;
        }
    }


//Get relations with another tables
public function initialize(){
    	$this->belongsTo('lot_id', 'Lots', 'id', array(
    												'alias' => 'lot',
    												'reusable' => true
    											));
        $this->belongsTo('user_id', 'Users', 'id', array(
                                                    'alias' => 'user',
                                                    'reusable' => true
                                                ));
    }


//Get rows count
public function getCustomersCountByLotId($lotId){
        $phql = 'SELECT COUNT(DISTINCT user_id) AS ccount FROM Talons WHERE lot_id = ' . (int) $lotId;
        
        $rows = $this->getModelsManager()->executeQuery($phql);

        foreach ($rows as $row) {
            return $row->ccount;
        }
    }


//raw query 
 public function functionName(){
        $di = \Phalcon\DI\FactoryDefault::getDefault();
        $connection = $di->getShared('db');
        $connection->connect();

        $query = $connection->query(
            "SELECT * FROM table_name "
            );
        $query->setFetchMode(Phalcon\Db::FETCH_ASSOC);
        $query = $query->fetchAll();

        return $query;
    }

//pagination
public function getFeedbacksByPage($page = 1){
    $builder = $this->getModelsManager()->createBuilder()
                ->columns('*')
                ->from('Feedback')
                ->orderBy('id desc');

    $paginator = new Phalcon\Paginator\Adapter\QueryBuilder(array(
            "builder" => $builder,
            "limit" => 25,
            "page" => $page
        ));
    //die(print_r($page.'d'));
    //die(print_r($paginator->getPaginate()));

    //all items
    $itemsForPage = $paginator->getPaginate()->items;

    /*
    <?php  $this->partial('partial/paginator', 
        array(
            'current' => $pagi->current,
            'before' => $pagi->before,
            'next' => $pagi->next,
            'last' => $pagi->last,
            'totalPages' => $pagi->total_pages,
            'totalItems' => $pagi->total_items,
            'url' => $this->router->getRewriteUri()
            )
        );
    ?>

    /*
    <div class="paginator" style="min-height: 600px;">
        <div class="pagiButton pagiLeft"><a href="<?php echo $url;?>?p=<?php echo $before;?>" <?php if ($before == $current) { echo 'class="disabled"'; } else { echo '' ; } ?>></a></div>
        <div class="pagiIndex">
            <?php for($i = 1; $i <= $totalPages; $i++){?>
                <?php if ($i == $current) { ?>
                    <a class="pagiActive disabled" href="<?php echo $url;?>?p=<?php echo $i?>"><?php echo $i?></a>
                <?php } else {?>
                    <a href="<?php echo $url;?>?p=<?php echo $i?>"><?php echo $i?></a>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="pagiButton pagiRight"><a href="<?php echo $url;?>?p=<?php echo $next;?>" <?php if ($next == $current) { echo 'class="disabled"'; } else { echo '' ; } ?>></a></div>
    </div>

    */

    */
    return $paginator;
}
