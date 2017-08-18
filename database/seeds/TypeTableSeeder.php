<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypeTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('types')->delete();

		// guitarra
		Type::create(array(
				'name' => 'Guitarra'
			));

		// bajo
		Type::create(array(
				'name' => 'Bajo'
			));

		// piano
		Type::create(array(
				'name' => 'Piano'
			));

			// bateria
			Type::create(array(
					'name' => 'Bateria'
				));

			// violin
			Type::create(array(
					'name' => 'Violin'
				));

				// canto
				Type::create(array(
						'name' => 'Canto'
					));
	}
}
