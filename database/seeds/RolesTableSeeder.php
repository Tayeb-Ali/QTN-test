<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(App\Models\Role::class, 5)->create();
        $role = $this->roles();
        if ($role) {
            $this->crateUsers();
            $this->cat();
        }
//        factory(App\Models\Categorie::class, 5)->create();
//        factory(App\Models\Manager::class, 2)->create();
//        factory(App\Models\Product::class, 5)->create();
//        factory(App\Models\Branches::class, 5)->create();
//        factory(App\Models\Department::class, 5)->create();
//        factory(App\Models\Employee::class, 5)->create();
//        factory(App\Models\Customer::class, 5)->create();
//        factory(App\Models\Supplier::class, 5)->create();
//        factory(App\Models\Quotation::class, 2)->create();


    }

    public function roles()
    {
        DB::table('roles')->insert([
            'name' => 'supervisors',
            'description' => 'Super Admin (Area manager)',
            'guard_name' => 'web',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('roles')->insert([
            'name' => 'admin',
            'description' => 'Branch manager',
            'guard_name' => 'web',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('roles')->insert([
            'name' => 'employee',
            'description' => 'Employees Manger',
            'guard_name' => 'web',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }

    public function crateUsers()
    {
        DB::table('users')->insert([
            'name' => 'Eltayeb Ali',
            'email' => 'admin@gmail.com',
            'phone' => '0917321783',
            'password' => bcrypt('123123'),
            'role_id' => 1,
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Ali Hassan',
            'email' => 'admin2@gmail.com',
            'phone' => '0912394260',
            'password' => bcrypt('123456'),
            'role_id' => 3,
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }

    public function cat()
    {
        DB::table('categories')->insert([
            'name' => 'car',
            'logo' => 'cat.png',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'name' => 'moto',
            'logo' => 'cat.png',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'name' => 'byc',
            'logo' => 'cat.png',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
