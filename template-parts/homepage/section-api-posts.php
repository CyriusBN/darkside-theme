<?php
$api_url = 'https://jsonplaceholder.typicode.com/posts';
$response = wp_remote_get($api_url);
$posts_data = [];
$api_error = null;

if (is_wp_error($response)) {
    $api_error = 'Erro ao conectar com a API: ' . $response->get_error_message();
} else {
    $body = wp_remote_retrieve_body($response);
    $decoded_body = json_decode($body, true); 

    if (json_last_error() === JSON_ERROR_NONE && !empty($decoded_body)) {
        $posts_data = array_slice($decoded_body, 0, 3); 
    } elseif (empty($decoded_body)) {
        $api_error = 'A API não retornou dados ou os dados estão vazios.';
    } else {
        $api_error = 'Erro ao decodificar os dados da API: ' . json_last_error_msg();
    }
}
?>
<section id="api-posts" class="api-posts-section section-padding">
    <div class="container">
        <h2 class="section-title">Últimas Notícias</h2>

        <?php if ($api_error) : ?>
            <p class="api-error-message"><?php echo esc_html($api_error); ?></p>
        <?php elseif (!empty($posts_data)) : ?>
            <div class="api-posts-grid">
                <?php foreach ($posts_data as $post_item) : ?>
                    <article class="api-post-item">
                        <h3 class="api-post-title"><?php echo esc_html(ucfirst($post_item['title'])); ?></h3>
                        <div class="api-post-excerpt">
                            <?php
                            $body_snippet = esc_html(substr($post_item['body'], 0, 150));
                            echo wpautop($body_snippet . '...');
                            ?>
                        </div>
                        <?php  ?>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>Nenhuma notícia encontrada no momento.</p>
        <?php endif; ?>
    </div>
</section>