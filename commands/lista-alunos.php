<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

//retornando todos os alunos
$alunoList = $alunoRepository->findAll();
if (count($alunoList) > 0) {
	foreach ($alunoList as $aluno) {
		echo 'Id: ' . $aluno->getId() . "\nNome: " . $aluno->getNome() . "\n";
		$telefones = $aluno->getTelefones();
		if (count($telefones)>0) {
			echo 'Telefones: ';
			foreach ($telefones as $telefone) {
				echo $telefone->getNumero() . ' [Id: '. $telefone->getId().'] ';
			}
			echo "\n";
		}
		echo "\n";
	}
} else {
	echo "Nenhum aluno encontrado. \n\n";
}
