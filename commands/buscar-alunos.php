<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

/** @var Aluno[] $alunoList */
$alunoList = $alunoRepository->findAll();

foreach ($alunoList as $aluno) {
    echo "ID: {$aluno->getId()} \n Nome: {$aluno->getNome()}\n\n";
}

$nico = $alunoRepository->find(3);
echo $nico->getNome() . PHP_EOL . PHP_EOL;

$sergioLopes = $alunoRepository->findOneBy([
    'nome' => 'Sergio Lopes',
]);

var_dump($sergioLopes);