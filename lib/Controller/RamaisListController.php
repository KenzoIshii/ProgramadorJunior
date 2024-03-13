<?php
namespace ProgramadorJunior\Ramais\Controller;
readonly class RamaisListController
{
    public function __construct(private RamaisRepository $ramaisRepository)
    {}
    public function ramais() : array
    {
        $filas = $this->ramaisRepository->allRamais();
        $info_ramais = [];
        foreach($filas as $ramal){
            $ramal['status'] = mb_convert_case($ramal['status_ramal'], MB_CASE_LOWER, "UTF-8");
            $statusRamal['numero_ramal'] =
                match ($ramal['status']) {
                    'ring' => 'chamando',
                    'in use' => 'ocupado',
                    'paused' => 'pausa',
                    default => 'indisponivel'
                };

            $info_ramais[$ramal['numero_ramal']] = array(
                'ramal' => $ramal['numero_ramal'],
                'host' => $ramal['host'],
                'status' => $statusRamal['numero_ramal'],
                'nome' => $ramal['nome'],
                'statusOriginal' => $ramal['status']
            );
        }
        return $info_ramais;
    }
}