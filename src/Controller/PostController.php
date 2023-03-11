<?php

namespace App\Controller;

use App\Entity\POST;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{

    private $em;

    /**
     * @param $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/post/{id}', name: 'app_post')]
    public function index(POST $post): Response {
        return $this->render('post/index.html.twig', [
            'controller_name' => [
                'saludo' => 'HolaPrueba1',
                'nombre' => 'PostController.php'
            ],
            'post' => $post //Esto directamente nos devolverá un array
            //con datos del POST en la BBDD, con el ID indicado; muy útil oye
        ]);
    }
    #[Route('/posts', name: 'all_posts')]
    public function verTodos(): Response {
        return $this->render('post/all-posts.html.twig', [
            'posts' => $this->em->getRepository(POST::class)->findAll()
        ]);
    }
}
