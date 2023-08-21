<?php

namespace InovarTecnologia\ObjectValues\Documentos;

use DomainException;

class NumeroDocumento implements NumeroDocumentoInterface
{

    private readonly NumeroDocumentoInterface $numero;

    public function __construct(string|int $numero)
    {

        try {
            $this->numero = new Cpf($numero);
        } catch (DomainException) {
            try {
                $this->numero = new Cnpj($numero);
            } catch (DomainException) {
                throw new DomainException($numero.' não é um numero de documento válido');
            }
        }

    }

    public function formatar(): string
    {
        return $this->numero->formatar();
    }

    public function numero(): string
    {
        return $this->numero->numero();
    }

    public function __toString(): string
    {
        return (string) $this->numero;
    }

}