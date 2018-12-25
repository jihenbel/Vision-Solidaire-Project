<?php

namespace AppBundle\Service;

class UtilsService
{
    private $mailer;
    private $fromEmail;
    public function __construct (\Swift_Mailer $mailer, $fromEmail )
        {
            $this->mailer=$mailer;
            $this->fromEmail = $fromEmail;
        }
    public function envoieMail($message, $to, $suject){

        $message = (new \Swift_Message($suject))
            ->setFrom($this->fromEmail)
            ->setTo($to)
            ->setBody(
                $message,
                'text/html'
            );

        $this->mailer->send($message);

        // or, you can also fetch the mailer service this way
        // $this->get('mailer')->send($message);

       // return $this->render(...);

    }
}

?>
