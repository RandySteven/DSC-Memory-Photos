<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'categoryName' => 'Wedding',
            'categoryDescription' => 'A wedding is a ceremony where two people are united in marriage. Wedding traditions and customs vary greatly between cultures, ethnic groups, religions, countries, and social classes. Most wedding ceremonies involve an exchange of marriage vows by a couple, presentation of a gift (offering, rings, symbolic item, flowers, money, dress), and a public proclamation of marriage by an authority figure or celebrant. ',
            'categoryThumbnail' => 'images/categories/wedding_category_thumbnail.png',
            'slug' => \Str::slug('Wedding')
        ]);

        Category::create([
            'categoryName' => 'Birthday',
            'categoryDescription' => 'A birthday is the anniversary of the birth of a person, or figuratively of an institution. Birthdays of people are celebrated in numerous cultures, often with birthday gifts, birthday cards, a birthday party, or a rite of passage.',
            'categoryThumbnail' => 'images/categories/birthday_category_thumbnail.png',
            'slug' => \Str::slug('Birthday')
        ]);

        Category::create([
            'categoryName' => 'Friendship',
            'categoryDescription' => 'Friendship is a relationship of mutual affection between people. It is a stronger form of interpersonal bond than an association, and has been studied in academic fields such as communication, sociology, social psychology, anthropology, and philosophy. Various academic theories of friendship have been proposed, including social exchange theory, equity theory, relational dialectics, and attachment styles.',
            'categoryThumbnail' => 'images/categories/friendship_category_thumbnail.png',
            'slug' => \Str::slug('Friendship')
        ]);
    }
}
