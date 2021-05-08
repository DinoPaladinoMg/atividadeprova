
<?php

require('conta.php');


/**
 * Classe responsavel por criar a conta especially
 * @param 1 int nuero da agenci
 * @param 2 decimal num da agencia
 * @param 3 password da conta
 */
class Especial extends Conta{
  
  private $limite = 0;

  /**
   * Função que determina o valor do limite
   * @param 1 decimal valor
   */
  public function setLimite($valor){
    $this->limite = $valor;
  }

  /**
   * Função que retorna o limite da conta
   * @access public
   * @return mensagem do limite
   */
  public function getLimite(){
    echo "\nSeu Limite é de R$" . number_format($this->limite,2,',','.');
  }

  /**
   * Função que retorna o saldo da conta
   * @access public
   * @return mensagem do saldo
   */
  public function getSaldo(){
    if($this->logado == true){
      echo "\nSeu Saldo é de R$" . number_format($this->saldo+$this->limite,2,',','.');
    }
  }

  /**
   * Função responsavel por realiza o saque
   * compara se o valor do saque é maior do que o valor do 
   * saldo mais o limite da conta
   * ela compara se o valor solicitado é maior do que 
   * o valor do saldo
   * 
   * @param int valor
   * @return mensagem do saque realizado
   */
  public function saque($valor){
    if($this->logado == true){
      if($valor <= ($this->saldo + $this->limite)){
        if($valor >= $this->saldo){
          echo "\nCuidado! Você entro no limite especial\n\n";
        }
      $this->saldo = $this->saldo - $valor;
      $this->setExtrato('saque', $valor);
      // echo "saldo: R$" . $this->saldo."\n";
      }else{
        echo "\nO valor solicitado é maior do que Saldo + Limite ";
      }
    }
  }
}

$conta = new Especial();