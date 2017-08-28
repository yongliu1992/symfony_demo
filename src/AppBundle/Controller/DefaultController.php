<?php
/**
 * Created by PhpStorm.
 * User: kok
 * Date: 2017/8/29
 * Time: 07:17
 */
namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{

    /**
     * @Route("Default/create")
     */
    public function createAction()
    {
        $em = $this->getDoctrine()->getManager();
        $product = new Product();
        $product->setName('Keyboard');
        $price = mt_rand(1,99);
        $product->setPrice($price);
        $product->setDescription('Ergonomic and stylish!');

        $em->persist($product);
        $em->flush();
        return new Response('Saved New product with id '.$product->getId());
    }

    //TODO 日后改进
    public function editAction()
    {
        $doctrine = $this->getDoctrine();
        $em = $doctrine->getManager();
        $em2 = $doctrine->getManager('other_connection');
    }

    /**
     * @Route("Default/show")
     */
    public function showAction()
    {
        $productId = intval($_GET['id']);
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($productId);
        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$productId
            );
        }

        $repository = $this->getDoctrine()->getRepository(Product::class);
        $product = $repository->findOneBy(
            array('name' => 'Keyboard', 'price' => 19.99)
        );

        return new Response('This is product id：'.$product->getId().'<br/> the price is'.$product->getPrice(  ));

    }

}
