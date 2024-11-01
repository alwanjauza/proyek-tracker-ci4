<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLogProgressTable extends Migration
{
    public function up()
    {
        // Membuat tabel log_progress
        $this->forge->addField([
            'id_log' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_ajuan' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false,
            ],
            'tahap' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'tanggal_mulai' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'tanggal_selesai' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);

        // Menentukan primary key
        $this->forge->addKey('id_log', true);

        // Menambahkan foreign key dari tabel_ajuan
        $this->forge->addForeignKey('id_ajuan', 'tabel_ajuan', 'id_ajuan', 'CASCADE', 'CASCADE');

        // Membuat tabel
        $this->forge->createTable('tabel_log_progress');
    }

    public function down()
    {
        // Menghapus tabel log_progress jika rollback
        $this->forge->dropTable('tabel_log_progress');
    }
}
