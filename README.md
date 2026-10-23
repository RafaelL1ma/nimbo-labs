# Nimbo Labs · landing page

Landing page da **Nimbo Labs**, minha empresa de landing pages, sites e sistemas sob medida. O projeto também é uma vitrine do que eu entrego: nenhuma animação, layout ou componente vem de construtor visual.

> Status: em desenvolvimento. O nome, o domínio e os textos ainda podem mudar.

## O que tem aqui

- **Tema WordPress próprio**, escrito à mão em PHP 8.4, HTML e CSS (sem Elementor, sem page builder, sem jQuery).
- **Animações com GSAP + ScrollTrigger** e rolagem suave com **Lenis**. A janela do banner digita código e monta um mini-site sozinha; a linha do processo se desenha com a rolagem; os títulos aparecem palavra por palavra.
- **Acessível e leve**: respeita "reduzir movimento" do sistema, funciona sem JavaScript, fontes e bibliotecas hospedadas no próprio projeto (nada de CDN), imagens e ícones em SVG/WebP.
- **SEO e compartilhamento**: descrição, Open Graph, dados estruturados e `sitemap.xml`/`robots.txt` gerados na exportação.
- **Exportação para site estático**, que é o que vai para a Cloudflare Pages.

## Como funciona

```
WordPress local  ──►  scripts/exportar-estatico.mjs  ──►  dist/  ──►  Cloudflare Pages
 (edição do tema)       (limpa e confere o HTML)        (arquivos)     (hospedagem grátis)
```

O WordPress serve só de ferramenta de desenvolvimento. O que vai ao ar são arquivos estáticos: rápidos, sem banco de dados e sem superfície de ataque.

## Estrutura

| Caminho | O que é |
|---|---|
| `wp-content/themes/rafael-lima/` | O tema: `front-page.php` monta a página a partir de uma lista de seções |
| `wp-content/themes/rafael-lima/template-parts/lp/` | Uma seção por arquivo (banner, serviços, preços…) |
| `wp-content/themes/rafael-lima/inc/` | Contatos, ícones SVG, SEO e limpeza do `<head>` |
| `wp-content/themes/rafael-lima/assets/` | CSS, JS, fontes, imagens e bibliotecas |
| `scripts/exportar-estatico.mjs` | Gera a pasta `dist/` (Node 18+, sem dependências) |
| `dist/` | A versão estática pronta para publicar |

O núcleo do WordPress, a configuração local e os uploads **não** estão no repositório.

## Rodando localmente

1. Instale o WordPress (PHP 8.2+ e MariaDB/MySQL) e copie `wp-content/themes/rafael-lima/` para `wp-content/themes/`.
2. Ative o tema **Nimbo Labs** e crie uma página "Home" definida como página inicial.
3. Ajuste os contatos em `inc/contato.php`.

## Gerando a versão estática

Com o WordPress local rodando:

```bash
# homologação: bloqueia buscadores e usa links relativos
node scripts/exportar-estatico.mjs --origem http://seu-site.local --noindex

# produção: preenche canonical, Open Graph e sitemap com o domínio final
node scripts/exportar-estatico.mjs --origem http://seu-site.local --site https://seu-dominio.com.br
```

O script confere se não sobrou nenhum endereço local no HTML e se todo arquivo referenciado existe na saída.

## Publicando na Cloudflare Pages

- **Build command:** nenhum.
- **Output directory:** `dist`.
- Ramo `main` = produção; ramo `homolog` = homologação, com sua própria URL de prévia.

## Contato

[LinkedIn](https://www.linkedin.com/in/rafaell1ma/) · [GitHub](https://github.com/RafaelL1ma) · lima.rafael67@hotmail.com
