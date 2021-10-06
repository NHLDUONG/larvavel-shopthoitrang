<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // $this->call(BillsSeeder::class);
        $this->call(ProductsSeeder::class);
        
    }
}

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'Nguyen Duong','phone'=>'0879231823','address'=>'73 cao thang','email'=>'duong123@gmail.com','password'=>bcrypt('matkhau')],
            ['name'=>'Nguyen Huong','phone'=>'0879231923','address'=>'13 cao thang','email'=>'linh234@gmail.com','password'=>bcrypt('matkhau')],
            ['name'=>'Nguyen Linh','phone'=>'0879231723','address'=>'139 ma lo','email'=>'linh245@gmail.com','password'=>bcrypt('matkhau')]
        ]);
    }
}

class CustomerSeeder extends Seeder
{
    public function run()
    {
        DB::table('customers')->insert([
            ['name'=>'Nguyen Duong','gender'=>'nu','note'=>'null','phone'=>'0879231823','address'=>'73 cao thang','email'=>'duong123@gmail.com','password'=>bcrypt('matkhau')],
            ['name'=>'Nguyen Huong','gender'=>'nam','note'=>'null','phone'=>'0879231923','address'=>'13 cao thang','email'=>'linh234@gmail.com','password'=>bcrypt('matkhau')],
            ['name'=>'Nguyen Linh','gender'=>'nu','note'=>'null','phone'=>'0879231723','address'=>'139 ma lo','email'=>'linh245@gmail.com','password'=>bcrypt('matkhau')]
        ]);
    }
}

class BillsSeeder extends Seeder
{
    public function run()
    {
        DB::table('bills')->insert([
            ['date_oder'=>'09-08-2021','qty'=>'2','payment'=>'COD','note'=>'null','unit_price'=>'495.000'],
            ['date_oder'=>'09-08-2021','qty'=>'1','payment'=>'ATM','note'=>'null','unit_price'=>'250.000'],
            ['date_oder'=>'09-08-2021','qty'=>'4','payment'=>'COD','note'=>'null','unit_price'=>'800.000'],
            ['date_oder'=>'09-08-2021','qty'=>'8','payment'=>'ATM','note'=>'null','unit_price'=>'1.800.000'],
            ['date_oder'=>'09-08-2021','qty'=>'2','payment'=>'COD','note'=>'null','unit_price'=>'550.000'],
            ['date_oder'=>'09-08-2021','qty'=>'4','payment'=>'COD','note'=>'null','unit_price'=>'790.000']
            
        ]);
    }
}

class BillDetailSeeder extends Seeder
{
    public function run()
    {
        DB::table('billdetail')->insert([
            ['name'=>'Nguyen Duong','gender'=>'nu','note'=>'null','phone'=>'0879231823','address'=>'73 cao thang','email'=>'duong123@gmail.com','password'=>bcrypt('matkhau')],
            ['name'=>'Nguyen Huong','gender'=>'nam','note'=>'null','phone'=>'0879231923','address'=>'13 cao thang','email'=>'linh234@gmail.com','password'=>bcrypt('matkhau')],
            ['name'=>'Nguyen Linh','gender'=>'nu','note'=>'null','phone'=>'0879231723','address'=>'139 ma lo','email'=>'linh245@gmail.com','password'=>bcrypt('matkhau')]
        ]);
    }
}

class ProductsSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            
            ['id_type'=>'1','description'=>'','name'=>'Esprit Ruffle Shirt','gender'=>'1','unit'=>'1','content'=>'','price'=>'22.55','price_sale'=>'16.64','image'=>'product-01.jpg'],
            ['id_type'=>'2','description'=>'','name'=>'Herschel supply','gender'=>'1','unit'=>'1','content'=>'','price'=>'37.55','price_sale'=>'35.31','image'=>'product-02.jpg'],
            ['id_type'=>'3','description'=>'','name'=>'Only Check Trouser','gender'=>'0','unit'=>'1','content'=>'','price'=>'25.55','price_sale'=>'25.10','image'=>'product-03.jpg'],
            ['id_type'=>'4','description'=>'','name'=>'Classic Trench Coat','gender'=>'1','unit'=>'1','content'=>'','price'=>'82.05','price_sale'=>'77.15','image'=>'product-04.jpg'],
            ['id_type'=>'5','description'=>'','name'=>'Front Pocket Jumper','gender'=>'1','unit'=>'1','content'=>'','price'=>'35.74','price_sale'=>'34.75','image'=>'product-05.jpg'],
            ['id_type'=>'6','description'=>'','name'=>'Vintage Inspired Classic','gender'=>'0','unit'=>'1','content'=>'','price'=>'99.20','price_sale'=>'93.60','image'=>'product-06.jpg'],
            ['id_type'=>'7','description'=>'','name'=>'Shirt in Stretch Cotton','gender'=>'1','unit'=>'1','content'=>'','price'=>'52.66','price_sale'=>'51.64','image'=>'product-07.jpg'],
            ['id_type'=>'8','description'=>'','name'=>'Pieces Metallic Printed','gender'=>'1','unit'=>'1','content'=>'','price'=>'18.96','price_sale'=>'18.60','image'=>'product-08.jpg'],
            ['id_type'=>'9','description'=>'','name'=>'Converse All Star Hi Plimsolls','gender'=>'0','unit'=>'1','content'=>'','price'=>'25.55','price_sale'=>'24.64','image'=>'product-09.jpg'],
            ['id_type'=>'10','description'=>'','name'=>'Femme T-Shirt In Stripe','gender'=>'0','unit'=>'1','content'=>'','price'=>'22.55','price_sale'=>'16.64','image'=>'product-10.jpg'],
            ['id_type'=>'11','description'=>'','name'=>'Herschel supply','gender'=>'0','unit'=>'1','content'=>'','price'=>'45.55','price_sale'=>'36.16','image'=>'product-11.jpg'],
            ['id_type'=>'12','description'=>'','name'=>'Herschel supply','gender'=>'0','unit'=>'1','content'=>'','price'=>'63.15','price_sale'=>'56.24','image'=>'product-12.jpg'],
            ['id_type'=>'13','description'=>'','name'=>'T-Shirt with Sleeve','gender'=>'1','unit'=>'1','content'=>'','price'=>'18.49','price_sale'=>'16.06','image'=>'product-13.jpg'],
            ['id_type'=>'14','description'=>'','name'=>'Pretty Little Thing','gender'=>'1','unit'=>'1','content'=>'','price'=>'33.79','price_sale'=>'26.10','image'=>'product-14.jpg'],
            ['id_type'=>'15','description'=>'','name'=>'Mini Silver Mesh Watch','gender'=>'0','unit'=>'1','content'=>'','price'=>'88.85','price_sale'=>'86.34','image'=>'product-15.jpg'],
            ['id_type'=>'16','description'=>'','name'=>'Square Neck Back','gender'=>'0','unit'=>'1','content'=>'','price'=>'29.55','price_sale'=>'26.64','image'=>'product-16.jpg']
        ]);
    }
}




