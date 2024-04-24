// 1.
const BTN = document.querySelector('#btn');
BTN.addEventListener('click', () => (alert('안녕하세요. 숨어있는 div를 찾아보세요.')));

// 2.
const DOKI = document.querySelector('.doki');
const DOKI2 = document.querySelector('.dokidoki');
DOKI2.addEventListener('mouseenter', doki);
DOKI.addEventListener('click', found);
DOKI.addEventListener('dblclick', hide);

function doki(){
    alert('두근두근')
}

function found(e) {
    alert('들켰다!');
    e.target.style.backgroundColor = 'cornflowerblue';
    DOKI2.removeEventListener('mouseenter', doki);
    DOKI.removeEventListener('click', found);
}

function hide(e) {
    alert('다시 숨는다.');
    e.target.style.backgroundColor = 'transparent';
    DOKI.removeEventListener('click', hide);
    DOKI2.addEventListener('mouseenter', doki);
    DOKI.addEventListener('click', found);
    DOKI.addEventListener('dblclick', hide);
}

// DOKI.addEventListener('mouseenter', doki);

// 3.
// DOKI.addEventListener('click', found);
// FOUND.addEventListener('click', e => {
//     (alert('들켰다!'));
//     e.target.style.backgroundColor = 'cornflowerblue';
// });



// function toggleDoki() {
//     const DOKI_CONTAINER = document.querySelector('.doki');
//     DOKI_CONTAINER.addEventListener('click')
// }

// 4.
// DOKI.addEventListener('click', hide);

// FOUND2.addEventListener('click', e => {
//     (alert('다시 숨는다.'));
//     e.target.style.backgroundColor = 'transparent';
// });