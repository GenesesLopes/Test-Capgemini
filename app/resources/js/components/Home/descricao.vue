<template>
  <div class="card">
    <img
      src="images/Capgenimi-logo.png"
      width="200"
      height="200"
      class="card-img-top"
      alt="Logo capgenimi"
    />
    <div class="card-body">
      <h1 class="card-title text-center display-4">Mini sistema bancário</h1>
      <p class="card-text lead text-justify">
        Esta plataforma digital tem por finalidade executar algumas operações bancárias, nas quais são:
      </p>
      <dl class="row ">
          <dt class="col-sm-3 text-center">Cadastrar</dt>
          <dd class="col-sm-9">Cadastrar usuários, deixando-os em codições de realizar as opreaçõs bancárias necessárias. Para realizar a operação, é necessário fornecer:
            <ul>
              <li>Nome completo</li>
              <li>CPF</li>
              <li>E-mail</li>
            </ul>
          </dd>
          <dt class="col-sm-3 text-center">Saldo</dt>
          <dd class="col-sm-9">
            Permitir que o usuário visualize os valores disponíveis na sua conta.  
          </dd>
          <dt class="col-sm-3 text-center">Depósito</dt>
          <dd class="col-sm-9">
            Permitir a inserção de valores em quaisquer conta cadastrada, utilizando as credencias (Agencia e conta corrente) do destinatário.
          </dd>
          <dt class="col-sm-3 text-center">Saque</dt>
          <dd class="col-sm-9">
            Permitir ao usuário a remoção de valores de sua conta, de acordo com o saldo disponível na mesma.
          </dd>
      </dl>
    </div>
  </div>
</template>
