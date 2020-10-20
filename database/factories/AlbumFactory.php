<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlbumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Album::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id = rand(1,1000);
        $user = User::inRandomOrder()->first();
        return [
            'album_name'=>$this->faker->text(20),
            'album_thumb'=>'https://picsum.photos/id/'.$id.'/800/600',
            'album_description'=>$this->faker->text(120),
            'created_at'=>$this->faker->dateTime(),
            'user_id'=>$user->id,
        ];
    }
}
