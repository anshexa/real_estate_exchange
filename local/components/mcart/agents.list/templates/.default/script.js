BX.ready(function() {
    // Получаем все DOM-элементы с классом star
    const stars = document.querySelectorAll(".star");

    for (const star of stars) {
        BX.bind(star, "click", clickStar);  // Вешаем обработчик события на click
    }
});

function clickStar(event) {
    event.preventDefault();

    /*
    Получаем agentID в template.php из атрибута dataset в классе star
    cо значением ID элемента Агента
     */

    const agentID = this.dataset.id;

    if (agentID) { // если ID есть, то делаем ajax-запрос
        BX.ajax // https://dev.1c-bitrix.ru/api_help/js_lib/ajax/bx_ajax_runcomponentaction.php
            .runComponentAction(
                "mcart:agents.list", // название компонента
                "clickStar", // название метода, который будет вызван из class.php
                {
                    mode: "class", //это означает, что мы хотим вызывать действие из class.php
                    data: {
                        agentID: agentID // параметры, которые передаются на бэк
                    },
                }
            )
            .then( // если на бэке нет ошибок выполнится
                BX.proxy((response) => {
                    let data = response.data;
                    if (data['action'] == 'success') {
                        // Отобразить пользователю, что агент добавлен в избранное (желтая звездочка)
                        this.classList.toggle('active');
                    }

                }, this)
            )
            .catch( // если на бэке есть ошибки выполнится
                BX.proxy((response) => {
                    console.log(response.errors);
                }, this)
            );
    }

}
