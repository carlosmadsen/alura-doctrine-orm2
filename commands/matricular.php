<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

try {
	$idCurso = array_key_exists(1, $argv) ? $argv[1] : null;
	if (empty($idCurso)) {
		throw new \Exception('No primeiro parâmetro deve ser informado o id do curso.', 1);
	}
	if (!is_numeric($idCurso)) {
		throw new \Exception('O id do curso deve ser numérico.', 1);
	}
	$idAluno = array_key_exists(2, $argv) ? $argv[2] : null;
	if (empty($idAluno)) {
		throw new \Exception('O segundo parâmetro deve ser informado o id do aluno.', 1);
	}
	if (!is_numeric($idAluno)) {
		throw new \Exception('O id do aluno deve ser numérico.', 1);
	}

	$entityManager = EntityManagerCreator::createEntityManager();

	$curso = $entityManager->find(Curso::class, $idCurso);
	if (is_null($curso)) {
		throw new \Exception('Não foi possível localizar o curso com id '.$idCurso.'.', 1);
	}

	$aluno = $entityManager->find(Aluno::class, $idAluno);
	if (is_null($aluno)) {
		throw new \Exception('Não foi possível localizar o aluno com id '.$idAluno.'.', 1);
	}

	$curso->addAluno($aluno);
	$entityManager->merge($curso);
	$entityManager->flush();

	echo 'Aluno '.$aluno->getNome().' (id: '.$aluno->getId().') matriculado no curso ' . $curso->getNome() . ' (id: ' . $curso->getId() . ").\n\n";
} catch (\Exception $e) {
	echo $e->getMessage() . "\n\n";
}
