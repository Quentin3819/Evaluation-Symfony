<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use App\Entity\Genre;
use App\Entity\Movie;
use App\Entity\Studio;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use DateTime;
use \joshtronic\LoremIpsum;
use Symfony\Component\Security\Core\Encoder\SodiumPasswordEncoder;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        $lipsum = new \joshtronic\LoremIpsum();


        $actors = [];

        for($i=0; $i <50; $i++){
            $actor = new Actor();
            $actor->setFirstName($faker->firstName());
            $actor->setLastName($faker->lastName());
            $actor->setImage($faker->imageUrl());
            $manager->persist($actor);
            $actors[] = $actor;
        }

        $genres = [];

        for($i=0; $i <50; $i++){
            $genre = new Genre();
            $genre->setName($lipsum->words(1));
            $manager->persist($genre);
            $genres[] = $genre;
        }

        $studios = [];

        for($i=0; $i <50; $i++){
            $studio = new Studio();
            $studio->setName($faker->lastName());
            $manager->persist($studio);
            $studios[] = $studio;
        }

        $users = [];

        for($i=0; $i <50; $i++){
            $user = new User();
            $user->setEmail($faker->email);
            $user->setPassword($faker->password());
            $manager->persist($user);
            $users[] = $user;
        }

        $user->setEmail('admin@admin.fr');
        $user->setPassword('admin');
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);
        $users[] = $user;

        $movies = [];

        for($i=0; $i <50; $i++){
            $movie = new Movie();
            $movie->setName($lipsum->words(10));
            $movie->setOriginalName($lipsum->words(10));
            $movie->setReleaseDate(new DateTime());
            $movie->setSynopsis($lipsum->paragraphs(2));
            $movie->setSeen($faker->boolean(50));
            $movie->setWatchList($faker->boolean(50));
            $movie->setImage($faker->imageUrl());
            $movie->addActor($actors[$faker->numberBetween(0,49)]);
            $movie->addGenre($genres[$faker->numberBetween(0,49)]);
            $movie->addStudio($studios[$faker->numberBetween(0,49)]);


            $manager->persist($movie);
            $movies[] = $movie;
        }

        $manager->flush();
    }


}
