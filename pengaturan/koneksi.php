<?php
$konek = mysqli_connect("localhost", "root", "", "sikrepsi893");
if (!$konek) {
    echo mysqli_error($konek);
}
