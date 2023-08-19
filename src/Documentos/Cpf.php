<?php

namespace InovarTecnologia\ObjectValues\Documentos;

class Cpf extends NumeroDocumentoBase
{

    protected function regexFormatar(): array
    {
        return ['/^(\d{3})(\d{3})(\d{3})(\d{2})$/', '$1.$2.$3-$4'];
    }

    protected function digitosVerificadoresValidos(string $numero): bool
    {

        $somaDigitos1 = 0;
        for ($i = 0; $i < 9; $i++) {
            $somaDigitos1 += intval($numero[$i]) * (10 - $i);
        }
        $digitoVerificador1 = ($somaDigitos1 % 11) < 2 ? 0 : 11 - ($somaDigitos1 % 11);

        if ($digitoVerificador1 != $numero[9]) {

            return false;

        }

        $somaDigitos2 = 0;
        for ($i = 0; $i < 10; $i++) {
            $somaDigitos2 += intval($numero[$i]) * (11 - $i);
        }
        $digitoVerificador2 = ($somaDigitos2 % 11) < 2 ? 0 : 11 - ($somaDigitos2 % 11);

        if ($digitoVerificador2 != $numero[10]) {

            return false;

        }

        return true;

    }

    protected function quantidadeDeDigitos(): int
    {
        return 11;
    }
}
