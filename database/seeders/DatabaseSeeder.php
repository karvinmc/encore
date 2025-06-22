<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
  public function run(): void
  {
    // USERS
    DB::table('users')->insert([
      [
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => Hash::make('password'),
        'role' => 'admin',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'Customer User',
        'email' => 'customer@example.com',
        'password' => Hash::make('password'),
        'role' => 'customer',
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);

    // VENUES
    $venues = [
      ['name' => 'Gelora Bung Karno Stadium', 'location' => 'Jakarta, Indonesia', 'capacity' => 77000],
      ['name' => 'Singapore National Stadium', 'location' => 'Kallang, Singapore', 'capacity' => 55000],
      ['name' => 'Rajamangala Stadium', 'location' => 'Bangkok, Thailand', 'capacity' => 50000],
      ['name' => 'Philippine Arena', 'location' => 'Bulacan, Philippines', 'capacity' => 55000],
      ['name' => 'Bukit Jalil National Stadium', 'location' => 'Kuala Lumpur, Malaysia', 'capacity' => 87411],
    ];

    foreach ($venues as $venue) {
      $venue['created_at'] = now();
      $venue['updated_at'] = now();
      DB::table('venues')->insert($venue);
    }

    // VENUE SECTIONS
    $venueIds = DB::table('venues')->pluck('id');
    $types = ['Regular', 'Seated', 'VIP'];

    foreach ($venueIds as $venue_id) {
      foreach ($types as $type) {
        $sectionType = match ($type) {
          'Regular' => 'standing',
          'Seated', 'VIP' => 'seated',
        };

        DB::table('venue_sections')->insert([
          'venue_id' => $venue_id,
          'name' => $type,
          'type' => $sectionType,
          'capacity' => rand(3000, 15000),
          'created_at' => now(),
          'updated_at' => now(),
        ]);
      }
    }

    // SINGERS
    $singers = [
      ['name' => 'Dua Lipa', 'description' => 'English pop star', 'genre' => 'Pop'],
      ['name' => 'Imagine Dragons', 'description' => 'American rock band', 'genre' => 'Rock'],
      ['name' => 'Kendrick Lamar', 'description' => 'American rapper and lyricist', 'genre' => 'Hip Hop'],
      ['name' => 'Olivia Rodrigo', 'description' => 'Pop singer-songwriter', 'genre' => 'Pop'],
      ['name' => 'Foo Fighters', 'description' => 'American rock band', 'genre' => 'Rock'],
    ];

    foreach ($singers as $singer) {
      $singer['created_at'] = now();
      $singer['updated_at'] = now();
      DB::table('singers')->insert($singer);
    }

    // CONCERTS
    $concerts = [
      ['name' => 'Midnight Beats Tour', 'description' => 'A celebration of modern pop music.', 'singer' => 'Dua Lipa'],
      ['name' => 'Rockstorm Revival', 'description' => 'Rock legends gather.', 'singer' => 'Imagine Dragons'],
      ['name' => 'Hip Hop Heatwave', 'description' => 'A night of lyrical fire.', 'singer' => 'Kendrick Lamar'],
      ['name' => 'Pop Paradise', 'description' => 'Fresh pop sounds.', 'singer' => 'Olivia Rodrigo'],
      ['name' => 'Rocknation Festival', 'description' => 'Uniting ASEAN rock fans.', 'singer' => 'Foo Fighters'],
    ];

    $venueIds = DB::table('venues')->pluck('id')->toArray();
    $singerMap = DB::table('singers')->pluck('id', 'name');
    $time = collect([[18, 0], [19, 0], [19, 30], [20, 0], [20, 30]])->random();

    foreach ($concerts as $concert) {
      $concertId = DB::table('concerts')->insertGetId([
        'name' => $concert['name'],
        'description' => $concert['description'],
        'date' => now()
          ->addDays(rand(10, 60))
          ->setTime($time[0], $time[1]),
        'venue_id' => $venueIds[array_rand($venueIds)],
        'created_at' => now(),
        'updated_at' => now(),
      ]);

      // Fill pivot table
      DB::table('concert_singer')->insert([
        'concert_id' => $concertId,
        'singer_id' => $singerMap[$concert['singer']],
        'created_at' => now(),
        'updated_at' => now(),
      ]);
    }

    // TICKETS
    $concerts = DB::table('concerts')->get();
    $sections = DB::table('venue_sections')->get();

    foreach ($concerts as $concert) {
      $venueSections = $sections->where('venue_id', $concert->venue_id);
      foreach ($venueSections as $section) {
        DB::table('tickets')->insert([
          'concert_id' => $concert->id,
          'venue_section_id' => $section->id,
          'price' => match ($section->name) {
            'Regular' => round(rand(1_000_000, 2_000_000), -3),
            'Seated' => round(rand(2_000_000, 4_000_000), -3),
            'VIP' => round(rand(5_000_000, 10_000_000), -3),
          },
          'stock' => rand(50, 200),
          'created_at' => now(),
          'updated_at' => now(),
        ]);
      }
    }
  }
}
