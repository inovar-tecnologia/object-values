<?php

use InovarTecnologia\ObjectValues\Documentos\Cnh;

test('instancia', function ($cnh) {

    expect(new Cnh($cnh))
        ->toBeInstanceOf(Cnh::class);

})->with('cnhs');

describe('validação', function () {

    test('quantidade de digitos', function ($cnh) {

        expect(fn() => new Cnh($cnh))
            ->toThrow(
                DomainException::class,
                'O número não possui 11 digitos',
            );

    })->with('cnhs_qtd_digitos_invalidos');

    test('digitos iguais', function ($cnh) {

        expect(fn() => new Cnh($cnh))
            ->toThrow(
                DomainException::class,
                'O Número não pode possuir todos os digitos iguais',
            );

    })->with('cnhs_digitos_iguais');

    test('digito verificador', function ($cnh) {

        expect(fn() => new Cnh($cnh))
            ->toThrow(
                DomainException::class,
                'Digitos verificadores inválidos',
            );

    })->with('cnhs_dv_invalidos');

});

test('formatar', function ($cnh, $formatado) {

    expect(new Cnh($cnh))
        ->formatar()
        ->toBe($formatado);

})->with('cnhs');

test('limpar', function ($cnh, $formatado) {

    expect(new Cnh($cnh))
        ->numero
        ->toBe($formatado);

})->with('cnhs');
