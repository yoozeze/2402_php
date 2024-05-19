function clickgray() {
    const container = document.querySelector('.search-button-container')

    const add_color = document.querySelector('.search-button')
    add_color.setAttribute('class', 'gray');
    container.appendChild(add_color)
}
function unclick() {
    const delete_color = document.querySelector('.search-button')
    add_color.setAttribute('class', '.search-button');
    container.appendChild(delete_color)
}

const color = document.querySelector('.search-button');
color.addEventListener('click', clickgray);
color.addEventListener('click', unclick);