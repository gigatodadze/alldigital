<?php
/**
* Copyright © 2015 tokitheme.com. All rights reserved.

* @author Blue Sky Team <contact@tokitheme.com>
*/

namespace Rokanthemes\Testimonial\Model\ResourceModel\Testimo;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {
	/**
	 * store view id
	 * @var int
	 */
	protected $_storeViewId = null;

	/**
	 * @var \Magento\Store\Model\StoreManagerInterface
	 */
	protected $_storeManager;

	protected $_addedTable = [];

	protected function _construct() {
		$this->_init('Rokanthemes\Testimonial\Model\Testimo', 'Rokanthemes\Testimonial\Model\ResourceModel\Testimo');
	}

	public function __construct(
		\Magento\Framework\Data\Collection\EntityFactoryInterface $entityFactory,
		\Psr\Log\LoggerInterface $logger,
		\Magento\Framework\Data\Collection\Db\FetchStrategyInterface $fetchStrategy,
		\Magento\Framework\Event\ManagerInterface $eventManager,
		\Magento\Store\Model\StoreManagerInterface $storeManager,
		$connection = null
	) {
		parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $connection);
		$this->_storeManager = $storeManager;

		if ($storeViewId = $this->_storeManager->getStore()->getId()) {
			$this->_storeViewId = $storeViewId;
		}
	}

	/**
	 * get store view id
	 * @return int [description]
	 */
	public function getStoreViewId() {
		return $this->_storeViewId;
	}

	/**
	 * set store view id
	 * @param int $storeViewId [description]
	 */
	public function setStoreViewId($storeViewId) {
		$this->_storeViewId = $storeViewId;
		return $this;
	}

	/**
	 * Multi store view
	 * @param string|array $field
	 * @param null|string|array $condition
	 */
	public function addFieldToFilter($field, $condition = null) {
		$attributes = array(
			'name',
			'status',
			'click_url',
			'image_alt',
			'store_id',
		);
		$storeViewId = $this->getStoreViewId();
		if (in_array($field, $attributes) && $storeViewId) {
			if (!in_array($field, $this->_addedTable)) {
				$this->getSelect();
				$this->_addedTable[] = $field;
			}
			// return parent::addFieldToFilter("IF($field.value IS NULL, main_table.$field, $field.value)", $condition);
			return parent::addFieldToFilter($field, $condition);
		}
		if ($field == 'store_id') {
			$field = 'main_table.testimo_id';
		}
		return parent::addFieldToFilter($field, $condition);
	}

	/**
	 * Multi store view
	 */
	protected function _afterLoad() {
		parent::_afterLoad();
		if ($storeViewId = $this->getStoreViewId()) {
			foreach ($this->_items as $item) {
				$item->setStoreViewId($storeViewId)->getStoreViewValue();
			}
		}
		return $this;
	}
	
	/**
     * set order random by testimo id
     *
     * @return $this
     */
    public function setOrderByTestimo()
    {
        $this->getSelect()->order('order');

        return $this;
    }
}
