<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * User mailer.
 */
class UserMailer extends Mailer
{
    /**
     * Mailer's name.
     *
     * @var string
     */
    public static $name = 'User';

    public function welcome($client)
    {
    	$this->to($client->mail)
    	->setProfile('envio')
    	->setEmailFormat('html')
    	->setTemplate('welcome_email_template')
    	->setLayout('default')
    	->setviewVars(['nome'=>$client->name])
    	->setSubject(sprintf('Bienvenido,%s',$client->name));

    }
    	/*
    public function recovery($user)
    {
    	$this->to($user[0]->[mail])
    	->setProfile('envio')
    	->setEmailFormat('html')
    	->setTemplate('welcome_email_template')
    	->setLayout('default')
    	->setviewVars(['nome'=>$user[0]['name'],'mail'=> $user[0]['email'].hash=>substr($user[0]['password'],0,25)])
    	->setSubject(sprintf('Recuperacion de clave'));
		
    }
    */
}
