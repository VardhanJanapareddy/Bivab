<?php

return array(

    'title'         => esc_html__( 'Custom Sidebar Settings', 'bluebell' ),
    'id'            => 'sidebar_setting',
    'desc'          => '',
    'icon'          => 'el el-indent-left',
    'fields'        => array(
        array(
            'id' => 'custom_sidebar_name',
            'type' => 'multi_text',
            'title' => esc_html__('Dynamic Custom Sidebar', 'bluebell'),
            'desc' => esc_html__('This section is used to create custom sidebar', 'bluebell')
            ),
    ),
);

