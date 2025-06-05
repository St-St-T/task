<?php

AddEventHandler("iblock", "OnAfterIBlockElementUpdate", array("MyClass", "OnAfterIBlockElementUpdateHandler"));
class MyClass
{
    public static function OnAfterIBlockElementUpdateHandler(&$arFields)
    {
        if ($arFields["RESULT"]) {

            if ($arFields['IBLOCK_ID'] == 1) {
                foreach ($arFields as $i) {
                    AddMessage2Log($i . "<br>");
                }
            }
        } else {
            AddMessage2Log("Ошибка");
        }
    }
}
