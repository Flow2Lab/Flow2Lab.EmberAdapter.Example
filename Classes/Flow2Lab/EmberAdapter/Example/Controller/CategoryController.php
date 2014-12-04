<?php
namespace Flow2Lab\EmberAdapter\Example\Controller;

use Flow2Lab\EmberAdapter\Example\Domain\Model\Category;
use Flow2Lab\EmberAdapter\Example\Domain\Repository\CategoryRepository;
use TYPO3\Flow\Mvc\Controller\RestController;
use TYPO3\Flow\Annotations as Flow;

class CategoryController extends RestController {

	protected $defaultViewObjectName = 'Flowpack\EmberAdapter\Mvc\View\EmberView';

	/**
	 * @var string
	 */
	protected $resourceArgumentName = 'category';

	/**
	 * @Flow\Inject
	 * @var CategoryRepository
	 */
	protected $categoryRepository;

	public function listAction() {
		$this->view->assign('categories', $this->categoryRepository->findAll());
	}

	/**
	 * @param Category $category
	 */
	public function showAction(Category $category) {
		$this->view->assign('category', $category);
	}

}