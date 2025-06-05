<?php

AddEventHandler("iblock", "OnAfterIBlockElementUpdate", Array("MyClass", "OnAfterIBlockElementUpdateHandler"));
AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("MyClass", "OnAfterIBlockElementUpdateHandler"));

class MyClass
{
	public static function OnAfterIBlockElementUpdateHandler(&$arFields)
	{

		$iblockId = $arFields['IBLOCK_ID'];
		$elementId = $arFields['ID'];


		if ($iblockId == 1) {
            $props = CIBlockElement::GetProperty($iblockId, $elementId, array(), array('CODE' => 'MAIN'))->Fetch();

            if ($props && $props['VALUE'] == 'Y') {
                $res = CIBlockElement::GetList(
                    array(),
                    array(
                        'IBLOCK_ID' => $iblockId,
                        '!ID' => $elementId,
                        'PROPERTY_MAIN_VALUE' => 'Y'
                    ),
                    false,
                    false,
                    array('ID')
                );
                while ($item = $res->Fetch()) {
                    CIBlockElement::SetPropertyValues($item['ID'], $iblockId, null, 'MAIN');
                }
			}
		}
	}
}
?>