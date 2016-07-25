<?php

namespace Image\GalleryBundle\Entity\Repository;

/**
 * ImageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ImageRepository extends \Doctrine\ORM\EntityRepository
{
    public function getImagesForAlbum($AlbumId)
    {
        $qb = $this->createQueryBuilder('i')
            ->where('i.album = :album_id')
            ->addOrderBy('i.id')
            ->setParameter('album_id', $AlbumId)
        ;

        return $qb->getQuery()->getArrayResult();
    }

    public function getLimImagesForAlbum($AlbumId, $limit)
    {
        $qb = $this->createQueryBuilder('i')
            ->where('i.album = :album_id')
            ->setParameter('album_id', $AlbumId)
            ->setMaxResults($limit)
        ;

        return $qb->getQuery()->getArrayResult();
    }
}