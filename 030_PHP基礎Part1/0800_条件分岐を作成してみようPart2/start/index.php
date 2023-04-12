<?php
// ==と===の違い
if (1 === '1') {
  echo 'true';
} else {
  echo 'false';
}
if (0 === '') {
  echo 'true';
} else {
  echo 'false';
}

$var = '';
if (0 === $var) {
  echo 'true';
} else {
  echo 'false';
}

if (!0) {
  echo 'true';
} else {
  echo 'false';
}
