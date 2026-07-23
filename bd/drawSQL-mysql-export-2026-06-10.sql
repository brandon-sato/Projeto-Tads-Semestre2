CREATE TABLE `procedimento`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(50) NOT NULL,
    `descricao` VARCHAR(255) NOT NULL,
    `duracaoMinutos` INT NOT NULL,
    `preco` DECIMAL(10, 2) NOT NULL,
    `id_tipo` INT NOT NULL
);
ALTER TABLE
    `procedimento` ADD UNIQUE `procedimento_nome_unique`(`nome`);
CREATE TABLE `tipo`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(50) NOT NULL,
    `descricao` VARCHAR(400) NOT NULL
);
ALTER TABLE
    `tipo` ADD UNIQUE `tipo_nome_unique`(`nome`);
CREATE TABLE `terapeuta`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(50) NOT NULL,
    `telefone` VARCHAR(20) NOT NULL
);
CREATE TABLE `procedimento_terapeuta`(
    `id_procedimento` INT NOT NULL,
    `id_terapeuta` INT NOT NULL,
    PRIMARY KEY(`id_procedimento`)
);
ALTER TABLE
    `procedimento_terapeuta` ADD PRIMARY KEY(`id_terapeuta`);
ALTER TABLE
    `procedimento` ADD CONSTRAINT `procedimento_id_tipo_foreign` FOREIGN KEY(`id_tipo`) REFERENCES `tipo`(`id`);
ALTER TABLE
    `procedimento_terapeuta` ADD CONSTRAINT `procedimento_terapeuta_id_terapeuta_foreign` FOREIGN KEY(`id_terapeuta`) REFERENCES `terapeuta`(`id`);
ALTER TABLE
    `procedimento_terapeuta` ADD CONSTRAINT `procedimento_terapeuta_id_procedimento_foreign` FOREIGN KEY(`id_procedimento`) REFERENCES `procedimento`(`id`);