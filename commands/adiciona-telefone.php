<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

try {
	$idAluno = array_key_exists(1, $argv) ? $argv[1] : null;
	if (empty($idAluno)) {
		throw new \Exception('No primeiro parâmetro deve ser informado o id do aluno.', 1);
	}
	if (!is_numeric($idAluno)) {
		throw new \Exception('O primeiro parâmetro deve ser numérico.', 1);
	}
	$numeroTelefone = array_key_exists(2, $argv) ? $argv[2] : null;
	if (empty($numeroTelefone)) {
		throw new \Exception('No segundo parâmetro deve ser informado o número de telefone do aluno.', 1);
	}
	$entityManager = EntityManagerCreator::createEntityManager();
	$a = $entityManager->find(Aluno::class, $idAluno);
	if (is_null($a)) {
		throw new \Exception('Identificador de aluno inválido.', 1);
	}
	$a->addTelefone(new Telefone($numeroTelefone));
	
	$entityManager->merge($a);
	$entityManager->flush();
	echo 'Número de telefone '.$numeroTelefone.' adicionado ao aluno ' . $a->getNome() . ' (id: ' . $a->getId() . ") com sucesso.\n\n";
} catch (\Exception $e) {
	echo $e->getMessage() . "\n\n";
}
