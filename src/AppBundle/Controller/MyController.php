<?php
/**
 * Created by PhpStorm.
 * User: kok
 * Date: 2017/8/27
 * Time: 21:09
 */
namespace  AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MyController extends Controller
{
    /**
     * @Route("My/harry");
     */
    function harryAction()
    {
        $str ='flower,七夕节快乐';
        return new Response("<html><header></header><body>".$str."</body></html>");
    }


    /**
     * @Route("My/heart");
     */

    function myHeartAction ()
    {
        $str ='flower,七夕节快乐';
        return $this->render('my/heart.html.twig',['str'=>$str]);
       // return new Response("<html><header></header><body>".$str."</body></html>");
    }

    /**
     * @Route("My/doc");
     */
    function docAction()
    {
        return $this->redirect('http://symfony.com/doc');

    }
}