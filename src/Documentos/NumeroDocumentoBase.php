<?php

namespace InovarTecnologia\ObjectValues\Documentos;

use DomainException;

abstract class NumeroDocumentoBase implements NumeroDocumentoInterface
{

    public readonly string $numero;

    public function __construct(string|int $numero)
    {
        $this->numero = $this->limpar((string) $numero);
        $this->validarQuantidadeDeDigitos();
        $this->validarSeDigitosSaoTodosIguais();
        $this->validarDigitosVerificadores();
    }

    protected function limpar(string $numero): string
    {
        return preg_replace(
            pattern: $this->regexLimpar(),
            replacement: '',
            subject: $numero,
        ) ?? '';
    }

    protected function regexLimpar(): string
    {
        return '/\D/';
    }

    protected function validarQuantidadeDeDigitos(): void
    {

        if (strlen($this->numero) !== $this->quantidadeDeDigitos()) {
            throw new DomainException(
                "O número não possui {$this->quantidadeDeDigitos()} digitos"
            );
        }

    }

    abstract protected function quantidadeDeDigitos(): int;

    protected function validarSeDigitosSaoTodosIguais(): void
    {
        $digitosParaComparacao = $this->quantidadeDeDigitos() - 1;

        $matches = preg_match(
            pattern: '/(\d)\1{'.$digitosParaComparacao.'}/',
            subject: $this->numero
        );

        if ($matches) {
            throw new DomainException(
                'O Número não pode possuir todos os digitos iguais'
            );
        }

    }

    protected function validarDigitosVerificadores(): void
    {
        if ($this->digitosVerificadoresValidos($this->numero)) {
            return;
        }

        throw new DomainException('Digitos verificadores inválidos');
    }

    abstract protected function digitosVerificadoresValidos(string $numero): bool;

    public function formatar(): string
    {

        list($pattern, $replacement) = $this->regexFormatar();

        return (string) preg_replace(
            pattern: $pattern,
            replacement: $replacement,
            subject: $this->numero,
        );
    }

    /**
     * @return array{0: string, 1: string}
     */
    abstract protected function regexFormatar(): array;

    public function __toString(): string
    {
        return $this->numero();
    }

    public function numero(): string
    {
        return $this->numero;
    }

}