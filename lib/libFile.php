<?php

use ProgramadorJunior\Ramais\Controller\RamaisAddController;
use ProgramadorJunior\Ramais\Controller\RamaisRepository;
use ProgramadorJunior\Ramais\Controller\RamaisListController;

require_once __DIR__ . '/../vendor/autoload.php';

$conn = new PDO('mysql:host=localhost;dbname=painel_monitoramento','root','');
$ramaisRepository = new RamaisRepository($conn);
$ramaisListController = new RamaisListController($ramaisRepository);
$ramaisAddController = new RamaisAddController($ramaisRepository);

$ramaisAddController->AddRamais();

echo json_encode($ramaisListController->ramais());