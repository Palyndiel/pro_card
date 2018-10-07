<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Translation\Translator;

class CoreController extends Controller
{
    /**
     * @Route("/", defaults={"_locale" = "fr"})
     * @Route("/{_locale}/", requirements={"_locale": "en|fr"}, defaults={"_locale" = "fr"}, name="homepage")
     */
    public function indexAction(Request $request)
    {
        $listSkills = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Skill')
            ->findAll()
        ;

        $listExperiences = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Experience')
            ->findAll()
        ;

        return $this->render('default/index.html.twig', array(
            'listSkills' => $listSkills,
            'listExperiences' => $listExperiences,
        ));
    }

    /**
     * @Route("/contact", options={"expose"=true}, name="formContact")
     */
    public function contactAction(Request $request)
    {
        // configure
        $translator = $this->get('translator');
        $from = 'Contact form from website';
        $sendTo = 'maxym.mino@outlook.com';
        $subject = 'New message from contact form';
        $fields = array('name' => 'Name', 'email' => 'Email', 'message' => 'Message'); // array variable name => Text to appear in the email
        $okMessage = $translator->trans('form.mess.ok');
        $errorMessage = $translator->trans('form.mess.error');

        // let's do the sending

        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
            //your site secret key
            $secret = '6LdqmCAUAAAAANONcPUkgVpTSGGqm60cabVMVaON';
            //get verify response data

            $c = curl_init('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
            curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
            $verifyResponse = curl_exec($c);

            $responseData = json_decode($verifyResponse);
            if($responseData->success):

                try
                {
                    $emailText = nl2br("You have new message from Contact Form\n");

                    foreach ($_POST as $key => $value) {

                        if (isset($fields[$key])) {
                            $emailText .= nl2br("$fields[$key]: $value\n");
                        }
                    }

                    $mailer = $this->get('mailer');

                    $message = $mailer->createMessage()
                        ->setSubject($subject)
                        ->setFrom($from)
                        ->setTo($sendTo)
                        ->setBody($emailText);

                    $mailer->send($message);

                    $responseArray = array('type' => 'success', 'message' => $okMessage);
                }
                catch (\Exception $e)
                {
                    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
                }

                if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                    $encoded = json_encode($responseArray);

                    header('Content-Type: application/json');

                    echo $encoded;
                }
                else {
                    echo $responseArray['message'];
                }

        else:
            $errorMessage = $translator->trans('form.mess.robot');
            $responseArray = array('type' => 'danger', 'message' => $errorMessage);
            $encoded = json_encode($responseArray);

            header('Content-Type: application/json');

            echo $encoded;
        endif;
    else:
        $errorMessage = $translator->trans('form.mess.captcha');
        $responseArray = array('type' => 'danger', 'message' => $errorMessage);
        $encoded = json_encode($responseArray);

        header('Content-Type: application/json');

        echo $encoded;
    endif;
        return new Response();
    }
}
