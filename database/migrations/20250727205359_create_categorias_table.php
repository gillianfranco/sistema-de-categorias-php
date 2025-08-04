<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateCategoriasTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $this->table("categorias", ["id" => false, "primary_key" => ["id"]])
            ->addColumn("id", "biginteger", ["identity" => true, "signed" => false])
            ->addColumn("nome", "string", ["limit" => 100])
            ->addColumn("total_estoque", "integer", ["default" => 0])
            ->addColumn("total_dinheiro", "decimal", ["default" => 0])
            ->addColumn("created_at", "datetime", ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn("updated_at", "datetime", ["null" => true])
            ->create();
    }

    public function down(): void
    {
        $this->table("categorias")->drop()->save();
    }
}
