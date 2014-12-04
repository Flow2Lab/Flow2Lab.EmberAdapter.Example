<?php
namespace Flow2Lab\EmberAdapter\Example\Domain\Model;

use TYPO3\Flow\Annotations as Flow;
use Flow2Lab\EmberAdapter\Annotations as Ember;

/**
 * @Flow\ValueObject
 * @Ember\Model
 */
class Tag {

	/**
	 * @var string
	 * @Ember\Attribute
	 */
	protected $name;

	/**
	 * @param string $name
	 */
	public function __construct($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

}