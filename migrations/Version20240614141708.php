<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240614141708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create clients, products and loans tables.';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('
            CREATE TABLE clients (
                id CHARACTER(36) PRIMARY KEY,
                first_name VARCHAR NOT NULL,
                last_name VARCHAR NOT NULL,
                age INTEGER NOT NULL,
                city VARCHAR NOT NULL,
                state CHARACTER(2) NOT NULL,
                zip INTEGER NOT NULL,
                ssn VARCHAR NOT NULL,
                fico INTEGER NOT NULL,
                wage INTEGER NOT NULL,
                email VARCHAR NOT NULL,
                phone VARCHAR NOT NULL
            );
        ');

        $this->addSql('
            CREATE TABLE products (
                id CHARACTER(36) PRIMARY KEY,
                title VARCHAR NOT NULL,
                term INTEGER NOT NULL,
                interest VARCHAR NOT NULL
            );
        ');

        $this->addSql('
            CREATE TABLE loans (
                id CHARACTER(36) PRIMARY KEY,
                amount VARCHAR NOT NULL,
                interest_increase VARCHAR NULL,
                client_id CHARACTER(36) NOT NULL,
                product_id CHARACTER(36) NOT NULL,
                FOREIGN KEY (client_id) REFERENCES clients(id),
                FOREIGN KEY (product_id) REFERENCES products(id)
            );
        ');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE loans DROP CONSTRAINT loans_product_id_fkey');
        $this->addSql('ALTER TABLE loans DROP CONSTRAINT loans_client_id_fkey');
        $this->addSql('DROP TABLE clients;');
        $this->addSql('DROP TABLE products;');
        $this->addSql('DROP TABLE loans;');
    }
}
