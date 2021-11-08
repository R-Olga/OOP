let category = document.getElementById('category');
let parameters = document.getElementById('parameters');

// Обработчик выбора категории
category.addEventListener('click', (event) => {
    for (let i = 0; i < category.getElementsByTagName('h1').length; i++) {
        category.getElementsByTagName('h1')[i].style.background = ('');

        event.target.style.background = ('red');
    }

    if (window.XMLHttpRequest) {
        request = new XMLHttpRequest();
    } else {
        request = new ActiveXObject("Microsoft.XMLHTTP");
    }

    request.open('GET', 'actions.php?category=' + event.target.innerText);
    request.onreadystatechange = function () {

        if (document.getElementById('parameters')) {
            document.getElementById('parameters').remove()
        }

        if (request.readyState == 4 && request.status == 200) {
            document.getElementById('conteiner').insertAdjacentHTML('beforeend', `<div id="parameters" style="margin-top:50px" oninput=testFunction()>${request.response}</div>`);
        }
    }

    request.send();
});

// Функция добавления кнопки
function testFunction() {
    if (!(document.getElementById('parameters').firstElementChild.lastElementChild.matches('button'))) {
        document.getElementById('parameters').firstElementChild.insertAdjacentHTML('beforeend', '<button id="apply" onclick="sort()"><strong>Apply</strong></button>');
    }
}


// Функция сортировки
function sort() {
    if (window.XMLHttpRequest) {
        request = new XMLHttpRequest();
    } else {
        request = new ActiveXObject("Microsoft.XMLHTTP");
    }

    let category = document.getElementById('parameters').firstElementChild.id;

    if (category == "Phones") {
        let price = document.getElementsByTagName('input')[0].value;
        let ram = document.getElementsByTagName('input')[1].value;
        let sims = document.getElementsByTagName('input')[2].value;
        let hdd = document.getElementsByTagName('input')[3].value;
        url = `actions.php?category=${category}&price=${price}&ram=${ram}&sims=${sims}&hdd=${hdd}`;
    }

    if (category == "Monitors") {

        let price = document.getElementsByTagName('input')[0].value;
        let diagonal = document.getElementsByTagName('input')[1].value;
        let frequency = document.getElementsByTagName('input')[2].value;
        url = `actions.php?category=${category}&price=${price}&diagonal=${diagonal}&frequency=${frequency}`;
    }

    request.open('GET', url);
    request.onreadystatechange = function () {

        if (request.readyState == 4 && request.status == 200) {
            document.getElementById('parameters').innerHTML = request.response;
        }
    }
    request.send();
}
