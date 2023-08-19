<?php

dataset('cpfs', [
    'formatado' => ['976.736.260-63', '976.736.260-63', '97673626063'],
    'string numerica' => ['01533747059', '015.337.470-59', '01533747059'],
    'numero' => [70880421002, '708.804.210-02', '70880421002'],
]);

dataset('cpfs_qtd_digitos_invalidos', [
    '10 digitos' => '976.736.260-6',
    '12 digitos' => '015.337.470-599',
]);

dataset('cpfs_digitos_iguais', [
    '555.555.555-55',
]);

dataset('cpfs_dv_invalidos', [
    'segundo dv' => '976.736.260-62',
    'primeiro dv' => '678.039.560-02',
]);

dataset('cnpjs', [
    'formatado' => ['05.592.164/0001-79', '05.592.164/0001-79', '05592164000179'],
    'string numerica' => ['43446343000197', '43.446.343/0001-97', '43446343000197'],
    'numero' => [53682824000155, '53.682.824/0001-55', '53682824000155'],
]);

dataset('cnpjs_qtd_digitos_invalidos', [
    '13 digitos' => '16.278.181/000-52',
    '15 digitos' => '116.278.181/0001-52',
]);

dataset('cnpjs_digitos_iguais', [
    '11.111.111/1111-11',
    '22222222222222',
]);

dataset('cnpjs_dv_invalidos', [
    'primeiro dv' => '72.014.874/0001-19',
    'segundo dv' => '72.014.874/0001-08',
]);