<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

//retornando todos os alunos
$alunoList = $alunoRepository->findAll();
foreach ($alunoList as $aluno) {
	echo 'Id: ' . $aluno->getId() . "\nNome: " . $aluno->getNome() . "\n\n";
}

//retornando somente um aluno pelo id 1
$aluno = $alunoRepository->find(1);
if (!is_null($aluno)) {
	echo 'Id: ' . $aluno->getId() . "\nNome: " . $aluno->getNome() . "\n\n";
}

//para usar o findo pode ser direto o $entityManager
$aluno = $entityManager->find(Aluno::class, 2);
if (!is_null($aluno)) {
	echo 'Id: ' . $aluno->getId() . "\nNome: " . $aluno->getNome() . "\n\n";
}

//buscando uma coleção por um critério
$alunos = $alunoRepository->findBy(['id' => '1']);
var_dump($alunos);

//buscando somente um por um critério
$aluno = $alunoRepository->findOneBy(['nome' => 'Carlos Alberto']);
if (!is_null($aluno)) {
	var_dump($aluno);
}

//contando o número de estudantes
$total = $alunoRepository->count([]);
echo "\nTotal de alunos: " . $total . "\n";
