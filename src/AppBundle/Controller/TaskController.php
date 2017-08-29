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


class TaskController extends Controller
{
    /**
     * @Route("Task/new")
     */
    public function newAction(Request $request)
    {ç
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
}