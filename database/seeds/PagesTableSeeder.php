<?php

use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Faker Intance
        $faker = Faker\Factory::create();

        // Add the default pages
        $pagesArray = [];

        // About Page
        $pageAbout = new Page;
        $pageAbout->title = 'About Us';
        $pageAbout->sub_title = 'Learn more about us!';
        $pageAbout->body = "
            <p>Welcome to [store name], your number one source for all things [product, ie: shoes, bags, dog treats]. We're dedicated to giving you the very best of [product], with a focus on [three characteristics, ie: dependability, customer service and uniqueness.]</p>
            <p>Founded in [year] by [founder's name], [store name] has come a long way from its beginnings in a [starting location, ie: home office, toolshed, Houston, TX.]. When [store founder] first started out, his/her passion for [passion of founder, ie: helping other parents be more eco-friendly, providing the best equipment for his fellow musicians] drove him to [action, ie: do intense research, quit her day job], and gave him the impetus to turn hard work and inspiration into to a booming online store. We now serve customers all over [place, ie: the US, the world, the Austin area], and are thrilled to be a part of the [adjective, ie: quirky, eco-friendly, fair trade] wing of the [industry type, ie: fashion, baked goods, watches] industry.</p>
            <p>We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.</p>
            <p>Sincerely,<br>Name, [title, ie: CEO, Founder, etc.]</p>
        ";
        $pageAbout->link_text = 'about-us';
        $pageAbout->link_description = 'The about us page.';
        $pageAbout->active = true;
        $pageAbout->priority = 0;
        $pageAbout->created_by = 1;
        $pageAbout->modified_by = 1;
        $pageAbout->save();

        // Contact Page
        $pageContact = new Page;
        $pageContact->title = 'Contact Us';
        $pageContact->sub_title = 'We would love to hear from you!';
        $pageContact->body = "
            <p>
                [Company Name]<br />
                [Street Address]<br />
                [City], [State] [Zip]
                [Region] [Country]
        ";
        $pageContact->link_text = 'contact-us';
        $pageContact->link_description = 'The contact us page.';
        $pageContact->active = true;
        $pageContact->priority = 0;
        $pageContact->created_by = 1;
        $pageContact->modified_by = 1;
        $pageContact->save();

        $amount = (int) env('DEV_SEED_PAGES', 10);
        factory(App\Models\Page::class, $amount)->create();
    }
}
