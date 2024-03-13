<?php

namespace ProgramadorJunior\Ramais\Controller;

use ProgramadorJunior\Ramais\Model\RamaisModel;
use PDO;

readonly class RamaisRepository
{
    public function __construct(private PDO $conn)
    {
    }
    public function allRamais() : array
    {
        return $this->conn->query('SELECT * FROM ramais;')->fetchAll(PDO::FETCH_ASSOC);
    }
    public function editRamais(RamaisModel $ramais) : void
    {
        $sql = 'UPDATE ramais SET numero_ramal = :numero_ramal, nome = :nome, host = :host, status_ramal = :status_ramal, dt_hr_alteracao = NOW() WHERE numero_ramal = :numero_ramal;';
        $statement = $this->conn->prepare($sql);
        $statement->bindValue(':numero_ramal', $ramais->ramal);
        $statement->bindValue(':nome', $ramais->nome);
        $statement->bindValue(':host', $ramais->host);
        $statement->bindValue(':status_ramal', $ramais->status);
        $statement->bindValue(':numero_ramal', $ramais->ramal);

        $statement->execute();

    }
    public function insertRamais(RamaisModel $ramais) : void
    {
        $sql = 'INSERT INTO ramais VALUES (:numero_ramal, :nome, :host,:status_ramal,NOW(),NULL);';
        $statement = $this->conn->prepare($sql);
        $statement->bindValue(':numero_ramal', $ramais->ramal);
        $statement->bindValue(':nome', $ramais->nome);
        $statement->bindValue(':host', $ramais->host);
        $statement->bindValue(':status_ramal', $ramais->status);

        $statement->execute();
    }
}