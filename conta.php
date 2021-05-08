<?php

class Conta{
  
  public $agencia;
  public $conta;
  private $senha;
  protected $saldo;
  protected $extrato = array();
  protected $logado = false;
  
  /**
   * Documentação da Classe Conta
   * Esta classe responsavel por criar as contas no sistema
   * @autor Prof Hericson
   * @version 1.0
   * 
   * Metodo construtor recebe os principais valores.
   * @param 1 int agencia
   * @param 2 decimal conta
   * @param 3 password
   */
  public function __construct($ag,$cc,$pwd){
    $this->agencia = $ag;
    $this->conta = $cc;
    $this->senha = md5($pwd);
    $this->saldo = 0;
  }

  /**
   * Metodo desconstrutor descontroi o objeto.
   */
  public function __destruct(){
    echo "\nObjeto Destruído\n";
  }
  
  /**
   * Metodo deposito, pega uma valor e deposita na sua conta
   * adicionando o valor ao saldo.
   * @param 1 decimal valor
   */
  public function deposito($valor){
    if($this->logado == true){
      $this->saldo = $this->saldo + $valor;
      $this->setExtrato('deposito', $valor);
      // echo "saldo: R$" .$this->saldo."\n";
    }
  }

   /**
   * Metodo saque, pega uma valor e saca da sua conta
   * subtraindo o valor do saldo.
   * @param 1 decimal valor
   */
  public function saque($valor){
    if($this->logado == true){
      $this->saldo = $this->saldo - $valor;
      $this->setExtrato('saque', $valor);
      // echo "saldo: R$" . $this->saldo."\n";
    }
  }

   /**
   * Metodo setExtrato, ele cria o extrato da conta
   * especificando que tipo de de ação foi feita
   * e o valor utilizado
   * @param 1 tipo gerado automaticamente pelas funções
   * @param 2 valor gerado automaticamente pelas funções
   */
   protected function setExtrato($tipo, $valor){
    if($this->logado == true){
      $this->extrato[] = [
        'data' => date("d-m-Y H:i:s"),
        'tipo' => $tipo,
        'valor' => $valor
      ];
    }
  }

  /**
   * Metodo acessar, ele permite voce acessar sua conta
   * se ao informar os parametros, os mesmos sejam compativeis
   * com os criados no medoto construtor, caso os dados forem
   * incorretos, aparecera uma mensagem informando qual dado 
   * esta errado.
   * @param 1 int agencia
   * @param 2 decimal conta
   * @param 3 password
   */
  public function acessar($agencia,$conta,$senha){
    if($conta == $this->conta){
      if($agencia == $this->agencia){
        if(md5($senha) == $this->senha){
          $this->logado = true;
        }else{
          echo "senha incorreta";
        }
      }else{
        echo "Agencia incorreta";
      }
    }else{
      echo "conta incorreta";
    }

  
  }

  /**
   * Metodo getExtrado, printa o extrato no terminal
   * @return extrato
   */
  public function getExtrato(){
    if($this->logado == true){
      return $this->extrato;
    }
  }

  /**
   * Metodo getSaldo, printa o saldo no terminal
   * @return saldo
   */
  public function getSaldo(){
    if($this->logado == true){
      echo "Seu Saldo é de R$" . number_format($this->saldo,2,',','.');
    }
  }
}

$conta = new Conta();