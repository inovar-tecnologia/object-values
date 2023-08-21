<?php

use InovarTecnologia\ObjectValues\Documentos\NumeroDocumento;

test('parse para string', function ($numero, $formatar, $limpo) {

    $numero = new NumeroDocumento($numero);
    expect((string) $numero)
        ->toBe($limpo);


})->with('cpfs');

describe('instancia', function () {

    test('cpf', function ($numero, $formatar, $limpo) {

        expect($numero = new NumeroDocumento($numero))
            ->toBeInstanceOf(NumeroDocumento::class)
            ->formatar()
            ->toBe($formatar)
            ->numero()
            ->toBe($limpo);

    })->with('cpfs');

    test('cnpj', function ($numero) {

        expect(new NumeroDocumento($numero))
            ->toBeInstanceOf(NumeroDocumento::class);

    })->with('cnpjs');

});

describe('validacao', function () {

    test('cpfs', function ($numero) {
        expect(fn() => new NumeroDocumento($numero))
            ->toThrow(
                DomainException::class,
                $numero." não é um numero de documento válido",
            );
    })->with('cpfs_dv_invalidos');

    test('cnpjs', function ($numero) {
        expect(fn() => new NumeroDocumento($numero))
            ->toThrow(
                DomainException::class,
                $numero." não é um numero de documento válido",
            );
    })->with('cnpjs_dv_invalidos');

});
