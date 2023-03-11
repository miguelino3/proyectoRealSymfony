<?php

namespace App\Repository;

use App\Entity\POST;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<POST>
 *
 * @method POST|null find($id, $lockMode = null, $lockVersion = null)
 * @method POST|null findOneBy(array $criteria, array $orderBy = null)
 * @method POST[]    findAll()
 * @method POST[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class POSTRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, POST::class);
    }

    public function save(POST $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(POST $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
//Estas funciones que creamos, en REPOSITORIO, son a las que llamaremos luego en los 'Controllers'
// [se añadirán a la misma lista que aparece al llamar a las funciones de la clase EntityManagerInterface]
    public function findPost($id){
        return $this->getEntityManager()
            ->createQuery('
                SELECT post.id, post.titulo, post.tipo, post.descripcion
                FROM App:POST post
                WHERE post.id = :id
            ')->setParameter('id', $id)
        ->getResult();
    }

//    /**
//     * @return POST[] Returns an array of POST objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?POST
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
