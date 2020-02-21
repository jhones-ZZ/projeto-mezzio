<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Laminas\Hydrator\ClassMethodsHydrator;

/**
 * Usuarios
 *
 * @ORM\Table(name="usuarios", indexes={@ORM\Index(name="fk_tb_usuario_tb_tipo_usuario1_idx", columns={"tipo_usuario_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\UsuariosRepository")
 */
class Usuarios
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
     * @var TiposUsuario
     *
     * @ORM\ManyToOne(targetEntity="TiposUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_usuario_id", referencedColumnName="id")
     * })
     */
    private $tipoUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_completo", type="string", length=150, nullable=false, options={"comment"="Nome completo do usuário"})
     */
    private string $nomeCompleto;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=11, nullable=false, options={"comment"="CPF"})
     */
    private string $cpf;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_nascimento", type="date", nullable=false, options={"comment"="Data de nascimento"})
     */
    private \DateTime $dataNascimento;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private string $email;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=255, nullable=false, options={"comment"="Senha"})
     */
    private string $senha;

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
     * @ORM\Column(name="criado_em", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP","comment"="Data de criação do registro"})
     */
    private \DateTime $criadoEm;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="alterado_em", type="datetime", nullable=true, options={"comment"="Data de alteração do registro"})
     */
    private ?\DateTime $alteradoEm = null;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="deletado_em", type="datetime", nullable=true, options={"comment"="Data de exclusão do registro"})
     */
    private ?\DateTime $deletadoEm = null;

    /**
     * Usuarios constructor.
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
     * @return TiposUsuario
     */
    public function getTipoUsuario(): TiposUsuario
    {
        return $this->tipoUsuario;
    }

    /**
     * @param TiposUsuario $tipoUsuario
     * @return Usuarios
     */
    public function setTipoUsuario(?TiposUsuario $tipoUsuario): Usuarios
    {
        $this->tipoUsuario = $tipoUsuario;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomeCompleto(): string
    {
        return $this->nomeCompleto;
    }

    /**
     * @param string $nomeCompleto
     * @return Usuarios
     */
    public function setNomeCompleto(string $nomeCompleto): Usuarios
    {
        $this->nomeCompleto = $nomeCompleto;
        return $this;
    }

    /**
     * @return string
     */
    public function getCpf(): string
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     * @return Usuarios
     */
    public function setCpf(string $cpf): Usuarios
    {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataNascimento(): \DateTime
    {
        return $this->dataNascimento;
    }

    /**
     * @param \DateTime $dataNascimento
     * @return Usuarios
     */
    public function setDataNascimento(\DateTime $dataNascimento): Usuarios
    {
        $this->dataNascimento = $dataNascimento;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Usuarios
     */
    public function setEmail(string $email): Usuarios
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenha(): string
    {
        return $this->senha;
    }

    /**
     * @param string $senha
     * @return Usuarios
     */
    public function setSenha(string $senha): Usuarios
    {
        $this->senha = $this->encriptarSenha($senha);
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
     * @return Usuarios
     */
    public function setAtivo(bool $ativo): Usuarios
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
     * @return Usuarios
     */
    public function setCriadoEm(): Usuarios
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
     * @return Usuarios
     */
    public function setAlteradoEm(): Usuarios
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
     * @return Usuarios
     */
    public function setDeletadoEm(): Usuarios
    {
        $this->deletadoEm = new \DateTime('now');
        return $this;
    }

    /**
     * @param string $senha
     * @return string
     */
    public function encriptarSenha(string $senha): string
    {
        return md5($senha);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return (new ClassMethodsHydrator())->extract($this);
    }
}
