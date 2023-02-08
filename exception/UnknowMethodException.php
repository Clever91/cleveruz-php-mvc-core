<?php

namespace cleveruz\phpmvc\exception;

use Exception;

class UnknowMethodException extends Exception
{
    protected $code = 410;
    protected $message = "Unknow method";
}
