<?php

namespace InovarTecnologia\ObjectValues\Documentos;

interface NumeroDocumentoInterface
{
    public function formatar(): string;

    public function numero(): string;

}