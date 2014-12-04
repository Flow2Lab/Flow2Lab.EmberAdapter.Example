<?php
namespace TYPO3\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
	Doctrine\DBAL\Schema\Schema;

/**
 * Create ToDo table
 */
class Version20141203135546 extends AbstractMigration {

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function up(Schema $schema) {
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");

		$this->addSql("CREATE TABLE flow2lab_emberadapter_example_domain_model_task (persistence_object_identifier VARCHAR(40) NOT NULL, title VARCHAR(255) NOT NULL, iscomplete TINYINT(1) NOT NULL, PRIMARY KEY(persistence_object_identifier))");
	}

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function down(Schema $schema) {
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");

		$this->addSql("DROP TABLE flow2lab_emberadapter_example_domain_model_task");
	}
}