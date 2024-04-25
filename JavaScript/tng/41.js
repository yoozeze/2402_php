function CLOCK() {
    const LPADZERO = (val, length) => {
        return String(val).padStart(length, '0')
    }
    const NOW = new Date();
    const HOUR = NOW.getHours();
    // const AMPMHOURS = LPADZERO(NOW.getHours() ,2);
    const MINUTE = LPADZERO(NOW.getMinutes(), 2);
    const SECOND = LPADZERO(NOW.getSeconds(), 2);

    let ampm = '오전';
    let AMPMHOURS = HOUR;
    if(HOUR >= 12){
        ampm = '오후'
        AMPMHOURS = HOUR % 12;
        if(AMPMHOURS === 0) {
            AMPMHOURS = 12;
        }
    }
    if(AMPMHOURS < 10){
        AMPMHOURS = '0' + AMPMHOURS
    }

    const FOMAT_DATE = `현재 시각 ${ampm} ${AMPMHOURS}:${MINUTE}:${SECOND}`
    const TIME = document.querySelector('.time');
    TIME.innerHTML = FOMAT_DATE;
}

let NUM = setInterval(CLOCK, 1000);

console.log(NUM);

const STOP = document.querySelector('.stop');
STOP.addEventListener('click', () => {
    clearInterval(NUM);
})

// function STOP1() {
//     const STOPING = clearInterval(NUM);
//     const STOP = document.querySelector('.stop');
//     STOP.addEventListener('click', STOPING)
// }

const RE = document.querySelector('.re');
RE.addEventListener('click', () => {
    NUM = setInterval(CLOCK, 1000);
})
