<?php 
declare(strict_types=1);

$url = 'this-is-a-test-to-see-if-it-works.tk/pop-dosage/'
$src = '/var/www/' .$url;
$dst = 'root@139.162.244.63:/var/www/' .$url;

echo $tmp = <<< ____EOT
  rsync -avz  {$src}/ -e ssh {$dst}/
____EOT;
