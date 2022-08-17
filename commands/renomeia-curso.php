<?php

use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

try {
	$id = array_key_exists(1, $argv) ? (int) $argv[1] : null;
	if (empty($id)) {
		throw new \Exception('No primeiro parâmetro deve ser informado o id do curso.', 1);
	}
	$nome = array_key_exists(2, $argv) ? $argv[2] : null;
	if (empty($nome)) {
		throw new \Exception('No segundo parâmetro deve ser informado o novo nome do curso.', 1);
	}
	$entityManager = EntityManagerCreator::createEntityManager();

	//para buscar somente uma entidade pode ser usado direto o $entityManager
	$curso = $entityManager->find(Curso::class, $id);
	if (is_null($curso)) {
		throw new \Exception('Não foi possível localizar o aluno com id '.$id.'.', 1);
	}
	$curso->setNome($nome);	
	$entityManager->flush();

	echo "Curso atualizado com sucesso.\n\n";
} catch (\Exception $e) {
	echo $e->getMessage() . "\n\n";
}
