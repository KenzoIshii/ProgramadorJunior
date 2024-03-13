<?php

namespace ProgramadorJunior\Ramais\Controller;

use ProgramadorJunior\Ramais\Model\RamaisModel;

require_once __DIR__ . '/../../vendor/autoload.php';
class RamaisAddController
{
    public function __construct(private RamaisRepository $ramaisRepository)
    {}
    public function AddRamais() : void
    {
        $ramaisListController = new RamaisListController($this->ramaisRepository);
        $ramaisEditController = new RamaisEditController();

        $resultRamais = $ramaisEditController->editRamais();
        $ramaisList = $ramaisListController->ramais();

        $iguais = $diferentes = [];

        foreach ($resultRamais as $ramais) {
            $found = false;
            foreach ($ramaisList as $list) {
                if (array_key_exists('ramal', $list) && array_key_exists('ramal', $ramais) && $list['ramal'] === $ramais['ramal']) {
                    $iguais[] = $ramais;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $diferentes[] = $ramais;
            }
        }

        foreach ($iguais as $valueEdit) {
            $this->ramaisRepository->editRamais(new RamaisModel($valueEdit['nome'], $valueEdit['ramal'], $valueEdit['host'], $valueEdit['status']));
        }

        foreach ($diferentes as $valueInsert) {
            $this->ramaisRepository->insertRamais(new RamaisModel($valueInsert['nome'], $valueInsert['ramal'], $valueInsert['host'], $valueInsert['status']));
        }
    }
}