<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("menus")->insert([
            [
                "name" => "Bacon and Egg Breakfast Pizza",
                "price" => 80000,
                "photo" => "1.jpg",
                "desc" => "Put all your breakfast favorites like bacon, eggs and cheese on top of a pizza crust in this homemade breakfast pizza recipe!",
            ],
            [
                "name" => "Beef, peper, and onion",
                "price" => 80000,
                "photo" => "2.jpg",
                "desc" => "Enjoy pizza with Ground Beef, onions and peppers in under thirty minutes.",
            ],
            [
                "name" => "Buffalo Chicken Pizza",
                "price" => 70000,
                "photo" => "3.jpg",
                "desc" => "Got some leftover roasted chicken? This pizza is the PERFECT way to use it!",
            ],
            [
                "name" => "Turkey Burger Pizza",
                "price" => 90000,
                "photo" => "4.jpg",
                "desc" => "Craving burgers and pizza tonight? Treat your family to both with this wholesome mash-up.",
            ],
            [
                "name" => "Cheese Pizza",
                "price" => 90000,
                "photo" => "5.jpg",
                "desc" => "Pizza with cheese topping",
            ],
            [
                "name" => "Garlic Chicken Pizza",
                "price" => 85000,
                "photo" => "6.jpg",
                "desc" => "Pizza night is made easy with this flavorful chicken and two-cheese pizza.",
            ],
            [
                "name" => "Hawaiian Pizza",
                "price" => 95000,
                "photo" => "7.jpg",
                "desc" => "balance out the sweet pineapple with smoky, salty pepperoni and spicy pickled jalapeños.",
            ],
            [
                "name" => "Middle Eastern pizza",
                "price" => 95000,
                "photo" => "8.jpg",
                "desc" => "Need a really easy idea for dinner? You can't go past this spiced lamb pizza, which uses Lebanese bread as its base.",
            ],
            [
                "name" => "Italian Meatball Pizza",
                "price" => 105000,
                "photo" => "9.jpg",
                "desc" => "Pizza with meatball topping",
            ],
            [
                "name" => "Mushroom and Ricotta Pizza",
                "price" => 75000,
                "photo" => "10.jpg",
                "desc" => "gluten-free pizza (using our favorite potato-based dough)",
            ],
            [
                "name" => "Pepperoni Pizza",
                "price" => 90000,
                "photo" => "11.jpg",
                "desc" => "Pizza with papperoni topping",
            ],
            [
                "name" => "Supreme Pizza",
                "price" => 80000,
                "photo" => "12.jpg",
                "desc" => "It’s a true supreme pizza: bacon, pepperoni slices, red and green bell pepper, red onion, black olives, mozzarella, Parmesan, and basil.",
            ],
            [
                "name" => "Tuna & Onion Pizza",
                "price" => 80000,
                "photo" => "13.jpg",
                "desc" => "Pizza with Tuna and onion topping",
            ],
            [
                "name" => "Wheat Veggie Pizza",
                "price" => 90000,
                "photo" => "14.jpg",
                "desc" => "A wonderful crust layered with herbed tomato sauce and toppings encourages my family of six to dig right in to this low-fat main course",
            ]
        ]);
    }
}
