<?php
namespace Flowpack\EmberAdapter\Example\Domain\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;
use Flowpack\EmberAdapter\Annotations as Ember;

/**
 * A simple product. It has a category as well as tags and a few other properties.
 *
 * @Flow\Entity
 * @Ember\Model
 */
class Product {

	/**
	 * @var string
	 * @Ember\Attribute
	 */
	protected $name;

	/**
	 * @var Category
	 * @ORM\ManyToOne
	 * @Ember\Attribute("productCategory")
	 * @Ember\BelongsTo(model="Category", sideload=true)
	 */
	protected $category;

	/**
	 * @var \DateTime
	 * @Ember\Attribute(type="date")
	 */
	protected $createdOn;

	/**
	 * @Flow\Transient
	 * @var \DateTime
	 * @Ember\Attribute(type="date")
	 */
	protected $loadedAt;

	/**
	 * @var int
	 * @Ember\Attribute(type="number")
	 */
	protected $inStock = 0;

	/**
	 * @var float
	 * @Ember\Attribute(name="netSalesPrice", type="number", options={"format" = "float"})
	 */
	protected $price = 0.0;

	/**
	 * @var float
	 */
	protected $internalPrice = 0.0;

	/**
	 * @var \Doctrine\Common\Collections\Collection<\Flowpack\EmberAdapter\Example\Domain\Model\Tag>
	 * @ORM\ManyToMany
	 * @Ember\Attribute
	 * @Ember\HasMany(model="Tag", sideload=true)
	 */
	protected $tags;

	public function __construct() {
		$this->createdOn = new \DateTime();
		$this->tags = new ArrayCollection();
	}

	protected function initializeObject() {
		$this->loadedAt = new \DateTime();
	}

	/**
	 * @param \Flowpack\EmberAdapter\Example\Domain\Model\Category $category
	 */
	public function setCategory($category) {
		$this->category = $category;
	}

	/**
	 * @return \Flowpack\EmberAdapter\Example\Domain\Model\Category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * @return \DateTime
	 */
	public function getCreatedOn() {
		return $this->createdOn;
	}

	/**
	 * @return \DateTime
	 */
	public function getLoadedAt() {
		return $this->loadedAt;
	}

	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param \Doctrine\Common\Collections\Collection $tags
	 */
	public function setTags($tags) {
		$this->tags = $tags;
	}

	/**
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getTags() {
		return $this->tags;
	}

	/**
	 * @param float $internalPrice
	 */
	public function setInternalPrice($internalPrice) {
		$this->internalPrice = $internalPrice;
	}

	/**
	 * @return float
	 */
	public function getInternalPrice() {
		return $this->internalPrice;
	}

	/**
	 * @param float $price
	 */
	public function setPrice($price) {
		$this->price = $price;
	}

	/**
	 * @return float
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * @param int $inStock
	 */
	public function setInStock($inStock) {
		$this->inStock = $inStock;
	}

	/**
	 * @return int
	 */
	public function getInStock() {
		return $this->inStock;
	}

}