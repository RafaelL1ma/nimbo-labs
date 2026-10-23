<?php
/**
 * Logo provisório da Nimbo Labs: nuvem (o "nimbo") com um cursor de código dentro,
 * seguida do nome. As cores do degradê vêm do tema.
 */

$gradiente = wp_unique_id( 'rl-grad-' );
?>
<span class="logo">
	<svg class="logo__monograma" viewBox="0 0 40 40" aria-hidden="true" focusable="false">
		<defs>
			<linearGradient id="<?php echo esc_attr( $gradiente ); ?>" x1="0" y1="0" x2="1" y2="1">
				<stop offset="0" stop-color="#8b6cff"/>
				<stop offset="1" stop-color="#22d3ee"/>
			</linearGradient>
		</defs>
		<rect x="1" y="1" width="38" height="38" rx="11" fill="#101018" stroke="url(#<?php echo esc_attr( $gradiente ); ?>)" stroke-width="1.5"/>
		<!-- nuvem -->
		<path d="M12.5 27.5h15a4.6 4.6 0 0 0 .7-9.15A7.4 7.4 0 0 0 13.9 16.6 5.5 5.5 0 0 0 12.5 27.5z" fill="none" stroke="url(#<?php echo esc_attr( $gradiente ); ?>)" stroke-width="1.7" stroke-linejoin="round"/>
		<!-- cursor de código dentro da nuvem: ">_" -->
		<path d="m16.8 20.4 2.6 2-2.6 2" fill="none" stroke="#f2f2f6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
		<path d="M21.4 24.6h3" stroke="#22d3ee" stroke-width="1.5" stroke-linecap="round"/>
	</svg>
	<span class="logo__nome">Nimbo <span class="logo__labs">Labs</span></span>
</span>
