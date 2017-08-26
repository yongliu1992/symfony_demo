<?php
/**
 * Created by PhpStorm.
 * User: kok
 * Date: 2017/8/24
 * Time: 21:59
 */
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class  LuckyController extends Controller
{
    /**
     * @Route("lucky/number")
     */
    public function numberAction()
    {
        $number = mt_rand(1,100);
//        return new Response(
//          '<html><body> Lucky number :'.$number.'</body></html>'
//        );

        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
        ));
    }

}