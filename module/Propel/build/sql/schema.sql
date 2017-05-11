
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- equipo
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `equipo`;

CREATE TABLE `equipo`
(
    `idequipo` INTEGER NOT NULL AUTO_INCREMENT,
    `equipo_nombre` VARCHAR(45) NOT NULL,
    `equipo_img` TEXT,
    PRIMARY KEY (`idequipo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- participante
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `participante`;

CREATE TABLE `participante`
(
    `idparticipante` INTEGER NOT NULL AUTO_INCREMENT,
    `participante_nombre` VARCHAR(45) NOT NULL,
    `participante_estatus` TINYINT DEFAULT 1 NOT NULL,
    `idequipo` INTEGER,
    PRIMARY KEY (`idparticipante`),
    INDEX `idequipo` (`idequipo`),
    CONSTRAINT `participante_idequipo`
        FOREIGN KEY (`idequipo`)
        REFERENCES `equipo` (`idequipo`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
