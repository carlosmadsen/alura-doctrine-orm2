<?php

use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

try {
	$id = array_key_exists(1, $argv) ? (int) $argv[1] : null;
	if (empty($id)) {
		throw new \Exception('No primeiro parâmetro deve ser informado o id do curso.', 1);
	}
	$entityManager = EntityManagerCreator::createEntityManager();
	$curso = $entityManager->find(Curso::class, $id);
	if (is_null($curso)) {
		throw new \Exception('Não foi possível localizar o curso com id '.$id.'.', 1);
	}
	$entityManager->remove($curso);
	$entityManager->flush();
	echo "Curso removido com sucesso.\n\n";
} catch (\Exception $e) {
	echo $e->getMessage() . "\n\n";
}
