<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Master extends Migration
{
    public function up()
    {
        // Master data kos
        $fields = [
            'id'     => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'kode_kos' => ['type' => 'varchar', 'constraint' => 255, 'unique' => true],
            'nama_kos'     => ['type' => 'varchar', 'constraint' => 255],
            'deskripsi'  => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'foto'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'jenis_kosan'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'id_pemilik'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'status'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_by'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'updated_by'    => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_date datetime default current_timestamp',
            'date_update' => ['type' => 'varchar', 'constraint' => 255, 'null' => true, 'on update' => 'NOW()'],
            'delete_'     => ['type' => 'ENUM', 'constraint' => ['1', '0'],'default' => '0']
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ms_kosan', true);

        // Master data pemilik
        $fields = [
            'id'     => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'kode_pemilik' => ['type' => 'varchar', 'constraint' => 255, 'unique' => true],
            'nama_pemilik' => ['type' => 'varchar', 'constraint' => 255],
            'no_ktp_nik'     => ['type' => 'varchar', 'constraint' => 255, 'unique' => true],
            'no_telp'     => ['type' => 'varchar', 'constraint' => 255, 'unique' => true],
            'email'  => ['type' => 'varchar', 'constraint' => 255, 'null' => true, 'unique' => true],
            'no_rek'     => ['type' => 'varchar', 'constraint' => 255],
            'nama_rek'     => ['type' => 'varchar', 'constraint' => 255],
            'bank'     => ['type' => 'varchar', 'constraint' => 255],
            'jenis_kelamin'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'foto'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'id_user'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'status'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_by'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'updated_by'    => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_date datetime default current_timestamp',
            'date_update' => ['type' => 'varchar', 'constraint' => 255, 'null' => true, 'on update' => 'NOW()'],
            'delete_'     => ['type' => 'ENUM', 'constraint' => ['1', '0'],'default' => '0']
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ms_pemilik', true);


        // Master data kamar
        $fields = [
            'id'     => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'kode_kamar' => ['type' => 'varchar', 'constraint' => 255, 'unique' => true],
            'kode_kos'     => ['type' => 'varchar', 'constraint' => 255],
            'kode_pemilik'     => ['type' => 'varchar', 'constraint' => 255],
            'harga'     => ['type' => 'varchar', 'constraint' => 255],
            'harga_semesteran'  => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'deskripsi'     => ['type' => 'varchar', 'constraint' => 255],
            'foto'     => ['type' => 'varchar', 'constraint' => 255],
            'status_isi'     => ['type' => 'varchar', 'constraint' => 255],
            'status'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_by'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'updated_by'    => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_date datetime default current_timestamp',
            'date_update' => ['type' => 'varchar', 'constraint' => 255, 'null' => true, 'on update' => 'NOW()'],
            'delete_'     => ['type' => 'ENUM', 'constraint' => ['1', '0'],'default' => '0']
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ms_kamar', true);


        // Master data aset kamar
        $fields = [
            'id'     => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'kode_aset' => ['type' => 'varchar', 'constraint' => 255],
            'kode_kamar'     => ['type' => 'varchar', 'constraint' => 255],
            'nama_aset'     => ['type' => 'varchar', 'constraint' => 255],
            'deskripsi'     => ['type' => 'varchar', 'constraint' => 255],
            'nilai_perolehan'  => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'status'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_by'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'updated_by'    => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_date datetime default current_timestamp',
            'date_update' => ['type' => 'varchar', 'constraint' => 255, 'null' => true, 'on update' => 'NOW()'],
            'delete_'     => ['type' => 'ENUM', 'constraint' => ['1', '0'],'default' => '0']
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ms_kamar_aset', true);

        // Master data penghuni
        $fields = [
            'id'     => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'kode_biaya' => ['type' => 'varchar', 'constraint' => 255],
            'kode_penghuni'     => ['type' => 'varchar', 'constraint' => 255],
            'no_ktp_nik' => ['type' => 'varchar', 'constraint' => 255],
            'nama'     => ['type' => 'varchar', 'constraint' => 255],
            'umur'     => ['type' => 'varchar', 'constraint' => 255],
            'jenis_kelamin'     => ['type' => 'varchar', 'constraint' => 255],
            'no_telp'  => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'email'  => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'pekerjaan'  => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'status'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_by'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'updated_by'    => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_date datetime default current_timestamp',
            'date_update' => ['type' => 'varchar', 'constraint' => 255, 'null' => true, 'on update' => 'NOW()'],
            'delete_'     => ['type' => 'ENUM', 'constraint' => ['1', '0'],'default' => '0']
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ms_penghuni', true);

        // Master data calon
        // $fields = [
        //     'id'     => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            
        //     'status'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
        //     'created_by'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
        //     'updated_by'    => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
        //     'created_date datetime default current_timestamp',
        //     'date_update' => ['type' => 'varchar', 'constraint' => 255, 'null' => true, 'on update' => 'NOW()'],
        //     'delete_'     => ['type' => 'ENUM', 'constraint' => ['1', '0'],'default' => '0']
        // ];
        // $this->forge->addField($fields);
        // $this->forge->addKey('id', true);
        // $this->forge->createTable('ms_penyewa', true);

        // Master data biaya2
        $fields = [
            'id'     => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'kode_biaya'     => ['type' => 'varchar', 'constraint' => 255],
            'nama_biaya' => ['type' => 'varchar', 'constraint' => 255],
            'jenis_biaya'     => ['type' => 'varchar', 'constraint' => 255],
            'manfaat'     => ['type' => 'varchar', 'constraint' => 255],
            'status'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_by'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'updated_by'    => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_date datetime default current_timestamp',
            'date_update' => ['type' => 'varchar', 'constraint' => 255, 'null' => true, 'on update' => 'NOW()'],
            'delete_'     => ['type' => 'ENUM', 'constraint' => ['1', '0'],'default' => '0']
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ms_biaya', true);

    }

    public function down()
    {
        $this->forge->dropTable('ms_kosan', true);
        $this->forge->dropTable('ms_pemilik', true);
        $this->forge->dropTable('ms_kamar', true);
        $this->forge->dropTable('ms_kamar_aset', true);
        $this->forge->dropTable('ms_biaya', true);
        $this->forge->dropTable('ms_penghuni', true);
    }
}
