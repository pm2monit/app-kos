<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up()
    {
        // Transaksi user pencari kosan
        $fields = [
            'id'     => ['type' => 'varchar', 'constraint' => 255, 'unique' => true],
            'nama_pencari' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'tempat_lahir' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'tgl_lahir'     => ['type' => 'varchar', 'constraint' => 255],
            'jenis_kelamin'     => ['type' => 'varchar', 'constraint' => 255],
            'no_telp'  => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'email'  => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'status_pernikahan'  => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'pekerjaan'  => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'no_wa' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'foto' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'id_user' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'status'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_by'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'updated_by'    => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_date datetime default current_timestamp',
            'date_update' => ['type' => 'varchar', 'constraint' => 255, 'null' => true, 'on update' => 'NOW()'],
            'delete_'     => ['type' => 'ENUM', 'constraint' => ['1', '0'],'default' => '0']
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('trx_pencari_kosan', true);


        // Transaksi booking kosan
        $fields = [
            'id'     => ['type' => 'varchar', 'constraint' => 255, 'unique' => true],
            'nama_book' => ['type' => 'varchar', 'constraint' => 255],
            'date_book'     => ['type' => 'varchar', 'constraint' => 255],
            'date_masuk'     => ['type' => 'varchar', 'constraint' => 255],
            'date_keluar'     => ['type' => 'varchar', 'constraint' => 255],
            'jangka_wkt_sewa'  => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'jumlah_dp'  => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'bukti_bayar'  => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'sisa_pembayaran'  => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'status_trx' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'id_pencari' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'kode_penghuni' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'kode_kamar' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'status'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_by'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'updated_by'    => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_date datetime default current_timestamp',
            'date_update' => ['type' => 'varchar', 'constraint' => 255, 'null' => true, 'on update' => 'NOW()'],
            'delete_'     => ['type' => 'ENUM', 'constraint' => ['1', '0'],'default' => '0']
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('trx_booking_kosan', true);

        // Transaksi pembayaran
        $fields = [
            'id'     => ['type' => 'varchar', 'constraint' => 255, 'unique' => true],
            'kode_biaya' => ['type' => 'varchar', 'constraint' => 255],
            'date_trx'     => ['type' => 'varchar', 'constraint' => 255],
            'nama_pembayaran'     => ['type' => 'varchar', 'constraint' => 255],
            'deskripsi'     => ['type' => 'varchar', 'constraint' => 255],
            'jml_pembayaran'     => ['type' => 'varchar', 'constraint' => 255],
            'bukti_bayar'  => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'sisa_pembayaran'  => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'status_trx' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'id_pencari' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'kode_penghuni' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'status'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_by'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'updated_by'    => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_date datetime default current_timestamp',
            'date_update' => ['type' => 'varchar', 'constraint' => 255, 'null' => true, 'on update' => 'NOW()'],
            'delete_'     => ['type' => 'ENUM', 'constraint' => ['1', '0'],'default' => '0']
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('trx_pembayaran', true);


        // Transaksi notifikasi
        $fields = [
            'id'     => ['type' => 'varchar', 'constraint' => 255, 'unique' => true],
            'isi_pesan' => ['type' => 'varchar', 'constraint' => 255],
            'dari'     => ['type' => 'varchar', 'constraint' => 255],
            'untuk'     => ['type' => 'varchar', 'constraint' => 255],
            'status_baca'     => ['type' => 'varchar', 'constraint' => 255],
            'id_user'     => ['type' => 'varchar', 'constraint' => 255],
            'status'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_by'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'updated_by'    => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_date datetime default current_timestamp',
            'date_update' => ['type' => 'varchar', 'constraint' => 255, 'null' => true, 'on update' => 'NOW()'],
            'delete_'     => ['type' => 'ENUM', 'constraint' => ['1', '0'],'default' => '0']
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('trx_notifikasi', true);
    }

    public function down() {
        $this->forge->dropTable('trx_pencari_kosan', true);
        $this->forge->dropTable('trx_booking_kosan', true);
        $this->forge->dropTable('trx_pembayaran', true);
        $this->forge->dropTable('trx_notifikasi', true);
    }
}
