function get_related_author_posts() {
    global $authordata, $post;

    $authors_posts = get_posts( array( 'author' => $authordata->ID, 'post__not_in' => array( $post->ID ), 'posts_per_page' => 3 ) );

    $output = '<ul>';
    foreach ( $authors_posts as $authors_post ) {
        $output .= '<li style="width:33%;float:left;padding:5px;border-bottom:0;"><div class="author_left"><a href="' . get_permalink( $authors_post->ID ) . '">'.get_the_post_thumbnail($authors_post->ID, array(348,160)). '</a></div><div class="author_right"><a href="' . get_permalink( $authors_post->ID ) . '"><h3 class="entry-title" style="font-size:16px !important;">' . apply_filters( 'the_title', $authors_post->post_title, $authors_post->ID ) . '</h3></a></div></li>';
    }
    $output .= '</ul>';

    return $output;
}