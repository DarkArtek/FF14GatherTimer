<?php
use Illuminate\Database\Seeder;

class AreaMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('area_master')->insert([
            'name' => 'リムサ・ロミンサ：上甲板層',
            'region_id' => '1',
            'patch' => '2.x',
            'map' => '',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'リムサ・ロミンサ：下甲板層',
            'region_id' => '1',
            'patch' => '2.x',
            'map' => '',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'ミスト・ヴィレッジ',
            'region_id' => '1',
            'patch' => '2.x',
            'map' => '',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'ウルヴズジェイル係船場',
            'region_id' => '1',
            'patch' => '2.x',
            'map' => '',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => '中央ラノシア',
            'region_id' => '1',
            'patch' => '2.x',
            'map' => '5.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => '低地ラノシア',
            'region_id' => '1',
            'patch' => '2.x',
            'map' => '6.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => '東ラノシア',
            'region_id' => '1',
            'patch' => '2.x',
            'map' => '7.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => '高地ラノシア',
            'region_id' => '1',
            'patch' => '2.x',
            'map' => '8.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => '外地ラノシア',
            'region_id' => '1',
            'patch' => '2.x',
            'map' => '9.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'グリダニア：新市街',
            'region_id' => '2',
            'patch' => '2.x',
            'map' => '',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'グリダニア：旧市街',
            'region_id' => '2',
            'patch' => '2.x',
            'map' => '',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'ラベンダーベッド',
            'region_id' => '2',
            'patch' => '2.x',
            'map' => '',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => '黒衣森：中央森林',
            'region_id' => '2',
            'patch' => '2.x',
            'map' => '13.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => '黒衣森：東部森林',
            'region_id' => '2',
            'patch' => '2.x',
            'map' => '14.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => '黒衣森：南部森林',
            'region_id' => '2',
            'patch' => '2.x',
            'map' => '15.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => '黒衣森：北部森林',
            'region_id' => '2',
            'patch' => '2.x',
            'map' => '16.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'ウルダハ：ナル回廊',
            'region_id' => '3',
            'patch' => '2.x',
            'map' => '',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'ウルダハ：ザル回廊',
            'region_id' => '3',
            'patch' => '2.x',
            'map' => '',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'ゴブレットビュート',
            'region_id' => '3',
            'patch' => '2.x',
            'map' => '',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'ゴールドソーサ',
            'region_id' => '3',
            'patch' => '2.x',
            'map' => '',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => '西ザナラーン',
            'region_id' => '3',
            'patch' => '2.x',
            'map' => '21.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => '中央ザナラーン',
            'region_id' => '3',
            'patch' => '2.x',
            'map' => '22.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => '東ザナラーン',
            'region_id' => '3',
            'patch' => '2.x',
            'map' => '23.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => '南ザナラーン',
            'region_id' => '3',
            'patch' => '2.x',
            'map' => '24.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => '北ザナラーン',
            'region_id' => '3',
            'patch' => '2.x',
            'map' => '25.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'イシュガルド：下層',
            'region_id' => '4',
            'patch' => '3.x',
            'map' => '',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'イシュガルド：上層',
            'region_id' => '4',
            'patch' => '3.x',
            'map' => '',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'クルザス中央高地',
            'region_id' => '4',
            'patch' => '3.x',
            'map' => '28.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'クルザス西部高地',
            'region_id' => '4',
            'patch' => '3.x',
            'map' => '29.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'モードゥナ',
            'region_id' => '5',
            'patch' => '3.x',
            'map' => '30.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'アバラシア雲海',
            'region_id' => '6',
            'patch' => '3.x',
            'map' => '31.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'アジス・ラー',
            'region_id' => '6',
            'patch' => '3.x',
            'map' => '32.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'イディルシャイア',
            'region_id' => '7',
            'patch' => '3.x',
            'map' => '',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => '高地ドラヴァニア',
            'region_id' => '7',
            'patch' => '3.x',
            'map' => '34.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => '低地ドラヴァニア',
            'region_id' => '7',
            'patch' => '3.x',
            'map' => '35.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'ドラヴァニア雲海',
            'region_id' => '7',
            'patch' => '3.x',
            'map' => '36.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'ラールガーズリーチ',
            'region_id' => '8',
            'patch' => '4.x',
            'map' => '',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'ギラバニア辺境地帯',
            'region_id' => '8',
            'patch' => '4.x',
            'map' => '38.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'ギラバニア山岳地帯',
            'region_id' => '8',
            'patch' => '4.x',
            'map' => '39.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'ギラバニア湖畔地帯',
            'region_id' => '8',
            'patch' => '4.x',
            'map' => '40.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'クガネ',
            'region_id' => '9',
            'patch' => '4.x',
            'map' => '',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'シロガネ',
            'region_id' => '9',
            'patch' => '4.x',
            'map' => '',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => '紅玉海',
            'region_id' => '10',
            'patch' => '4.x',
            'map' => '43.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'ヤンサ',
            'region_id' => '10',
            'patch' => '4.x',
            'map' => '44.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => 'アジムステップ',
            'region_id' => '10',
            'patch' => '4.x',
            'map' => '45.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('area_master')->insert([
            'name' => '西ラノシア',
            'region_id' => '1',
            'patch' => '2.x',
            'map' => '46.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
