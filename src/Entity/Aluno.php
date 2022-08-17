<?php

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[Entity]
class Aluno {
	#[Id, GeneratedValue, Column]
	private int $id;
	#[OneToMany(
		targetEntity: 'Telefone',
		mappedBy: 'aluno',
		cascade: ['persist', 'remove', 'merge']
	)
	]
	private Collection $telefones;

	public function __construct(
		#[Column]
		private string $nome
	) {
		$this->telefones = new ArrayCollection();
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

	public function addTelefone(Telefone $telefone) {
		$this->telefones->add($telefone);
		$telefone->setAluno($this);
	}

	public function getTelefones(): iterable {
		return $this->telefones;
	}
}
