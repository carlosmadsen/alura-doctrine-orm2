<?php

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\ManyToMany;
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
	#[ManyToMany(targetEntity: 'Curso', cascade: ['all'], inversedBy: 'alunos')]
	private Collection $cursos;

	public function __construct(
		#[Column]
		private string $nome
	) {
		$this->telefones = new ArrayCollection();
		$this->cursos = new ArrayCollection();
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

	public function addCurso(Curso $c) {
		if (!$this->cursos->contains($c)) {
			$this->cursos->add($c);
			$c->addAluno($this);
		}
	}

	public function getCursos(): iterable {
		return $this->cursos;
	}
}
