<?php

require_once 'src/core/init.php';

function escape($string)
{
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}
//Denne funktion bruger vi ti at sanitize user inputtet før det bliver vist på web pagen, som nedsætter riskoen for eventuelle security flaws som fx. cross-site scripting