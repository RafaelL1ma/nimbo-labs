// Animações da LP. Carregado com defer depois de GSAP, ScrollTrigger e Lenis.
( () => {
	const raiz = document.documentElement;
	const reduzir = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;
	const temGsap = typeof window.gsap !== 'undefined' && typeof window.ScrollTrigger !== 'undefined';

	if ( ! temGsap || reduzir ) {
		raiz.classList.remove( 'js' );
		raiz.classList.add( 'no-anima' );
	}

	cabecalho();
	luzes();
	construtor( reduzir );

	if ( ! temGsap || reduzir ) {
		return;
	}

	const { gsap, ScrollTrigger } = window;
	gsap.registerPlugin( ScrollTrigger );

	rolagemSuave();
	titulos();
	entradas();
	linhaDoProcesso();
	graficoDoPainel();

	// ---------------------------------------------------------------------

	/** Rolagem suave com Lenis, sincronizada com o ScrollTrigger. */
	function rolagemSuave() {
		if ( typeof window.Lenis === 'undefined' ) {
			return;
		}
		const lenis = new window.Lenis( { anchors: { offset: -80 } } );
		lenis.on( 'scroll', ScrollTrigger.update );
		gsap.ticker.add( ( tempo ) => lenis.raf( tempo * 1000 ) );
		gsap.ticker.lagSmoothing( 0 );
	}

	/** Quebra os títulos em palavras e revela uma a uma, de baixo para cima. */
	function titulos() {
		document.querySelectorAll( '[data-split]' ).forEach( ( titulo ) => {
			quebrarEmPalavras( titulo );
			const palavras = titulo.querySelectorAll( '.palavra > span' );
			const noBanner = titulo.closest( '.hero' );

			gsap.set( titulo, { opacity: 1 } );
			gsap.from( palavras, {
				yPercent: 110,
				duration: 1,
				ease: 'expo.out',
				stagger: 0.06,
				delay: noBanner ? 0.15 : 0,
				scrollTrigger: noBanner ? undefined : { trigger: titulo, start: 'top 85%' },
			} );
		} );
	}

	function quebrarEmPalavras( elemento ) {
		[ ...elemento.childNodes ].forEach( ( no ) => {
			if ( no.nodeType === Node.TEXT_NODE ) {
				const fragmento = document.createDocumentFragment();
				no.textContent.split( /(\s+)/ ).forEach( ( parte ) => {
					if ( ! parte ) {
						return;
					}
					if ( /^\s+$/.test( parte ) ) {
						fragmento.append( ' ' );
						return;
					}
					const palavra = document.createElement( 'span' );
					palavra.className = 'palavra';
					const interno = document.createElement( 'span' );
					interno.textContent = parte;
					palavra.append( interno );
					fragmento.append( palavra );
				} );
				no.replaceWith( fragmento );
			} else if ( no.nodeType === Node.ELEMENT_NODE ) {
				quebrarEmPalavras( no );
			}
		} );
	}

	/** Elementos que sobem ao entrar na tela; listas entram em cascata. */
	function entradas() {
		const banner = document.querySelectorAll( '.hero [data-reveal]' );
		gsap.to( banner, { opacity: 1, y: 0, duration: 1, ease: 'expo.out', stagger: 0.1, delay: 0.35 } );

		document.querySelectorAll( '[data-reveal]:not(.hero [data-reveal])' ).forEach( ( el ) => {
			gsap.to( el, {
				opacity: 1,
				y: 0,
				duration: 1,
				ease: 'expo.out',
				scrollTrigger: { trigger: el, start: 'top 88%' },
			} );
		} );

		document.querySelectorAll( '[data-stagger]' ).forEach( ( lista ) => {
			gsap.to( lista.children, {
				opacity: 1,
				y: 0,
				duration: 1,
				ease: 'expo.out',
				stagger: 0.08,
				scrollTrigger: { trigger: lista, start: 'top 85%' },
			} );
		} );
	}

	/** A linha do "Como eu trabalho" se preenche com a rolagem e acende cada etapa. */
	function linhaDoProcesso() {
		const bloco = document.querySelector( '[data-etapas]' );
		if ( ! bloco ) {
			return;
		}
		gsap.to( bloco.querySelector( '[data-linha]' ), {
			scaleY: 1,
			ease: 'none',
			scrollTrigger: { trigger: bloco, start: 'top 65%', end: 'bottom 65%', scrub: 0.6 },
		} );
		bloco.querySelectorAll( '[data-etapa]' ).forEach( ( etapa ) => {
			ScrollTrigger.create( {
				trigger: etapa,
				start: 'top 65%',
				onEnter: () => etapa.classList.add( 'is-ativa' ),
				onLeaveBack: () => etapa.classList.remove( 'is-ativa' ),
			} );
		} );
	}

	/** Barras do gráfico da demonstração de painel crescem ao aparecer. */
	function graficoDoPainel() {
		const barras = document.querySelectorAll( '.tela__grafico i' );
		if ( ! barras.length ) {
			return;
		}
		gsap.from( barras, {
			scaleY: 0,
			duration: 1.2,
			ease: 'expo.out',
			stagger: 0.07,
			scrollTrigger: { trigger: barras[ 0 ].parentElement, start: 'top 90%' },
		} );
	}
} )();

// ---------------------------------------------------------------------------
// Funções que não dependem do GSAP.
// ---------------------------------------------------------------------------

/** Cabeçalho com fundo ao rolar e botão flutuante do WhatsApp depois do banner. */
function cabecalho() {
	const header = document.querySelector( '[data-header]' );
	const zap = document.querySelector( '[data-zap]' );
	const atualizar = () => {
		const y = window.scrollY;
		header?.classList.toggle( 'is-rolado', y > 10 );
		zap?.classList.toggle( 'is-visivel', y > window.innerHeight * 0.8 );
	};
	atualizar();
	window.addEventListener( 'scroll', atualizar, { passive: true } );
}

/** Luz que segue o mouse: no fundo das seções [data-spotlight] e nos cartões [data-luz]. */
function luzes() {
	if ( ! window.matchMedia( '(hover: hover)' ).matches ) {
		return;
	}
	document.querySelectorAll( '[data-spotlight]' ).forEach( ( secao ) => {
		secao.addEventListener( 'pointermove', ( e ) => {
			const r = secao.getBoundingClientRect();
			secao.style.setProperty( '--mx', `${ e.clientX - r.left }px` );
			secao.style.setProperty( '--my', `${ e.clientY - r.top }px` );
		} );
	} );
	document.querySelectorAll( '[data-luz]' ).forEach( ( cartao ) => {
		cartao.addEventListener( 'pointermove', ( e ) => {
			const r = cartao.getBoundingClientRect();
			cartao.style.setProperty( '--lx', `${ e.clientX - r.left }px` );
			cartao.style.setProperty( '--ly', `${ e.clientY - r.top }px` );
		} );
	} );
}

/**
 * Banner: a janela digita código e o mini-site se monta etapa por etapa,
 * até "✓ no ar". Repete em loop e pausa quando sai da tela.
 */
function construtor( reduzir ) {
	const janela = document.querySelector( '[data-construtor]' );
	if ( ! janela ) {
		return;
	}
	const codigo = janela.querySelector( '[data-codigo]' );
	const status = janela.querySelector( '[data-status]' );
	const progresso = janela.querySelector( '[data-progresso]' );
	const partes = janela.querySelectorAll( '[data-parte]' );

	// Cada linha é uma lista de [texto, classe de cor].
	const T = 'tag', A = 'atr', S = 'str', N = '';
	const etapas = [
		{
			status: 'criando o layout…',
			progresso: 25,
			linhas: [
				[ [ '<header', T ], [ ' class', A ], [ '=', N ], [ '"topo"', S ], [ '>', T ] ],
				[ [ '  <nav>', T ], [ 'Início · Serviços', N ], [ '</nav>', T ] ],
				[ [ '</header>', T ] ],
				[ [ '<section', T ], [ ' class', A ], [ '=', N ], [ '"hero"', S ], [ '>', T ] ],
				[ [ '  <h1>', T ], [ 'Seu negócio online', N ], [ '</h1>', T ] ],
			],
			depois: () => mostrar( 1 ),
		},
		{
			status: 'ajustando para o celular…',
			progresso: 50,
			linhas: [
				[ [ '@media', T ], [ ' (max-width: 600px)', A ], [ ' {', N ] ],
				[ [ '  .cards', A ], [ ' { ', N ], [ 'grid: 1fr;', S ], [ ' }', N ] ],
				[ [ '}', N ] ],
			],
			antes: () => mostrar( 2 ),
			depois: async () => {
				janela.classList.add( 'is-celular' );
				await esperar( 1300 );
				janela.classList.remove( 'is-celular' );
			},
		},
		{
			status: 'conectando o WhatsApp…',
			progresso: 75,
			linhas: [
				[ [ '<a', T ], [ ' href', A ], [ '=', N ], [ '"wa.me/55…"', S ], [ '>', T ] ],
				[ [ '  Fale comigo', N ] ],
				[ [ '</a>', T ] ],
			],
			depois: () => {
				mostrar( 3 );
				janela.classList.add( 'is-zap' );
			},
		},
		{
			status: 'publicando…',
			progresso: 100,
			linhas: [
				[ [ '$ ', A ], [ 'git push', N ] ],
				[ [ '✓ deploy concluído', S ] ],
			],
		},
	];

	if ( reduzir ) {
		estadoFinal();
		return;
	}

	let visivel = true;
	new IntersectionObserver( ( [ entrada ] ) => {
		visivel = entrada.isIntersecting;
	} ).observe( janela );

	rodar();

	async function rodar() {
		for (;;) {
			reiniciar();
			await esperar( 600 );
			for ( const etapa of etapas ) {
				status.textContent = etapa.status;
				progresso.style.transition = 'width 1.4s cubic-bezier(.22,1,.36,1)';
				progresso.style.width = `${ etapa.progresso }%`;
				await etapa.antes?.();
				for ( const linha of etapa.linhas ) {
					await digitar( linha );
				}
				await etapa.depois?.();
				await esperar( 500 );
			}
			janela.classList.add( 'is-pronto' );
			status.textContent = '✓ no ar';
			await esperar( 3500 );
		}
	}

	function reiniciar() {
		codigo.innerHTML = '';
		janela.classList.remove( 'is-pronto', 'is-zap', 'is-celular' );
		progresso.style.transition = 'none';
		progresso.style.width = '0%';
		partes.forEach( ( parte ) => {
			parte.style.opacity = '0';
			parte.style.transform = 'translateY(8px)';
		} );
	}

	function mostrar( numero ) {
		janela.querySelectorAll( `[data-parte="${ numero }"]` ).forEach( ( parte ) => {
			parte.style.opacity = '1';
			parte.style.transform = 'none';
		} );
	}

	async function digitar( linha ) {
		const cursor = document.createElement( 'span' );
		cursor.className = 'cursor';
		for ( const [ texto, classe ] of linha ) {
			const span = document.createElement( 'span' );
			if ( classe ) {
				span.className = classe;
			}
			codigo.append( span, cursor );
			for ( const letra of texto ) {
				span.textContent += letra;
				await esperar( 16 );
			}
		}
		cursor.remove();
		codigo.append( '\n' );
		// Mantém só as últimas linhas visíveis.
		while ( codigo.textContent.split( '\n' ).length > 16 ) {
			codigo.firstChild.remove();
		}
	}

	function estadoFinal() {
		etapas.forEach( ( etapa ) => etapa.linhas.forEach( ( linha ) => {
			linha.forEach( ( [ texto, classe ] ) => {
				const span = document.createElement( 'span' );
				if ( classe ) {
					span.className = classe;
				}
				span.textContent = texto;
				codigo.append( span );
			} );
			codigo.append( '\n' );
		} ) );
		janela.classList.add( 'is-pronto', 'is-zap' );
		progresso.style.width = '100%';
		status.textContent = '✓ no ar';
	}

	// Espera em pedaços, e só conta o tempo enquanto a janela está visível.
	async function esperar( ms ) {
		let restante = ms;
		while ( restante > 0 ) {
			const passo = Math.min( restante, 50 );
			await new Promise( ( ok ) => setTimeout( ok, passo ) );
			if ( visivel && ! document.hidden ) {
				restante -= passo;
			}
		}
	}
}
