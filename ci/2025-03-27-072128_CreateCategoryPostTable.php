<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategoryPostTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'post_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'category_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addForeignKey('post_id', 'posts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('category_post');
    }

    public function down()
    {
        $this->forge->dropTable('category_post');
    }
}
