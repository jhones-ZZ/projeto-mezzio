<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Laminas\Hydrator\ClassMethodsHydrator;

/**
 * Mensagens
 *
 * @ORM\Table(name="mensagens", indexes={@ORM\Index(name="fk_tb_mensagem_tb_usuario_idx", columns={"usuario_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\MensagensRepository")
 */
class Mensagens
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
     * @var Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     * })
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="mensagem", type="text", length=65535, nullable=false, options={"comment"="Descrição da mensagem"})
     */
    private string $mensagem;

    /**
     * @var string|null
     *
     * @ORM\Column(name="resposta", type="text", length=65535, nullable=true)
     */
    private ?string $resposta = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_mensagem", type="datetime", nullable=false, options={"comment"="Data da mensagem"})
     */
    private \DateTime $dataMensagem;

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
     * @ORM\Column(name="criado_em", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private \DateTime $criadoEm;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="alterado_em", type="datetime", nullable=true)
     */
    private ?\DateTime $alteradoEm = null;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="deletado_em", type="datetime", nullable=true)
     */
    private ?\DateTime $deletadoEm = null;

    /**
     * Mensagens constructor.
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
    public function getMensagem(): string
    {
        return $this->mensagem;
    }

    /**
     * @param string $mensagem
     * @return Mensagens
     */
    public function setMensagem(string $mensagem): Mensagens
    {
        $this->mensagem = $mensagem;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getResposta(): ?string
    {
        return $this->resposta;
    }

    /**
     * @param null|string $resposta
     * @return Mensagens
     */
    public function setResposta(?string $resposta): Mensagens
    {
        $this->resposta = $resposta;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataMensagem(): \DateTime
    {
        return $this->dataMensagem;
    }

    /**
     * @param \DateTime $dataMensagem
     * @return Mensagens
     */
    public function setDataMensagem(): Mensagens
    {
        $this->dataMensagem = new \DateTime('now');
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
     * @return Mensagens
     */
    public function setAtivo(bool $ativo): Mensagens
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
     * @return Mensagens
     */
    public function setCriadoEm(): Mensagens
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
     * @return Mensagens
     */
    public function setAlteradoEm(): Mensagens
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
     * @return Mensagens
     */
    public function setDeletadoEm(): Mensagens
    {
        $this->deletadoEm = new \DateTime('now');
        return $this;
    }

    /**
     * @return Usuarios
     */
    public function getUsuario(): Usuarios
    {
        return $this->usuario;
    }

    /**
     * @param Usuarios $usuario
     * @return Mensagens
     */
    public function setUsuario(Usuarios $usuario): Mensagens
    {
        $this->usuario = $usuario;
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
