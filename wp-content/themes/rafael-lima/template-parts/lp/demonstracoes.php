<?php
/**
 * Seção: demonstrações. Substitui o portfólio por enquanto: três telas feitas
 * em HTML/CSS (não são prints de clientes).
 */
?>
<section class="secao" id="demonstracoes">
	<div class="container">
		<header class="secao__cabeca">
			<p class="rotulo" data-reveal>Demonstrações</p>
			<h2 class="secao__titulo" data-split>Veja <em>na prática</em></h2>
			<p class="secao__intro" data-reveal>Exemplos de como cada tipo de projeto pode ficar. São demonstrações criadas por nós, não projetos de clientes.</p>
		</header>

		<ul class="demos" data-stagger>
			<li class="demo">
				<div class="tela tela--consultorio" aria-hidden="true">
					<div class="tela__topo"><span class="tela__marca">Clínica Aurora</span><span class="tela__pilula">Agendar</span></div>
					<div class="tela__hero">
						<div>
							<span class="tela__titulo">Cuidado que começa na escuta.</span>
							<span class="barra barra--texto"></span>
							<span class="barra barra--texto barra--media"></span>
							<span class="tela__botao"><?php echo rl_icone( 'whatsapp' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>Agendar pelo WhatsApp</span>
						</div>
						<span class="tela__foto"></span>
					</div>
					<div class="tela__chips"><span>Ansiedade</span><span>Casais</span><span>Online</span></div>
				</div>
				<p class="demo__rotulo">Demonstração</p>
				<h3>Landing page para consultório</h3>
				<p>Apresentação, especialidades e agendamento pelo WhatsApp.</p>
			</li>

			<li class="demo">
				<div class="tela tela--restaurante" aria-hidden="true">
					<div class="tela__topo"><span class="tela__marca">Brasa &amp; Sal</span><span class="tela__pilula">Pedir</span></div>
					<div class="tela__pratos"><span></span><span></span><span></span></div>
					<ul class="tela__cardapio">
						<li><span>Picanha na brasa</span><i></i><b>R$ 69</b></li>
						<li><span>Risoto de cogumelos</span><i></i><b>R$ 54</b></li>
						<li><span>Pudim da casa</span><i></i><b>R$ 18</b></li>
					</ul>
				</div>
				<p class="demo__rotulo">Demonstração</p>
				<h3>Site para restaurante</h3>
				<p>Cardápio, fotos, horários e pedidos online.</p>
			</li>

			<li class="demo">
				<div class="tela tela--painel" aria-hidden="true">
					<div class="tela__lateral"><i></i><i></i><i></i><i></i></div>
					<div class="tela__conteudo">
						<div class="tela__kpis">
							<span><small>Hoje</small><b>12</b></span>
							<span><small>Semana</small><b>58</b></span>
							<span><small>Confirmados</small><b>94%</b></span>
						</div>
						<div class="tela__grafico"><i style="--h:40%"></i><i style="--h:65%"></i><i style="--h:52%"></i><i style="--h:80%"></i><i style="--h:70%"></i><i style="--h:92%"></i><i style="--h:60%"></i></div>
						<ul class="tela__agenda">
							<li><b>09:00</b><span>Marina S.</span><em>confirmado</em></li>
							<li><b>10:30</b><span>João P.</span><em>lembrete enviado</em></li>
						</ul>
					</div>
				</div>
				<p class="demo__rotulo">Demonstração</p>
				<h3>Painel de agendamentos</h3>
				<p>Agenda do dia, clientes e lembretes automáticos.</p>
			</li>
		</ul>
	</div>
</section>
