<?php

namespace InovarTecnologia\ObjectValues\Documentos;

class Cnh extends NumeroDocumentoBase
{
    protected function regexFormatar(): array
    {
        return ['/^(\d{11})$/', '$1'];
    }

    protected function digitosVerificadoresValidos(string $numero): bool
    {

        $pvRegCnh = $numero;

        $cnh_forn = substr($pvRegCnh, 0, 9);
        $incr_dig2 = 0;

        $soma = 0;

        $mult = 9;

        for ($j = 0; $j < 9; $j++) {
            $soma = $soma + (intval(substr($cnh_forn, $j, 1)) * $mult);
            $mult = $mult - 1;
        }

        $digito1 = $soma % 11;

        if ($digito1 == 10) {
            $incr_dig2 = -2;
        }

        if ($digito1 > 9) {
            $digito1 = 0;
        }

        if ($digito1 !== intval($numero[9])) {
            return false;
        }

        $soma = 0;
        $mult = 1;
        $digito2 = 0;

        for ($j = 0; $j < 9; $j++) {
            $soma = $soma + (intval(substr($cnh_forn, $j, 1)) * $mult);
            $mult = $mult + 1;
        }

        if ((($soma % 11) * $incr_dig2) < 0) {
            $digito2 = 11 + ($soma % 11) + $incr_dig2;
        }

        if ((($soma % 11) + $incr_dig2) >= 0) {
            $digito2 = ($soma % 11) + $incr_dig2;
        }

        if ($digito2 > 9) {
            $digito2 = 0;
        }

        if ($digito2 !== intval($numero[10])) {
            return false;
        }

        return true;

    }

    protected function quantidadeDeDigitos(): int
    {
        return 11;
    }
}
