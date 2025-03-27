<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePostTagTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'post_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'tag_id'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addForeignKey('post_id', 'posts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('tag_id', 'tags', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('post_tag');
    }

    public function down()
    {
        $this->forge->dropTable('post_tag');
    }
}
