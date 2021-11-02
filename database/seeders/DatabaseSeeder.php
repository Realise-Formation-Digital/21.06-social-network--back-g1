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
        // Je crée 15 users et 12 posts
        $user = User::factory()->count(15)->create();
        $post = Post::factory()->count(12)->create();

        // Je crée 10 commentaires et attache aléatoirement un commentaire à chaque personne
        $commentaire = Commentaire::factory()->count(10)->make()
        ->each(function($commentaire) use ($User) {
        $commentaire->user_id = $users->random()->id; 
        $commentaire->save();
        });

        // Je crée 10 posts et attache aléatoirement un post à chaque personne
        $posts = Post::factory()->count(5)->make()
        ->each(function($post) use ($users, $commentaires, $likes ) {
        $post->user_id = $users->random()->id;
        $post->commentaire_id = $commentaires->random()->id;
        $post->like_id = $likes->random()->id;
        $post->save();
        });
        // Je crée 10 consultation et attache aléatoirement une consultation à chaque personne
        $documents = Document::factory()->count(10)->make()
        ->each(function($document) use ($consultations) {
        $document->consultation_id = $consultations->random()->id;
        $document->save();
        });
    }
}