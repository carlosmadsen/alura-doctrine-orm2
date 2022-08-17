<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

try {
	$nome = array_key_exists(1, $argv) ? $argv[1] : null;
	if (empty($nome)) {
		throw new \Exception('No primeiro parâmetro deve ser informado o nome do aluno.', 1);
	}
	$numeroTelefone = array_key_exists(2, $argv) ? $argv[2] : null;
	if (empty($numeroTelefone)) {
		throw new \Exception('No segundo parâmetro deve ser informado o número de telefone do aluno.', 1);
	}
	$entityManager = EntityManagerCreator::createEntityManager();

	$a = new Aluno($nome);
	$a->addTelefone(new Telefone($numeroTelefone));
	//o persist não salva no banco, começa a observar as mudanças na entidade
	$entityManager->persist($a);
	//o flush realmente faz o update ou insert no banco
	$entityManager->flush();

	echo 'Aluno inserido com sucesso. Nome: ' . $a->getNome() . ' Id: ' . $a->getId() . ".\n\n";
} catch (\Exception $e) {
	echo $e->getMessage() . "\n\n";
}
