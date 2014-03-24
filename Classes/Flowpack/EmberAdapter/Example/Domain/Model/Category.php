<?php
namespace Flowpack\EmberAdapter\Example\Domain\Model;

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use Flowpack\EmberAdapter\Annotations as Ember;

/**
 * A category for products.
 *
 * @Flow\Entity
 * @Ember\Model
 */
class Category {

	/**
	 * @var string
	 * @Ember\Attribute
	 */
	protected $name;

	/**
	 * @var string
	 * @Ember\Attribute
	 */
	protected $description = '';

	/**
	 * This is just an example on how bidirectional relations are handled
	 *
	 * @var \Doctrine\Common\Collections\Collection<\Flowpack\EmberAdapter\Example\Domain\Model\Product>
	 * @ORM\OneToMany(mappedBy="category")
	 * @Ember\Attribute
	 * @Ember\HasMany(model="Product", sideload=true)
	 */
	protected $products;

	/**
	 * @param string $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
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
	 * @param \Doctrine\Common\Collections\Collection $products
	 */
	public function setProducts($products) {
		$this->products = $products;
	}

	/**
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getProducts() {
		return $this->products;
	}

}