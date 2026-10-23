<?php
/**
 * Seção: benefícios. A tecnologia aparece traduzida em resultado.
 */

$beneficios = [
	[ 'raio', 'Rápido de verdade', 'Abre em poucos segundos, até no 4G. Visitante que espera vai embora.' ],
	[ 'celular', 'Pensado para o celular', 'A maioria dos seus clientes vai acessar pelo celular. Tudo é desenhado para a tela pequena primeiro.' ],
	[ 'controle', 'Você no controle', 'Um painel simples para trocar textos, fotos e preços sem depender de ninguém.' ],
	[ 'busca', 'Fácil de achar no Google', 'Estrutura técnica pronta para os buscadores entenderem o seu site.' ],
	[ 'conexao', 'Conectado ao que você usa', 'WhatsApp, formulários, pagamentos, planilhas e o sistema que você já tem.' ],
	[ 'chave', 'O site é seu', 'Domínio e hospedagem ficam no seu nome. Sem letra miúda e sem ficar preso a ninguém.' ],
];
?>
<section class="secao secao--escura" id="beneficios">
	<div class="container">
		<header class="secao__cabeca">
			<p class="rotulo" data-reveal>Benefícios</p>
			<h2 class="secao__titulo" data-split>O que você ganha além de <em>um site bonito</em></h2>
		</header>

		<ul class="beneficios" data-stagger>
			<?php foreach ( $beneficios as [ $icone, $titulo, $texto ] ) : ?>
				<li class="beneficio">
					<span class="beneficio__icone"><?php echo rl_icone( $icone ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
					<h3><?php echo esc_html( $titulo ); ?></h3>
					<p><?php echo esc_html( $texto ); ?></p>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
