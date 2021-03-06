<?php


namespace Sapiti\Objects\Shop;

use Sapiti\Objects\ApiObject;
use Sapiti\Objects\TUsage;

class Product extends ApiObject
{
	use TUsage;

	protected $orderId='';
	protected $stockId='';
	protected $quantity=1;
	protected $price=null;
	protected $ticket=null;
	protected $category=null;


	static function getFromArray($data = null, ApiObject $existingObject = null)
	{
		/** @var Product $result */
		$result = parent::getFromArray($data, $existingObject);
		if (isset($data['orderid'])) $result->setOrderId($data['orderid']);
		if (isset($data['stockid'])) $result->setStockId($data['stockid']);
		if (isset($data['quantity'])) $result->setQuantity($data['quantity']);

		if (isset($data['category'])) {
			$result->setCategory(ProductCategory::getFromArray($data['category']));
		}
		if (isset($data['price'])) {
			$result->setPrice(Price::getFromArray($data['price']));
		}
		if (isset($data['ticket'])) {
			$result->setTicket(Ticket::getFromArray($data['ticket']));
		}
		if (isset($data['usage'])) {
			if (isset($data['usage']['statusid'])) $result->setUsageId($data['usage']['statusid']);
			if (isset($data['usage']['by'])) $result->setUsageLabel($data['usage']['by']);
			if (isset($data['usage']['date'])) $result->setUsageDate($data['usage']['date']);
		}


		return $result;
	}

	/**
	 * @return string
	 */
	public function getOrderId(): string
	{
		return $this->orderId;
	}

	/**
	 * @param string $orderId
	 */
	public function setOrderId(string $orderId): void
	{
		$this->orderId = $orderId;
	}

	/**
	 * @return string
	 */
	public function getStockId(): string
	{
		return $this->stockId;
	}

	/**
	 * @param string $stockId
	 */
	public function setStockId(string $stockId): void
	{
		$this->stockId = $stockId;
	}

	/**
	 * @return int
	 */
	public function getQuantity(): int
	{
		return $this->quantity;
	}

	/**
	 * @param int $quantity
	 */
	public function setQuantity(int $quantity): void
	{
		$this->quantity = $quantity;
	}

	/**
	 * @return null|Price
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * @param null $price
	 */
	public function setPrice($price): void
	{
		$this->price = $price;
	}

	/**
	 * @return null|Ticket
	 */
	public function getTicket()
	{
		return $this->ticket;
	}

	/**
	 * @param null $ticket
	 */
	public function setTicket($ticket): void
	{
		$this->ticket = $ticket;
	}

	/**
	 * @return null|ProductCategory
	 */
	public function getCategory()
	{
		return $this->category;
	}

	/**
	 * @param null $category
	 */
	public function setCategory($category): void
	{
		$this->category = $category;
	}








}