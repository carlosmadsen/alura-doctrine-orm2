<?php

use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$cursoRepository = $entityManager->getRepository(Curso::class);

//retornando todos os cursos
$cursoList = $cursoRepository->findAll();
if (count($cursoList) > 0) {
	foreach ($cursoList as $curso) {
		echo 'Id: ' . $curso->getId() . "\nNome: " . $curso->getNome() . "\n";		
		$alunos = $curso->getAlunos();
		if ($alunos->count()>0) {
			echo 'Alunos: ';
			foreach ($alunos as $aluno) {
				echo $aluno->getNome() . ' (id: '. $aluno->getId().') ';
			}
			echo "\n";
		}
		echo "\n";
	}
} else {
	echo "Nenhum aluno encontrado. \n\n";
}
