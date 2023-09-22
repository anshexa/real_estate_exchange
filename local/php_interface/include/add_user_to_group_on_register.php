<?php
// регистрация обработчика
AddEventHandler(
    "main", // Идентификатор модуля который будет инициировать событие
    "OnBeforeUserRegister",    // Идентификатор события
    array(
        "AddUserToGroupOnRegisterClass",
        "addUserToGroupOnRegister") // Название функции обработчика (класс, название метода)
);


class AddUserToGroupOnRegisterClass
{
    /**
     * Handle main::OnBeforeUserRegister event
     *     when user registration
     * @param array &$arFields User data
     * @return void
     */
    // создаем обработчик события "OnBeforeUserRegister"
    public static function addUserToGroupOnRegister(array &$arFields): void
    {
        $buyerUserFieldId = 5;
        $sellerUserFieldId = 6;
        $buyerGroupId = 6;
        $sellerGroupId = 7;

        // добавляем в группу
        switch ($arFields["UF_USER_ROLE"]) {
            case $buyerUserFieldId:
                $arFields["GROUP_ID"][] = $buyerGroupId;
                break;
            case $sellerUserFieldId:
                $arFields["GROUP_ID"][] = $sellerGroupId;
                break;
        }
    }
}

?>
