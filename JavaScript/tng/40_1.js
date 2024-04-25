// 내가한거

const BTN = document.querySelector('#btn');
BTN.addEventListener('click', () => (alert('안녕하세요. 숨어있는 div를 찾아보세요.')));

const DOKI = document.querySelector('.doki');

function doki() {
    alert('두근두근')
}

function found(e) {
    alert('들켰다!');
    e.target.style.backgroundColor = 'cornflowerblue';
    DOKI.removeEventListener('mouseenter', doki);
    DOKI.removeEventListener('click', found);
    DOKI.addEventListener('click', hide);
}

function hide(e) {
    alert('다시 숨는다!');
    e.target.style.backgroundColor = 'transparent';
    DOKI.removeEventListener('click', hide);
    const RAN = Math.ceil(Math.random()*10);
    DOKI.setAttribute('margin','RAN%, RAN%, RAN%, RAN%');
    DOKI.addEventListener('mouseenter', doki);
    DOKI.addEventListener('click', found);
}


DOKI.addEventListener('mouseenter', doki);
DOKI.addEventListener('click', found);


