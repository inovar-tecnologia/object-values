<?php

use InovarTecnologia\ObjectValues\Documentos\Cpf;

test('instancia', function ($cpf) {

    expect(new Cpf($cpf))
        ->toBeInstanceOf(Cpf::class);

})->with('cpfs');

describe('validação', function () {

    test('quantidade de digitos', function ($cpf) {

        expect(fn() => new Cpf($cpf))
            ->toThrow(
                \DomainException::class,
                'O número não possui 11 digitos',
            );

    })->with('cpfs_qtd_digitos_invalidos');

    test('digitos iguais', function ($cpf) {

        expect(fn() => new Cpf($cpf))
            ->toThrow(
                \DomainException::class,
                'O Número não pode possuir todos os digitos iguais',
            );

    })->with('cpfs_digitos_iguais');

    test('digito verificador', function ($cpf) {

        expect(fn() => new Cpf($cpf))
            ->toThrow(
                \DomainException::class,
                'Digitos verificadores inválidos',
            );

    })->with('cpfs_dv_invalidos');

});

test('formatar', function ($cpf, $formatado) {

    expect(new Cpf($cpf))
        ->formatar()
        ->toBe($formatado);

})->with('cpfs');

test('limpar', function ($cpf, $formatado, $limpo) {

    expect(new Cpf($cpf))
        ->numero
        ->toBe($limpo);

})->with('cpfs');
