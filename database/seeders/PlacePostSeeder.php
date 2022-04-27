<?php

namespace Database\Seeders;

use App\Models\PlacePost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PlacePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 出力件数を指定
        $NUM_FAKER = 50;
        // Factoryインスタンスを生成
        $faker = Factory::create('ja_JP');
        // 本のタイトルのみ英語名なので日本語で定義
        $placeTitle = [
            'サウナ＆ホテル かるまる 池袋店',
            'サウナ＆カプセル 北欧',
            '黄金湯',
            '改良湯',
            'スパ＆カプセル ニューウィング',
            '東京ドーム天然温泉 Spa LaQua',
            'タイムズ スパ・レスタ',
            'サウナセンター',
            '新宿天然温泉 テルマー湯',
            '松本湯',
            'カプセル＆サウナ ロスコ',
            '豊島園 庭の湯',
            'ドシー恵比寿',
            'スパリゾートプレジデント',
            'スパジアムジャポン',
            'オアシスサウナ アスティル',
            'サウナ錦糸町',
            '東京荻窪天然温泉 なごみの湯',
            'SaunaLab Kanda',
            'サウナリゾートオリエンタル',
            'ソロサウナtune',
            'ROOFTOP',
            '久松湯',
            '天空のアジト マルシンスパ',
            '金春湯',
            'サウナ＆カプセル サンフラワー',
            'カプセルイン大塚',
            '両国湯屋江戸遊',
            '新宿区役所前カプセルホテル',
            '天然温泉 泉天空の湯 有明ガーデン',
        ];
        for ($i = 0; $i < count($placeTitle) - 1; $i++) {
            PlacePost::create([
                // 定義した値の中からランダムで本のタイトルを取得
                'place_name'  => $placeTitle[$i],
                'room_temp' => $faker->numberBetween(80, 110),
                'water_temp' => $faker->numberBetween(10, 20),
                'price' => $faker->numberBetween(8, 25) . "00",
                'address'  => $faker->address,
                'created_at' => $faker->dateTime('now'),
                'updated_at' => $faker->dateTime('now'),
            ]);
        }
    }
}
