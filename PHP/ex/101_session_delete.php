<?php

session_start();

// 특정 세션 요소만 삭제할 경우 unset() 사용
// unset($_SESSION["my_session1"]);

// 세션 파기
session_destroy();