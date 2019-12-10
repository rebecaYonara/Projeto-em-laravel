<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tbl_usuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_usuarios')->insert([
            'nmusuario' => 'Admin',
            'cargo' => 'barman',
            'login' => 'Admin',
            'senha' => 'admin123',
            'ativo' => true,
            'dtnascimento' => '1999-04-20'
        ]);
    }
}
