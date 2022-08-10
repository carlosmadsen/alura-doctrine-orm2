<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

try {
	$id = array_key_exists(1, $argv) ? (int) $argv[1] : null;
	if (empty($id)) {
		throw new \Exception('No primeiro parâmetro deve ser informado o id do aluno.', 1);
	}
	$entityManager = EntityManagerCreator::createEntityManager();

	//para buscar somente uma entidade pode ser usado direto o $entityManager
	$aluno = $entityManager->find(Aluno::class, $id);
	if (is_null($aluno)) {
		throw new \Exception('Não foi possível localizar o aluno com id '.$id.'.', 1);
	}

	//marcando para remover este aluno 
	$entityManager->remove($aluno);
	//executando a SQL de remover e demais comandos de entidades que estão sendo observadas
	$entityManager->flush();

	echo "Aluno removido com sucesso.\n\n";
} catch (\Exception $e) {
	echo $e->getMessage() . "\n\n";
}
