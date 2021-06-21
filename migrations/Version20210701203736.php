<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210701203736 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'migrations';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs

        $this->addSql('CREATE TABLE good (id VARCHAR(255) NOT NULL, sku VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, cost_value VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('ALTER TABLE good ADD enable TINYINT(1) NOT NULL');

        $this->addSql('ALTER TABLE good ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL');

        $this->addSql('CREATE TABLE `unique_id` (`id` bigint(255) NOT NULL AUTO_INCREMENT,`value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,`created_at` datetime NOT NULL,PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;');

        $this->addSql("CREATE TABLE `cache_good_list` (`id` bigint(255) NOT NULL AUTO_INCREMENT,`active` tinyint(4) NOT NULL DEFAULT '1',`value` text COLLATE utf8mb4_unicode_ci NOT NULL,PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");

        $this->addSql("CREATE TABLE `cache_class` (`id` bigint(255) NOT NULL AUTO_INCREMENT,`class_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,`path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,`code` text COLLATE utf8mb4_unicode_ci NOT NULL,PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");

        $this->addSql("CREATE UNIQUE INDEX index_unique_good_sku ON good (sku);");

        $this->addSql("CREATE UNIQUE INDEX index_unique_unique_id_value ON unique_id (value);");

        $this->addSql("CREATE UNIQUE INDEX index_unique_cache_class_class_name ON cache_class (class_name);");

        $this->addSql("INSERT INTO `unique_id` (`id`, `value`, `created_at`)
VALUES
	(1, 'cb84e359-6341-458c-9127-93e651e976b3', '2021-07-15 22:17:19'),
	(2, '38588c44-39f1-4289-92bb-8740867c1cfa', '2021-07-15 22:18:00'),
	(3, '1aeea9d2-f44a-4d19-a1ed-fddd2afec558', '2021-07-15 22:18:10'),
	(4, '3e39d1fa-0144-4417-959b-36dbd4b728dc', '2021-07-15 22:18:36'),
	(5, '6cec0b92-4d4c-4c34-85a8-6b8f7706f851', '2021-07-15 22:19:09'),
	(6, '88025279-58bd-4b82-8bd2-c9f94d4032f8', '2021-07-15 22:19:38'),
	(7, 'c30d49a8-0f9d-471e-b1e3-b1455a6f0fde', '2021-07-15 22:20:00'),
	(8, 'd5c947b4-153f-4ad7-a4b9-c1c520feb54a', '2021-07-15 22:20:49'),
	(9, '8c302294-634c-4552-ac2e-b6df81fa6f8b', '2021-07-15 22:21:52');
");
        $this->addSql("INSERT INTO `good` (`id`, `sku`, `name`, `type`, `cost_value`, `enable`, `created_at`, `updated_at`)
VALUES
	('1aeea9d2-f44a-4d19-a1ed-fddd2afec558', 'sword_03', 'Hellfire Sword', 'weapon', '150.00', 1, '2021-07-15 22:18:10', '2021-07-15 22:18:10'),
	('38588c44-39f1-4289-92bb-8740867c1cfa', 'sword_02', 'Flame Sword', 'weapon', '50.00', 1, '2021-07-15 22:18:00', '2021-07-15 22:18:00'),
	('3e39d1fa-0144-4417-959b-36dbd4b728dc', 'sword_04', 'Absolete Zero Sword', 'weapon', '250.00', 1, '2021-07-15 22:18:36', '2021-07-15 22:18:36'),
	('6cec0b92-4d4c-4c34-85a8-6b8f7706f851', 'shield_01', 'Not a shield exactly', 'shield', '1.00', 1, '2021-07-15 22:19:09', '2021-07-15 22:19:09'),
	('88025279-58bd-4b82-8bd2-c9f94d4032f8', 'shield_02', 'Definitely Shield', 'shield', '5.00', 1, '2021-07-15 22:19:38', '2021-07-15 22:19:38'),
	('8c302294-634c-4552-ac2e-b6df81fa6f8b', 'shield_04', 'Antimatter shield', 'shield', '151.00', 1, '2021-07-15 22:20:49', '2021-07-15 22:21:52'),
	('c30d49a8-0f9d-471e-b1e3-b1455a6f0fde', 'shield_03', '360 Degree Hyper Shield', 'shield', '150.00', 1, '2021-07-15 22:20:00', '2021-07-15 22:20:00'),
	('cb84e359-6341-458c-9127-93e651e976b3', 'sword_01', 'Ehchanted silver Sword', 'weapon', '50.00', 1, '2021-07-15 22:17:19', '2021-07-15 22:17:19');
");

        $this->addSql('INSERT INTO `cache_class` (`id`, `class_name`, `path`, `code`)
VALUES
	(1, \'App\\\Dto\\\InternalRequest\', \'/src/Dto/InternalRequest.php\', \'<?php\n\ndeclare(strict_types=1);\n\nnamespace App\\\Dto;\n\nuse App\\\Common\\\Models\\\GoodModel;\nuse App\\\Common\\\Models\\\SearchCriteria;\n\nfinal class InternalRequest extends BaseDto\n{\n    public static $loaded = true;\n    private string $operation;\n    private ?SearchCriteria $searchCriteria;\n    private GoodModel $model;\n\n    public function getModel(): GoodModel\n    {\n        return $this->model;\n    }\n\n    public function setModel(GoodModel $model): InternalRequest\n    {\n        $this->model = $model;\n        return $this;\n    }\n\n    public function getOperation(): string\n    {\n        return $this->operation;\n    }\n\n    public function setOperation(string $operation): InternalRequest\n    {\n        $this->operation = $operation;\n        return $this;\n    }\n\n    public function getSearchCriteria(): ?SearchCriteria\n    {\n        return $this->searchCriteria;\n    }\n\n    public function setSearchCriteria(SearchCriteria $searchCriteria): InternalRequest\n    {\n        $this->searchCriteria = $searchCriteria;\n        return $this;\n    }\n}\n\'),
	(2, \'App\\\Dto\\\InternalResult\', \'/src/Dto/InternalResult.php\', \'<?php\n\ndeclare(strict_types=1);\n\nnamespace App\\\Dto;\n\nfinal class InternalResult\n{\n    public static $loaded = true;\n    private $result;\n    private $error;\n\n    public function getResult()\n    {\n        return $this->result;\n    }\n\n    public function setResult($result)\n    {\n        $this->result = $result;\n        return $this;\n    }\n\n    public function setError($error)\n    {\n        $this->error = $error;\n\n        return $this;\n    }\n\n    public function getError()\n    {\n        return $this->error;\n    }\n}\n\');
    ');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE dvapay.cache_good_list');
        $this->addSql('DROP TABLE dvapay.cache_class');
        $this->addSql('DROP TABLE dvapay.unique_id');
        $this->addSql('DROP TABLE dvapay.good');
    }
}
