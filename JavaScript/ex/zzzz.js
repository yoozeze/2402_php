const H1 = document.querySelector('h1');
// 클릭
H1.addEventListener('mousedown', e => {
    e.target.style.backgroundColor = 'red';
})
H1.addEventListener('mouseup', e => {
    e.target.style.backgroundColor = 'white';
})