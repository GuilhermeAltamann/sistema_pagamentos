<?php

use yii\db\Migration;

/**
 * Handles the creation for table `new_table`.
 */
class m160521_212326_create_new_table extends Migration {

    /**
     * @inheritdoc
     */
    public function up() {
        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";

        /* MYSQL */
        if (!in_array('clientes', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%clientes}}', [
                    'idcliente' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`idcliente`)',
                    'nome' => 'VARCHAR(100) NOT NULL',
                    'email' => 'VARCHAR(100) NOT NULL',
                        ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('formas_pagamento', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%formas_pagamento}}', [
                    'idforma_pagamento' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`idforma_pagamento`)',
                    'nome' => 'VARCHAR(35) NULL',
                        ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('pagamentos', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%pagamentos}}', [
                    'idpagamento' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`idpagamento`)',
                    'vencimento' => 'DATE NOT NULL',
                    'idforma_pagamento' => 'INT(11) NOT NULL',
                    'idcliente' => 'INT(11) NOT NULL',
                        ], $tableOptions_mysql);
            }
        }


        $this->createIndex('idx_UNIQUE_idcliente_9691_00', 'clientes', 'idcliente', 1);
        $this->createIndex('idx_idforma_pagamento_9795_01', 'pagamentos', 'idforma_pagamento', 0);
        $this->createIndex('idx_idcliente_9795_02', 'pagamentos', 'idcliente', 0);

        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_clientes_979_00', '{{%pagamentos}}', 'idcliente', '{{%clientes}}', 'idcliente', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_formas_pagamento_979_01', '{{%pagamentos}}', 'idforma_pagamento', '{{%formas_pagamento}}', 'idforma_pagamento', 'CASCADE', 'NO ACTION');
        $this->execute('SET foreign_key_checks = 1;');

        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%clientes}}', ['idcliente' => '1', 'nome' => 'Guilherme', 'email' => 'altmannguilherme@gmail.com']);
        $this->insert('{{%clientes}}', ['idcliente' => '2', 'nome' => 'Felipe', 'email' => 'asdf@asdf.com']);
        $this->insert('{{%formas_pagamento}}', ['idforma_pagamento' => '1', 'nome' => 'Boletos']);
        $this->insert('{{%formas_pagamento}}', ['idforma_pagamento' => '3', 'nome' => 'Cartão de Crédito']);
        $this->insert('{{%pagamentos}}', ['idpagamento' => '3', 'vencimento' => '2016-05-10', 'idforma_pagamento' => '1', 'idcliente' => '2']);
        $this->execute('SET foreign_key_checks = 1;');
    }

    /**
     * @inheritdoc
     */
    public function down() {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `clientes`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `formas_pagamento`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `pagamentos`');
        $this->execute('SET foreign_key_checks = 1;');
    }

}
