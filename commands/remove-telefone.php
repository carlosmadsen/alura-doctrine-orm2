<?php

use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

try {
	$id = array_key_exists(1, $argv) ? (int) $argv[1] : null;
	if (empty($id)) {
		throw new \Exception('No primeiro parâmetro deve ser informado o id do telefone.', 1);
	}
	$entityManager = EntityManagerCreator::createEntityManager();

	//o getPartialReference é mais eficiente do que o find, porque não faz select e só preeche o id. 
	$telefone = $entityManager->getPartialReference(Telefone::class, $id);
	if (is_null($telefone)) {
		throw new \Exception('Não foi possível localizar o telefone com id '.$id.'.', 1);
	}

	//marcando para remover este aluno 
	$entityManager->remove($telefone);
	//executando a SQL de remover e demais comandos de entidades que estão sendo observadas
	$entityManager->flush();

	echo "Telefone removido com sucesso.\n\n";
} catch (\Exception $e) {
	echo $e->getMessage() . "\n\n";
}
