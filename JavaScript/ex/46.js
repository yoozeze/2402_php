// 콜백 지옥
// setTimeout(()=>{
//     console.log('A');
//     setTimeout(()=>{
//         console.log('B');
//         setTimeout(()=>{
//             console.log('C');
//         }, 1000);
//     }, 2000);
// }, 3000);

// 위에 콜백 지옥 개선
const PRO2 = (str, ms) => {
    return new Promise((resolve) => {
        setTimeout(() => {
            console.log(str)
            resolve();
        }, ms);
    });
}

// PRO2('A', 3000)
// .then(() => PRO2('B', 2000))
// .then(() => PRO2('C', 1000))
// .catch(() => console.log('ERROR'))
// .finally(() => console.log('FINALLY'));

// asnyc / await
const MYASYNC = async () => {
    try{
        await PRO2('A', 3000);
        await PRO2('B', 2000);
        await PRO2('C', 1000);
    } catch(err){
        console.log(err);
    }
}

MYASYNC();