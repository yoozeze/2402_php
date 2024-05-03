<div id="div-error-msg" class="text-danger mb-3">
    <?php echo implode('<br>', $this->arrErrorMsg); ?>
    <?php 
    // 초기 작업
    // foreach($this->arrErrorMsg as $val) {
    //     echo '<div class="form-text text-danger">'.$val.'</div>';
    // }

    // 알러트로 처리하고 싶을 때
    // if(!empty($this->arrErrorMsg)) {
    //     echo "<script>alert('".implode('\n', $this->arrErrorMsg)."');</script>";
    // }
    ?>
</div>
