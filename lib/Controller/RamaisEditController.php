<?php

namespace ProgramadorJunior\Ramais\Controller;

class RamaisEditController
{
    public function editRamais() : array
    {
        $filas = json_decode(file_get_contents('filas.json'), true);
        $ramais = json_decode(file_get_contents('ramais.json'), true);
        $resultRamais = [];

        foreach ($ramais['filas'] as $ramal) {
            $resultRamais[str_replace("/", "", strchr($ramal['Name/username'], '/'))] = array(
                'ramal' => str_replace("/", "", strchr($ramal['Name/username'], '/')),
                'host' => $ramal['Host']
            );
        }

        foreach ($filas['callcenter'] as $fila) {
            $resultFilas = str_replace("/", "", strchr($fila['extension'], '/'));
            $resultRamais[$resultFilas]['status'] = $fila['status'];
            $resultRamais[$resultFilas]['nome'] = $fila['name'];
        }
        return $resultRamais;
    }
}
