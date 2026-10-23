<?php
/**
 * Seção: banner. À direita, uma janela de navegador monta um site sozinha
 * (a animação fica em assets/js/main.js, função construtor()).
 */
?>
<section class="hero" id="inicio" data-spotlight>
	<div class="hero__fundo" aria-hidden="true">
		<div class="hero__grade"></div>
		<div class="hero__brilho hero__brilho--1"></div>
		<div class="hero__brilho hero__brilho--2"></div>
	</div>

	<div class="container hero__grid">
		<div class="hero__texto">
			<p class="etiqueta" data-reveal>
				<span class="etiqueta__ponto"></span>
				Landing pages · Sites · Sistemas
			</p>

			<h1 class="hero__titulo" data-split>
				Sites e sistemas que <em>trabalham por você.</em>
			</h1>

			<p class="hero__subtitulo" data-reveal>
				Landing pages, sites e sistemas rápidos, bonitos e fáceis de editar.
				Você fala direto com quem desenvolve, do primeiro rascunho até o site no ar.
			</p>

			<div class="hero__acoes" data-reveal>
				<a class="btn btn--primario" href="<?php echo esc_url( rl_whatsapp_url() ); ?>" target="_blank" rel="noopener">
					Quero meu orçamento
					<?php echo rl_icone( 'seta' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
				</a>
				<a class="btn btn--fantasma" href="#processo">Ver como funciona</a>
			</div>

			<ul class="hero__selos" data-reveal>
				<li><?php echo rl_icone( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>Resposta em até 24h</li>
				<li><?php echo rl_icone( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>Atendimento em todo o Brasil</li>
				<li><?php echo rl_icone( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>Desenvolvendo desde 2021</li>
			</ul>
		</div>

		<figure class="hero__demo" data-reveal>
			<div class="construtor" data-construtor>
				<div class="construtor__barra">
					<span class="construtor__bolinhas"><i></i><i></i><i></i></span>
					<span class="construtor__url">seunegocio.com.br</span>
				</div>

				<div class="construtor__corpo">
					<pre class="construtor__codigo" aria-hidden="true"><code data-codigo></code></pre>

					<div class="construtor__preview" data-preview aria-hidden="true">
						<div class="mini-site">
							<div class="mini-site__topo" data-parte="1">
								<span class="mini-site__logo"></span>
								<span class="mini-site__menu"><i></i><i></i><i></i></span>
							</div>
							<div class="mini-site__hero" data-parte="1">
								<span class="barra barra--titulo"></span>
								<span class="barra barra--titulo barra--curta"></span>
								<span class="barra barra--texto"></span>
								<span class="barra barra--texto barra--media"></span>
								<span class="mini-site__botao" data-parte="3">
									<?php echo rl_icone( 'whatsapp' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
									Fale comigo
								</span>
							</div>
							<div class="mini-site__cards" data-parte="2">
								<span></span><span></span><span></span>
							</div>
						</div>
					</div>
				</div>

				<div class="construtor__status">
					<span class="construtor__progresso"><i data-progresso></i></span>
					<span class="construtor__etapa" data-status>criando o layout…</span>
				</div>
			</div>
			<figcaption class="hero__legenda">Este site está sendo montado agora, na sua frente.</figcaption>
		</figure>
	</div>
</section>
