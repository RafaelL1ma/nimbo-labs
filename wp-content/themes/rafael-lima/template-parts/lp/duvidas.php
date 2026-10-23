<?php
/**
 * Seção: dúvidas frequentes (abre e fecha com <details>, sem JS).
 */

$duvidas = [
	[ 'Quanto tempo leva?', 'Landing pages ficam prontas em até 14 dias, sites em 3 a 4 semanas e sistemas a partir de 6 semanas. O prazo começa quando o conteúdo chega.' ],
	[ 'Preciso ter os textos e as fotos?', 'O ideal é que sim, porque ninguém conhece seu negócio melhor que você. Na LP Completa nós revisamos e organizamos seus textos. Para fotos, indicamos bancos de imagem gratuitos e de qualidade.' ],
	[ 'Vou conseguir editar sozinho?', 'Sim. Você recebe um painel simples e um passo a passo para trocar textos, fotos e preços.' ],
	[ 'E o domínio e a hospedagem?', 'Ficam no seu nome, e o custo é à parte. Indicamos as melhores opções e configuramos tudo para você.' ],
	[ 'E se eu não gostar?', 'Você vê uma prévia antes de tudo ir ao ar e tem 2 rodadas de ajustes incluídas.' ],
	[ 'Você atende fora de São Paulo?', 'Sim. O atendimento é 100% online, para todo o Brasil.' ],
	[ 'E se der algum problema depois?', 'Por 30 dias após a entrega, corrigimos sem custo qualquer erro do site. Depois disso, os planos mensais cuidam de tudo.' ],
	[ 'Como funciona o pagamento?', '50% na aprovação da proposta e 50% na entrega.' ],
];
?>
<section class="secao secao--escura" id="duvidas">
	<div class="container duvidas">
		<header class="secao__cabeca">
			<p class="rotulo" data-reveal>Dúvidas</p>
			<h2 class="secao__titulo" data-split>Perguntas <em>frequentes</em></h2>
		</header>

		<div class="duvidas__lista" data-stagger>
			<?php foreach ( $duvidas as [ $pergunta, $resposta ] ) : ?>
				<details class="duvida" name="duvidas">
					<summary>
						<?php echo esc_html( $pergunta ); ?>
						<?php echo rl_icone( 'mais', 'icone duvida__icone' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
					</summary>
					<p><?php echo esc_html( $resposta ); ?></p>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>
