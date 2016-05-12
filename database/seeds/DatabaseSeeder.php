<?php

use Illuminate\Database\Seeder;
use App\Advert;
use App\Order;
use App\State;
use App\Good;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('AdvertTableSeeder');
        $this->call('StateTableSeeder');
        $this->call('GoodTableSeeder');
        $this->call('OrderTableSeeder');    
    }
}

class AdvertTableSeeder extends Seeder {

    public function run()
    {
    	$startData = [
	    	['user_id' => 1,'user_first_name' => 'John','user_last_name' => 'Doe','user_login' => 'jdoe@mail.com','user_password' => bcrypt('password')],
	    	['user_id' => 2,'user_first_name' => 'Erick','user_last_name' => 'Doe','user_login' => 'edoe@mail.com','user_password' => bcrypt('password')],
	    	['user_id' => 3,'user_first_name' => 'Michel','user_last_name' => 'Doe','user_login' => 'mdoe@mail.com','user_password' => bcrypt('password')]
    	];

    	foreach ($startData as $data){
    		Advert::create($data);
    	}   	
    }

}

class StateTableSeeder extends Seeder {

    public function run()
    {
    	$startData = [
	    	['state_id' => 1,'state_name' => 'Новый','state_slug' => 'new'],
	    	['state_id' => 2,'state_name' => 'В работе','state_slug' => 'onoperator'],
	    	['state_id' => 3,'state_name' => 'Подтвержден','state_slug' => 'accepted']
    	];

    	foreach ($startData as $data){
    		State::create($data);
    	}  

    }

}

class OrderTableSeeder extends Seeder {

    public function run()
    {
    	$startData = [
	    	['order_id' => 1,'order_state' => 1,'order_add_time' => '16-01-01 00:01','order_good' => 1,'order_client_phone' => '777713522547','order_client_name' => 'John'],
	    	['order_id' => 2,'order_state' => 2,'order_add_time' => '16-01-01 01:30','order_good' => 2,'order_client_phone' => '77756547656','order_client_name' => 'Michel'],
	    	['order_id' => 3,'order_state' => 3,'order_add_time' => '16-01-01 03:45','order_good' => 3,'order_client_phone' => '77786789878','order_client_name' => 'Darrel'],
	    	['order_id' => 4,'order_state' => 3,'order_add_time' => '16-01-01 04:50','order_good' => 4,'order_client_phone' => '77752456523','order_client_name' => 'Dan'],
	    ];

	    foreach ($startData as $data){
    		Order::create($data);
    	}  
    }

}

class GoodTableSeeder extends Seeder {

    public function run()
    {
    	$startData = [
	    	['good_id' => 1,'good_name' => 'Часы Rado Integral','good_price' => 2000,'good_advert' => 1],
	    	['good_id' => 2,'good_name' => 'Часы Swiss Army','good_price' => 1500,'good_advert' => 1],
	    	['good_id' => 3,'good_name' => 'Детский планшет','good_price' => 2100,'good_advert' => 2],
	    	['good_id' => 4,'good_name' => 'Колонки Monster Beats','good_price' => 900,'good_advert' => 2]
	    ];

	    foreach ($startData as $data){
    		Good::create($data);
    	}  
    }

}