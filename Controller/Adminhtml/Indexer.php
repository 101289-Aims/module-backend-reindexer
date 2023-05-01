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
namespace Aimsinfosoft\BackendReindex\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Framework\Indexer\IndexerRegistry;

/**
 * Class Indexer
 * @package Aimsinfosoft\BackendReindex\Controller\Adminhtml
 */
abstract class Indexer extends Action
{
    /**
     * Authorization level of a basic admin session
     */
    const ADMIN_RESOURCE = 'Aimsinfosoft_BackendReindex::reindex';
    /**
     * @var IndexerRegistry
     */
    protected $indexerRegistry;
    /**
     * Reindex constructor.
     *
     * @param Action\Context $context
     * @param IndexerRegistry $indexerRegistry
     */
    public function __construct(
        Action\Context $context,
        IndexerRegistry $indexerRegistry
    ) {
        $this->indexerRegistry = $indexerRegistry;
        parent::__construct($context);
    }
}
