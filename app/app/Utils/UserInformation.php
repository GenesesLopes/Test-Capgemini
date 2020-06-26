<?php

namespace App\Utils;

class UserInformation
{
    //Removendo caracteres que não sejam digitos do cpf
    public static function cpfDigits($value): string
    {
        return preg_replace("/\D/", "", $value);
    }

    //retornar numero de cpf formato 
    public static function cpfFormatted(string $value): string 
    {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/i","$1.$2.$3-$4",$value);
    }
}