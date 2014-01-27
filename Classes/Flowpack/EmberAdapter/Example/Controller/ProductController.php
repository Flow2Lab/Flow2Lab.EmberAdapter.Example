<?php
namespace Flowpack\EmberAdapter\Example\Controller;

use Flowpack\EmberAdapter\Example\Domain\Model\Product;
use Flowpack\EmberAdapter\Example\Domain\Repository\ProductRepository;
use TYPO3\Flow\Mvc\Controller\RestController;
use TYPO3\Flow\Annotations as Flow;

class ProductController extends RestController {

	protected $defaultViewObjectName = 'Flowpack\EmberAdapter\Mvc\View\EmberView';

	/**
	 * @var string
	 */
	protected $resourceArgumentName = 'product';

	/**
	 * @Flow\Inject
	 * @var ProductRepository
	 */
	protected $productRepository;

	public function listAction() {
		$this->view->assign('products', $this->productRepository->findAll());
	}

	/**
	 * @param Product $product
	 */
	public function showAction(Product $product) {
		$this->view->assign('product', $product);
	}

}