<?php 

class MoipCancellationTableSeeder extends Seeder {

    public function run()
    {
        DB::table('moip_cancellation')->delete();

        MoipCancellation::create([
        		'id' => 1,
        		'classification' => 'Dados inválidos',
        		'description'	=> 'Os dados digitados pelo Comprador estão incorretos: Número do Cartão, CVV ou Data de Vencimento. Solicite ao Comprador verificar os dados informados e corrigí-los para concluir a compra.',
        		'message'	=> 'Dados informados inválidos. Você digitou algo errado durante o preenchimento dos dados do seu Cartão. Certifique-se de que está usando o Cartão correto e faça uma nova tentativa.',
        		'recovery' => 'Alta'
        ]);

        MoipCancellation::create([
        		'id' => 2,
        		'classification' => 'Falha na comunicação com o Banco Emissor',
        		'description'	 => 'Houve uma falha na comunicação com o Banco, o Comprador deve fazer uma nova tentativa. Solicite ao Comprador tentar novamente. Caso não consiga, sugira outra forma de pagamento.',
        		'message'		 => 'Houve uma falha de comunicação com o Banco Emissor do seu Cartão, tente novamente.',
        		'recovery'		 => 'Alta'
        ]);

        MoipCancellation::create([
        		'id' => 3,
        		'classification' => 'Política do Banco Emissor',
        		'description'	 => 'Transação não autorizada pelas políticas do Banco Emissor. Dentre os possíveis motivos estão: análise de risco, comportamento de compra ou outro motivo semelhante. O Comprador deve entrar em contato com o Banco Emissor antes de tentar novamente. Solicite ao Comprador entrar em contato com o Banco parar liberar a transação e, depois, peça para concluí-la.',
        		'message'		 => 'O pagamento não foi autorizado pelo Banco Emissor do seu Cartão. Entre em contato com o Banco para entender o motivo e refazer o pagamento.',
        		'recovery'		 => 'Média'
        ]);

        MoipCancellation::create([
        		'id' => 4,
        		'classification' => 'Cartão vencido',
        		'description'	 => 'A validade do Cartão foi excedida. Ofereça outro meio de pagamento ao Comprador. Exemplo: outro Cartão, Boleto ou Transferência.',
        		'message'		 => 'A validade do seu Cartão expirou. Escolha outra forma de pagamento para concluir o pagamento.',
        		'recovery'		 => 'Alta'
        ]);

        MoipCancellation::create([
        		'id' => 5,
        		'classification' => 'Transação não autorizada',
        		'description'	 => 'O Banco Emissor não autorizou a compra. Um dos motivos possíveis é a falta de limite do Cartão para concluir o pagamento. Ofereça outro meio de pagamento para a compra ser finalizada.',
        		'message'		 => 'O pagamento não foi autorizado. Entre em contato com o Banco Emissor do seu Cartão.',
        		'recovery'		 => 'Média'
        ]);

        MoipCancellation::create([
        		'id' => 6,
        		'classification' => 'Transação duplicada',
        		'description'	 => 'O pagamento já foi realizado por outra transação. Informe o Comprador que a compra já foi concluída. Caso ele não encontre o outro pagamento, peça para entrar em contato com o Vendedor.',
        		'message'		 => 'Esse pagamento já foi realizado. Caso não encontre nenhuma referência ao pagamento anterior, por favor entre em contato com o nosso Atendimento.',
        		'recovery'		 => '-'
        ]);

        MoipCancellation::create([
        		'id' => 7,
        		'classification' => 'Política do Moip',
        		'description'	 => 'A transação possuía um risco muito elevado e, após os procedimentos de análise, ela foi negada.',
        		'message'		 => 'O pagamento não foi autorizado. Para mais informações, entre em contato com o nosso atendimento',
        		'recovery'		 => 'Média'
        ]);

        MoipCancellation::create([
        		'id' => 8,
        		'classification' => 'Solicitado pelo Comprador',
        		'description'	 => 'O Comprador solicitou o cancelamento da transação diretamente ao Moip. Entre em contato com o Comprador para entender o ocorrido.',
        		'message'		 => '',
        		'recovery'		 => '-'
        ]);

        MoipCancellation::create([
        		'id' => 9,
        		'classification' => 'Solicitado pelo Vendedor',
        		'description'	 => 'O Vendedor solicitou o cancelamento da transação diretamente ao Moip',
        		'message'		 => '',
        		'recovery'		 => '-'
        ]);

        MoipCancellation::create([
        		'id' => 10,
        		'classification' => 'Transação não processada',
        		'description'	 => 'Houve uma falha na comunicação do Moip. Solicite ao Comprador tentar finalizar a compra novamente. Caso ele não consiga, informe o Moip do ocorrido.',
        		'message'		 => 'O pagamento não pode ser processado. Por favor, tente novamente. Caso o erro persista, entre em contato com o nosso atendimento',
        		'recovery'		 => 'Alta'
        ]);

        MoipCancellation::create([
        		'id' => 11,
        		'classification' => 'Desconhecido',
        		'description'	 => 'Houve uma falha desconhecida no Banco Emissor. Informe o comprador que houve uma falha desconhecida no Banco Emissor. Caso o erro persista, entre em contato com o Moip.',
        		'message'		 => 'Houve uma falha de comunicação com o Banco Emissor do seu Cartão, tente novamente.',
        		'recovery'		 => 'Média'
        ]);

        MoipCancellation::create([
        		'id' => 12,
        		'classification' => 'Política de segurança do Banco Emissor',
        		'description'	 => 'O Cartão foi negado e não será possível concluir a compra com este Cartão. Informe o Comprador que houve um problema em seu Cartão e ele deve entrar em contato com o Banco para entender o ocorrido.',
        		'message'		 => 'Pagamento não autorizado para este Cartão. Entre em contato com o Banco Emissor para mais esclarecimentos.',
        		'recovery'		 => 'Baixa'
        ]);

        MoipCancellation::create([
        		'id' => 13,
        		'classification' => 'Valor inválido',
        		'description'	 => 'A transação possui um valor inválido para o Banco Emissor: valor total da transação está abaixo do mínimo, menor que 1 real; valor da parcela da transação está abaixo do mínimo, 5 reais; Valor total da transação é muito alto, exemplo R$999.999,00. Entre em contato com o Moip para esclarecer esse aspecto da sua integração.',
        		'message'		 => 'Pagamento não autorizado. Entre em contato com o Atendimento e informe o ocorrido.',
        		'recovery'		 => '-'
        ]);

        MoipCancellation::create([
        		'id' => 14,
        		'classification' => 'Política de segurança do Moip',
        		'description'	 => 'O Cartão foi negado e não será possível concluir a compra com este Cartão. Informe o Comprador que houve um problema em seu Cartão e ele deve entrar em contato com o Banco para entender o ocorrido.',
        		'message'		 => 'Pagamento não autorizado',
        		'recovery'		 => 'Baixa'
        ]);
    }
}