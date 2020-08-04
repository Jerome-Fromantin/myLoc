<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200804135416 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pret DROP FOREIGN KEY FK_52ECE9797773350C');
        $this->addSql('DROP INDEX UNIQ_52ECE9797773350C ON pret');
        $this->addSql('ALTER TABLE pret CHANGE biens_id bien_id INT NOT NULL');
        $this->addSql('ALTER TABLE pret ADD CONSTRAINT FK_52ECE979BD95B80F FOREIGN KEY (bien_id) REFERENCES biens (id)');
        $this->addSql('CREATE INDEX IDX_52ECE979BD95B80F ON pret (bien_id)');
        $this->addSql('ALTER TABLE user ADD role VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pret DROP FOREIGN KEY FK_52ECE979BD95B80F');
        $this->addSql('DROP INDEX IDX_52ECE979BD95B80F ON pret');
        $this->addSql('ALTER TABLE pret CHANGE bien_id biens_id INT NOT NULL');
        $this->addSql('ALTER TABLE pret ADD CONSTRAINT FK_52ECE9797773350C FOREIGN KEY (biens_id) REFERENCES biens (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_52ECE9797773350C ON pret (biens_id)');
        $this->addSql('ALTER TABLE user DROP role');
    }
}
