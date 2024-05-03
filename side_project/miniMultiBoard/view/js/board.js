document.querySelectorAll(".my-btn-detail").forEach(item => {
    item.addEventListener('click', () => {
        const url = '/board/detail?b_id=' + item.value;
        // console.log(url);
        axios.get(url)
        .then(response => {
            const data = response.data[0];
            
            const btnDelet = document.querySelector('#my-btn-delete')  // 삭제 버튼
            const btnUpdate = document.querySelector('#my-btn-update')  // 삭제 버튼
            const modalTitle = document.querySelector('.modal-title'); // 제목 노드
            const modalContent = document.querySelector('.modal-body > p'); // 내용 노드
            const modalImg = document.querySelector('.modal-body > img'); // 이미지 노드

            // 상세 정보 셋팅
            modalTitle.textContent = data.b_title;
            modalContent.textContent = data.b_content;
            modalImg.src = data.b_img;

            if(data.login_u_id !== data.u_id) {
                btnDelet.classList.add('d-none');
                btnUpdate.classList.add('d-none');
                btnDelet.value = '';
            } else {
                btnUpdate.classList.remove('d-none');
                btnDelet.classList.remove('d-none');
                btnDelet.value = data.b_id;
            }
            

        })
        .catch(err => console.log(err));
    });
});