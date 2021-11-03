<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commentaire;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Je crée 60 users 
        $users = User::factory()->count(60)->create();

        // Je crée 50 posts et attache aléatoirement un post à chaque personne
        $posts = Post::factory()->count(50)->make()
            ->each(function($post) use ($users) {
                $post->user_id = $users->random()->id;
                $post->save();
            });

                    

        // Je crée 50 commentaires et attache aléatoirement un commentaire à chaque personne
        $commentaires = Commentaire::factory()->count(50)->make()
            ->each(function($commentaire) use ($users,$posts) {
            $commentaire->user_id = $users->random()->id; 
            $commentaire->post_id = $posts->random()->id; 
            $commentaire->save();
        });


        // Je crée 40 consultation et attache aléatoirement une consultation à chaque personne
        $likes = Like::factory()->count(40)->make()
            ->each(function($like) use ($users,$posts) {
                $like->user_id = $users->random()->id;
                $like->post_id = $posts->random()->id;
                $like->save();
            });
    }
}