<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'setting_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'setting_value' => [
                'type' => 'TEXT',
                'null' => true, // Bisa kosong
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => false,
                'default' => 'CURRENT_TIMESTAMP', // Set default waktu saat record dibuat
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true, // Bisa null jika belum diperbarui
            ],
        ]);

        // Pastikan 'id' dijadikan Primary Key
        $this->forge->addPrimaryKey('id');

        // Membuat tabel
        $this->forge->createTable('settings');
    }

    public function down()
    {
        $this->forge->dropTable('settings');
    }
}
