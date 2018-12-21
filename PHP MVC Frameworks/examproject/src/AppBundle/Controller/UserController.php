<?php

namespace AppBundle\Controller;

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
     */
    public function register(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

/*        $form->handleRequest($request);

        //$birthDate = $request->request->all()['user']['birthDate'];

        //$user->setBirthDate($birthDate);
        $user->setRegDate(new \DateTime("now"));
        $user->setLastLogin(new \DateTime("now"));

        if ($form->isSubmitted()) {
            echo "kuku";
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }*/

        return $this->render('default/index.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }
}
