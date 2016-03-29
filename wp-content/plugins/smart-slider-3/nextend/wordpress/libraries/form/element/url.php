<?php

N2Localization::addJS(array());

class N2ElementUrl extends N2ElementUrlAbstract
{

    protected function extendParams($params) {
        $params['labelButton']      = 'WordPress';
        $params['labelDescription'] = n2_('Select a page or a blog post from your WordPress site.');
        $params['image']            = '/element/link_platform.png';
        return $params;
    }
}