<?php
namespace Flowpack\EmberAdapter\Example\Domain\Model;

use TYPO3\Flow\Annotations as Flow;
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

}