<html>
	<head>
		{{ HTML::script("packages/artesaos/moip/jquery-2.1.3.js") }}
		{{ HTML::script("packages/artesaos/moip/jquery-2.1.3.min.js") }}
		{{ HTML::script($moip['environment'], ["charset" => "ISO-8859-1", "type" => "text/javascript"])}}
		
	    <script type="text/javascript">

	    	/**
	    	 * callbackSuccess
	    	 * Rescebe o retorno de sucesso do moip
	    	 * 
	    	 * @param  {[]} data callback de sucesso
	    	 * @return {void}
	    	 */
	        var callbackSuccess = function(data){
	            $.post("{{ route('artesaos.moip') }}", {moip: data});
	        };

	        /**
	         * callbackFaill
	         * Rescebe o retorno de falha do moip
	    	 * 
	    	 * @param  {[]} data callback de falha
	    	 * @return {void}
	         */
	        var callbackFaill = function(data) {
	            $.post("{{ route('artesaos.moip') }}", {moip: data});
	        };

	        /**
	         * payment
	         * Json que será evniado para o js de pagamento do moip
	         * afim de validar as informações nele contido
	         * 
	         * @return {void}
	         */
	        payment = function() {
	            var settings = {
	                "Forma": "{{$moip['Forma']}}",
					"Instituicao": "{{$moip['Instituicao']}}",
				    "Parcelas": "{{$moip['Parcelas']}}",
				    "CartaoCredito": {
				        "Numero": "{{$moip['CartaoCredito']['Numero']}}",
				        "Expiracao": "{{$moip['CartaoCredito']['Expiracao']}}",
				        "CodigoSeguranca": "{{$moip['CartaoCredito']['CodigoSeguranca']}}",
				        "Portador": {
				            "Nome": "{{$moip['CartaoCredito']['Portador']['Nome']}}",
				            "DataNascimento": "{{$moip['CartaoCredito']['Portador']['DataNascimento']}}",
				            "Telefone": "{{$moip['CartaoCredito']['Portador']['Telefone']}}",
				            "Identidade": "{{$moip['CartaoCredito']['Portador']['Identidade']}}"
				        }
				    }
	            }

	            MoipWidget(settings);
	        }
	    </script>
			
		<script type="text/javascript">
		   	$(document).ready(function(){
				payment();
			}); 
		</script>
	</head>
	<body>
	    <div 
	    	id="MoipWidget"
	        data-token="{{ $moip['token'] }}"
	        callback-method-success="callbackSuccess"
	        callback-method-error="callbackFaill">
	    </div>
	</body>
</html>