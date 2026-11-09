<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class Dockerdemo extends Module
{
    public function __construct()
    {
        $this->name = 'dockerdemo';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Gajendra Singh';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = ['min' => '8.0.0', 'max' => _PS_VERSION_];

        parent::__construct();

        $this->displayName = $this->l('Docker Demo');
        $this->description = $this->l('Test module running on Dockerized PrestaShop');
    }

    public function install()
    {
        return parent::install() && $this->registerHook('displayHome');
    }

    public function hookDisplayHome($params)
    {
        return '<div style="padding:15px;background:#e8f5e9;text-align:center">
                    Hello from Docker PrestaShop module
                </div>';
    }
}