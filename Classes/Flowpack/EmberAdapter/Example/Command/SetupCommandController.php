<?php
namespace Flowpack\EmberAdapter\Example\Command;

use Doctrine\Common\Collections\ArrayCollection;
use Flowpack\EmberAdapter\Example\Domain\Model\Category;
use Flowpack\EmberAdapter\Example\Domain\Model\Product;
use Flowpack\EmberAdapter\Example\Domain\Model\Tag;
use Flowpack\EmberAdapter\Example\Domain\Repository\ProductRepository;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Cli\CommandController;

class SetupCommandController extends CommandController {

	/**
	 * @Flow\Inject
	 * @var ProductRepository
	 */
	protected $productRepository;

	/**
	 * Adds example products to the database to test the ember adapter
	 */
	public function installCommand() {
		$awesome = new Tag('Awesome');
		$nice = new Tag('Nice');
		$goodLooking = new Tag('Good looking');

		$shoes = new Category();
		$shoes->setName('Shoes');

		$tshirts = new Category();
		$tshirts->setName('T-Shirts');

		$product1 = new Product();
		$product1->setName('The Shoe™ by Walk');
		$product1->setCategory($shoes);
		$product1->setTags(new ArrayCollection(array($awesome, $goodLooking)));
		$product1->setPrice(199.99);
		$product1->setInternalPrice(129.99);

		$product2 = new Product();
		$product2->setName('T-Shirt "Flow meets Ember"');
		$product2->setCategory($tshirts);
		$product2->setTags(new ArrayCollection(array($nice, $goodLooking)));
		$product2->setPrice(29.99);
		$product2->setInternalPrice(13.37);

		$this->productRepository->add($product1);
		$this->productRepository->add($product2);
	}

}