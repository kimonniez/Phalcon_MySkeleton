<?php 
//render file with params
use Phalcon\Mvc\View;

$table = $this->view->getRender('partial', 'table', array('infoByDays' => $infoByDays, 'totalWin' => $totalWin[0]['win'], 'able' => $able), function($view){
    $view->setRenderLevel(View::LEVEL_ACTION_VIEW);
});

die($table);


//transaction 
use Phalcon\Mvc\Model\Transaction\Manager as TransactionManager;

try {
    $transactionManager = new TransactionManager();

    $transaction = $transactionManager->get();
//model 1
    $wallet->setTransaction($transaction);
    $wallet->setBonus($wallet->getBonus() + $cashbackSum);
    if($wallet->save() == false){
        $transaction->rollback('Can\'t save wallet');
    }
//model 2
    $cashbackLogRecord->setTransaction($transaction);
    $cashbackLogRecord->setDttm(date('Y-m-d H:i:s', time()));
    $cashbackLogRecord->setWalletId($walletId);
    $cashbackLogRecord->setSum($cashbackSum);
    if($cashbackLogRecord->save() == false){
        $transaction->rollback('Can\'t save cashbackLogRecord');
    }
    $transaction->commit();

} catch(Phalcon\Mvc\Model\Transaction\Failed $e){
    $errors[] = $e->getMessage();
    die(print_r($errors));
}



//save image and preview
public function saveCatImageAction(){
		$baseLocation = realpath(dirname(__FILE__).'/../../public/uploads/images/').'/';
		$folder = 'categories/';
		$dirname = $baseLocation.$folder;
		if (!file_exists($dirname)) {
		    mkdir($dirname, 0777);
		}
    	$request = $this->request;
    	if ($request->isPost()){
    		
    		$id = $request->getPost('catId');

    		

    		if ($this->request->hasFiles() == true) {
    			foreach ($this->request->getUploadedFiles() as $file) {

    				$ext = $this->helpmer->getExtensionFromMime($file->getType());
    				
    				$newFileName = md5(uniqid(rand(), true)).$ext;

    				$newFileNameUri = $baseLocation . $folder . $newFileName;

    				if($file->moveTo($newFileNameUri)){
    					
    					$previewName = md5($newFileName).$ext;
    					$previewFilenameUri = $baseLocation . $folder . $previewName;

    					$previewFile = new Phalcon\Image\Adapter\Imagick($newFileNameUri);

						$previewFile->resize(45, 45)->crop(40,40);
						$previewFile->save($previewFilenameUri);

    					$image = new Images();
    					$preview = new Images();

    					$image->setNewName($newFileName);
    					$image->setOldName($file->getName());
    					$image->setFolder($folder);
    					$image->setDttmAdd(date('Y-m-d H:i:s', time()));

    					$preview->setNewName($previewName);
    					$preview->setOldName($file->getName());
    					$preview->setFolder($folder);
    					$preview->setDttmAdd(date('Y-m-d H:i:s', time()));

    					if($image->save() and $preview->save()) {
    						$category = Categories::findFirst($id);

    						$category->setPreviewId($preview->getId());
                            $category->setImageId($image->getId());

    						$category->save();
    					}

    					die(json_encode(array('success' => true)));
    				}
    				
    			}
    		}
    	}
	}


 ?>