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
		if ($telefones->count()>0) {
			echo 'Telefones: ';
			foreach ($telefones as $telefone) {
				echo $telefone->getNumero() . ' (id: '. $telefone->getId().') ';
			}
			echo "\n";
		}
		$cursos = $aluno->getCursos();
		if ($cursos->count()>0) {
			echo 'Cursos: ';
			foreach ($cursos as $curso) {
				echo $curso->getNome() . ' (id: '. $curso->getId().') ';
			}
			echo "\n";
		}
		echo "\n";
	}
} else {
	echo "Nenhum aluno encontrado. \n\n";
}
