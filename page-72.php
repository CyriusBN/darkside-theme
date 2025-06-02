<?php
get_header(); 
?>

<main id="primary" class="site-main contact-page-area">
    <div class="container">

        <header class="entry-header contact-page-header">
            <h1 class="entry-title section-title">
                <?php
              
                echo get_the_title(72);
                ?>
            </h1>
        </header>

        <div class="contact-page-content-wrapper">
            <div class="contact-intro">
                <p>Estamos ansiosos por ouvir de si! Utilize o formulário abaixo ou os nossos detalhes de contato para qualquer questão ou proposta.</p>
            </div>

            <div class="contact-main-layout">
                <div class="contact-details-section">
                    <h2>Nossos Detalhes</h2>
                    <?php
                   
                    $contact_details_text = get_field('footer_contact_info', 72);

                    if ($contact_details_text) {
                        echo '<div class="contact-info-text">' . wpautop(esc_html($contact_details_text)) . '</div>';
                    } else {

                        echo '<p><strong>Morada:</strong> Rua de Exemplo, 123 - Cidade<br><strong>Telefone:</strong> (XX) 99999-8888<br><strong>Email:</strong> contato@webforcesolutions.ficticio.com</p>';
                    }
                    ?>
                    <p><strong>Horário de Atendimento:</strong><br>Segunda a Sexta: 9:00 - 18:00</p>
                </div>

                <div class="contact-form-section">
                    <h2>Envie-nos uma Mensagem</h2>
                    <?php
                    echo do_shortcode('[contact-form-7 id="82685c1" title="Formulário de contato 1"]');
                    ?>
                </div>
            </div>
        </div>

    </div>
</main>

<?php
get_footer(); 