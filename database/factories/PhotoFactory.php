<?php

namespace Database\Factories;

use App\Models\Photo;
use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Photo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id = rand(1,1000);

        return [
            'photo_name'=>$this->faker->text(60),
            'photo_description'=>$this->faker->text(128),
            'photo_path'=>'https://picsum.photos/id/'.$id.'/800/600',
            'created_at'=>$this->faker->dateTime(),
            'album_id'=>Album::factory(),
        ];
    }
}
