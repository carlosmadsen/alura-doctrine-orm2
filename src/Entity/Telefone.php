<?php

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\GeneratedValue;

#[Entity]
class Telefone {
	#[Id, GeneratedValue, Column]
	private int $id;
	#[ManyToOne(targetEntity: 'Aluno', cascade: ['all'], inversedBy: 'telefones')]
	private Aluno $aluno;

	public function __construct(
		#[Column]
		private string $numero
	) {
	}

	public function getId(): int {
		return $this->id;
	}

	public function getNumero(): string {
		return $this->numero;
	}

	public function setNumero($n): void {
		$this->numero = $n;
	}

	public function setAluno(Aluno $aluno) {
		$this->aluno = $aluno;
	}

	public function getAluno() {
		return $this->aluno;
	}
}
