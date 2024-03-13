<?php

namespace ProgramadorJunior\Ramais\Model;

class RamaisModel
{
    public function __construct(public string $nome, public string $ramal, public string $host, public string $status)
    {}
}