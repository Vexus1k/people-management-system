<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CreatePeopleTable extends Migration
{
    public function up()
    {
        $faker = Faker::create();

        Schema::create('people', function (Blueprint $table) use ($faker) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('street');
            $table->string('city');
            $table->timestamps();
        });

        for ($i = 0; $i < 200; $i++) {
            DB::table('people')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone_number' => $faker->phoneNumber,
                'street' => $faker->streetAddress,
                'city' => $faker->city,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down()
    {
        Schema::dropIfExists('people');
    }
}

