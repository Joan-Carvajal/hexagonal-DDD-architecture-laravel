<?php

namespace Core\BoundedContext\Course\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Factories\Factory;

final class CourseModelFactory extends Factory{

    protected $model =CourseModel::class;

    public function definition(): array{
        return [
            'id'=> $this->faker->uuid(),
            'name'=> $this->faker->randomElement([
                'Course A',
                'Course B',
                'Course C',
                'Course D'

            ])
        ];
    }
}
