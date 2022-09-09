<?php
include_once 'conta.php';
include_once 'contapoupanca.php';
include_once 'contacorrente.php';
include_once 'cliente.php';

    $c1 = new Cliente("joao", "37890000", "1000", "caixa", "60000", "8000", "banrisul", "08/12");
    $c2 = new Cliente("marcos", "37890500", "2000", "caixa", "60000", "7000", "banrisul", "18/10");
    $c3 = new Cliente("maria", "937890000", "3000", "caixa", "60000", "9000", "banrisul", "26/09");
    $c4 = new Cliente("carlos", "34225889", "4523", "bradesco", "78900", "1233", "itaú", "12/06");
    
	echo $c1->nome .'<br>';
    $c1->contaCorrente->depositar(3456);
    $c1->contaCorrente->saldo();
    echo "agencia: " .$c1->contaCorrente->agencia .'<br>';
	//echo "numero da conta: " .Conta::$numeroConta += 1;
   // echo "numero da conta: " .$c1->numeroConta;/*.$c1->contaCorrente->numeroConta */
	
    echo "<br><br>";
    echo $c2->nome .'<br>';
    $c2->contaPoupanca->sacar(300);
    $c2->contaPoupanca->saldo();   
    $c2->contaPoupanca->depositar(5000);
    $c2->contaPoupanca->saldo();
    echo "agencia: " .$c2->contaPoupanca->agencia .'<br>';
//	echo "numero da conta: " .Conta::$numeroConta += 1;
  //  echo "numero da conta: " .Conta::$contador;/*.$c2->contaPoupanca->numeroConta .'<br>';*/
    
    echo "<br><br>";
    echo $c3->nome .'<br>';
    $c3->contaCorrente->depositar(2000);
    $c3->contaCorrente->sacar(3000);
    $c3->contaCorrente->saldo();
    echo "agencia: " .$c3->contaCorrente->agencia .'<br>';
	//echo "numero da conta: " .Conta::$numeroConta += 1;
 //   echo "numero da conta: " .Conta::$contador;/*.$c3->contaPoupanca->numeroConta .'<br>';*/
 
	echo '.<br>' .$c4->nome .'<br>';
	$c4->contaPoupanca->sacar(566);
	$c4->contaPoupanca->sacar(1000);
	$c4->contaPoupanca->depositar(400);
	$c4->contaPoupanca->saldo();
	echo "agencia: " .$c4->contaPoupanca->agencia .'<br>';
?>
