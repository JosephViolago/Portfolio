SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `diy-mvc` ;
CREATE SCHEMA IF NOT EXISTS `diy-mvc` DEFAULT CHARACTER SET latin1 ;
USE `diy-mvc` ;

-- -----------------------------------------------------
-- Table `diy-mvc`.`songs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `diy-mvc`.`songs` ;

CREATE  TABLE IF NOT EXISTS `diy`.`songs` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `song_name` VARCHAR(255) NOT NULL ,
  `artist` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `diy-mvc`.`songs`
-- -----------------------------------------------------
START TRANSACTION;
USE `diy-mvc`;
INSERT INTO `diy-mvc`.`songs` (`id`, `song_name`, `artist`) VALUES (1, 'Flagpole Sitta', 'Harvey Danger');
INSERT INTO `diy-mvc`.`songs` (`id`, `song_name`, `artist`) VALUES (2, 'Levels', 'Avicii');
INSERT INTO `diy-mvc`.`songs` (`id`, `song_name`, `artist`) VALUES (3, 'Tighten Up', 'The Black Keys');
INSERT INTO `diy-mvc`.`songs` (`id`, `song_name`, `artist`) VALUES (4, 'Breakfast at Tiffany\'s', 'Deep Blue Something');
INSERT INTO `diy-mvc`.`songs` (`id`, `song_name`, `artist`) VALUES (5, 'The Impression That I Get', 'The Mighty Mighty Bosstones');

COMMIT;
