<?php
/**
* Aimsinfosoft
*
* NOTICE OF LICENSE
*
* This source file is subject to the Aimsinfosoft.com license that is
* available through the world-wide-web at this URL:
* https://www.aimsinfosoft.com/LICENSE.txt
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade this extension to newer
* version in the future.
*
* @category    Aimsinfosoft
* @package     Aimsinfosoft_BackendReindex
* @copyright   Copyright (c) Aimsinfosoft (https://www.aimsinfosoft.com/)
* @license     https://www.aimsinfosoft.com/LICENSE.txt
*/
namespace Aimsinfosoft\BackendReindex\Controller\Adminhtml\Indexer;

use Exception;
use Magento\Framework\Exception\LocalizedException;
use Aimsinfosoft\BackendReindex\Controller\Adminhtml\Indexer;

/**
 * Class Reindex
 * @package Magento\Indexer\Controller\Adminhtml\Indexe
 */
class Reindex extends Indexer
{
    /**
    * Display processes grid action
    *
    * @return void
    */
    public function execute()
    {
        $indexerId = $this->getRequest()->getParam('id');
        $indexer = $this->indexerRegistry->get($indexerId);
        if ($indexer && $indexer->getId()) {
            try {
                $indexer->reindexAll();
                $this->messageManager->addSuccessMessage(__('%1 index was rebuilt.', $indexer->getTitle()));
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('There was a problem with reindexing process.'));
            }
        } else {
            $this->messageManager->addErrorMessage(__('Cannot initialize the indexer process.'));
        }
        $this->_redirect('indexer/indexer/list');
    }
}
