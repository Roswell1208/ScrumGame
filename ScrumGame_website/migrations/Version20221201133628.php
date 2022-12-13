<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221201133628 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50DD7735D48');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50DD3C32F8F');
        $this->addSql('DROP INDEX IDX_3755B50DD7735D48 ON jeux');
        $this->addSql('DROP INDEX IDX_3755B50DD3C32F8F ON jeux');
        $this->addSql('ALTER TABLE jeux ADD id_etat_id INT NOT NULL, ADD id_console_id INT NOT NULL, ADD nom_jeu VARCHAR(255) NOT NULL, ADD photo_jeu VARCHAR(255) NOT NULL, DROP idEtat, DROP idConsole, DROP nomJeu, DROP photoJeu');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50DD7735D48 FOREIGN KEY (id_console_id) REFERENCES console (id)');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50DD3C32F8F FOREIGN KEY (id_etat_id) REFERENCES etat (id)');
        $this->addSql('CREATE INDEX IDX_3755B50DD7735D48 ON jeux (id_console_id)');
        $this->addSql('CREATE INDEX IDX_3755B50DD3C32F8F ON jeux (id_etat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50DD3C32F8F');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50DD7735D48');
        $this->addSql('DROP INDEX IDX_3755B50DD3C32F8F ON jeux');
        $this->addSql('DROP INDEX IDX_3755B50DD7735D48 ON jeux');
        $this->addSql('ALTER TABLE jeux ADD idEtat INT NOT NULL, ADD idConsole INT NOT NULL, ADD nomJeu VARCHAR(255) NOT NULL, ADD photoJeu VARCHAR(255) NOT NULL, DROP id_etat_id, DROP id_console_id, DROP nom_jeu, DROP photo_jeu');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50DD3C32F8F FOREIGN KEY (idEtat) REFERENCES etat (id)');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50DD7735D48 FOREIGN KEY (idConsole) REFERENCES console (id)');
        $this->addSql('CREATE INDEX IDX_3755B50DD3C32F8F ON jeux (idEtat)');
        $this->addSql('CREATE INDEX IDX_3755B50DD7735D48 ON jeux (idConsole)');
    }
}
