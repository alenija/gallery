<?php

namespace Image\GalleryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Image\GalleryBundle\Entity\Album;

class AlbumFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $album1 = new Album();
        $album1->setName('A day with Symfony');
        $manager->persist($album1);

        $album2 = new Album();
        $album2->setName('The grid - A digital frontier');
        $manager->persist($album2);

        $album3 = new Album();
        $album3->setName('The pool on the roof must have a leak');
        $manager->persist($album3);

        $album4 = new Album();
        $album4->setName('Misdirection');
        $manager->persist($album4);

        $album5 = new Album();
        $album5->setName('GalleryBundle');
        $manager->persist($album5);        
        
        $manager->flush();

        $this->addReference('album-1', $album1);
        $this->addReference('album-2', $album2);
        $this->addReference('album-3', $album3);
        $this->addReference('album-4', $album4);
        $this->addReference('album-5', $album5);
    }


    public function getOrder()
    {
        return 1;
    }
}