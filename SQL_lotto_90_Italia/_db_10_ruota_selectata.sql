DROP TABLE IF EXISTS `ruota_selezionata`;
CREATE TABLE `ruota_selezionata`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `user_id` INT NOT NULL,
    `ruote_id` INT NOT NULL,
    `ultimo_aggiornamento` VARCHAR(45) DEFAULT NULL,
    PRIMARY KEY(`id`)
); 

INSERT INTO ruota_selezionata(
    `user_id`,
    `ruote_id`,
    `ultimo_aggiornamento`
)
VALUE (1, 1, NOW());