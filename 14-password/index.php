<?php
// On doit parfois générer des "hash"
// Un hash permet de masquer une vraie valeur
$message = '1234';
// Le md5 est une possibilité, il hash sur 32 caractères
var_dump(md5($message)); // 098f6bcd4621d373cade4e832627b4f6 par exemple
var_dump(md5('test') === '098f6bcd4621d373cade4e832627b4f6');
// Les sha* ont le même fonctionnement
var_dump(sha1('1234'));
var_dump(hash('sha256', '1234'));
var_dump(hash('sha512', '1234'));
// Pour nos mots de passe, on va plutôt utiliser password_hash()
$password = 'toto';
$hash = password_hash($password, PASSWORD_DEFAULT);
echo 'Mot de passe : ' . $password . '<br />';
echo 'Hash: ' . $hash . '<br />';
// Pour vérifier le hash
echo 'Check: ' . var_dump(password_verify('toto', $hash));