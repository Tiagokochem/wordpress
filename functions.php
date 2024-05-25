// Adiciona campos personalizados no formulário de publicação/postagem
function custom_post_fields() {
    add_meta_box(
        'custom_meta', // ID da caixa meta
        'Informações Adicionais', // Título da caixa meta
        'custom_meta_box_html', // Função que retorna o HTML da caixa meta
        'post' // Post types onde a caixa meta aparecerá
    );
}
add_action('add_meta_boxes', 'custom_post_fields');

// Função que retorna o HTML da caixa meta
function custom_meta_box_html($post) {
    $value = get_post_meta($post->ID, '_segundo_autor', true);
    echo '<label for="segundo_autor">Segundo Autor:</label>';
    echo '<input type="text" id="segundo_autor" name="segundo_autor" value="'. esc_attr($value). '" size="25" />';
}

// Salva os dados do campo personalizado quando o post/publicação é salvo
function save_custom_meta_fields($post_id) {
    if (array_key_exists('segundo_autor', $_POST)) {
        update_post_meta(
            $post_id,
            '_segundo_autor',
            esc_attr($_POST['segundo_autor'])
        );
    }
}
add_action('save_post', 'save_custom_meta_fields');

// Função para adicionar campos personalizados à resposta da API REST para posts
function add_custom_fields_to_rest_response( $response, $post, $request ) {
    // Verifica se o campo personalizado existe e adiciona ao objeto de resposta
    if ( isset( $response->data ) ) {
        $second_author = get_post_meta( $post->ID, '_segundo_autor', true );
        $response->data['segundo_autor'] = $second_author;
    }
    return $response;
}

// Adiciona o filtro para modificar a resposta da API REST
add_filter( 'rest_prepare_post', 'add_custom_fields_to_rest_response', 10, 3 );

// Adiciona um menu personalizado no admin do WordPress
function custom_admin_menu() {
    add_menu_page(
        'Teste nScreen', // Título do menu
        'Teste nScreen', // Nome exibido no menu
        'manage_options', // Capabilidade
        'testen_screen', // Slug
        'custom_menu_content' // Função callback
    );

    add_submenu_page(
        'testen_screen', // Parent slug
        'Teste 1', // Título do submenu
        'Teste 1', // Nome exibido no submenu
        'manage_options', // Capabilidade
        'testen_sub_1', // Slug do submenu
        'custom_submenu_content_1' // Função callback
    );

    add_submenu_page(
        'testen_screen', // Parent slug
        'Teste 2', // Título do submenu
        'Teste 2', // Nome exibido no submenu
        'manage_options', // Capabilidade
        'testen_sub_2', // Slug do submenu
        'custom_submenu_content_2' // Função callback
    );
}
add_action('admin_menu', 'custom_admin_menu');

function custom_menu_content() {
    echo "Conteúdo do Teste nScreen";
}

function custom_submenu_content_1() {
    echo "Conteúdo do Teste 1";
}

function custom_submenu_content_2() {
    echo "Conteúdo do Teste 2";
}
