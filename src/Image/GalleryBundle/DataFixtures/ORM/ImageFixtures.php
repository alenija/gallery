<?php

namespace Image\GalleryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Image\GalleryBundle\Entity\Image;

class ImageFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $image1 = new Image();
        $image1->setName('01.jpeg');
        $image1->setAlbum($manager->merge($this->getReference('album-1')));
        $manager->persist($image1);

        $image2 = new Image();
        $image2->setName('02.jpeg');
        $image2->setAlbum($manager->merge($this->getReference('album-1')));
        $manager->persist($image2);

        $image3 = new Image();
        $image3->setName('03.jpeg');
        $image3->setAlbum($manager->merge($this->getReference('album-1')));
        $manager->persist($image3);

        $image4 = new Image();
        $image4->setName('04.jpeg');
        $image4->setAlbum($manager->merge($this->getReference('album-1')));
        $manager->persist($image4);

        $image5 = new Image();
        $image5->setName('05.jpeg');
        $image5->setAlbum($manager->merge($this->getReference('album-1')));
        $manager->persist($image5);

        $image6 = new Image();
        $image6->setName('11.jpeg');
        $image6->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image6);

        $image7 = new Image();
        $image7->setName('11.jpeg');
        $image7->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image7);

        $image8 = new Image();
        $image8->setName('11.jpeg');
        $image8->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image8);

        $image9 = new Image();
        $image9->setName('11.jpeg');
        $image9->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image9);

        $image10 = new Image();
        $image10->setName('10.jpeg');
        $image10->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image10);

        $image11 = new Image();
        $image11->setName('10.jpeg');
        $image11->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image11);

        $image12 = new Image();
        $image12->setName('10.jpeg');
        $image12->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image12);

        $image13 = new Image();
        $image13->setName('10.jpeg');
        $image13->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image13);

        $image14 = new Image();
        $image14->setName('10.jpeg');
        $image14->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image14);

        $image15 = new Image();
        $image15->setName('03.jpeg');
        $image15->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image15);

        $image16 = new Image();
        $image16->setName('02.jpeg');
        $image16->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image16);

        $image17 = new Image();
        $image17->setName('01.jpeg');
        $image17->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image17);

        $image18 = new Image();
        $image18->setName('09.jpeg');
        $image18->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image18);

        $image19 = new Image();
        $image19->setName('08.jpeg');
        $image19->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image19);

        $image20 = new Image();
        $image20->setName('10.jpeg');
        $image20->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image20);

        $image21 = new Image();
        $image21->setName('07.jpeg');
        $image21->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image21);


        $image22 = new Image();
        $image22->setName('02.jpeg');
        $image22->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image22);

        $image23 = new Image();
        $image23->setName('03.jpeg');
        $image23->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image23);

        $image24 = new Image();
        $image24->setName('04.jpeg');
        $image24->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image24);

        $image25 = new Image();
        $image25->setName('05.jpeg');
        $image25->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image25);

//
        $image25 = new Image();
        $image25->setName('05.jpeg');
        $image25->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image25);

        $image25 = new Image();
        $image25->setName('05.jpeg');
        $image25->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image25);

        $image25 = new Image();
        $image25->setName('05.jpeg');
        $image25->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image25);

        $image25 = new Image();
        $image25->setName('05.jpeg');
        $image25->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image25);

        $image25 = new Image();
        $image25->setName('05.jpeg');
        $image25->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image25);

        $image25 = new Image();
        $image25->setName('05.jpeg');
        $image25->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image25);

        $image25 = new Image();
        $image25->setName('05.jpeg');
        $image25->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image25);

        $image25 = new Image();
        $image25->setName('05.jpeg');
        $image25->setAlbum($manager->merge($this->getReference('album-2')));
        $manager->persist($image25);


        $image26 = new Image();
        $image26->setName('11.jpeg');
        $image26->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image26);

        $image27 = new Image();
        $image27->setName('11.jpeg');
        $image27->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image27);

        $image28 = new Image();
        $image28->setName('09.jpeg');
        $image28->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image28);

        $image29 = new Image();
        $image29->setName('08.jpeg');
        $image29->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image29);

        $image30 = new Image();
        $image30->setName('10.jpeg');
        $image30->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image30);

        $image31 = new Image();
        $image31->setName('01.jpeg');
        $image31->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image31);

        $image32 = new Image();
        $image32->setName('02.jpeg');
        $image32->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image32);

        $image33 = new Image();
        $image33->setName('03.jpeg');
        $image33->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image33);

        $image34 = new Image();
        $image34->setName('04.jpeg');
        $image34->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image34);

        $image35 = new Image();
        $image35->setName('05.jpeg');
        $image35->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image35);

        $image36 = new Image();
        $image36->setName('11.jpeg');
        $image36->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image36);

        $image36 = new Image();
        $image36->setName('11.jpeg');
        $image36->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image36);

        $image36 = new Image();
        $image36->setName('11.jpeg');
        $image36->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image36);

        $image36 = new Image();
        $image36->setName('11.jpeg');
        $image36->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image36);

        $image36 = new Image();
        $image36->setName('11.jpeg');
        $image36->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image36);

        $image36 = new Image();
        $image36->setName('11.jpeg');
        $image36->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image36);

        $image36 = new Image();
        $image36->setName('11.jpeg');
        $image36->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image36);

        $image36 = new Image();
        $image36->setName('11.jpeg');
        $image36->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image36);

        $image36 = new Image();
        $image36->setName('11.jpeg');
        $image36->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image36);

        $image37 = new Image();
        $image37->setName('10.jpeg');
        $image37->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image37);

        $image38 = new Image();
        $image38->setName('09.jpeg');
        $image38->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image38);

        $image39 = new Image();
        $image39->setName('08.jpeg');
        $image39->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image39);

        $image40 = new Image();
        $image40->setName('10.jpeg');
        $image40->setAlbum($manager->merge($this->getReference('album-3')));
        $manager->persist($image40);
       
        $image41 = new Image();
        $image41->setName('12.jpeg');
        $image41->setAlbum($manager->merge($this->getReference('album-4')));
        $manager->persist($image41);

        $image42 = new Image();
        $image42->setName('02.jpeg');
        $image42->setAlbum($manager->merge($this->getReference('album-4')));
        $manager->persist($image42);

        $image43 = new Image();
        $image43->setName('03.jpeg');
        $image43->setAlbum($manager->merge($this->getReference('album-4')));
        $manager->persist($image43);

        $image44 = new Image();
        $image44->setName('04.jpeg');
        $image44->setAlbum($manager->merge($this->getReference('album-4')));
        $manager->persist($image44);

        $image45 = new Image();
        $image45->setName('05.jpeg');
        $image45->setAlbum($manager->merge($this->getReference('album-4')));
        $manager->persist($image45);

        $image46 = new Image();
        $image46->setName('11.jpeg');
        $image46->setAlbum($manager->merge($this->getReference('album-4')));
        $manager->persist($image46);

        $image47 = new Image();
        $image47->setName('01.jpeg');
        $image47->setAlbum($manager->merge($this->getReference('album-4')));
        $manager->persist($image47);

        $image48 = new Image();
        $image48->setName('09.jpeg');
        $image48->setAlbum($manager->merge($this->getReference('album-4')));
        $manager->persist($image48);

        $image49 = new Image();
        $image49->setName('08.jpeg');
        $image49->setAlbum($manager->merge($this->getReference('album-4')));
        $manager->persist($image49);

        $image50 = new Image();
        $image50->setName('10.jpeg');
        $image50->setAlbum($manager->merge($this->getReference('album-4')));
        $manager->persist($image50);

        $image51 = new Image();
        $image51->setName('06.jpeg');
        $image51->setAlbum($manager->merge($this->getReference('album-4')));
        $manager->persist($image51);

        $image60 = new Image();
        $image60->setName('07.jpeg');
        $image60->setAlbum($manager->merge($this->getReference('album-5')));
        $manager->persist($image60);

        $image61 = new Image();
        $image61->setName('05.jpeg');
        $image61->setAlbum($manager->merge($this->getReference('album-5')));
        $manager->persist($image61);

        $manager->flush();
    }


    public function getOrder() //обязательный метод для определения порядка загрузки фикстур
    {
        return 2;
    }
}