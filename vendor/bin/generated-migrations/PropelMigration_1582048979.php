<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1582048979.
 * Generated on 2020-02-18 19:02:59 
 */
class PropelMigration_1582048979
{
    public $comment = '';

    public function preUp(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postUp(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    public function preDown(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postDown(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `author`;

DROP TABLE IF EXISTS `book`;

DROP TABLE IF EXISTS `publisher`;

CREATE TABLE `career`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(128) NOT NULL,
    `md5_name` VARCHAR(256) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `assignature`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(128) NOT NULL,
    `md5_name` VARCHAR(256) NOT NULL,
    `career_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `assignature_fi_6218ca` (`career_id`),
    CONSTRAINT `assignature_fk_6218ca`
        FOREIGN KEY (`career_id`)
        REFERENCES `career` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `career_assignature`
(
    `career_id` INTEGER NOT NULL,
    `assignature_id` INTEGER NOT NULL,
    PRIMARY KEY (`career_id`,`assignature_id`),
    INDEX `career_assignature_fi_2bd056` (`assignature_id`),
    CONSTRAINT `career_assignature_fk_6218ca`
        FOREIGN KEY (`career_id`)
        REFERENCES `career` (`id`),
    CONSTRAINT `career_assignature_fk_2bd056`
        FOREIGN KEY (`assignature_id`)
        REFERENCES `assignature` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `note`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `filename` VARCHAR(128) NOT NULL,
    `extension` VARCHAR(10) NOT NULL,
    `description` TEXT NOT NULL,
    `url` VARCHAR(128) NOT NULL,
    `assignature_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `note_fi_2bd056` (`assignature_id`),
    CONSTRAINT `note_fk_2bd056`
        FOREIGN KEY (`assignature_id`)
        REFERENCES `assignature` (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `career`;

DROP TABLE IF EXISTS `assignature`;

DROP TABLE IF EXISTS `career_assignature`;

DROP TABLE IF EXISTS `note`;

CREATE TABLE `author`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(128) NOT NULL,
    `last_name` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `book`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `isbn` VARCHAR(24) NOT NULL,
    `publisher_id` INTEGER NOT NULL,
    `author_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `book_fi_35872e` (`publisher_id`),
    INDEX `book_fi_ea464c` (`author_id`),
    CONSTRAINT `book_fk_35872e`
        FOREIGN KEY (`publisher_id`)
        REFERENCES `publisher` (`id`),
    CONSTRAINT `book_fk_ea464c`
        FOREIGN KEY (`author_id`)
        REFERENCES `author` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `publisher`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}