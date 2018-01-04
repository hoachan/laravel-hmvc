<?php

class Mailer {

}

class RegistersUsers {

    protected $mailer;

    public function __construct(Mailer $mailer){

        $this->mailer = $mailer;
    }

    public function setMailer (Mailer $mailer){
        $this->mailer = $mailer;

        return $this;
    }

}

//if normally regist, we have to registered it everytime
//way 1
$registration = new RegistersUsers(new Mailer);

//way 2 - instead of above, we will use to service 
App::bind('foo', function(){
    return new RegistersUsers(new Mailer);
    // ['foo' => 'bar']
});


// how to call it :  App::make('foo') or app('foo')
$registration = App::make('foo'); // call as $registration = new RegistersUsers(new Mailer); = new RegistersUsers(new Mailer);

