<?php

class Miembro
{
    use Model\Model;
    protected $table = 'miembros';
    protected $allowedColumns = [
        'userTornado',
        'passTornado',
        'mailTornado'
    ];
}
