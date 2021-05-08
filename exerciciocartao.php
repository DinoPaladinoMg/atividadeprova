<?php

//
//CODIGO NÃO FUNCIONOU E INCOMPLETO
//



class cartao{
  public $contacartao;
  public $numero;
  public $nome;
  public $bandeira;
  public $validade;
  private $saldo;
  private $senha;
  private $ccv;
  private $vencimento;
  private $limite_credito = 1000.00;
  public $extrato = array();
  private $logado = false;

  public function AbreCartao($ag,$cc,$pwd){
    $this->numero = $num;
    $this->nome = $name;
    $this->senha = $pwd;
    $this->saldo = 0;
  }

  public function acessar($numero,$nome,$senha){
    if($numero == $this->numero){
      if($nome == $this->nome){
        if($senha == $this->senha){
          $this->logado = true;
        }else{
          echo "senha incorreta";
        }
      }else{
        echo "numero incorreto";
      }
    }else{
      echo "nome incorreto";
    }

  }

  public function extrato($tipo, $valor){
    if($this->logado == true){
      $this->extrato[] = [
        'data' => date("d-m-Y H:i:s"),
        'tipo' => $tipo,
        'valor' => $valor
      ];
    }
  }

  public function getSaldo(){
    if($this->logado == true){
      echo "Seu Saldo é de R$" . number_format($this->saldo,2,',','.');
      echo "Seu Limite é de R$" . number_format($this->limite,2,',','.');
    }
    



}

//---------------------------------------------------------
//OPERAÇÕES DO CARTÃO

$contacartao = new cartao();
$contacartao->AbreCartao(1234000045670000,DANIEL M GONCALVES,0123);

$contacartao->acessar(1234000045670000,DANIEL M GONCALVES,0123);



foreach($contacartao->extrato as $extrato){
  echo $extrato['data'].'-'.$extrato['tipo'].' R$'. $extrato['valor']."\n " ;
}
$contacartao->getSaldo();