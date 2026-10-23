<?php
/**
 * Seção: como trabalhamos. A linha vertical se preenche conforme a rolagem.
 */

$etapas = [
	[ 'Conversa', 'Um papo rápido e sem compromisso para entender o seu negócio e o que você precisa.' ],
	[ 'Proposta', 'Você recebe escopo, prazo e preço fechados. Sem surpresas no meio do caminho.' ],
	[ 'Desenvolvimento', 'Você acompanha as versões e tem 2 rodadas de ajustes incluídas.' ],
	[ 'Publicação', 'Colocamos o site no ar, configuramos o domínio e ensinamos você a editar.' ],
	[ 'Cuidado contínuo (opcional)', 'Um plano mensal para o site continuar rápido, seguro e atualizado.' ],
];

$prazos = [
	[ 'Landing page', 'até 14 dias' ],
	[ 'Site institucional', '3 a 4 semanas' ],
	[ 'Sistema', 'a partir de 6 semanas, em etapas' ],
];
?>
<section class="secao secao--escura" id="processo">
	<div class="container processo">
		<header class="secao__cabeca processo__cabeca">
			<p class="rotulo" data-reveal>Como trabalhamos</p>
			<h2 class="secao__titulo" data-split>Do primeiro papo ao <em>site no ar</em></h2>

			<ul class="prazos" data-reveal>
				<?php foreach ( $prazos as [ $tipo, $prazo ] ) : ?>
					<li><span><?php echo esc_html( $tipo ); ?></span><b><?php echo esc_html( $prazo ); ?></b></li>
				<?php endforeach; ?>
			</ul>
			<p class="processo__obs" data-reveal>O prazo começa a contar quando os textos e as fotos chegam.</p>
		</header>

		<div class="etapas" data-etapas>
			<span class="etapas__linha" aria-hidden="true"><i data-linha></i></span>
			<ol class="etapas__lista">
			<?php foreach ( $etapas as $i => [ $titulo, $texto ] ) : ?>
				<li class="etapa" data-etapa>
					<span class="etapa__num"><?php echo esc_html( str_pad( (string) ( $i + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					<div>
						<h3><?php echo esc_html( $titulo ); ?></h3>
						<p><?php echo esc_html( $texto ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
			</ol>
		</div>
	</div>
</section>
