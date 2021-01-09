<?php if (isset($_COOKIE['bank'])||!empty($_COOKIE['bank'])) {
    echo true;
} else {
    echo false;
}
