<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Laminas\Hydrator\ClassMethodsHydrator;

/**
 * TiposUsuario
 *
 * @ORM\Table(name="tipos_usuario")
 * @ORM\Entity(repositoryClass="App\Repository\TiposUsuarioRepository")
 */
class TiposUsuario
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private ?int $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=45, nullable=false, options={"comment"="Tipo"})
     */
    private string $tipo;

    /**
     * @var bool
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=false, options={"default"="1","comment"="Está ativo?
0 - Não
    1 - Sim"})
     */
    private bool $ativo = true;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="criado_em", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP","comment"="Data de criação"})
     */
    private \DateTime $criadoEm;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="alterado_em", type="datetime", nullable=true, options={"comment"="Data de alteração"})
     */
    private ?\DateTime $alteradoEm = null;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="deletado_em", type="datetime", nullable=true, options={"comment"="Data de exclusão"})
     */
    private ?\DateTime $deletadoEm = null;

    /**
     * TiposUsuario constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->criadoEm = new \DateTime('now');
        (new ClassMethodsHydrator())->hydrate($data, $this);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTipo(): string
    {
        return $this->tipo;
    }

    /**
     * @param string $tipo
     * @return TiposUsuario
     */
    public function setTipo(string $tipo): TiposUsuario
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAtivo(): bool
    {
        return $this->ativo;
    }

    /**
     * @param bool $ativo
     * @return TiposUsuario
     */
    public function setAtivo(bool $ativo): TiposUsuario
    {
        $this->ativo = $ativo;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCriadoEm(): \DateTime
    {
        return $this->criadoEm;
    }

    /**
     * @return TiposUsuario
     */
    public function setCriadoEm(): TiposUsuario
    {
        $this->criadoEm = new \DateTime('now');
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getAlteradoEm(): ?\DateTime
    {
        return $this->alteradoEm;
    }

    /**
     * @return TiposUsuario
     */
    public function setAlteradoEm(): TiposUsuario
    {
        $this->alteradoEm = new \DateTime('now');
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDeletadoEm(): ?\DateTime
    {
        return $this->deletadoEm;
    }

    /**
     * @return TiposUsuario
     */
    public function setDeletadoEm(): TiposUsuario
    {
        $this->deletadoEm = new \DateTime('now');
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return (new ClassMethodsHydrator())->extract($this);
    }
}