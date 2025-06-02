# Darkside Theme - Desafio WebForce Solutions

Este é um tema WordPress personalizado desenvolvido como parte do desafio técnico para a vaga de Estagiário de Desenvolvimento Web na WebForce Solutions. O objetivo foi criar a versão inicial de um site institucional fictício para a empresa "WebForce Solutions", especializada em soluções digitais.

## Funcionalidades Implementadas

* Tema WordPress personalizado ("darkside-theme") criado com base no Underscores.
* **Página Inicial Estática** com as seguintes secções:
    * Hero/banner com imagem, título, subtítulo e botão de ação dinâmicos (via ACF).
    * Secção "Sobre a empresa" com título e texto dinâmicos (via ACF).
    * Secção com 3 serviços, cada um com ícone, nome e descrição dinâmicos (via ACF, usando campos individuais).
    * Secção para Formulário de Contato funcional (via shortcode de plugin, configurável no ACF).
* **Rodapé Personalizado** com informações de contato, texto de copyright e links sociais dinâmicos (via ACF, usando uma página de configurações dedicada).
* **Página de Contato Dedicada** com layout de largura total e conteúdo definido via template PHP e ACF.
* Personalização de conteúdo facilitada pelo plugin Advanced Custom Fields (ACF).
* HTML semântico e estrutura modular com `template-parts`.
* Design responsivo básico.
* **Extra:** Integração com API externa (JSONPlaceholder) para exibir posts de exemplo numa secção da página inicial.

## Pré-requisitos

* WordPress (versão 5.5 ou superior recomendada).
* PHP (versão 7.4 ou superior recomendada).
* Um ambiente de desenvolvimento local (XAMPP, LocalWP, Docker, etc.) ou servidor de hospedagem.
* **Plugins Obrigatórios:**
    * **Advanced Custom Fields (ACF)** (a versão gratuita do repositório WordPress.org é suficiente).
    * **Contact Form 7** (ou outro plugin de formulário de contato à tua escolha - o tema está configurado para usar um shortcode).

## Instruções de Instalação do Tema

1.  **Descarregar/Clonar o Tema:**
    https://github.com/CyriusBN/Portifolio-.git
    * Descarrega o ficheiro ZIP do tema ou clona o repositório.
2.  **Instalar o Tema no WordPress:**
    * No painel do WordPress, vai a **Aparência > Temas**.
    * Clica em **"Adicionar novo"** e depois em **"Enviar tema"**.
    * Seleciona o ficheiro `darkside-theme.zip` (ou o nome do teu zip) e clica em **"Instalar agora"**.
    * Ativa o tema "Darkside Theme".

## Configuração Pós-Instalação

1.  **Instalar e Ativar Plugins Obrigatórios:**
    * Vai a **Plugins > Adicionar Novo**.
    * Instala e ativa o plugin **Advanced Custom Fields**.
    * Instala e ativa o plugin **Contact Form 7** (ou o teu plugin de formulário escolhido).

2.  **Configurar o Contact Form 7 (Exemplo):**
    * No menu "Contato" (do Contact Form 7), cria um novo formulário ou usa o padrão.
    * Copia o **shortcode** fornecido para este formulário (ex: `[contact-form-7 id="XYZ" title="Formulário de Contato 1"]`).

3.  **Importar Grupos de Campos ACF (Recomendado):**
    * Se incluíste um ficheiro JSON de exportação do ACF (ex: na pasta `acf-json/` do tema):
        * Vai a **Campos Personalizados > Ferramentas**.
        * Seleciona "Importar Grupos de Campos".
        * Faz o upload do ficheiro `acf-export.json` (ou o nome que deste) que está na pasta do tema.
        * Clica em "Importar". Isto irá criar automaticamente todos os grupos de campos e campos necessários.
    * *(Se o teu tema tiver a pasta `acf-json/` com os ficheiros JSON dos grupos de campos, o ACF pode tentar sincronizá-los automaticamente também).*

4.  **Configurar Grupos de Campos ACF Manualmente (Alternativa se não houver JSON):**
    * **Grupo 1: "Conteúdo da Página Inicial"**
        * **Regra de Localização:** Mostrar se `Página` for igual a `[Nome da tua Página Inicial Estática, ex: "HOME"]`.
        * **Campos Necessários:**
            * `hero_background_image` (Imagem, Retorno: Array da Imagem)
            * `hero_title` (Texto)
            * `hero_subtitle` (Área de Texto)
            * `hero_button_text` (Texto)
            * `hero_button_url` (URL)
            * `about_title` (Texto)
            * `about_text` (Editor WYSIWYG)
            * `services_main_title` (Texto)
            * `service_1_icon` (Imagem), `service_1_name` (Texto), `service_1_description` (Área de Texto)
            * `service_2_icon` (Imagem), `service_2_name` (Texto), `service_2_description` (Área de Texto)
            * `service_3_icon` (Imagem), `service_3_name` (Texto), `service_3_description` (Área de Texto)
            * `contact_section_title` (Texto)
            * `contact_form_shortcode` (Texto)
    * **Grupo 2: "Configurações de rodapé"**
        * Cria uma página no WordPress chamada, por exemplo, "Opções do Site - Rodapé" (anota o ID desta página).
        * **Regra de Localização:** Mostrar se `Página` for igual a `[Nome desta página "Opções do Site - Rodapé"]`.
        * **Campos Necessários:**
            * `footer_contact_info` (Área de Texto)
            * `footer_copyright` (Texto)
            * `footer_social_icon_1` (Texto), `footer_social_url_1` (URL)
            * `footer_social_icon_2` (Texto), `footer_social_url_2` (URL)
            * `footer_social_icon_3` (Texto), `footer_social_url_3` (URL)
        * **Importante:** Atualiza a variável `$config_page_id` no ficheiro `footer.php` com o ID da página que criaste para estas opções.

5.  **Criar e Configurar Páginas Essenciais:**
    * **Página Inicial Estática:**
        * Vai a **Páginas > Adicionar Nova**. Cria uma página com o título "HOME" (ou o nome que preferires para a tua página inicial).
        * Vai a **Configurações > Leitura**.
        * Em "A sua página inicial exibe", seleciona "Uma página estática".
        * Para "Página inicial", seleciona a página "HOME" que acabaste de criar.
        * Guarda as alterações.
    * **Página de Contato (e Opções do Rodapé):**
        * Vai a **Páginas > Adicionar Nova**. Cria uma página com o título "Contato" (ou "Informações de Contato"). O ID desta página será usado para o template `page-ID.php` e para buscar os campos ACF do rodapé. (No nosso exemplo, usamos ID 72 e o template `page-72.php`).
        * *(Opcional)* Se usaste o método de template `page-ID.php` ou `page-slug.php` para a página de contato, não precisas de selecionar um modelo de página. Se criaste `template-full-width.php` e queres usá-lo aqui, seleciona-o em "Atributos da página" > "Modelo".

6.  **Preencher Conteúdo ACF:**
    * Edita a tua página "HOME" e preenche todos os campos ACF (Hero, Sobre, Serviços, Shortcode do Formulário de Contato).
    * Edita a tua página "Contato" (ou "Opções do Site - Rodapé", a página ID 72) e preenche os campos ACF para as informações do rodapé (`footer_contact_info`, `footer_copyright`, links sociais).

7.  **Configurar Menus de Navegação:**
    * Vai a **Aparência > Menus**.
    * Cria um menu (ex: "Menu Principal") e adiciona as páginas desejadas (ex: "HOME", "Contato").
    * Em "Gerenciar locais", atribui este menu à localização de tema "Primário".
    * (Opcional) Cria um segundo menu para o rodapé e atribui-o à localização "Menu do Rodapé".

8.  **Logo do Site (Opcional):**
    * Vai a **Aparência > Personalizar > Identidade do Site**.
    * Envia o teu logo.

## Estrutura do Tema (Principais Ficheiros)

* `style.css`: Informações do tema e pode conter CSS (embora a maioria esteja em `assets/css/main.css`).
* `index.php`: Template de fallback principal.
* `header.php`: Cabeçalho do site.
* `footer.php`: Rodapé do site.
* `functions.php`: Lógica principal do tema, enfileiramento de scripts/estilos, registo de menus, etc.
* `front-page.php`: Template para a página inicial estática.
* `page-72.php` (ou `page-contato.php`): Template personalizado para a página de contato.
* `template-full-width.php`: Template de página sem barra lateral (opcional, se criado).
* `/assets/css/main.css`: Ficheiro principal de estilos CSS personalizados.
* `/inc/`: Contém ficheiros para funcionalidades modulares (como `template-tags.php`, `customizer.php`).
* `/template-parts/`: Contém partes de template reutilizáveis.
    * `/template-parts/homepage/`: Secções específicas da página inicial (`section-hero.php`, `section-about.php`, etc.).
* `/acf-json/` (Recomendado): Contém os ficheiros JSON exportados dos teus Grupos de Campos ACF para fácil sincronização/importação.

## Considerações Adicionais

* Este tema foi desenvolvido para fins de demonstração e como parte de um desafio técnico.
* A integração com a API JSONPlaceholder é para exemplo; numa aplicação real, usarias uma API relevante.
* O Tailwind CSS foi adicionado via CDN para experimentação (se o utilizador manteve essa opção). Para produção, um processo de compilação (build) do Tailwind é recomendado.

---
Cyrius B./ github: https://github.com/CyriusBN/Portifolio-.git