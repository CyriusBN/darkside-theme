<?php

$services_main_title_acf = get_field('services_main_title');
$services_main_title = $services_main_title_acf ?: __('Nossos Serviços', 'darkside-theme');
?>
<section id="services" class="services-section section-padding">
    <div class="container">
        <h2 class="section-title"><?php echo esc_html($services_main_title); ?></h2>
        <div class="services-grid">
            <?php
            $services_data = [];

            for ($i = 1; $i <= 3; $i++) {

                if ($i == 2) {
                    echo "";
                }

                $icon_url = '';
                $icon_field = get_field('service_' . $i . '_icon'); 

                if ($icon_field) {
                    $icon_url = is_array($icon_field) ? $icon_field['url'] : $icon_field;
                }

                $name = get_field('service_' . $i . '_name'); 
                $description = get_field('service_' . $i . '_description'); 

                if ( $name && $description ) {
                    $services_data[] = [
                        'icon_url'    => $icon_url,
                        'name'        => $name,
                        'description' => $description,
                    ];
                }
            } 

            if ( !empty($services_data) ) :
                foreach ($services_data as $service) : 
            ?>
                <div class="service-item">
                    <?php if( !empty($service['icon_url']) ): ?>
                        <img src="<?php echo esc_url($service['icon_url']); ?>" alt="<?php echo esc_attr($service['name']); ?>" class="service-icon">
                    <?php else: ?>
                        <span class="service-icon-placeholder"></span>
                    <?php endif; ?>
                    <h3 class="service-name"><?php echo esc_html($service['name']); ?></h3>
                    <p class="service-description"><?php echo esc_html($service['description']); ?></p>
                </div>
            <?php
                endforeach; 
            else :
            ?>
                <p style="grid-column: 1 / -1; text-align: center;"><?php _e('Nenhum serviço configurado com nome e descrição. Adicione serviços através do painel de administração na sua página HOME.', 'darkside-theme'); ?></p>

                <div class="service-item">
                    <span class="service-icon-placeholder"></span>
                    <h3 class="service-name"><?php _e('Desenvolvimento Web (Exemplo)', 'darkside-theme'); ?></h3>
                    <p class="service-description"><?php _e('Criação de sites e sistemas web modernos e responsivos.', 'darkside-theme'); ?></p>
                </div>
                <div class="service-item">
                    <span class="service-icon-placeholder"></span>
                    <h3 class="service-name"><?php _e('Marketing Digital (Exemplo)', 'darkside-theme'); ?></h3>
                    <p class="service-description"><?php _e('Estratégias para aumentar a sua presença online e resultados.', 'darkside-theme'); ?></p>
                </div>
                <div class="service-item">
                    <span class="service-icon-placeholder"></span>
                    <h3 class="service-name"><?php _e('Consultoria em TI (Exemplo)', 'darkside-theme'); ?></h3>
                    <p class="service-description"><?php _e('Soluções e orientações tecnológicas para o seu negócio.', 'darkside-theme'); ?></p>
                </div>
            <?php
            endif; 
            ?>
        </div>
    </div>
</section>