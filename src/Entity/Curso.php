<?php

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[Entity]
class Curso {
	#[Id, GeneratedValue, Column]
	private int $id;
	#[ManyToMany(
		targetEntity: 'Aluno',
		mappedBy: 'cursos',
		cascade: ['persist', 'remove', 'merge']
	)
	]
	private Collection $alunos;

	public function __construct(
		#[Column]
		private string $nome
	) {
		$this->alunos = new ArrayCollection();
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

	public function addAluno(Aluno $a) {
		if (!$this->alunos->contains($a)) {
			$this->alunos->add($a);
			$a->addCurso($this);
		}
	}

	public function getAlunos(): iterable {
		return $this->alunos;
	}
}
