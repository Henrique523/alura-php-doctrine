<?php


namespace Alura\Doctrine\Entity;


use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 */
class Curso
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Comumn(type="string")
     */
    private $curso;

    /**
     * @ManyToMany(targetEntity="Aluno", inversedBy="cursos")
     */
    private $alunos;

    public function __construct()
    {
        $this->alunos = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCurso(): string
    {
        return $this->curso;
    }

    public function setCurso(string $curso): self
    {
        $this->curso = $curso;
        return $this;
    }

    public function addAluno(Aluno $aluno)
    {
        if($this->alunos->contains($aluno)) {
            return $this;
        }
        $this->alunos->add($aluno);
        $aluno->addCurso($this);

        return $this;
    }

    public function getAlunos()
    {
        return $this->alunos;
    }
}