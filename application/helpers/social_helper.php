<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


    function test()
    {
        $data['reseaux_sociaux'] = $this->reseaux_sociaux_model->lister_reseaux_sociaux();
        $this->load->view('reseaux_sociaux/accueil', $data);
    }   
