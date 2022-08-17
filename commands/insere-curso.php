<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

try {
	$nome = array_key_exists(1, $argv) ? $argv[1] : null;
	if (empty($nome)) {
		throw new \Exception('No primeiro parâmetro deve ser informado o nome do curso.', 1);
	}	
	$entityManager = EntityManagerCreator::createEntityManager();

	$c = new Curso($nome);
	//o persist não salva no banco, começa a observar as mudanças na entidade
	$entityManager->persist($c);
	//o flush realmente faz o update ou insert no banco
	$entityManager->flush();

	echo 'Curso inserido com sucesso. Nome: ' . $c->getNome() . ' Id: ' . $c->getId() . ".\n\n";
} catch (\Exception $e) {
	echo $e->getMessage() . "\n\n";
}
