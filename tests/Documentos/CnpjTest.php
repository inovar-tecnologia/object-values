<?php

use InovarTecnologia\ObjectValues\Documentos\Cnpj;

test('instancia', function ($cnpj) {

    expect(new Cnpj($cnpj))
        ->toBeInstanceOf(Cnpj::class);

})->with('cnpjs');

describe('validação', function () {

    test('quantidade de digitos', function ($cnpj) {

        expect(fn() => new Cnpj($cnpj))
            ->toThrow(
                DomainException::class,
                'O número não possui 14 digitos'
            );

    })->with('cnpjs_qtd_digitos_invalidos');

    test('digitos iguais', function ($cnpj) {

        expect(fn() => new Cnpj($cnpj))
            ->toThrow(
                DomainException::class,
                'O Número não pode possuir todos os digitos iguais',
            );

    })->with('cnpjs_digitos_iguais');

    test('digito verificador', function ($cnpj) {

        expect(fn() => new Cnpj($cnpj))
            ->toThrow(
                DomainException::class,
                'Digitos verificadores inválidos',
            );

    })->with('cnpjs_dv_invalidos');

});

test('formatar', function ($cnpj, $formatado) {

    expect(new Cnpj($cnpj))
        ->formatar()
        ->toBe($formatado);

})->with('cnpjs');

test('limpar', function ($cnpj, $formatado, $limpo) {

    expect(new Cnpj($cnpj))
        ->numero
        ->toBe($limpo);

})->with('cnpjs');
