<?php
/**
 * Created by PhpStorm.
 * User: kok
 * Date: 2017/8/29
 * Time: 22:45
 */
namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;
use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Cache\Simple\FilesystemCache;

class TaskController extends Controller
{
    /**
     * @Route("Task/new")
     */
    public function newAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Post'))
            ->getForm();

        return $this->render('task/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("Task/test")
     */
 function testAction()
 {
     // make a real request to an external site
     $client = new Client();
     $crawler = $client->request('GET', ' http://localhost/test/c.php');

// select the form and fill in some values
     $form = $crawler->selectButton('Log in')->form();
     $form['login'] = 'symfonyfan';
     $form['password'] = 'anypass';

// submit that form
     $crawler = $client->submit($form);
    var_dump($crawler);
 }

    /**
     * @Route("Task/ttt")
     */

    function tttAction()
    {
        $loader = new FilesystemLoader(__DIR__ . '/views/%name%');

        $templating = new PhpEngine(new TemplateNameParser(), $loader);

        echo $templating->render('hello.html.twig', array('firstname' => 'Fabien'));


    }

    /**
     * @Route("Task/cache")
     */
    function cacheAction()
    {
   $cache = new Cache();
        // save a new item in the cache
        $cache->set('stats.num_products', 4711);

// or set it with a custom ttl
// $cache->set('stats.num_products', 4711, 3600);

// retrieve the cache item
        if (!$cache->has('stats.num_products')) {
            // ... item does not exists in the cache
        }

// retrieve the value stored by the item
        $numProducts = $cache->get('stats.num_products');

// or specify a default value, if the key doesn't exist
// $numProducts = $cache->get('stats.num_products', 100);

// remove the cache key
        $cache->delete('stats.num_products');

// clear *all* cache keys
        $cache->clear();


    }
}