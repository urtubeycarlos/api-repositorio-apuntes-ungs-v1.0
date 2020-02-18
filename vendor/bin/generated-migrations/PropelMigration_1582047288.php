<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1582047288.
 * Generated on 2020-02-18 18:34:48 
 */
class PropelMigration_1582047288
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

ALTER TABLE `assignature` DROP FOREIGN KEY `assignature_fk_6218ca`;

DROP INDEX `assignature_fi_6218ca` ON `assignature`;

ALTER TABLE `assignature`

  DROP `career_id`;

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

DROP TABLE IF EXISTS `career_assignature`;

ALTER TABLE `assignature`

  ADD `career_id` INTEGER NOT NULL AFTER `md5_name`;

CREATE INDEX `assignature_fi_6218ca` ON `assignature` (`career_id`);

ALTER TABLE `assignature` ADD CONSTRAINT `assignature_fk_6218ca`
    FOREIGN KEY (`career_id`)
    REFERENCES `career` (`id`);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}