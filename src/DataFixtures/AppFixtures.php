<?php

namespace App\DataFixtures;

use App\Entity\Concert;
use App\Entity\Dispo;
use App\Entity\Interesser;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('admin');
        $user->setPassword('admin');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setNom('emilien');
        $user->setPrenom('emilien');
        $user->setPhotoProfil('https://cdn.discordapp.com/attachments/676077029791236116/1177008249837465680/image.png?ex=6570f15a&is=655e7c5a&hm=b1faedfbc9283c3ea11fb8023bbb01cf62b5bfb531072865b24355f2824ea524&');
        $manager->persist($user);

        $user2 = new User();
        $user2->setEmail('user');
        $user2->setPassword('user');
        $user2->setRoles(['ROLE_USER']);
        $user2->setNom('Lamy');
        $user2->setPrenom('Andgy');
        $user2->setPhotoProfil('https://cdn.discordapp.com/attachments/676077029791236116/1177008470789214248/66789245c6dd98a5cd0730195536ee9b46c494bb.png?ex=6570f18f&is=655e7c8f&hm=ea953ced42eeac40129b07581996f9c0ac386fce2c37cc47d3a4dd7ade9d058c&');
        $manager->persist($user2);

        $concert = new Concert();
        $concert->setGroupe('Powerwolf');
        $concert->setDate(new \DateTime('2024-10-17'));
        $concert->setLieu('Paris - Zénith');
        $concert->setImage('https://cdn.discordapp.com/attachments/676077029791236116/1177005895218118666/powerwolfnew_0.png?ex=6570ef29&is=655e7a29&hm=b045488e485690ef8c6e02695d6d3266339121e99e8cab3f99e410a887b17952&');
        //liens vers un fichier audio dans la démo
        $concert->setDemo('https://cdn.discordapp.com/attachments/676077029791236116/1177006310563254383/Christ__Combat.mp3?ex=6570ef8c&is=655e7a8c&hm=bff9b433269c9530f99ffa8dc867ee6f8f492273be6dab0ff499eae0f384e355&');
        $concert->setLiens('https://www.livenation.fr/show/1447026/powerwolf/paris/2024-10-17/fr');
        $manager->persist($concert);

        $interesser = new Interesser();
        $interesser->setUser($user);
        $interesser->setConcert($concert);
        $interesser->setPlace(false);
        $manager->persist($interesser);

        $interesser2 = new Interesser();
        $interesser2->setUser($user2);
        $interesser2->setConcert($concert);
        $interesser2->setPlace(true);
        $manager->persist($interesser2);

        $manager->flush();
    }
}
