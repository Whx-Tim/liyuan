<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Sell::class, function (Faker\Generator $faker){
    return [
        'title' => $faker->sentence,
        'name' => $faker->name,
        'img' => $faker->imageUrl(),
        'price' => $faker->randomDigitNotNull,
        'content' => $faker->paragraph,
        'phone' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'user_id' => $faker->randomDigitNotNull,
    ];
});
$factory->define(App\Course::class, function (Faker\Generator $faker){
    return [
        'course_number' => mt_rand(10000,12000),
        'name' => $faker->sentence,
        'time' => '周xx 上午/下午 xx节',
        'teacher' => $faker->name,
        'want_name' => $faker->sentence,
        'want_teacher' => $faker->name,
        'phone' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'user_id' => 1,
    ];
});
$factory->define(App\CourseComment::class, function (Faker\Generator $faker){
    return [
        'course_number' => mt_rand(10000,12000),
        'name' => $faker->name,
        'time' => '周xx 上午/下午 xx节',
        'teacher' => $faker->name,
        'phone' => $faker->phoneNumber,
        'course_id' => 1,
    ];
});
$factory->define(App\PartTime::class, function (Faker\Generator $faker){
    return [
        'title' => $faker->sentence,
        'address' => $faker->address,
        'salary' => mt_rand(100,1000).'到'.mt_rand(1000,10000).'/薪水面议',
        'time' => '弹性说明',
        'required' => $faker->paragraph,
        'phone' => $faker->phoneNumber,
        'content' => $faker->paragraph,
        'email' => $faker->safeEmail,
        'user_id' => mt_rand(1,7),
    ];
});
$factory->define(App\Lost::class, function (Faker\Generator $faker){
    return [
        'info' => $faker->sentence,
        'content' => $faker->paragraph,
        'type' => '某类型',
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'user_id' => 1
    ];
});
$factory->define(App\Transport::class, function (Faker\Generator $faker){
    return [
        'address' => $faker->userName,
        'time' => 'xxx 上午/下午 xxx',
        'reward' => $faker->randomDigitNotNull,
        'company' => $faker->title,
        'info' => $faker->sentence,
        'consignee' => $faker->name,
        'ConsigneeAddress' => $faker->address,
        'phone' => $faker->phoneNumber,
        'condition' => true
    ];
});
$factory->define(App\Found::class, function (Faker\Generator $faker){
    return [
        'name' => $faker->name,
        'type' => '校园卡/其他',
        'address' => $faker->address,
        'info' => $faker->paragraph,
        'img' => $faker->imageUrl(),
        'location' => $faker->address,
        'phone' => $faker->phoneNumber,
        'user_id' => 1
    ];
});
$factory->define(App\Lost::class, function (Faker\Generator $faker){
    return [
        'info' => $faker->sentence,
        'content' => $faker->paragraph,
        'type' => '校园卡/其他',
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'user_id' => 1,
        'condition' => true
    ];
});
$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'user_id' => 1 
    ];
});
$factory->define(App\Information::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'type' => mt_rand(1,5),
    ];
});

