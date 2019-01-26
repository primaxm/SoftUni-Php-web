<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Searching;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends Controller
{

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/register", name="user_register")
     * @throws \Exception
     */
    public function indexAction(Request $request)
    {
        $user = new User();
        $searching = new Searching();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        //$birthDate = $request->request->all()['user']['birthDate'];

        //$user->setBirthDate($birthDate);
        $user->setRegDate(new \DateTime("now"));
        $user->setLastLogin(new \DateTime("now"));

        if ($form->isValid() && $form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }

        return $this->render(
            'user/register.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

}
