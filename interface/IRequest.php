<?php

namespace cleveruz\phpmvc\interface;

interface IRequest
{
    public function getUrl(): string;
    public function getMethod(): string;
    public function getBody(): array;
}
