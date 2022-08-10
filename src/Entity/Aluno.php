<?php

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity]
class Aluno {
	#[Id]
	#[GeneratedValue]
	#[Column]
	private int $id;

	public function __construct(
		#[Column]
		private string $nome
	) {
	}

	public function getId(): int {
		return $this->id;
	}

	public function getNome(): string {
		return $this->nome;
	}

	public function setNome($n): void {
		$this->nome = $n;
	}
}
