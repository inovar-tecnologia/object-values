<?php

namespace InovarTecnologia\ObjectValues\Documentos;

class Cnpj extends NumeroDocumentoBase
{
    protected function digitosVerificadoresValidos(string $numero): bool
    {

        $pesos = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

        $calculo1 = [];

        foreach ($pesos as $i => $peso) {
            $calculo1[] = intval($numero[$i]) * $peso;
        }

        $resto1 = array_sum($calculo1) % 11;

        $digito1 = $resto1 < 2 ? 0 : 11 - $resto1;

        if (intval($numero[12]) !== $digito1) {
            return false;
        }

        $pesos = [6, ...$pesos];
        $calculo2 = [];

        foreach ($pesos as $i => $peso) {
            $calculo2[] = intval($numero[$i]) * $peso;
        }

        $resto2 = array_sum($calculo2) % 11;
        $digito2 = $resto2 < 2 ? 0 : 11 - $resto2;

        if (intval($numero[13]) !== $digito2) {
            return false;
        }

        return true;

    }

    protected function quantidadeDeDigitos(): int
    {
        return 14;
    }

    protected function regexFormatar(): array
    {
        return [
            '/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/',
            '$1.$2.$3/$4-$5',
        ];
    }
}
