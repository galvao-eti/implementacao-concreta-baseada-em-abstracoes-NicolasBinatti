<?php
require 'autoload.php';

use Alfa\SGBD;
use Alfa\BaseDeDados;
use Alfa\Produto;


$servidor = new SGBD('mysql');
$servidor->setEndereco('localhost');
$servidor->setPorta(3306);
$servidor->setUsuario('root');
$servidor->setSenha('');

$base = new BaseDeDados($servidor);
$base->setNome('alfa_oo');

try {
	$base->conectar();
} catch (Exception $e) {
	echo $e->getMessage();
}

$produto = new Produto($base);
$produto->setNome('produto');


try{
	$produto->create(array("nome","preco"),array("Mesa",219.00));
	//$produto->retrieve('nome','1');
	//$produto->update('nome', '\'Notebook\'' ,'nome = \'Lav\' ');
	//$produto->delete('id = 43');

} catch (Exception $e) {
	echo $e->getMessage();
        echo' <br>';
}
	$prod = $produto->retrieve('*','order by nome ');
foreach ($prod as $p){
	echo "| ID: $p[0] | NOME: $p[1] | PRECO:$p[2]| <br>";

}

$base->desconectar();