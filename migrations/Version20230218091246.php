<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230218091246 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE salary_statistics (id INT AUTO_INCREMENT NOT NULL, basic_salary DOUBLE PRECISION NOT NULL, bonus DOUBLE PRECISION NOT NULL, coefficients_salary DOUBLE PRECISION NOT NULL, advance_salary DOUBLE PRECISION NOT NULL, total_salary DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shift (id INT AUTO_INCREMENT NOT NULL, time VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE staff (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, birthday DATE NOT NULL, address VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE staff_shift (id INT AUTO_INCREMENT NOT NULL, staff_id INT NOT NULL, shift_id INT NOT NULL, INDEX IDX_D8EE9382D4D57CD (staff_id), INDEX IDX_D8EE9382BB70BC0E (shift_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE timekeepiing (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE timekeeping (id INT AUTO_INCREMENT NOT NULL, staff_id INT NOT NULL, salary_id INT NOT NULL, number_of_working_days INT NOT NULL, INDEX IDX_B962EB21D4D57CD (staff_id), INDEX IDX_B962EB21B0FDF16E (salary_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE staff_shift ADD CONSTRAINT FK_D8EE9382D4D57CD FOREIGN KEY (staff_id) REFERENCES staff (id)');
        $this->addSql('ALTER TABLE staff_shift ADD CONSTRAINT FK_D8EE9382BB70BC0E FOREIGN KEY (shift_id) REFERENCES shift (id)');
        $this->addSql('ALTER TABLE timekeeping ADD CONSTRAINT FK_B962EB21D4D57CD FOREIGN KEY (staff_id) REFERENCES staff (id)');
        $this->addSql('ALTER TABLE timekeeping ADD CONSTRAINT FK_B962EB21B0FDF16E FOREIGN KEY (salary_id) REFERENCES salary_statistics (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE staff_shift DROP FOREIGN KEY FK_D8EE9382D4D57CD');
        $this->addSql('ALTER TABLE staff_shift DROP FOREIGN KEY FK_D8EE9382BB70BC0E');
        $this->addSql('ALTER TABLE timekeeping DROP FOREIGN KEY FK_B962EB21D4D57CD');
        $this->addSql('ALTER TABLE timekeeping DROP FOREIGN KEY FK_B962EB21B0FDF16E');
        $this->addSql('DROP TABLE salary_statistics');
        $this->addSql('DROP TABLE shift');
        $this->addSql('DROP TABLE staff');
        $this->addSql('DROP TABLE staff_shift');
        $this->addSql('DROP TABLE timekeepiing');
        $this->addSql('DROP TABLE timekeeping');
    }
}
