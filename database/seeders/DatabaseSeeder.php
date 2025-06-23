<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    // GENRES
    $genres = ['Pop', 'Rock', 'Hip Hop', 'Jazz', 'Classical', 'EDM', 'Country'];
    $genreMap = [];

    foreach ($genres as $genre) {
      $genreMap[$genre] = DB::table('genres')->insertGetId([
        'name' => $genre,
        'created_at' => now(),
        'updated_at' => now(),
      ]);
    }

    // SINGERS
    $singers = [
      [
        'name' => 'Dua Lipa',
        'description' => 'English pop star',
        'genre_id' => $genreMap['Pop'],
        'image' => 'https://traxonsky.com/wp-content/uploads/2022/02/dualipaheadline-1.jpg',
      ],
      [
        'name' => 'Imagine Dragons',
        'description' => 'American rock band',
        'genre_id' => $genreMap['Rock'],
        'image' => 'https://www.rollingstone.com/wp-content/uploads/2024/06/imagine-dragons-QA.jpg?w=1581&h=1054&crop=1',
      ],
      [
        'name' => 'Kendrick Lamar',
        'description' => 'American rapper and lyricist',
        'genre_id' => $genreMap['Hip Hop'],
        'image' => 'https://cdn.apollo.audio/one/media/67a9/d509/21f1/f16e/4738/dd12/Kendrick-Lamar.jpg?quality=80&format=jpg&crop=0,0,2860,5078&resize=crop',
      ],
      [
        'name' => 'Olivia Rodrigo',
        'description' => 'Pop singer-songwriter',
        'genre_id' => $genreMap['Pop'],
        'image' => 'https://www.billboard.com/wp-content/uploads/2023/07/Olivia-Rodrigo-cr-Larissa-Hofmann-press-04-2023-billboard-1548.jpg',
      ],
      [
        'name' => 'Foo Fighters',
        'description' => 'American rock band',
        'genre_id' => $genreMap['Rock'],
        'image' => 'https://pasjabar.com/wp-content/uploads/2025/05/71ee7a892609a8cb9d9d94a175adc262-1024x666-1.jpg',
      ],
    ];

    foreach ($singers as $singer) {
      $singer['created_at'] = now();
      $singer['updated_at'] = now();
      DB::table('singers')->insert($singer);
    }

    // CONCERTS
    $concerts = [
      ['name' => 'Midnight Beats Tour', 'description' => 'A celebration of modern pop music.', 'singer' => 'Dua Lipa', 'image' => 'https://www.billboard.com/wp-content/uploads/2024/10/Dua-Lipa-cr-Elizabeth-Miranda-press-2024-billboard-1548.jpg'],
      ['name' => 'Rockstorm Revival', 'description' => 'Rock legends gather.', 'singer' => 'Imagine Dragons', 'image' => 'https://www.roevisual.com/statics/Images/News/News%202018/nathanreinds-imaginedragons-roe-hr-1.jpg'],
      ['name' => 'Hip Hop Heatwave', 'description' => 'A night of lyrical fire.', 'singer' => 'Kendrick Lamar', 'image' => 'https://www.billboard.com/wp-content/uploads/2022/09/kendrick-lamar-crytocom-arena-09172022-billboard-1548.jpg'],
      ['name' => 'Pop Paradise', 'description' => 'Fresh pop sounds.', 'singer' => 'Olivia Rodrigo', 'image' => 'https://variety.com/wp-content/uploads/2024/02/CJP12613.jpg?w=1000&h=563&crop=1'],
      ['name' => 'Rocknation Festival', 'description' => 'Uniting ASEAN rock fans.', 'singer' => 'Foo Fighters', 'image' => 'https://media.cnn.com/api/v1/images/stellar/prod/220904115014-04-taylor-hawkins-tribute-concert-0903.jpg?c=original'],
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
        'image' => $concert['image'],
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
